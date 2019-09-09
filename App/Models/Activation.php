<?php


namespace App\Models;


class Activation extends \Core\Model
{
	private $token;

	public function __construct($token)
	{
		$this->token = $token;
	}

	public function checkUsernameAndToken()
	{
		$db = static::getDB();

		$check_token = $db->prepare("SELECT id FROM `users` WHERE  token = ? ");
		$check_token->execute([$this->token]);
		$row = $check_token->fetchColumn();

		if ($row) {
			$update = $db->prepare("UPDATE users SET active = 1 WHERE  token = ?");
			$update->execute([$this->token]);

			if ($update) {
				return true;
			} else {
				return false;
			}
		} else
			return false;
	}
}
