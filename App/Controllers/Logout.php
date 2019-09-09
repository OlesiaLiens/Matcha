<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;

class Logout extends Controller
{
	public static function indexAction()
	{
		session_start();
		unset($_SESSION['user_id']);

//		header('Location: /register/index');
		View::getTemplate('Login/index.php');
	}
}
