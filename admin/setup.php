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
				first_name   varchar(50)  NOT NULL,
				last_name    varchar(50)  NOT NULL,
				bday         INTEGER      NOT NULL DEFAULT 0,
				email        varchar(255) NOT NULL,
				password     varchar(255) NOT NULL,
				active       varchar(50)  NOT NULL,
				gender       VARCHAR(50)  NOT NULL DEFAULT 'male',
				preference   VARCHAR(50)  NOT NULL DEFAULT 'female',
				bio          TEXT,
				longitude    FLOAT,
				latitude     FLOAT,
				location     VARCHAR(50)  NOT NULL DEFAULT '-',
				avatar       varchar(50)  NOT NULL DEFAULT '../images/1photo.png',
				notification INT          NOT NULL DEFAULT 1,
				rating       INTEGER      NOT NULL DEFAULT 0,
				online       TINYINT(1)   NOT NULL DEFAULT 0,
				last_see     TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
				token        varchar(255) NOT NULL DEFAULT ''
			)";

$sqlTokens = "CREATE TABLE tokens(
				id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				user_id      INT UNSIGNED,
				emailtoken   VARCHAR(255) NOT NULL
			)";

$sqlPhotos = "CREATE TABLE photos(
				id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				path         VARCHAR(255) NOT NULL,
				user_id      INT UNSIGNED NOT NULL,
				date         TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
			)";

$sqlTags = "CREATE TABLE tags(
				id           INT PRIMARY KEY AUTO_INCREMENT,
				tag          VARCHAR(255) NOT NULL UNIQUE
			)";

$sqlUserTags = "CREATE TABLE users_tags(
				id           INT PRIMARY KEY AUTO_INCREMENT,
				user_id      INTEGER,
				tag_id       INTEGER, 
				date         TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP 
			)";

$sqlUserAction = "CREATE TABLE user_action(
				id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				first_user   VARCHAR(50)  NOT NULL DEFAULT 'none',
				second_user  VARCHAR(50)  NOT NULL DEFAULT 'none',
				see          VARCHAR(50)  NOT NULL DEFAULT 'none',
				liked        VARCHAR(50)  NOT NULL DEFAULT 'none',
				matched      VARCHAR(255) NOT NULL DEFAULT 'none',
				ban          VARCHAR(255) NOT NULL DEFAULT 'none',
				fake         VARCHAR(50)  NOT NULL DEFAULT 'none'
			)";

$sqlMessages = "CREATE TABLE messages(
				id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				sender       VARCHAR(50)  NOT NULL DEFAULT 'none',
				receiver     VARCHAR(50)  NOT NULL DEFAULT 'none',
				text         TEXT,
				time         TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
				delivered    VARCHAR(2)   NOT NULL DEFAULT 'N'
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
$connection->exec($sqlMessages);
print('Table Messages created' . PHP_EOL);

?>
