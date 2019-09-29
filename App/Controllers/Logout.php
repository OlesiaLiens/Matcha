<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\User as UserModel;

class Logout extends Controller
{
	public static function indexAction()
	{
		session_start();
		$status = new UserModel(null, $_SESSION['user_id']);
		$status->online_status();

		unset($_SESSION['user_id']);

//		header('Location: /register/index');
		View::getTemplate('Login/index.php');
	}
}
