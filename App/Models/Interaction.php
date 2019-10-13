<?PHP


namespace App\Models;
use PDO;
class Interaction extends \Core\Model
{
	public function __construct()
	{
		session_start();
		$this->connection = static::getDB();
		$this->queryArr = array(':uid' => $_SESSION['user_id']);
	}

	public function getInteractions() {
		$likers = $this->getLikers();
		$liked = $this->getLiked();
		$viewers = $this->getViewers();

		$output = array();
		$output['likers'] = $likers;
		$output['liked'] = $liked;
		$output['viewers'] = $viewers;

		echo json_encode($output, JSON_PRETTY_PRINT);
	}

	protected function getLikers() {
		$sql = "SELECT
					users.id, first_name, last_name
				FROM
					users
					INNER JOIN user_action
					ON users.id = user_action.second_user
				WHERE
					first_user = :uid AND
					liked = 'liked'";
		$likersStatement = $this->connection->prepare($sql);
		$likersStatement->execute($this->queryArr);
		return $likersStatement->fetchAll(PDO::FETCH_ASSOC);
	}

	protected function getLiked() {
		$sql = "SELECT
					users.id, first_name, last_name
				FROM
					users
					INNER JOIN user_action
					ON users.id = user_action.first_user
				WHERE
					second_user = :uid AND
					liked = 'liked'";
		$likedStatement = $this->connection->prepare($sql);
		$likedStatement->execute($this->queryArr);
		return $likedStatement->fetchAll(PDO::FETCH_ASSOC);
	}

	protected function getViewers() {
		$sql = "SELECT
					users.id, first_name, last_name
				FROM
					users
					INNER JOIN user_action
					ON users.id = user_action.second_user
				WHERE
					user_action.first_user = :uid AND see = 'see'";
		$matchesStatement = $this->connection->prepare($sql);
		$matchesStatement->execute($this->queryArr);
		return $matchesStatement->fetchAll(PDO::FETCH_ASSOC);
	}
	
}

