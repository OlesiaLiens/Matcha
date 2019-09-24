<?php


namespace App\Models;

use PDO;

class Info extends \Core\Model
{
	private $date;
	private $gender;
	private $preferences;
	private $city;
	private $bio;


	public function __construct(array $data, string $param = '')
	{
		if (isset($data) && count($data) > 0) {
			if (is_numeric($data['bday'])) {
				$this->date = htmlspecialchars($data['bday'] ?? null);
			}
			$this->city = htmlspecialchars($data['city'] ?? null);
			$this->gender = htmlspecialchars($data['gender'] ?? null);
			$this->preferences = htmlspecialchars($data['preferences'] ?? null);
			$this->bio = htmlspecialchars($data['bio'] ?? null);
			file_put_contents('../Logs/log.txt', 'There was data' . PHP_EOL, FILE_APPEND);
		} else {
			file_put_contents('../Logs/log.txt', 'InfoModel received: ' . $param . PHP_EOL, FILE_APPEND);
		}
	}

	public function get_tags_from_base()
	{

		$db = static::getDB();

		$tags = $db->prepare("SELECT * FROM tags");
		$tags->execute();
		$params = $tags->fetchAll(PDO::FETCH_ASSOC);

		if ($params)
			return $params;
		else
			return [];
	}

	public function save_user_info($user)
	{
		$db = static::getDB();

		if ($this->date && $this->gender && $this->preferences && ctype_alpha(str_replace(' ', '', $this->city)) && $this->bio) {
			$save = $db->prepare("UPDATE USERS SET bday = ?, gender = ?, preference = ?, bio = ?, location = ? WHERE  id = ?");
			$save->execute([$this->date, $this->gender, $this->preferences, $this->bio, $this->city, $user]);
		} else
			return;
	}

	// TODO: Parse JSON, for each interest find its id and insert it into users_tags

	public function save_tags($tagsJSON)
	{
		if ($tagsJSON) {
			$parse_tags = json_decode($tagsJSON);

			$db = static::getDB();

			$sql = $db->prepare("DELETE FROM users_tags WHERE user_id = ?");
			$del = $sql->execute([$_SESSION['user_id']]);
			if ($del) {
				foreach ($parse_tags as $tag) {
					$tag_id = $db->prepare("SELECT id FROM tags WHERE tag = ?");
					$tag_id->execute([$tag]);
					$tag_id = $tag_id->fetchColumn();

					if ($tag_id) {
						$save_tag = $db->prepare("INSERT USERS_TAGS(user_id, tag_id) VALUES(?, ?)");
						$save_tag->execute([$_SESSION['user_id'], $tag_id]);
					}
				}
			}
		}
	}

	public function save_location($locationJSON)
	{
		require(getcwd() . '../../Core/Utils.php');

		$locationObj = json_decode($locationJSON);
		$connection = static::getDB();
		$longitude = 0;
		$latitude = 0;

		if ($locationObj->gps == 'ok') {
			$longitude = $locationObj->longitude;
			$latitude = $locationObj->latitude;
		} elseif ($locationObj->gps == 'fail') {
			$coords = getCoordinates($locationObj->ip);
			$longitude = $coords['longitude'];
			$latitude = $coords['latitude'];
		}

		$sql = "UPDATE users SET longitude = :lon, latitude = :lat WHERE id = :id";
		$locationStatement = $connection->prepare($sql);
		$locationStatement->execute(array(
			"lon" => $longitude,
			"lat" => $latitude,
			"id" => $_SESSION['user_id']
		));
	}
}
