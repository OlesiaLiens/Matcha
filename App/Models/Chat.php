<?PHP

namespace App\Models;
use PDO;
use function PHPSTORM_META\map;

class Chat extends \Core\Model
{
	public function __construct() {
		$this->connection = static::getDB();
	}

	public function getAvatar() {
		echo '/men/man42.jpg';
	}

	public function sendMessage($receiver) {

	}

	public function getDialogues() {
		if (!isset($_SESSION['user_id'])) $_SESSION['user_id'] = 1;
//		$output = file_get_contents('../Test/samplediags.json');
		$output = array();
		$allowedChats = $this->getCounterparts($_SESSION['user_id']);
		foreach ($allowedChats as $id)
			array_push($output, $this->getChatObjById($_SESSION['user_id'], $id));

		echo json_encode($output, JSON_PRETTY_PRINT);
	}

	protected function getCounterparts($id) {

		$sql = "SELECT second_user FROM user_action WHERE first_user = :fid AND matched = 'match'";
		$counterpartsStatement = $this->connection->prepare($sql);
		$counterpartsStatement->execute(array(':fid' => $id));
		$queryResult = $counterpartsStatement->fetchAll(PDO::FETCH_ASSOC);
		$result = array();
		foreach ($queryResult as $row) {
			array_push($result, $row['second_user']);
		}
		return $result;
	}

	protected function getChatObjById($origin, $counterpart) {
		$sql = "SELECT
					id AS counterpartID, first_name as firstName,
					last_name as lastName, avatar,
					TIMESTAMPDIFF(MINUTE, last_see, CURRENT_TIMESTAMP) as lastOnline
				FROM
					users
				WHERE id = :id";
		$userDetailsStatement = $this->connection->prepare($sql);
		$userDetailsStatement->execute(array(':id' => $counterpart));
		$result = $userDetailsStatement->fetch(PDO::FETCH_ASSOC);

		$online = $result['lastOnline'];
		if ($online <= 5)
			$online = 'now';
		elseif ($online < 60)
			$online = $online . ' minutes ago';
		elseif ($online < 1440)
			$online = intdiv($online, 60) . ' hours ago';
		else
			$online = intdiv($online, 1440) . ' days ago';
		$result['lastOnline'] = $online;

		$result['messages'] = $this->getChatHistoryByIds($origin, $counterpart);
		return $result;
	}

	protected function getChatHistoryByIds($origin, $counterpart) {
		$sql = "SELECT sender, text, `time`
				FROM
					messages 
				WHERE 
					(sender = :u AND receiver = :cp) OR
					(sender = :cp AND receiver = :u) ORDER BY `time`";
		$chatHistoryStatement = $this->connection->prepare($sql);
		$chatHistoryStatement->execute(array(':u' => $origin, ':cp' => $counterpart));
		$queryRes = $chatHistoryStatement->fetchAll(PDO::FETCH_ASSOC);

		foreach ($queryRes as $idx => $message) {
			if ($queryRes[$idx]['sender'] == $origin)
				$queryRes[$idx]['sender'] = 'you';
			elseif ($queryRes[$idx]['sender'] == $counterpart)
				$queryRes[$idx]['sender'] = 'they';
		}

		return $queryRes;
	}
}
?>
