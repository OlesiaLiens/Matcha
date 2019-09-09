<?php

namespace App\Models;

class Settings extends \Core\Model
{
	private $new_email;
	private $username;
	private $password;
	private $repeat_password;

	public function checkUsername()
	{
		$this->username = htmlspecialchars($_POST['username']);

		if (!isset($this->username) || $this->username === '') {
			return false;
		} else if (isset($this->username)) {
			if (strlen($this->username) > 15) {
				return false;
			}

			if (strlen($this->username) < 5) {
				return false;
			}

			if (!(ctype_alnum($this->username))) {
				return false;
			}
		}
		return true;
	}

	public function changeUsername()
	{
		$this->username = htmlspecialchars($_POST['username']);

		$db = static::getDB();

		$user = $db->prepare("UPDATE USERS SET username  = ?  WHERE id = ?");
		$user->execute([$this->username, $_SESSION['user_id']]);
	}

	public function changeEmail()
	{
		$this->new_email = htmlspecialchars($_POST['email']);

		$db = static::getDB();

		$user = $db->prepare("UPDATE USERS SET  email  = ?  WHERE id = ?");
		$user->execute([$this->new_email, $_SESSION['user_id']]);
	}

	public function changePassword()
	{
		$this->password = htmlspecialchars($_POST['password']);
		$this->repeat_password = htmlspecialchars($_POST['repeat_password']);

		$password = hash("whirlpool", $this->password);

		$db = static::getDB();

		$stm = $db->prepare("UPDATE USERS SET password  = ?  WHERE id = ?");
		$stm->execute([$password, $_SESSION['user_id']]);
	}

	public function setNotification($nbr)
	{
		$db = static::getDB();

		$set_as_true = $db->prepare("UPDATE USERS SET notification = ? WHERE id = ?");
		$set_as_true->execute([$nbr, $_SESSION['user_id']]);
	}
}
