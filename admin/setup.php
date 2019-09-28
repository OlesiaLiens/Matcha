#!/usr/bin/php
<?PHP

include 'database.php';

print('U/N: ' . $DB_USER . PHP_EOL . 'P/W: ' . $DB_PASS . PHP_EOL);
$connection = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);

// Create an empty database
$connection->exec("DROP DATABASE IF EXISTS " . $DB_NAME);
$connection->exec("CREATE DATABASE " . $DB_NAME);
print('DB created' . PHP_EOL);
$connection->exec("use " . $DB_NAME);
print('Connected to DB' . PHP_EOL);

$sqlUsers = "CREATE TABLE users(
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
				token        varchar(255)  DEFAULT '' NOT NULL
			)";

$sqlTokens = "CREATE TABLE tokens(
				id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				user_id    INT UNSIGNED,
				emailtoken varchar(255) NOT NULL
			)";

$sqlPhotos = "CREATE TABLE photos(
				id      INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				path    VARCHAR(255)                        NOT NULL,
				user_id INT(11) UNSIGNED                    NOT NULL,
				date    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
			)";

$sqlTags = "CREATE TABLE tags(
				id  INTEGER PRIMARY KEY AUTO_INCREMENT,
				tag VARCHAR(255) NOT NULL UNIQUE
			)";

$sqlUserTags = "CREATE TABLE users_tags(
				id  INTEGER PRIMARY KEY AUTO_INCREMENT,
				user_id INTEGER,
				tag_id  INTEGER, 
				date    TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
			)";

$sqlUserAction = "CREATE TABLE user_action(
				id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				first_user     varchar(50)   DEFAULT '-' NOT NULL,
				second_user     varchar(50)  DEFAULT '-'  NOT NULL,
				see    varchar(50)  DEFAULT '-'  NOT NULL,
				liked        varchar(50)   DEFAULT '-' NOT NULL,
				matched        varchar(255)  DEFAULT '-' NOT NULL,
				ban     varchar(255)  DEFAULT '-' NOT NULL,
				break       varchar(50)  DEFAULT '-'  NOT NULL,
				fake       varchar(50)   DEFAULT '-' NOT NULL
			)";

$connection->exec($sqlUsers);
print('Table Users created' . PHP_EOL);
$connection->exec($sqlTokens);
print('Table Tokens created' . PHP_EOL);
$connection->exec($sqlPhotos);
print('Table Photos created' . PHP_EOL);
$connection->exec($sqlTags);
print('Table Tags created' . PHP_EOL);
$connection->exec($sqlUserTags);
print('Table UserTags created' . PHP_EOL);
$connection->exec($sqlUserAction);
print('Table UserAction created' . PHP_EOL);

?>