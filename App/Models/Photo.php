<?php

namespace App\Models;

use PDO;

class Photo extends \Core\Model
{
	public function savePhoto()
	{
		$data = $_POST['img'];
		$img = str_replace('data:image/png;base64,', '', $data);
		$img = str_replace(' ', '+', $img);
		$fileData = base64_decode($img);
		$pathToSave = BASE_PATH . '/images/';
		$fileName = $pathToSave . time() . ".png";
		file_put_contents($fileName, $fileData);
		$pathToDB = 'http://localhost:1997/images/' . time() . ".png";
		return ($pathToDB);
	}

	public function getAllPhotos()
	{
		$db = static::getDB();

		$all_photos = $db->prepare("SELECT * FROM photos WHERE user_id = ? ORDER BY date DESC");
		$all_photos->execute([$_SESSION['user_id']]);
		$row = $all_photos->fetchAll(PDO::FETCH_ASSOC);
		if ($row) {
			return $row;
		}
		return [];
	}

		public function getAllUserPhotos($user_id)
	{
		$db = static::getDB();

		$all_photos = $db->prepare("SELECT * FROM photos WHERE user_id = ? ORDER BY date DESC");
		$all_photos->execute([$user_id]);
		$row = $all_photos->fetchAll(PDO::FETCH_ASSOC);
		if ($row) {
			return $row;
		}
		return [];
	}

	public function saveToDB($img)
	{
		session_start();
		$user_id = $_SESSION['user_id'];
		$db = static::getDB();

		$save = $db->prepare("INSERT INTO PHOTOS(path, user_id) VALUES(?, ?)");
		$save->execute([$img, $user_id]);
	}

	public function saveAvatarToDB($img)
	{
		session_start();
		$user_id = $_SESSION['user_id'];
		$db = static::getDB();


		$save = $db->prepare("UPDATE USERS SET avatars = ? WHERE id = ? ");
		$save->execute([$img, $user_id]);
	}
}
