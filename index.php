<?php


$f3=require('lib/base.php');

$f3->set('UI','ui/');

$f3->set('AUTOLOAD','mvc/');
$f3->route('GET /', 'Controllers\BlogController::show');
$f3->route('GET /admin/create', 'Controllers\BlogController::create');
$f3->route('POST /admin/create', 'Controllers\BlogController::createPost');
$f3->route('GET /test/@name', 'Controllers\BlogController::test');

$f3->run();

?>