<?php

namespace App\Models;

use App\Models\Setup as SetupModel;

class Setup extends \Core\Model
{
	public function reinstall()
	{
		$db = static::getConnection();

		$create = "CREATE DATABASE IF NOT EXISTS matcha";
		$db->exec($create);

		$db = static::getDB();


		$db->exec("DROP TABLE IF EXISTS `users`, `tokens`, `photos`, `likes`, `comments`, `tags`, `users_tags`");

		$db->exec("CREATE TABLE IF NOT EXISTS users(
			id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username     varchar(50)  NOT NULL,
			first_name     varchar(50)  NOT NULL,
			last_name    varchar(50)  NOT NULL,
			bday        INTEGER DEFAULT 22     NOT NULL,
			email        varchar(255) NOT NULL,
			password     varchar(255) NOT NULL,
			active       varchar(50)  NOT NULL,
			gender      VARCHAR(6)   DEFAULT 'male' NOT NULL,
			preference  VARCHAR(6)   DEFAULT 'both' NOT NULL,
			bio         TEXT,
			longtitude   FLOAT,
			latitude     FLOAT,
			location     VARCHAR(50)  NOT NULL DEFAULT 'Kyiv',
			avatars      varchar(50)  NOT NULL DEFAULT '../images/1photo.png',
			notification INT          NOT NULL DEFAULT 1,
			rating       INTEGER      DEFAULT 0 NOT NULL,
			online      TINYINT(1)          DEFAULT 0 NOT NULL,
			token        varchar(255) NOT NULL
		);");

		$db->exec("CREATE TABLE IF NOT EXISTS tokens(
			id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			user_id    INT UNSIGNED,
			emailtoken varchar(255) NOT NULL
		);");

		$db->exec("CREATE TABLE IF NOT EXISTS photos(
			id      INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			path    VARCHAR(255)                        NOT NULL,
			user_id INT(11) UNSIGNED                    NOT NULL,
			date    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
		);");

		$db->exec("CREATE TABLE `likes`(
			`photo_id` INT NOT NULL,
			`user_id`  INT NOT NULL
		);");

		$db->exec("CREATE TABLE tags(
			id  INTEGER PRIMARY KEY AUTO_INCREMENT,
			tag VARCHAR(255) NOT NULL UNIQUE
		);");

		$db->exec("CREATE TABLE users_tags
		(
			id  INTEGER PRIMARY KEY AUTO_INCREMENT,
			user_id INTEGER,
			tag_id  INTEGER, 
			date    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
		);");

		$db->exec("
			INSERT INTO tags (tag)
			VALUES
				('Alternative Music'),
				('Blues'),
				('Classical Music'),
				('Country Music'),
				('Dance Music'),
				('Easy Listening'),
				('Electronic Music'),
				('European Music (Folk / Pop)'),
				('Hip Hop / Rap'),
				('Indie Pop'),
				('Inspirational (incl. Gospel)'),
				('Asian Pop (J-Pop, K-pop)'),
				('Jazz'),
				('Latin Music'),
				('New Age'),
				('Opera'),
				('Pop (Popular music)'),
				('R&B / Soul'),
				('Reggae'),
				('Rock'),
				('Singer / Songwriter (inc. Folk)'),
				('World Music / Beats'),
				('Absurdist/surreal/whimsical'),
				('Action'),
				('Adventure'),
				('Comedy'),
				('Crime'),
				('Drama'),
				('Fantasy'),
				('Historical'),
				('Historical fiction'),
				('Horror'),
				('Magical realism'),
				('Mystery'),
				('Paranoid Fiction'),
				('Philosophical'),
				('Political'),
				('Romance'),
				('Saga'),
				('Satire'),
				('Science fiction'),
				('Social'),
				('Speculative'),
				('Thriller'),
				('Urban'),
				('Western'),
				('JavaScript'),
				('SQL'),
				('Java'),
				('C#'),
				('Python'),
				('PHP'),
				('C++'),
				('C'),
				('TypeScript'),
				('Ruby'),
				('Swift'),
				('Objective-C'),
				('VB.NET'),
				('Assembly'),
				('R'),
				('Perl'),
				('VBA'),
				('Matlab'),
				('Go'),
				('Scala'),
				('Groovy'),
				('CoffeScript'),
				('Visual Basic 6'),
				('Lua'),
				('Haskell'),
				('AngularJS'),
				('HTML5'),
				('CSS3'),
				('Ruby On Rails'),
				('Node.js'),
				('.NET Core'),
				('React'),
				('Cordova'),
				('Firebase'),
				('Xamarin'),
				('Hadoop'),
				('Spark'),
				('MySQL'),
				('SQL Server'),
				('SQLite'),
				('PostgreSQL'),
				('MongoDB'),
				('Oracle'),
				('Redis'),
				('Cassandra');
			");

//$db->exec("CREATE TABLE history
//(
//  id        INTEGER PRIMARY KEY AUTO_INCREMENT,
//  first_id  INTEGER,
//  second_id INTEGER,
//  `action`  VARCHAR(8) NOT NULL
//    CHECK (`action` IN ('see', 'like', 'match', 'ban', 'break up', 'fake')),
//  read      INT(1)          DEFAULT 0 NOT NULL,
//  added     DATE            DEFAULT (Date('now', 'localtime'))
//);
//");


		$db->exec("CREATE TABLE IF NOT EXISTS comments (
			`comment_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`text`       VARCHAR(255)     NOT NULL,
			`time`       TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`user_id`    INT(10) UNSIGNED NOT NULL,
			`photo_id`   INT(10) UNSIGNED NOT NULL
		)");

		$db->exec("INSERT USERS(username, first_name, last_name, email, password, active, token)
						VALUES('olesia', 'olesia', 'liens', 'oles@gmail.com', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'djfjfjfjfjfjfjfj')");
	}
}
