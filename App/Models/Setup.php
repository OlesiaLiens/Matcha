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


		$db->exec("DROP TABLE IF EXISTS `users`, `tokens`, `photos`, `likes`, `comments`, `tags`, `users_tags`, `user_action`");

		$db->exec("CREATE TABLE IF NOT EXISTS users(
			id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username     varchar(50)  NOT NULL,
			first_name     varchar(50)  NOT NULL,
			last_name    varchar(50)  NOT NULL,
			bday        INTEGER DEFAULT 0     NOT NULL,
			email        varchar(255) NOT NULL,
			password     varchar(255) NOT NULL,
			active       varchar(50)  NOT NULL,
			gender      VARCHAR(50)   DEFAULT '-' NOT NULL,
			preference  VARCHAR(50)   DEFAULT '-' NOT NULL,
			bio         TEXT,
			longitude   FLOAT,
			latitude     FLOAT,
			location     VARCHAR(50)  NOT NULL DEFAULT '-',
			avatars      varchar(50)  NOT NULL DEFAULT '../images/1photo.png',
			notification INT          NOT NULL DEFAULT 1,
			rating       INTEGER      DEFAULT 0 NOT NULL,
			online      TINYINT(1)          DEFAULT 0 NOT NULL,
			last_see      TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
			token        varchar(255)  DEFAULT '' NOT NULL
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

//		$db->exec("CREATE TABLE `likes`(
//			`photo_id` INT NOT NULL,
//			`user_id`  INT NOT NULL
//		);");

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

//		$db->exec("CREATE TABLE messages
//(
//  	sender INT NOT NULL,
//	receiver INT NOT NULL,
//	text VARCHAR(200),
//	time DATE
//);");

		$db->exec("CREATE TABLE IF NOT EXISTS user_action
		(
			id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			first_user     varchar(50)   DEFAULT '-' NOT NULL,
			second_user     varchar(50)  DEFAULT '-'  NOT NULL,
			see    varchar(50)  DEFAULT '-'  NOT NULL,
			liked        varchar(50)   DEFAULT '-' NOT NULL,
			matched        varchar(255)  DEFAULT '-' NOT NULL,
			ban     varchar(255)  DEFAULT '-' NOT NULL,
			break       varchar(50)  DEFAULT '-'  NOT NULL,
			fake       varchar(50)   DEFAULT '-' NOT NULL
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
				('Equal=Test'),
				('Ampersand&Test'),
				('Cassandra');
			");

//$db->exec("CREATE TABLE user_action
//(
//  id        INTEGER PRIMARY KEY AUTO_INCREMENT,
//  first_id  INTEGER,
//  second_id INTEGER,
//  `action`  VARCHAR(8) NOT NULL,
//   CHECK (`action` IN ('see', 'like', 'match', 'ban', 'break up', 'fake')),
//  read      INT(1)          DEFAULT 0 NOT NULL,
//  added     DATE            DEFAULT (Date('now', 'localtime'))
//);
//");

		$db->exec("INSERT INTO users (email, username, first_name, last_name, password, active, gender, preference, bday, location, latitude, longitude,  avatars)
VALUES
('test@mail.com', 'user', 'Klava', 'Klava', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', 1, 'male', 'both', '44', 'Kiev',  '50.4547', '30.5238', '/default/jean.jpg'),
       ('zaria@mail.com', 'user', 'Zaria', 'Maxwell', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', 1, 'female', 'male', '54', 'Cherkassy',  '50.4547', '30.5238', '/default/zaria.jpg'),
       ('claire@mail.com', 'user', 'Claire', 'Flores', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', 1, 'female', 'male',  '20', 'Vyshneve',  '50.4547', '30.5238', '/default/claire.jpg'),
       ('gina@mail.com', 'user', 'Gina', 'Matthews', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', 1, 'female', 'male',  '18', 'Brovary',  '50.4547', '30.5238', '/default/gina.jpg'),
       ('henry@mail.com', 'user', 'Henry', 'Medina', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', 1, 'male', 'female',  '22', 'Zhytomyr',  '50.4547', '30.5238', '/default/henry.jpg'),
       ('niko@mail.com', 'user', 'Niko', 'Hester', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', 1, 'male', 'male', '33', 'Kyiv',  '50.4547', '30.5238', '/default/niko.jpg'),
       ('van@mail.com', 'user', 'Van', 'Mcneil', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', 1, 'male', 'female', '42', 'Kiev',  '50.4547', '30.5238', '/default/van.jpg'),
       ('jean@mail.com', 'user', 'Jean', 'Brooks', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', 1, 'female', 'female', '19', 'Chernihiv',  '50.4547', '30.5238', '/default/jean.jpg'),
       ('helen@mail.com', 'user', 'Helen', 'Odom', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', 1, 'female', 'both',  '40', 'Kyiv',  '50.4547', '30.5238', '/default/helen.jpg'),
       ('owen@mail.com', 'user', 'Owen', 'Chambers', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '34', 'Kyiv', '50.393074', '30.498484', '/men/man16.jpg'),
('fritz@mail.com', 'user', 'Fritz', 'Dalton', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man17.jpg'),
('maxwell@mail.com', 'user', 'Maxwell', 'Sosa', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '27', 'Kiev', '50.4547', '30.5238', '/men/man18.jpg'),
('nigel@mail.com', 'user', 'Nigel', 'Joseph', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man19.jpg'),
('guy@mail.com', 'user', 'Guy', 'Hodge', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '23', 'Kiev', '50.4547', '30.5238', '/men/man20.jpg'),
('gray@mail.com', 'user', 'Gray', 'Moran', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '45', 'Kiev', '50.4547', '30.5238', '/men/man21.jpg'),
('quinn@mail.com', 'user', 'Quinn', 'Elliott', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '44', 'Kiev', '50.4547', '30.5238', '/men/man22.jpg'),
('finn@mail.com', 'user', 'Finn', 'Gaines', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '32', 'Kiev', '50.4547', '30.5238', '/men/man23.jpg'),
('paki@mail.com', 'user', 'Paki', 'Lamb', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '36', 'Kiev', '50.4547', '30.5238', '/men/man24.jpg'),
('amery@mail.com', 'user', 'Amery', 'Hyde', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '32', 'Kiev', '50.4547', '30.5238', '/men/man25.jpg'),
('elvis@mail.com', 'user', 'Elvis', 'Burton', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man26.jpg'),
('bevis@mail.com', 'user', 'Bevis', 'James', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '20', 'Kiev', '50.4547', '30.5238', '/men/man27.jpg'),
('thaddeus@mail.com', 'user', 'Thaddeus', 'Frazier', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '29', 'Kiev', '50.4547', '30.5238', '/men/man28.jpg'),
('damon@mail.com', 'user', 'Damon', 'Mccall', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '34', 'Kiev', '50.4547', '30.5238', '/men/man29.jpg'),
('baxter@mail.com', 'user', 'Baxter', 'Oneal', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man30.jpg'),
('graham@mail.com', 'user', 'Graham', 'Cortez', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '42', 'Kiev', '50.4547', '30.5238', '/men/man31.jpg'),
('gil@mail.com', 'user', 'Gil', 'Nicholson', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '24', 'Kiev', '50.4547', '30.5238', '/men/man33.jpg'),
('xanthus@mail.com', 'user', 'Xanthus', 'Waters', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '23', 'Kiev', '50.4547', '30.5238', '/men/man34.jpg'),
('levi@mail.com', 'user', 'Levi', 'Chang', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '44', 'Kiev', '50.4547', '30.5238', '/men/man35.jpg'),
('quamar@mail.com', 'user', 'Quamar', 'Drake', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man36.jpg'),
('chaim@mail.com', 'user', 'Chaim', 'Holden', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '38', 'Kiev', '50.4547', '30.5238', '/men/man37.jpg'),
('joel@mail.com', 'user', 'Joel', 'Conway', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '24', 'Kiev', '50.4547', '30.5238', '/men/man38.jpg'),
('thomas@mail.com', 'user', 'Thomas', 'Perez', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '38', 'Kiev', '50.4547', '30.5238', '/men/man39.jpg'),
('russell@mail.com', 'user', 'Russell', 'Walter', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '46', 'Kiev', '50.4547', '30.5238', '/men/man40.jpg'),
('paul@mail.com', 'user', 'Paul', 'Callahan', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man41.jpg'),
('garth@mail.com', 'user', 'Garth', 'Fleming', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '37', 'Kiev', '50.4547', '30.5238', '/men/man42.jpg'),
('brady@mail.com', 'user', 'Brady', 'Hernandez', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '46', 'Kiev', '50.4547', '30.5238', '/men/man43.jpg'),
('ralph@mail.com', 'user', 'Ralph', 'Dillon', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '27', 'Kiev', '50.4547', '30.5238', '/men/man44.jpg'),
('kibo@mail.com', 'user', 'Kibo', 'Burch', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '39', 'Kiev', '50.4547', '30.5238', '/men/man46.jpg'),
('gareth@mail.com', 'user', 'Gareth', 'Cooley', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '25', 'Kiev', '50.4547', '30.5238', '/men/man47.jpg'),
('ryan@mail.com', 'user', 'Ryan', 'Solomon', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man48.jpg'),
('kennan@mail.com', 'user', 'Kennan', 'Mendez', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '27', 'Kiev', '50.4547', '30.5238', '/men/man49.jpg'),
('abbot@mail.com', 'user', 'Abbot', 'Hatfield', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '37', 'Kiev', '50.4547', '30.5238', '/men/man50.jpg'),
('merrill@mail.com', 'user', 'Merrill', 'Becker', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man51.jpg'),
('holmes@mail.com', 'user', 'Holmes', 'Wiggins', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '31', 'Kiev', '50.4547', '30.5238', '/men/man52.jpg'),
('drake@mail.com', 'user', 'Drake', 'Suarez', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '42', 'Kiev', '50.4547', '30.5238', '/men/man53.jpg'),
('evan@mail.com', 'user', 'Evan', 'Carrillo', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '38', 'Kiev', '50.4547', '30.5238', '/men/man55.jpg'),
('brendan@mail.com', 'user', 'Brendan', 'Justice', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '36', 'Kiev', '50.4547', '30.5238', '/men/man56.jpg'),
('orson@mail.com', 'user', 'Orson', 'Gregory', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '45', 'Kiev', '50.4547', '30.5238', '/men/man57.jpg'),
('gregory@mail.com', 'user', 'Gregory', 'Winters', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '19', 'Kiev', '50.4547', '30.5238', '/men/man58.jpg'),
('clark@mail.com', 'user', 'Clark', 'Neal', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '23', 'Kiev', '50.4547', '30.5238', '/men/man60.jpg'),
('zahir@mail.com', 'user', 'Zahir', 'Knowles', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '40', 'Kiev', '50.4547', '30.5238', '/men/man61.jpg'),
('edward@mail.com', 'user', 'Edward', 'Hoffman', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '20', 'Kiev', '50.4547', '30.5238', '/men/man62.jpg'),
('cruz@mail.com', 'user', 'Cruz', 'Carroll', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '22', 'Kiev', '50.4547', '30.5238', '/men/man63.jpg'),
('stone@mail.com', 'user', 'Stone', 'Mccall', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man65.jpg'),
('noah@mail.com', 'user', 'Noah', 'Dale', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '41', 'Kiev', '50.4547', '30.5238', '/men/man66.jpg'),
('alden@mail.com', 'user', 'Alden', 'Woods', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '35', 'Kiev', '50.4547', '30.5238', '/men/man67.jpg'),
('neville@mail.com', 'user', 'Neville', 'Hale', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '45', 'Kiev', '50.4547', '30.5238', '/men/man68.jpg'),
('dalton@mail.com', 'user', 'Dalton', 'Norton', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '39', 'Kiev', '50.4547', '30.5238', '/men/man69.jpg'),
('charles@mail.com', 'user', 'Charles', 'Holder', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '40', 'Kiev', '50.4547', '30.5238', '/men/man70.jpg'),
('eagan@mail.com', 'user', 'Eagan', 'Dale', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '46', 'Kiev', '50.4547', '30.5238', '/men/man71.jpg'),
('abdul@mail.com', 'user', 'Abdul', 'Hernandez', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '29', 'Kiev', '50.4547', '30.5238', '/men/man72.jpg'),
('flynn@mail.com', 'user', 'Flynn', 'Mcmahon', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '24', 'Kiev', '50.4547', '30.5238', '/men/man73.jpg'),
('camden@mail.com', 'user', 'Camden', 'Parrish', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '45', 'Kiev', '50.4547', '30.5238', '/men/man74.jpg'),
('elton@mail.com', 'user', 'Elton', 'Saunders', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '22', 'Kiev', '50.4547', '30.5238', '/men/man76.jpg'),
('tanek@mail.com', 'user', 'Tanek', 'Clay', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '36', 'Kiev', '50.4547', '30.5238', '/men/man77.jpg'),
('valentine@mail.com', 'user', 'Valentine', 'Palmer', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man78.jpg'),
('arsenio@mail.com', 'user', 'Arsenio', 'Hughes', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '29', 'Kiev', '50.4547', '30.5238', '/men/man79.jpg'),
('hall@mail.com', 'user', 'Hall', 'Sexton', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '33', 'Kiev', '50.4547', '30.5238', '/men/man80.jpg'),
('callum@mail.com', 'user', 'Callum', 'Singleton', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '36', 'Kiev', '50.4547', '30.5238', '/men/man81.jpg'),
('jesse@mail.com', 'user', 'Jesse', 'Taylor', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '32', 'Kiev', '50.4547', '30.5238', '/men/man82.jpg'),
('colin@mail.com', 'user', 'Colin', 'Stephenson', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '26', 'Kiev', '50.4547', '30.5238', '/men/man83.jpg'),
('akeem@mail.com', 'user', 'Akeem', 'Bishop', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '42', 'Kiev', '50.4547', '30.5238', '/men/man84.jpg'),
('garrison@mail.com', 'user', 'Garrison', 'Hinton', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '35', 'Kiev', '50.4547', '30.5238', '/men/man85.jpg'),
('brock@mail.com', 'user', 'Brock', 'Stone', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '39', 'Kiev', '50.4547', '30.5238', '/men/man86.jpg'),
('luke@mail.com', 'user', 'Luke', 'Wiley', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '27', 'Kiev', '50.4547', '30.5238', '/men/man87.jpg'),
('herman@mail.com', 'user', 'Herman', 'Livingston', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '23', 'Kiev', '50.4547', '30.5238', '/men/man90.jpg'),
('upton@mail.com', 'user', 'Upton', 'Greene', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '44', 'Kiev', '50.4547', '30.5238', '/men/man91.jpg'),
('plato@mail.com', 'user', 'Plato', 'Morse', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '42', 'Kiev', '50.4547', '30.5238', '/men/man92.jpg'),
('rudyard@mail.com', 'user', 'Rudyard', 'Newton', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '19', 'Kiev', '50.4547', '30.5238', '/men/man93.jpg'),
('armand@mail.com', 'user', 'Armand', 'Shields', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '22', 'Kiev', '50.4547', '30.5238', '/men/man94.jpg'),
('simon@mail.com', 'user', 'Simon', 'Forbes', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '35', 'Kiev', '50.4547', '30.5238', '/men/man95.jpg'),
('neil@mail.com', 'user', 'Neil', 'Pugh', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '27', 'Kiev', '50.4547', '30.5238', '/men/man96.jpg'),
('alan@mail.com', 'user', 'Alan', 'Olsen', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '28', 'Kiev', '50.4547', '30.5238', '/men/man97.jpg'),
('john@mail.com', 'user', 'John', 'Brennan', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '19', 'Kiev', '50.4547', '30.5238', '/men/man98.jpg'),
('nasim@mail.com', 'user', 'Nasim', 'Solomon', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'male', 'female', '30', 'Kiev', '50.4547', '30.5238', '/men/man99.jpg'),
('xyla@mail.com', 'user', 'Xyla', 'Valencia', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '22', 'Kiev', '50.4547', '30.5238', '/women/woman0.jpg'),
('willa@mail.com', 'user', 'Willa', 'Waters', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '43', 'Kiev', '50.4547', '30.5238', '/women/woman1.jpg'),
('melanie@mail.com', 'user', 'Melanie', 'Spencer', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '37', 'Kiev', '50.4547', '30.5238', '/women/woman2.jpg'),
('jade@mail.com', 'user', 'Jade', 'Craig', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '40', 'Kiev', '50.4547', '30.5238', '/women/woman3.jpg'),
('marah@mail.com', 'user', 'Marah', 'Workman', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '38', 'Kiev', '50.4547', '30.5238', '/women/woman55.jpg'),
('ifeoma@mail.com', 'user', 'Ifeoma', 'Trevino', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '24', 'Kiev', '50.4547', '30.5238', '/women/woman5.jpg'),
('ava@mail.com', 'user', 'Ava', 'Taylor', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '19', 'Kiev', '50.4547', '30.5238', '/women/woman56.jpg'),
('taylor@mail.com', 'user', 'Taylor', 'Conway', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '36', 'Kiev', '50.4547', '30.5238', '/women/woman7.jpg'),
('iola@mail.com', 'user', 'Iola', 'Delaney', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '27', 'Kiev', '50.4547', '30.5238', '/women/woman8.jpg'),
('hadassah@mail.com', 'user', 'Hadassah', 'Richard', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '29', 'Kiev', '50.4547', '30.5238', '/women/woman51.jpg'),
('amy@mail.com', 'user', 'Amy', 'Lowery', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '36', 'Kiev', '50.4547', '30.5238', '/women/woman10.jpg'),
('xerxes@mail.com', 'user', 'Xerxes', 'Peck', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '26', 'Kiev', '50.4547', '30.5238', '/women/woman11.jpg'),
('chiquita@mail.com', 'user', 'Chiquita', 'Peters', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '28', 'Kiev', '50.4547', '30.5238', '/women/woman12.jpg'),
('charlotte@mail.com', 'user', 'Charlotte', 'Wall', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '28', 'Kiev', '50.4547', '30.5238', '/women/woman13.jpg'),
('kaitlin@mail.com', 'user', 'Kaitlin', 'Cooper', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '35', 'Kiev', '50.4547', '30.5238', '/women/woman14.jpg'),
('meredith@mail.com', 'user', 'Meredith', 'Lloyd', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '33', 'Kiev', '50.4547', '30.5238', '/women/woman15.jpg'),
('melodie@mail.com', 'user', 'Melodie', 'Jackson', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '21', 'Kiev', '50.4547', '30.5238', '/women/woman16.jpg'),
('rina@mail.com', 'user', 'Rina', 'Chavez', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '33', 'Kiev', '50.4547', '30.5238', '/women/woman17.jpg'),
('dai@mail.com', 'user', 'Dai', 'Sanders', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '33', 'Kiev', '50.4547', '30.5238', '/women/woman18.jpg'),
('meghan@mail.com', 'user', 'Meghan', 'Decker', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '34', 'Kiev', '50.4547', '30.5238', '/women/woman19.jpg'),
('joelle@mail.com', 'user', 'Joelle', 'Fischer', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '39', 'Kiev', '50.4547', '30.5238', '/women/woman20.jpg'),
('jenna@mail.com', 'user', 'Jenna', 'Gregory', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '19', 'Kiev', '50.4547', '30.5238', '/women/woman21.jpg'),
('leilani@mail.com', 'user', 'Leilani', 'Jones', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '44', 'Kiev', '50.4547', '30.5238', '/women/woman22.jpg'),
('cameron@mail.com', 'user', 'Cameron', 'Cohen', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '22', 'Kiev', '50.4547', '30.5238', '/women/woman23.jpg'),
('jessica@mail.com', 'user', 'Jessica', 'Ortiz', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '20', 'Kiev', '50.4547', '30.5238', '/women/woman24.jpg'),
('susan@mail.com', 'user', 'Susan', 'Baxter', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '29', 'Kiev', '50.4547', '30.5238', '/women/woman25.jpg'),
('idona@mail.com', 'user', 'Idona', 'Sutton', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '26', 'Kiev', '50.4547', '30.5238', '/women/woman26.jpg'),
('ingrid@mail.com', 'user', 'Ingrid', 'Vazquez', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '29', 'Kiev', '50.4547', '30.5238', '/women/woman27.jpg'),
('mechelle@mail.com', 'user', 'Mechelle', 'Vaughan', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '39', 'Kiev', '50.4547', '30.5238', '/women/woman28.jpg'),
('maggy@mail.com', 'user', 'Maggy', 'Fry', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '31', 'Kiev', '50.4547', '30.5238', '/women/woman29.jpg'),
('roanna@mail.com', 'user', 'Roanna', 'Dunlap', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '29', 'Kiev', '50.4547', '30.5238', '/women/woman30.jpg'),
('ocean@mail.com', 'user', 'Ocean', 'Whitfield', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '24', 'Kiev', '50.4547', '30.5238', '/women/woman31.jpg'),
('miriam@mail.com', 'user', 'Miriam', 'Mcdonald', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '19', 'Kiev', '50.4547', '30.5238', '/women/woman32.jpg'),
('alice@mail.com', 'user', 'Alice', 'Coleman', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '26', 'Kiev', '50.4547', '30.5238', '/women/woman33.jpg'),
('candice@mail.com', 'user', 'Candice', 'Wise', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '44', 'Kiev', '50.4547', '30.5238', '/women/woman34.jpg'),
('avye@mail.com', 'user', 'Avye', 'Cummings', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '30', 'Kiev', '50.4547', '30.5238', '/women/woman35.jpg'),
('nomlanga@mail.com', 'user', 'Nomlanga', 'Cameron', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '42', 'Kiev', '50.4547', '30.5238', '/women/woman36.jpg'),
('amanda@mail.com', 'user', 'Amanda', 'Hayden', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '44', 'Kiev', '50.4547', '30.5238', '/women/woman37.jpg'),
('miranda@mail.com', 'user', 'Miranda', 'Johns', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '21', 'Kiev', '50.4547', '30.5238', '/women/woman38.jpg'),
('indira@mail.com', 'user', 'Indira', 'Hicks', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '21', 'Kiev', '50.4547', '30.5238', '/women/woman39.jpg'),
('angela@mail.com', 'user', 'Angela', 'Gill', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '34', 'Kiev', '50.4547', '30.5238', '/women/woman40.jpg'),
('maxine@mail.com', 'user', 'Maxine', 'Sharp', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '40', 'Kiev', '50.4547', '30.5238', '/women/woman41.jpg'),
('n@mail.com', 'user', 'Madison', 'Erickson', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '32', 'Kiev', '50.4547', '30.5238', '/women/woman99.jpg'),
('alexis@mail.com', 'user', 'Alexis', 'Stevens', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '32', 'Kiev', '50.4547', '30.5238', '/women/woman43.jpg'),
('sarah@mail.com', 'user', 'Sarah', 'Sweet', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '39', 'Kiev', '50.4547', '30.5238', '/women/woman44.jpg'),
('rhiannon@mail.com', 'user', 'Rhiannon', 'Romero', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '25', 'Kiev', '50.4547', '30.5238', '/women/woman45.jpg'),
('clementine@mail.com', 'user', 'Clementine', 'Baird', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '35', 'Kiev', '50.4547', '30.5238', '/women/woman46.jpg'),
('urielle@mail.com', 'user', 'Urielle', 'Joyce', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '21', 'Kiev', '50.4547', '30.5238', '/women/woman47.jpg'),
('oprah@mail.com', 'user', 'Oprah', 'William', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', '1', 'female', 'male', '34', 'Kiev', '50.4547', '30.5238', '/women/woman52.jpg'),
('mila@mail.com', 'user', 'Mila', 'Bonilla', 'sha1$6ccf8120$1$6565287932415fe3adca37dbaada1c3d64409f94', 1, 'female', 'both', '23', 'Brovary',  '50.4547', '30.5238', '/women/woman50.jpg')");


		$db->exec("CREATE TABLE IF NOT EXISTS comments (
			`comment_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`text`       VARCHAR(255)     NOT NULL,
			`time`       TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`user_id`    INT(10) UNSIGNED NOT NULL,
			`photo_id`   INT(10) UNSIGNED NOT NULL
		)");

		$db->exec("INSERT USERS(username, first_name, last_name, email, password, active, token)
						VALUES('admin', 'admin', 'admin', 'oles@gmail.com', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 1, 'djfjfjfjfjfjfjfj')");
	}
}
