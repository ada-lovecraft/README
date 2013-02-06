<?php

namespace Services;

class DBService {
	
	private static $connection = null;

	public static function getConnection() {
		if (self::$connection == null) {
			$url=parse_url('mysql://b7171039c55598:b2e8bb66@us-cdbr-east-03.cleardb.com/heroku_87f7c241b70c126?reconnect=true');		
	    	$server = $url["host"];
    		$username = $url["user"];
    		$password = $url["pass"];
    		$db = substr($url["path"],1);
            
			self::$connection = new \DB\SQL(
		    	'mysql:host='.$server.';port=3306;dbname='.$db,
		    	$username,
				$password
			);
		}
		return self::$connection;
	}
}

