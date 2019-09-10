<?php

namespace App\Models;

use PDO;
use function PHPSTORM_META\elementType;


class Register extends \Core\Model
{
	private $errors = [
		'user_error'            => null,
		'password_error'        => null,
		'repeat_password_error' => null,
		'email_error'           => null,
		'first_name_error'      => null,
		'last_name_error'       => null
	];

	private $username;
	private $first_name;
	private $last_name;
	private $email;
	private $password;
	private $repeat_password;
	private $token;

	public function __construct(array $data)
	{
		$this->username = htmlspecialchars($data['username'] ?? null);
		$this->email = htmlspecialchars($data['email'] ?? null);
		$this->password = htmlspecialchars(trim($data['password'] ?? null));
		$this->repeat_password = htmlspecialchars(trim($data['repeat_password'] ?? null));
		$this->first_name = htmlspecialchars(trim($data['first_name'] ?? null));
		$this->last_name = htmlspecialchars(trim($data['last_name'] ?? null));
	}

	public static function getAll()
	{
		return [''];
	}

	public function register()
	{
		$this->validation();
		if (empty(array_filter($this->errors)) && $this->registerUser()) {
			$this->sendActivationMail();
		}
		return $this->errors;
	}

	public function validName()
	{
		$db = static::getDB();

		$check_name = $db->prepare("SELECT id FROM `users` WHERE username = ?");
		$check_name->execute([$this->username]);
		$row = $check_name->fetchColumn();

		if (!$row) {
			return true;
		} else {
			$this->errors['user_error'] = 'User already used';
			return false;
		}
	}

	public function validFirstLastName()
	{
		if (strlen($this->first_name) > 15) {
			$this->errors['first_name_error'] = 'First name too long';
		}

		if (strlen($this->last_name) > 15) {
			$this->errors['last_name_error'] = 'Last name too long';
		}

		if (strlen($this->first_name) < 5) {
			$this->errors['first_name_error'] = 'First name too short';
		}

		if (strlen($this->last_name) < 5) {
			$this->errors['last_name_error'] = 'Last name too short';
		}

		if (!(ctype_alnum($this->first_name))) {
			$this->errors['first_name_error'] = 'Use only numbers and letters';
		}

		if (!(ctype_alnum($this->last_name))) {
			$this->errors['last_name_error'] = 'Use only numbers and letters';
		}
	}

	private function validation()
	{
		$this->checkPass();

		if (!isset($this->username) || $this->username === '') {
			$this->errors['user_error'] = 'empty field';
		} else if (isset($this->username)) {
			$this->validName();
		}

		if (!isset($this->first_name) || $this->first_name === '') {
			$this->errors['first_name_error'] = 'empty field';
		}
		if (!isset($this->last_name) || $this->last_name === '') {
			$this->errors['last_name_error'] = 'empty field';
		} else if (isset($this->first_name) || isset($this->last_name)) {
			$this->validFirstLastName();
		}

		if (!isset($this->email) || $this->email === '') {
			$this->errors['email_error'] = 'empty field';
		} else if (isset($this->email)) {
			$this->checkEmail();
		}

		if (strlen($this->username) > 15) {
			$this->errors['user_error'] = 'login too long';
		}

		if (strlen($this->username) < 5) {
			$this->errors['user_error'] = 'login too short';
		}

		if (!(ctype_alnum($this->username))) {
			$this->errors['user_error'] = 'use only numbers and letters';
		}
	}

	public function checkPass()
	{
		if (!isset($this->password) || $this->password === '') {
			$this->errors['password_error'] = 'empty field';
		}

		if (!isset($this->repeat_password) || $this->repeat_password === '') {
			$this->errors['repeat_password_error'] = 'empty field';
		}

		if (strlen($this->password) > 15) {
			$this->errors['password_error'] = 'password too long';
		}

		if (strlen($this->password) < 5) {
			$this->errors['password_error'] = 'password too short';
		}

		if ($this->errors['password_error'] === null && $this->errors['repeat_password_error'] === null) {
			if ($this->password !== $this->repeat_password) {
				$this->errors['repeat_password_error'] = "password doesn't match";
			}
		}
		return $this->errors;
	}

	public function checkEmail()
	{
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$this->errors['email_error'] = 'Invalid email';
			return $this->errors;
		}

		$db = static::getDB();

		$check_email = $db->prepare("SELECT id FROM `users` WHERE email = ? LIMIT 1 ");
		$check_email->execute([$this->email]);
		$row = $check_email->fetchColumn();

		if (!$row) {
			return $this->errors;
		} else {
			$this->errors['email_error'] = 'Email already used';
			return $this->errors;
		}
	}

	private function registerUser()
	{
		$this->password = hash("whirlpool", $this->password);
		$this->token = md5(uniqid(rand(), TRUE));

		if ($this->errors['user_error'] === null && $this->errors['password_error'] === null && $this->errors['repeat_password_error'] === null
			&& $this->errors['email_error'] === null && $_POST['submit'] && $this->errors['first_name_error'] === null &&
			$this->errors['last_name_error'] === null) {
			try {
				$db = static::getDB();

				$insert = $db->prepare("INSERT USERS(username, first_name, last_name, email, password, active, token)
						VALUES(?, ?, ?, ?, ?, ?, ?)");
				return $insert->execute([$this->username, $this->first_name, $this->last_name, $this->email, $this->password, 0, $this->token]);
			} catch (\PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	private
	function sendActivationMail()
	{
		$message = <<<TXT
To activate your profile, follow this link http://localhost:1997/login/activate/{$this->token}
TXT;
		$header = "Content-type: text/html; charset=utf-8 \r\nFrom: Camagru <camagru@unit.ua> \r\n";

		if (mail($this->email, 'registration', $message, $header)) {
			return true;
		} else {
			return false;
		}
	}
}


