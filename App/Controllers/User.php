<?php


namespace App\Controllers;

use Core\View;

class User extends \Core\LoginController
{
	public function indexAction()
	{
		$user = $this->before();

		if (!$user) {
			return;
		}

		$user_param = new \App\Models\UserProfile($this->route_params);
		$params = $user_param->user_param();
		if ($params === false) {
			View::getTemplate('Errors/404error.php');
			return;
		}

		View::getTemplate('Account/index.php', $params);
	}
}
