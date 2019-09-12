<?php

namespace App\Models;

use App\Models\Setup as SetupModel;

class Setup extends \Core\Model
{
	public function reinstall()
	{
		$db = static::getConnection();

		$create = "CREATE DATABASE IF NOT EXISTS camagru";
		$db->exec($create);

		$db = static::getDB();


		$db->exec("DROP TABLE IF EXISTS `users`, `tokens`, `photos`, `likes`, `comments`, `avatars`");

		$db->exec("CREATE TABLE IF NOT EXISTS users(
	id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username     varchar(50)  NOT NULL,
	first_name     varchar(50)  NOT NULL,
	last_name    varchar(50)  NOT NULL,
	email        varchar(255) NOT NULL,
	password     varchar(255) NOT NULL,
	active       varchar(50)  NOT NULL,
	avatars      varchar(50)  NOT NULL DEFAULT '../images/1photo.png',
	notification INT          NOT NULL DEFAULT 1,
	token        varchar(255) NOT NULL);");

		$db->exec("CREATE TABLE IF NOT EXISTS tokens
(
	id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id    INT UNSIGNED,
	emailtoken varchar(255) NOT NULL
);");

		$db->exec("CREATE TABLE IF NOT EXISTS photos
(
	id      INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	path    VARCHAR(255)                        NOT NULL,
	user_id INT(11) UNSIGNED                    NOT NULL,
	date    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);");

		$db->exec("CREATE TABLE IF NOT EXISTS avatars
(
	id      INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	path    VARCHAR(255)                        NOT NULL,
	user_id INT(11) UNSIGNED                    NOT NULL,
	date    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);");

		$db->exec("CREATE TABLE `likes`
(
	`photo_id` INT NOT NULL,
	`user_id`  INT NOT NULL
);
");

		$db->exec("CREATE TABLE IF NOT EXISTS comments (
	`comment_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`text`       VARCHAR(255)     NOT NULL,
	`time`       TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`user_id`    INT(10) UNSIGNED NOT NULL,
	`photo_id`   INT(10) UNSIGNED NOT NULL)");

		$db->exec("INSERT USERS(username, first_name, last_name, email, password, active, token)
						VALUES('olesia', 'olesia', 'liens', 'oles@gmail.com', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'djfjfjfjfjfjfjfj')");
	}
}
