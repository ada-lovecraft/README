<?php

$f3=require('lib/base.php');

$f3->set('UI','views/');

$f3->route('GET /', 
	function($f3) {
		$url=parse_url('mysql://b7171039c55598:b2e8bb66@us-cdbr-east-03.cleardb.com/heroku_87f7c241b70c126?reconnect=true');		
	    $server = $url["host"];
    	$username = $url["user"];
    	$password = $url["pass"];
    	$db = substr($url["path"],1);

    mysql_connect($server, $username, $password);
            
		$db=new DB\SQL(
		    'mysql:host='.$server.';port=3306;dbname='.$db,
		    $username,
			$password
		);
		
		echo View::instance()->render('index.htm');
		
	}
);

$f3->run();