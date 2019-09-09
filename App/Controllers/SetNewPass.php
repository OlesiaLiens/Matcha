<?php

namespace App\Controllers;

use Core\View;

use App\Models\SetNewPass as SetNewPassModel;
use App\Models\Password as PasswordModel;

class SetNewPass extends \Core\Controller
{
	public static $user_id;

	public function __construct($route_params)
	{
		parent::__construct($route_params);
	}

	public function indexAction()
	{
//		View::getTemplate('Password/setNewPass.php');
	}

	public static function SetNewPassAction(string $token)
	{
		if ($token) {
			$set_new_pass = new SetNewPassModel($token);
			$user_id = $set_new_pass->setNewPass();
			session_start();
			if (isset($_SESSION['reset_pass_time']) && time() - $_SESSION['reset_pass_time'] > 1800) {
				$_SESSION['reset_pass_user_id'] = false;
				unset($_SESSION['reset_pass_time']);
			}
			if ($user_id || (isset($_SESSION['reset_pass_user_id']) && $_SESSION['reset_pass_user_id'])) {
				if ($user_id) {
					$_SESSION['reset_pass_user_id'] = $user_id;
					$_SESSION['reset_pass_time'] = time();
				}
				$res = new SetNewPassModel($user_id);
				$fill = [];
				if (isset($_POST['submit']) && $_POST['submit'] === 'OK') {
					$fill = $res->change_2();
				}
				View::getTemplate('Password/setPass.php', $fill);
				if ($fill === true)
					header('Location: /setNewPass/change');
			} else {
				View::getTemplate('Errors/404error.php');
			}
		} else {
				View::getTemplate('Errors/404error.php');

		}
	}

	public static function changeAction()
	{
		View::getTemplate('Password/change.php');
		header('Location: /login/login');
	}
}
