<?php


$f3=require('lib/base.php');

$f3->set('UI','ui/');
$f3->set('DEBUG',0);

$f3->set('AUTOLOAD','mvc/');
$f3->route('GET /', 'Controllers\BlogController::show');
$f3->route('GET /blog/posts', 'Controllers\BlogController::getPosts');
$f3->route('GET /admin/create', 'Controllers\BlogController::create');
$f3->route('POST /admin/create', 'Controllers\BlogController::createPost');
$f3->route('GET /login', 'Controllers\BlogController::login');
$f3->route('GET /logout', 'Controllers\BlogController::logout');
$f3->route('POST /rpc', 'Controllers\BlogController::handlerpc');
$f3->route('GET /console','Controllers\BlogController::console');

$f3->run();

?>