<?php


namespace App\Models;

use PDO;

class Info extends \Core\Model
{
	private $date;
	private $gender;
	private $preferences;
	private $city;
	private $tags;
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
			$this->tags = htmlspecialchars($data['interest'] ?? null);
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

		if ($this->date && $this->gender && $this->preferences  && ctype_alpha(str_replace(' ', '', $this->city)) && $this->bio) {
			$save = $db->prepare("UPDATE USERS SET bday = ?, gender = ?, preference = ?, bio = ?, location = ? WHERE  id = ?");
			$save->execute([$this->date, $this->gender, $this->preferences, $this->bio, $this->city, $user]);
			$tag_id = $db->prepare("SELECT id FROM tags WHERE tag = ?");
			$tag_id->execute([$this->tags]);
			$tag_id = $tag_id->fetchColumn();

			if ($tag_id) {
				$save_tag = $db->prepare("INSERT USERS_TAGS(user_id, tag_id) VALUES(?, ?)");
				$save_tag->execute([$user, $tag_id]);
			}
		} else
			return;
	}

	// TODO: Parse JSON, for each interest find its id and insert it into users_tags
	public function save_tags($tagsJSON) {
		$connection = static::getDB();

		$sql = "DELETE FROM users_tags WHERE user_id = :user_id";
		$wipeStatement = $connection->prepare($sql);
		$wipeStatement->execute(array('user_id' => $_SESSION['user_id']));

		/* Pseudocode
		insert to users_tags(userid, tagid) values (:userid, (select from tags where...))
		*/
	}
}
