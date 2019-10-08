<?php


namespace App\Models;

use PDO;

class Browse extends \Core\Model
{
	public static function getUserByPage($page_number)
	{
		$db = static::getDB();
		$start_index = $page_number * 5 - 5;

		$all_photos = "SELECT * FROM users LIMIT $start_index, 5";
		$res = $db->query($all_photos);
		$row = $res->fetchAll(PDO::FETCH_ASSOC);
		if ($row) {
			return $row;
		}
		return [];
	}

	public static function getUsersCount()
	{
		$db = static::getDB();

		$all_photos = "SELECT count(*) FROM users";
		$res = $db->query($all_photos);
		$row = $res->fetchColumn();
		if ($row) {
			return $row;
		}
		return 0;
	}

	public function getUsersGallery() {
		$output = file_get_contents('../Test/browseJSON.json');
		echo $output;
	}
}
