<?php


$f3=require('lib/base.php');

$f3->set('UI','ui/');
$f3->set('DEBUG',3);

$f3->set('AUTOLOAD','mvc/');
$f3->route('GET /', 'Controllers\BlogController::show');
$f3->route('GET /blog/posts', 'Controllers\BlogController::getPosts');
$f3->route('GET /admin', 'Controllers\AdminController::index');
$f3->route('GET /admin/newpost', 'Controllers\AdminController::createPost');
$f3->route('POST /admin/newpost', 'Controllers\AdminController::savePost');
$f3->route('POST /admin/newdraft [ajax]', 'Controllers\AdminController::saveNewDraft');

$f3->route('GET /admin/newuser', 'Controllers\AdminController::createUser');
$f3->route('POST /admin/newuser', 'Controllers\AdminController::saveUser');
$f3->route('GET /edit/@title', 'Controllers\AdminController::editPost');
$f3->route('POST /edit/@title', 'Controllers\AdminController::editSavePost');

$f3->route('POST /login [ajax]', 'Controllers\AdminController::loginAjax');
$f3->route('GET /login', 'Controllers\BlogController::login');
$f3->route('POST /login', 'Controllers\BlogController::doLogin');
$f3->route('GET /logout [ajax]', 'Controllers\BlogController::logout');
$f3->route('GET /logout', 'Controllers\AdminController::logout');
$f3->route('POST /rpc', 'Controllers\BlogController::handlerpc');
$f3->route('GET /console','Controllers\BlogController::console');

$f3->run();

?>