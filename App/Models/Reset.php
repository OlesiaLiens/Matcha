<?php

namespace App\Models;

use function PHPSTORM_META\elementType;

class Reset extends \Core\Model
{
	private $email;
	private $email_token;

	public function __construct(array $data)
	{
		$this->email = htmlspecialchars($data['email']);
	}

	public function resetPassword()
	{
		if ($this->sendActivationMail())
			return $this->email;
		else
			return false;
	}

	private function setEmailToken()
	{
		$this->email_token = md5(uniqid(rand(), TRUE));

		try {
			$db = static::getDB();

			$insert = $db->prepare("INSERT INTO tokens(emailtoken) 
						VALUES(?)");
			$insert->execute([$this->email_token]);
			return true;
		} catch (\PDOException $e) {
			echo $e->getMessage();
		}
		return false;
	}

	private function sendActivationMail()
	{
		if ($this->setEmailToken()) {
			$message = <<<TXT

To reset your password follow this link http://localhost:1997/setNewPass/SetNewPass/{$this->email_token}

TXT;
			$header = "Content-type: text/html; charset=utf-8 \r\nFrom: Camagru <camagru@unit.ua> \r\n";

			if (mail($this->email, 'reset password', $message, $header)) {
				return true;
			} else {
				return false;
			}
		}
		return false;
	}
}
