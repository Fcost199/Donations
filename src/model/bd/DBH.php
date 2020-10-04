<?php

namespace bd;

use PDO;
use PDOException;

class DBH {
	static private $user = 'root';
	static private $pass = '';
	static private $host = 'localhost';
	static private $dbname = 'donations';
	static private $port = '3306';
	static private $charset = 'utf-8';
	//This must be the main db hnadler
	static public $dbh;

	//Has to be requested. This way, it's possible to handle any connection problem
	static public function connect(){
		try{
			self::$dbh = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname.';port='.self::$port.'charset='.self::$charset, self::$user, self::$pass);
			//Handles the charset aspect
			self::$dbh->exec("SET CHARACTER SET utf8");
			//Fetch returns column name as array key, eliminating the numeral keys
			self::$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
			return true;
		} catch (PDOException $e) {
			return false;
		}
	}

	
}