<?php


namespace App\Models;


use PDO;

class Info extends \Core\Model
{
	private $date;
	private $gender;
	private $preferences;
	private $city;
	private $interests;
	private $bio;


	public function __construct(array $data)
	{
		$this->date = htmlspecialchars($data['bday'] ?? null);
		$this->gender = htmlspecialchars($data['gender'] ?? null);
		$this->preferences = htmlspecialchars($data['preferences'] ?? null);
		$this->city = htmlspecialchars($data['city'] ?? null);
		$this->tags = htmlspecialchars($data['interest'] ?? null);
		$this->bio = htmlspecialchars($data['bio'] ?? null);
	}

	public function get_tags_from_base(){

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

		$save = $db->prepare("UPDATE USERS SET bday = ?, gender = ?, preference = ?, bio = ?, location = ? WHERE  id = ?");
		$save->execute([$this->date, $this->gender, $this->preferences, $this->bio, $this->city, $user]);


//		$save_tag = $db->prepare("INSERT INTO user_tags(user_id, tag_id) VALUES(?, ?)");
//		$save_tag->execute([$user, $tag_id, $user]);

	}
}
