<?PHP

namespace App\Models;
use PDO;
use function PHPSTORM_META\map;

class Notification extends \Core\Model
{
	public function __construct() {
		session_start();
		$this->connection = static::getDB();
	}

	public function getCounters() {
		$sql = "SELECT
					(SELECT COUNT(*) FROM user_action WHERE first_user = :id AND see = 'see') AS 'see',
					(SELECT COUNT(*) FROM user_action WHERE first_user = :id AND liked = 'like') AS 'like',
					(SELECT COUNT(*) FROM user_action WHERE first_user = :id AND matched = 'match') AS 'match',
					(SELECT COUNT(*) FROM messages WHERE receiver = :id) AS 'msgs'";
		$countersStatement = $this->connection->prepare($sql);
		$countersStatement->execute(array(':id' => $_SESSION['user_id']));
		$counters = $countersStatement->fetch(PDO::FETCH_ASSOC);
		echo json_encode($counters);
	}

}
?>

