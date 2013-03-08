<?php
namespace Controllers;

class BlogController {
	
    static function show($f3) {
    	include_once "markdown.php";
    	$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		$posts->authorName = 'SELECT username FROM users WHERE posts.author=users.id';
		//$posts->html =Markdown($posts->body);
		$list = $posts->find('',array('order'=>'id DESC'));
		$md=\Markdown::instance();
		
		foreach($list as $obj) {
			$obj->body = \Markdown($obj->body);
			//$obj->author = \Services\UserService::getUsernameById($obj->author);
			//echo $obj->author;
		}
		
		$f3->set('latestPosts',$list);
		echo \Template::instance()->render('views/index.htm');		
	}


	static function getPosts($f3) {
		$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		$posts->authorName = 'SELECT username FROM users WHERE posts.author=users.id';
		$posts->html =Markdown($posts->body);
		$latest = $posts->load();
		$postList = array();
		for($i = 0; $i<$latest->count(); $i++) {
			$postList[] = $latest->cast();
			$latest->skip();
		}
		echo json_encode($postList);
	}

	static function login($f3) {
		echo \Template::instance()->render('views/admin/login.htm');		
	}


	static function doLogin($f3) {
		$username = \Services\UserService::login($f3->get('POST.username'),$f3->get('POST.password'));
		if ($username != null ) {
			$f3->set('SESSION.auth', $username);
			$f3->set('SESSION.success',"You have successfully logged in");
			$f3->reroute('/admin');	
		} else {
			$f3->set('SESSION.fail',"Incorrect username or password.");
			echo \Template::instance()->render('views/admin/login.htm');		
		}
	}

	static function beforeRoute($f3) {
		$auth = $f3->get('SESSION.auth');
		echo var_dump($auth);
	}

	static function afterRoute($f3)
	{
		$f3->set('SESSION.success',null);
		$f3->set('SESSION.fail',null);
	}


}
?>
