<?php 
namespace Components;
class Db
{	
	/*
	public static function getConnectionRegister()
	{
		$paramsPath = ROOT.'/config/db_paramsregister.php';
		$params = include($paramsPath);

		$dsn = "mysql:host={$params['host']}; dbname={$params['database']}";
		$db = new PDO($dsn, $params['user'], $params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);		

		return $db;
	}	
	*/
	public static function getConnectionRegister()
	{
		$paramsPath = ROOT.'/Config/db_paramsregister.php';
		$params = include($paramsPath);

		$dsn = "mysql:host={$params['host']}; dbname={$params['database']}; charset={$params['charset']}";
		$opt = 
		[
	        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
	        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
	        \PDO::ATTR_EMULATE_PREPARES   => true,
	    ];
	    $db = new \PDO($dsn, $params['user'], $params['password'], $opt);

		return $db;
	}	

	public static function getConnectionMagaz()
	{
		$paramsPath = ROOT.'/Config/db_paramsmagaz.php';
		$params = include($paramsPath);

		$dsn = "mysql:host={$params['host']}; dbname={$params['database']}; charset={$params['charset']}";
	    $opt = [
	        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
	        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
	        \PDO::ATTR_EMULATE_PREPARES   => true,
	    ];
	    $db = new \PDO($dsn, $params['user'], $params['password'], $opt);

		return $db;
	}
}
 ?>