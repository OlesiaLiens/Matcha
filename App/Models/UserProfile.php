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

	public function rating_increment()
	{
		$db = static::getDB();

		$rating = $db->prepare("SELECT rating FROM `users` WHERE id = ?");
		$rating->execute([$this->user_id]);
		$rating = $rating->fetchColumn();
		if ($rating !== null) {
			$rating = $rating + 1;

			$update_rating = $db->prepare("UPDATE users SET rating = $rating WHERE id = ?");
			$update_rating->execute([$this->user_id]);
		}
	}

	public function who_looked()
	{
		$db = static::getDB();

		$sql = "INSERT INTO
					user_action (first_user, second_user, see)
				VALUES
					(:first_user, :second_user, 'see')
				ON DUPLICATE KEY UPDATE
					see = 'see'";
		$seeStatement = $db->prepare($sql);
		$seeStatement->execute(array(
			':first_user' => $this->user_id,
			':second_user' => $_SESSION['user_id']));

		// $check = $db->prepare("SELECT COUNT(*) FROM user_action WHERE  first_user = ? AND second_user = ?");
		// $res = $check->execute([$this->user_id, $_SESSION['user_id']]);

		// if ($res) {
		// 	$update = $db->prepare("UPDATE user_action SET see  = ? WHERE first_user = ? AND second_user = ?");
		// 	$update->execute(['see', $this->user_id, $_SESSION['user_id']]);
		// }
		// if ($res === false) {
		// 	$update = $db->prepare("INSERT INTO user_action(first_user, second_user, see) VALUES (?, ?, ?)");
		// 	$update->execute([$this->user_id, $_SESSION['user_id'], 'see']);
		// }
	}

//		$see = $db->prepare("SELECT see FROM user_action WHERE first_user = ?");
//		$see = $see->execute(['$this->user_id']);
//		if ($see) {
//			$who_check = $db->prepare("INSERT user_action(first_user, second_user, see)
//						VALUES(?, ?, ?)");
//			$who_check->execute([$this->user_id, $_SESSION['user_id'], 'see']);
//		}
//		$see = $db->prepare("SELECT see FROM user_action WHERE first_user = ?");
//		$see = $see->execute(['$this->user_id']);
//		if ($see) {
//			$who_check = $db->prepare("UPDATE user_action SET first_user = ?, second_user = ?, see = 'see'");
//			$who_check->execute([$this->user_id, $_SESSION['user_id']]);
//		}
}
