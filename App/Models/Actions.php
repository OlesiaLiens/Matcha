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
}
//
//		$get_id = $db->prepare("SELECT id FROM users WHERE email = ?");
//		$this->user_id = $get_id->execute([$this->user_email]);
//		$this->user_id = $get_id->fetchColumn();
//
//		if ($this->user_id) {
//
////			$like = $db->prepare("INSERT INTO user_action(first_user, second_user, like_user)
////						VALUES(?, ?, ?) LIMIT 1");
//			$like = $db->prepare("UPDATE user_action SET first_user = ?, second_user = ?, like_user = ? LIMIT 1");
//			$like->execute([$this->user_id, $_SESSION['user_id'], 'like']);
//			$like->execute(['like']);
//		}
//		return;
//	}

//	public function setUserUnLike()
//	{
//		$db = static::getDB();
//
//		$unlike = $db->prepare("UPDATE user_action SET like_user = 'false' WHERE first_user = ? AND WHERE like_user = ? ");
//		$unlike->execute([$this->user_id, $_SESSION['user_id']]);
//	}
//}
