<?php

namespace App\Models;

use PDO;

class Actions extends \Core\Model
{
	private $user_email;
	private $user_id;

	public function __construct($params)
	{
		$this->user_email = json_decode($params['data']);
	}

	public function setUserLike($user)
	{
		$db = static::getDB();

		$get_id = $db->prepare("SELECT id FROM users WHERE email = ? ORDER BY id DESC LIMIT 1");
		$this->user_id = $get_id->execute([$this->user_email]);
		$this->user_id = $get_id->fetchColumn();
//
		if ($this->user_id) {
			$like = $db->prepare("UPDATE user_action SET liked = 'liked' WHERE first_user = ? AND second_user = ? ORDER BY id DESC LIMIT 1");
			$like->execute([$this->user_id, $user['id']]);
		}
		return true;
	}

	public function setUserUnLike($user)
	{
		$db = static::getDB();

		$get_id = $db->prepare("SELECT id FROM users WHERE email = ? ORDER BY id DESC LIMIT 1");
		$this->user_id = $get_id->execute([$this->user_email]);
		$this->user_id = $get_id->fetchColumn();

		if ($this->user_id) {
			$un_like = $db->prepare("UPDATE user_action SET liked = 'none' WHERE first_user = ? AND second_user = ?");
			$un_like->execute([$this->user_id, $user['id']]);
		}
	}
}
