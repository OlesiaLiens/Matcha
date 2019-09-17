<?php

namespace App\Models;

use PDO;

class User extends \Core\Model
{
	private $email;
	private $user_id;

	public function __construct($email, $user_id = 0)
	{
		$this->email = $email;
		$this->user_id = $user_id;
	}

	public function changeId()
	{
		if ($this->get_id()) {
			$this->set_id();
			return true;
		}
		return false;
	}

	private function get_id()
	{
		$db = static::getDB();

		$get_id = $db->prepare("SELECT id FROM `users` WHERE  email = ?");
		$get_id->execute([$this->email]);
		$row = $get_id->fetchColumn();
		if ($row) {
			$this->user_id = $row;
			return true;
		} else {
			return false;
		}
	}

	private function set_id()
	{
		try {
			$db = static::getDB();

			$insert = $db->prepare("UPDATE tokens
						set user_id = ?");
			$insert->execute([$this->user_id]);
			return true;
		} catch (\PDOException $e) {
			echo $e->getMessage();
		}
		return false;
	}

	public function get_user()
	{
		$db = static::getDB();

		$user = $db->prepare("SELECT * FROM `users` WHERE  id = ?");
		$user->execute([$this->user_id]);
		$user = $user->fetch(PDO::FETCH_ASSOC);

		if ($user)
			return $user;
		else
			return false;
	}

	public function get_id_tags()
	{
		$db = static::getDB();

		$teg_id = $db->prepare("SELECT `tag_id` FROM `users_tags` WHERE  user_id = ?");
		$teg_id->execute([$this->user_id]);
		$teg_id = $teg_id->fetchColumn();

		if ($teg_id)
			return $teg_id;
		else
			return false;
	}

	public function get_all_tags($tag_id)
	{
		$db = static::getDB();

		$tags= $db->prepare("SELECT `id` FROM `tags` WHERE  id = ?");
		$tags->execute([$tag_id]);
		$tags = $tags->fetchAll();

		if ($tags)
			return $tags;
		else
			return false;
	}
}
