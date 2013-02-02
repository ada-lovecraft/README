<?php

$f3=require('lib/base.php');

$f3->set('UI','ui/');

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
		$posts=new DB\SQL\Mapper($db,'posts');
		$latestPosts = $posts->find();
		$f3->set('latestPosts',$latestPosts);
	
		$f3->set('name','oreth');
		echo Template::instance()->render('views/index.htm');		
	}
);

$f3->route('GET /system',
	function($f3) {
		$classes=array(
			'Base'=>
				array(
					'hash',
					'json',
					'session'
				),
			'Cache'=>
				array(
					'apc',
					'memcache',
					'wincache',
					'xcache'
				),
			'DB\SQL'=>
				array(
					'pdo',
					'pdo_dblib',
					'pdo_mssql',
					'pdo_mysql',
					'pdo_odbc',
					'pdo_pgsql',
					'pdo_sqlite',
					'pdo_sqlsrv'
				),
			'DB\Jig'=>
				array('json'),
			'DB\Mongo'=>
				array(
					'json',
					'mongo'
				),
			'Auth'=>
				array('ldap','pdo'),
			'Image'=>
				array('gd'),
			'Lexicon'=>
				array('iconv'),
			'SMTP'=>
				array('openssl'),
			'Web'=>
				array('curl','openssl','simplexml'),
			'Web\Geo'=>
				array('geoip','json'),
			'Web\OpenID'=>
				array('json','simplexml'),
			'Web\Pingback'=>
				array('dom','xmlrpc')
		);
		$f3->set('classes',$classes);
		echo View::instance()->render('welcome.htm');
	}
);


$f3->route('GET /phpInfo', 
	function() {
		echo phpinfo();
	}
);
$f3->route('GET /userref',
	function() {
		echo View::instance()->render('userref.htm');
	}
);

$f3->run();

?>