<?PHP

namespace App\Models;
use PDO;

class Chat extends \Core\Model
{
	public function __construct()
	{
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

		echo json_encode($output);
	}

	protected function getCounterparts($id) {
		$connection = static::getDB();

		$sql = "SELECT second_user FROM user_action WHERE first_user = :fid AND matched = 'match'";
		$counterpartsStatement = $connection->prepare($sql);
		$counterpartsStatement->execute(array(':fid' => $id));
		$queryResult = $counterpartsStatement->fetchAll(PDO::FETCH_ASSOC);
		$result = array();
		foreach ($queryResult as $row) {
			array_push($result, $row['second_user']);
		}
		return $result;
	}

	protected function getChatObjById($origin, $counterpart) {

	}
}
?>
