<?php

namespace App\Models;

class SetNewPass extends \Core\Model
{
	private $email_token;
	public $user_id;
	private $password;
	private $repeat_password;

	public function __construct($email_token)
	{
		$this->email_token = $email_token;
	}

	public function setNewPass()
	{
		$db = static::getDB();

		$state = $db->prepare("SELECT user_id FROM `tokens` WHERE emailtoken = ?");
		$state->execute([$this->email_token]);
		$row = $state->fetchColumn();

		if ($row) {
			$state = $db->prepare("DELETE FROM `tokens` WHERE emailtoken = ?");
			$state->execute([$this->email_token]);
			return $row;
		}
		return false;
	}

	public function change_2()
	{
		$user_id = $_SESSION['reset_pass_user_id'];
		$this->password = htmlspecialchars(trim($_POST['password']));
		$this->repeat_password = htmlspecialchars(trim($_POST['repeat_password']));

		if (strlen($this->password) > 15) {
			return ['password_error' => 'password too long'
			];
		}

		if (strlen($this->password) < 5) {
			return ['password_error' => 'password too short'
			];
		}

		if ($this->password === '' || $this->repeat_password === '') {
			return ['password_error'        => $this->password === '' ? 'empty field' : null,
					'repeat_password_error' => $this->repeat_password === '' ? 'empty field' : null,
					'password'              => $this->password,
					'repeat_password'       => $this->repeat_password
			];
		}

		if ($this->password !== $this->repeat_password) {
			return ['repeat_password_error' => 'password didn\'t match',
					'password'              => $this->password,
					'repeat_password'       => $this->repeat_password
			];
		}

		try {
			$password = hash("whirlpool", $this->password);
			$db = static::getDB();

			$update = $db->prepare("UPDATE users SET password  = ? WHERE id = ?");
			$update->execute([$password, $user_id]);
			$_SESSION['reset_pass_user_id'] = false;
			unset($_SESSION['reset_pass_time']);
			return true;
		} catch (\PDOException $e) {
			echo $e->getMessage();
		}
		return false;
	}
}
