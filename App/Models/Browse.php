<?php


namespace App\Models;

use PDO;

class Browse extends \Core\Model
{
	public function __construct()
	{
//        session_start();
//        $this->connection = static::getDB();
	}


	public function getUsersGallery($user)
	{

		$db = static::getDB();

		$user_id = $user['id'];
		$user_gender = $user['gender'];
		$user_preference = $user['preference'] == 'both' ? '%' : $user['preference'];

		$all_users = $db->prepare("SELECT
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
									gender LIKE ? AND
									(preference = ? OR preference = 'both') AND
									id != ?
								ORDER BY
									rating");
		$all_users->execute([$user_preference, $user_gender, $user_id]);
		$users = $all_users->fetchAll(PDO::FETCH_ASSOC);


		$tags_id = [];
		$output = array();
		foreach ($users as $user)
		{
			$users_id = $db->prepare("SELECT tag_id FROM users_tags WHERE user_id = :id");
			$users_id->execute(array(':id' => $user['userID']));
			$arr = $users_id->fetchAll(PDO::FETCH_ASSOC);
			if ($arr !== false)
				array_push($tags_id, $arr);


			$tags_2 = [];
			if ($tags_id)
			{

				foreach ($tags_id as $key)
				{
					foreach ($key as $value)
					{
						$tag = $db->prepare("SELECT tag FROM tags WHERE id = :id");
						$tag->execute(array(':id' => $value['tag_id']));
						$res_1 = $tag->fetchColumn();
						if ($res_1)
						{
							array_push($tags_2, $res_1);
						}
					}
				}
			}

			$user['tags'] = $tags_2;
			$tags_2 = array();
			$tags_id = array();
			array_push($output, $user);
		}
		$res = json_encode($output);
		echo $res;
	}

	public function getOwnData()
	{
		session_start();
		$this->connection = static::getDB();
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
