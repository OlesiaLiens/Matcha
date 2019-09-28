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

//		$params['email'] = $user['email'];
		$params['username'] = $user['username'];
		$params['first_name'] = $user['first_name'];
		$params['last_name'] = $user['last_name'];
		$params['avatars'] = $user['avatars'];
		$params['rating'] = $user['rating'];
		$params['gender'] = $user['gender'];
		$params['preference'] = $user['preference'];
		$params['location'] = $user['location'];
		$params['bday'] = $user['bday'];
		$params['bio'] = $user['bio'];
		$all_photos = new PhotoModel();
		$params['photos'] = $all_photos->getAllPhotos();

		$tag = new User(null, $user);

		$id_tags = $tag->get_id_tags();
		if ($id_tags) {
			foreach ($id_tags as $tags) {
				$par = $tag->get_all_tags($tags['tag_id']);
				array_push($params, $par);
			}
		}
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
