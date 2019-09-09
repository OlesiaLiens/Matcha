<?php

namespace Core;

use App\database;

use PDO;

abstract class Model
{
	/***Get the PDO database connection**/
	private static $connection = null;

	protected static function getDB()
	{
		/***Создание и подключение к базе даных***/
		if (self::$connection !== null)
			return self::$connection;
		try {
			self::$connection = new PDO('mysql:host=' . database::DB_HOST . ';dbname=' . database::DB_NAME, database::DB_USER, database::DB_PASSWORD);

			self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return self::$connection;

		} catch (\PDOException $e) {
			die("DB ERROR: " . $e->getMessage());
		}
	}

	protected static function getConnection()
	{
		try {
			$connection = new PDO('mysql:host=' . database::DB_HOST, database::DB_USER, database::DB_PASSWORD);

			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $connection;

		} catch (\PDOException $e) {
			die("DB ERROR: " . $e->getMessage());
		}
	}
}
