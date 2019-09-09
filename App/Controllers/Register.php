<?php

namespace App\Controllers;

use Core\View;
use App\Models\Register as RegisterModel;

use App\Models;

class Register extends \Core\Controller
{

	public static function indexAction()
	{
		View::getTemplate('Register/index.php');
	}

	public static function registerAction()
	{

		if (isset($_POST['submit']) && $_POST['submit'] === 'OK') {

			$registerModel = new RegisterModel($_POST);
			$form = $registerModel->register();

			if (empty(array_filter($form))) {
				header('Location: /login/index');
			} else {
				View::getTemplate('Register/index.php', $form);
			}
		}
		else
			View::getTemplate('Register/index.php');
	}
}
