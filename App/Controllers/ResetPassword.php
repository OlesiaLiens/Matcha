<?php

namespace App\Controllers;

use App\Models\User;
use Core\View;
use App\Models\Reset as ResetModel;
use App\Models\SetNewPass as SetNewPassModel;

class ResetPassword extends \Core\Controller
{
	public function resetAction()
	{

		View::getTemplate('Reset/reset.php');
	}

	public static function resetPasswordAction()
	{
		$reset = new ResetModel($_POST);
		$email = $reset->resetPassword();

		if ($email) {
			$get_user_id = new User($email);
			$res = $get_user_id->changeId();

			if ($res)
				View::getTemplate('Reset/message.php');
			else {
				View::getTemplate('Reset/reset.php');
			}
		}
	}
}
