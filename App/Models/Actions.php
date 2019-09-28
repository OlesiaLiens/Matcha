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

	public function setUserLike()
	{
		$db = static::getDB();

		$get_id = $db->prepare("SELECT id FROM users WHERE email = ?");
		$this->user_id = $get_id->execute([$this->user_email]);
		$this->user_id = $get_id->fetchColumn();

		if ($this->user_id) {
//
			$sql = "INSERT INTO
					user_action(first_user, second_user, liked)
				VALUES
					(:first_user, :second_user, 'liked')
				ON DUPLICATE KEY UPDATE
					liked = 'liked'";
			$likedStatement = $db->prepare($sql);
			$likedStatement->execute(array(
				':first_user'  => $this->user_id,
				':second_user' => $_SESSION['user_id']));
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
	}

//	public function setUserUnLike()
//	{
//		$db = static::getDB();
//
//		$unlike = $db->prepare("UPDATE user_action SET like_user = 'false' WHERE first_user = ? AND WHERE like_user = ? ");
//		$unlike->execute([$this->user_id, $_SESSION['user_id']]);
//	}
}
