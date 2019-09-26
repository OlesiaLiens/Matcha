<?php


namespace App\Models;


use PDO;

class UserProfile extends \Core\Model
{
	private $user_id;

	public function __construct($params)
	{
		$this->user_id = $params['id'] ?? null;
	}

	public function user_param()
	{
		$db = static::getDB();

		$isset = $db->prepare("SELECT * FROM `users` WHERE id = ?");
		$isset->execute([$this->user_id]);
		$res = $isset->fetchAll(PDO::FETCH_ASSOC);
		if ($res) {
			return $res[0];
		} else {
			return false;
		}
	}

	public function rating_increment(){
		$db = static::getDB();

		$rating = $db->prepare("SELECT rating FROM `users` WHERE id = ?");
		$rating->execute([$this->user_id]);
		$rating = $rating->fetchColumn();
		if ($rating !== null)
		{
			$rating = $rating + 1;

			$update_rating = $db->prepare("UPDATE users SET rating = $rating WHERE id = ?");
			$update_rating->execute([$this->user_id]);
		}
	}
}
