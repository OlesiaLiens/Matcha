<?php


namespace App\Controllers;

use App\Models\Photo as PhotoModel;
use Core\View;

class User extends \Core\LoginController
{
	public function indexAction()
	{
		$user = $this->before();

		if (!$user) {
			return;
		}

		$params = [];


		$user_param = new \App\Models\UserProfile($this->route_params);
		$user = $user_param->user_param();

		if ($user === false) {
			View::getTemplate('Errors/404error.php');
			return;
		}

		$params['id'] = $user['id'];
		$params['username'] = $user['username'];
		$params['avatars'] = $user['avatars'];
		$params['rating'] = $user['rating'];
		$params['gender'] = $user['gender'];
		$params['preference'] = $user['preference'];
		$params['location'] = $user['location'];
		$params['bday'] = $user['bday'];
		$params['bio'] = $user['bio'];
		$all_photos = new PhotoModel();
		$params['photos'] = $all_photos->getAllPhotos();

		View::render('Account/index.php', $params);
	}
}
