<?php

	$connect = require_once "niconnTable.php";
	try
	{
		$niconnect = new PDO("mysql: host={$connect['host']}; dbname={$connect['database']}; charset=utf8", $connect['user'], $connect['password'], [
				PDO::ATTR_EMULATE_PREPARES => false,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]);

	}
		Catch (PDOException $error)
		{
			exit("Database Error.");
		}