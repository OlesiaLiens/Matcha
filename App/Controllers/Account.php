<?php

namespace App\Controllers;

use App\Models\Photo as PhotoModel;
use App\Models\User;
use Core\View;

class Account extends \Core\LoginController
{
	public function indexAction()
	{
		$user = $this->before();

		if (!$user) {
			return;
		}
		$params = [];

		$params['avatars'] = $user['avatars'];
		$all_photos = new PhotoModel();
		$params['photos'] = $all_photos->getAllPhotos();

		View::render('Account/index.php', $params);
	}

	public function savePhotoAction()
	{
		$save_photo = new PhotoModel();
		$res = $save_photo->savePhoto();
		if ($res) {
			$save_photo->saveToDB($res);
		}
	}

	public function saveAvatarAction()
	{
		$save_photo = new PhotoModel();
		$res = $save_photo->savePhoto();
		if ($res) {
			$save_photo->saveAvatarToDB($res);
		}
	}

}
