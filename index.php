<?php


$f3=require('lib/base.php');

$f3->set('UI','ui/');

/*
$f3->set('AUTOLOAD','autoload/');
$f3->route('GET /', 'Gadgets\iPad::show');
*/
$f3->set('AUTOLOAD','mvc/');

$f3->route('GET /', 'Controllers\BlogController::show');

$f3->run();

?>