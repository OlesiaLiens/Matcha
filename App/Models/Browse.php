<?php


namespace App\Models;

use PDO;

class Browse extends \Core\Model
{
	public function __construct() {
		session_start();
		$this->connection = static::getDB();
	}

	public function getUsersGallery() {
		$output = file_get_contents('../Test/browseJSON.json');
		echo $output;
	}

	public function getOwnData() {
		$output = array();
		$queryArg = array(':userid' => $_SESSION['user_id']);

		$sql = "SELECT
					longitude, latitude
				FROM
					users
				WHERE
					id = :userid";
		$longLatStatement = $this->connection->prepare($sql);
		$longLatStatement->execute($queryArg);
		$queryRes = $longLatStatement->fetch(PDO::FETCH_ASSOC);
		$output = array_merge($output, $queryRes);

		$tags = array();
		$sql = "SELECT
					tags.tag
				FROM
					tags
					INNER JOIN users_tags
					ON tags.id = users_tags.tag_id
				WHERE
					user_id = :userid";
		$tagsStatement = $this->connection->prepare($sql);
		$tagsStatement->execute($queryArg);
		$queryRes = $tagsStatement->fetchAll(PDO::FETCH_ASSOC);
		foreach ($queryRes as $row) {
			array_push($tags, $row['tag']);
		}
		$output['tags'] = $tags;
		echo json_encode($output);
	}
}
