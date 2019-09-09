<?php

namespace App\Models;

//session_start();

class Login extends \Core\Model
{
	public $errors = [
		'user_error'     => null,
		'password_error' => null
	];

	private $username;
	private $password;
	private $user_id;

	public function __construct(array $data)
	{
		$this->username = htmlspecialchars($data['username']);
		$this->password = htmlspecialchars($data['password']);
	}

	public function login()
	{
		if (!$this->checkUsernameAndPass()) {
			return $this->errors;
		} else
			if ($this->checkUsernameAndPass()) {
				session_start();
				session_id();
				$_SESSION['user_id'] = $this->user_id;
				return true;
			}
	}

	private function checkUsernameAndPass()
	{
		$db = static::getDB();
		$hashPass = hash("whirlpool", $this->password);

		$check_username = $db->prepare("SELECT id FROM `users` WHERE  username = ? AND password = ? AND active = 1");
		$check_username->execute([$this->username, $hashPass]);
		$row = $check_username->fetchColumn();
		if ($row) {
			$this->user_id = $row;
			return true;
		} else {
			$this->errors['password_error'] = 'Password or username invalid! Or your account wasn\'t activated! Please check your data again!';
			return false;
		}
	}

}
