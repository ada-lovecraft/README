<?php
namespace Controllers;

class BlogController {
	
    static function show($f3) {
    	
    	include_once "markdown.php";
    	$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		$posts->authorName = 'SELECT username FROM users WHERE posts.author=users.id';
		//$posts->html =Markdown($posts->body);
		$list = $posts->find('status="published"',array('order'=>'id DESC'));
		$md=\Markdown::instance();
		
		foreach($list as $obj) {
			$obj->body = \Markdown($obj->body);
			//$obj->author = \Services\UserService::getUsernameById($obj->author);
			//echo $obj->author;
		}
		
		$f3->set('latestPosts',$list);
		
		echo \Template::instance()->render('views/index.htm');

	}

	static function login($f3) {
		echo \Template::instance()->render('views/admin/login.htm');		
	}


	static function doLogin($f3) {
		$user = \Services\UserService::login($f3->get('POST.username'),$f3->get('POST.password'));
		if ($user != null ) {
			$f3->set('SESSION.auth', $user);
			$f3->set('SESSION.success',"You have successfully logged in");
			$f3->reroute('/admin');	
		} else {
			$f3->set('SESSION.fail',"Incorrect username or password.");
			echo \Template::instance()->render('views/admin/login.htm');		
		}
	}

	static function beforeRoute($f3) {
		if ($f3->get('GET.clear') == true) {
			$f3->clear('SESSION');
		}
		$auth = $f3->get('SESSION.auth');
		if ($auth == NULL) {
			$f3->set('SESSION.auth',null);
		}


	}

	static function afterRoute($f3)
	{
		
		$f3->set('SESSION.success',null);
		$f3->set('SESSION.fail',null);
	}


}
?>
