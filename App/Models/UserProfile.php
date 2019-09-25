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
}
