<?php

namespace App\Model;

class Connect
{

	private static $inst;

	public static function getConn() {

		if(!isset(self::$inst)):
			self::$inst = new \PDO('mysql:host=localhost; dbname=projeto3; charset=utf8', 'root', '');
		endif;

		return self::$inst;
	}
}