<?php

namespace App\Controllers;

use App\Models\Register as RegisterModel;
use App\Models\User;
use Core\View;
use App\Models\Settings as SettingsModel;
use App\Models;

class Settings extends \Core\LoginController
{
	public function indexAction()
	{
		$res = [];

		if (!$this->before()) {
			return;
		}

		$settings = new SettingsModel();

		$user = new User(0, $_SESSION['user_id']);
		$user = $user->get_user();
		$res['notification'] = $user['notification'];

		if (isset($_POST['submit']) && $_POST['submit'] === 'name') {
			$registerModel = new RegisterModel($_POST);
			if ($registerModel->validName()) {
				if ($settings->checkUsername()) {
					$settings->changeUsername();
				} else {
					$res['user_error'] = 'Not valid name!';
				}
			} else {
				$res['user_error'] = 'Username already use';
			}
		}

		if (isset($_POST['submit']) && $_POST['submit'] === 'password') {
			$registerModel = new RegisterModel($_POST);
			$pass = $registerModel->checkPass();
			if ($pass['password_error'] === null && $pass['repeat_password_error'] === null)
				$settings->changePassword();
			else {
				$res['password_error'] = $pass['password_error'];
				$res['repeat_password_error'] = $pass['repeat_password_error'];
			}
		}

		if (isset($_POST['submit']) && $_POST['submit'] === 'email') {
			$registerModel = new RegisterModel($_POST);
			$email = $registerModel->checkEmail();
			if ($email['email_error'] === null)
				$settings->changeEmail();
			else {
				$res['email_error'] = $email['email_error'];
			}
		}
		if (isset($_POST['submit']) && $_POST['submit'] === 'notification') {
			if (isset($_POST['notification']) && $_POST['notification'] === 'OK' && $user['notification'] == 0) {
				$settings->setNotification(1);
				$res['notification'] = 1;
			} else if (!isset($_POST['notification']) && $user['notification'] == 1) {
				$settings->setNotification(0);
				$res['notification'] = 0;
			}
		}
		View::getTemplate('Settings/index.php', $res);
	}
}

