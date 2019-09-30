<?php


namespace App\Controllers;

//use App\Models\ResetPassword;
use App\Models\Photo as PhotoModel;
use App\Models\User;
use Core\View;
use App\Models\Login as LoginModel;
use App\Models\Activation as ActivationModel;

class Login extends \Core\Controller
{
	public function indexAction()
	{
		View::getTemplate('Login/message.php');
	}

	public function resetAction()
	{
		View::getTemplate('Login/reset.php');
	}

	public function activateAction(string $token)
	{
		$arr_true = [
			'message' => "You are successfully registered",
		];

		$arr_false = [
			'message' => "Sorry, account NOT activated",
		];

		if ($token) {
			$activation = new ActivationModel($token);
			$res = $activation->checkUsernameAndToken();
			if ($res) {
				View::getTemplate('Login/index.php', $arr_true);
			} else {
				View::getTemplate('Login/index.php', $arr_false);
			}
		}
	}

	public function loginAction()
	{
		$form = [];

		if (isset($_POST['submit']) && $_POST['submit'] === 'OK') {
			$loginModel = new LoginModel($_POST);
			$form = $loginModel->login();
			if ($form)
				$loginModel->online();
		}
		if ($form === true) {
			header('Location: /account/index');
		} else {
			View::getTemplate('Login/index.php', $form);
		}
	}
}
