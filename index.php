<?php

$f3=require('lib/base.php');

$f3->set('UI','views/');

$f3->route('GET /', 
	function($f3) {
		echo View::instance()->render('index.htm');
	}
);

$f3->run();