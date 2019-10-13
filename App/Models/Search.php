<?php


namespace App\Models;

use PDO;

class Search extends \Core\Model
{
	public function __construct()
	{
		session_start();
		$this->connection = static::getDB();
	}

	public static function getUserByPage($page_number)
	{
		$db = static::getDB();
		$start_index = $page_number * 5 - 5;

		$all_photos = "SELECT * FROM users LIMIT $start_index, 5";
		$res = $db->query($all_photos);
		$row = $res->fetchAll(PDO::FETCH_ASSOC);
		if ($row) {
			return $row;
		}
		return [];
	}

	public static function getUsersCount()
	{
		$db = static::getDB();

		$all_photos = "SELECT count(*) FROM users";
		$res = $db->query($all_photos);
		$row = $res->fetchColumn();
		if ($row) {
			return $row;
		}
		return 0;
	}

	public function getResults($requestJSON)
	{
		$sql = "SELECT
					gender, preference
				FROM
					users
				WHERE
					id = :id";
		$ownDataStatement = $this->connection->prepare($sql);
		$ownDataStatement->execute(array(':id' => $_SESSION['user_id']));
		$ownData = $ownDataStatement->fetch(PDO::FETCH_ASSOC);

		$request = json_decode($requestJSON);
		$queryArray = array(
			':minAge' => $request->minAge,
			':maxAge' => $request->maxAge,
			':minRate' => $request->minRate,
			':maxRate' => $request->maxRate,
			':preference' => ($ownData['preference'] == 'both' ? '%' : $ownData['preference']),
			':gender' => $ownData['gender']
		);
		// print_r($queryArray);

		$sql = "SELECT
					id AS userID,
					avatar,
					first_name AS firstName,
					last_name AS lastName,
					bio,
					bday AS age,
					rating,
					location,
					longitude,
					latitude
				FROM
					users
				WHERE
					bday >= :minAge AND
					bday <= :maxAge AND
					rating >= :minRate AND
					rating <= :maxRate AND
					gender LIKE :preference AND
					(preference = :gender OR
					preference = 'both')
				ORDER BY
					rating";
		$searchStatement = $this->connection->prepare($sql);
		$searchStatement->execute($queryArray);
		$users = $searchStatement->fetchAll(PDO::FETCH_ASSOC);

		$sql = "SELECT
					tag
				FROM
					tags
					INNER JOIN users_tags ON
					tags.id = users_tags.tag_id
				WHERE
					users_tags.user_id = :id";
		$tagsStatement = $this->connection->prepare($sql);
		foreach ($users as $idx => $user) {
			$tags = array();
			$tagsStatement->execute(array(':id' => $user['userID']));
			$queryRes = $tagsStatement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($queryRes as $row) {
				array_push($tags, $row['tag']);
			}
			$users[$idx]['tags'] = $tags;
		}

		if ((count($request->tags) == 0) || strlen($request->tags[0]) == 0) {
			echo json_encode($users);
		} else {
			$filtered = array();
			foreach ($users as $user)
				if (count(array_intersect($request->tags, $user['tags'])) > 0)
					array_push($filtered, $user);
			echo json_encode($filtered);
		}
	}
}
