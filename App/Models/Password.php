<?php

namespace App\Models;

class Password extends \Core\Model
{
	private $password;
	private $repeat_password;
	private $user_id;

	public function __construct($user_id)
	{
		$this->user_id = $user_id;
	}

	public function change($user_id)
	{
		$this->user_id = $user_id;
		try {
			$db = static::getDB();

			$update = $db->prepare("UPDATE USERS SET password = ? WHERE id = ?");
			$update->execute([$this->password, $this->user_id]);
			return true;
		} catch (\PDOException $e) {
			echo $e->getMessage();
		}
		return false;
	}
}
