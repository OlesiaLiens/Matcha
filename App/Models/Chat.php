<?PHP

namespace App\Models;
use PDO;
use function PHPSTORM_META\map;

class Chat extends \Core\Model
{
	public function __construct() {
		session_start();
		$this->connection = static::getDB();
	}

	public function getAvatar() {
		echo '/men/man42.jpg';
	}

	public function sendMessage($receiver) {
		$message = json_decode($_POST['data']);
		$sql = "INSERT INTO
					messages (sender, receiver, `text`)
				VALUES
					(:sender, :receiver, :text)";
		$sendMsgStatement = $this->connection->prepare($sql);
		$sendMsgStatement->execute(array(
			':sender' => $_SESSION['user_id'],
			':receiver' => $receiver,
			':text' => $message->text
		));
	}

//	public function getUpdates($counterpart) {
//		$sql = "SELECT
//					COUNT(*)
//				FROM
//					messages
//				WHERE
//					(sender = :cp AND receiver = :u)";
//		$countStatement = $this->connection->prepare($sql);
//		$queryArgs = array(
//			':u' => $_SESSION['user_id'],
//			':cp' => $counterpart
//		);
//		$countStatement->execute($queryArgs);
//		$initHistLen = $countStatement->fetchColumn(0);
////		print($initHistLen);
//
//		while (strlen('true') == 4) {
//			$countStatement->execute($queryArgs);
//			$currHistLen = $countStatement->fetchColumn(0);
//			if ($currHistLen > $initHistLen) {
//				$sql = "SELECT
//							text
//						FROM
//							messages
//						WHERE
//							(sender = :cp AND receiver = :u)
//						ORDER BY
//							`time` DESC
//						LIMIT 1";
//				$lastMsgStatement = $this->connection->prepare($sql);
//				$lastMsgStatement->execute($queryArgs);
//				$messageText = $lastMsgStatement->fetchColumn(0);
//				echo $messageText;
//				break;
//			} else {
//				sleep (1);
//				continue;
//			}
//		}
//	}

	public function getUpdates($counterpart) {
		$sql = "SELECT
					text
				FROM
					messages
				WHERE
					(sender = :cp AND receiver = :u) AND
					delivered = 'N'";
	}

	public function getDialogues() {
//		if (!isset($_SESSION['user_id'])) $_SESSION['user_id'] = 1;
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
