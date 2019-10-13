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
		$matches = $this->getMatches();

		$output = array();
		$output['likers'] = $likers;
		$output['liked'] = $liked;
		$output['matches'] = $matches;

		echo json_encode($output, JSON_PRETTY_PRINT);
	}

	protected function getLikers() {
		$sql = "SELECT
					users.id, first_name, last_name
				FROM
					users
					INNER JOIN user_action
					ON users.id = user_action.first_user
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
		$likersStatement = $this->connection->prepare($sql);
		$likersStatement->execute($this->queryArr);
		return $likersStatement->fetchAll(PDO::FETCH_ASSOC);
	}

	protected function getMatches() {
		$sql = "SELECT
					users.id, first_name, last_name
				FROM
					users
					INNER JOIN user_action
					ON users.id = user_action.first_user
				WHERE
					first_user != :uid AND
					second_user = :uid AND
					matched = 'matched'";
		$likersStatement = $this->connection->prepare($sql);
		$likersStatement->execute($this->queryArr);
		return $likersStatement->fetchAll(PDO::FETCH_ASSOC);
	}
	
}
