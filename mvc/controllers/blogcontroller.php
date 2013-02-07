<?php
namespace Controllers;

class BlogController {
	
    static function show($f3) {
    	$connection = \Services\DBService::getConnection();
		$posts=new \DB\SQL\Mapper($connection,'posts');
		$latestPosts = $posts->find();
		$f3->set('latestPosts',$latestPosts);
		echo \Template::instance()->render('views/index.htm');		
	}


	static function getPosts($f3) {
		$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		$latest = $posts->load();
		$postList = array();
		for($i = 0; $i<$latest->count(); $i++) {
			$postList[] = $latest->cast();
			$latest->skip();
		}
		echo json_encode($postList);
	}

	static function create($f3) {
		echo \Template::instance()->render('views/admin/create.htm');		
	}

	static function createPost($f3) {
		if ($f3->get('SESSION.user')) {
			$connection = \Services\DBService::getConnection();
			$post=new \DB\SQL\Mapper($connection,'posts');
			$post->title = $f3->get('POST.title');
			$post->body = $f3->get('POST.body');
			$post->save();
		} else {
			echo "you must login first";
		}
	}

	static function logout($f3) {
		echo 'logging out user: ' . $f3->get('SESSION.user') .' <br/>';
		\Services\UserService::logout();
		$f3->set('SESSION.user', null);
		echo 'logged out: [' . $f3->get('SESSION.user') . ']';
	}

	static function login($f3) {
		echo "Logging In... <br/>";
		$username = \Services\UserService::login('admin','password');
		if ($username != null ) {
			$f3->set('SESSION.user', $username);
			echo "logged in: " . $f3->get('SESSION.user');
		} else {
			echo "incorrect login information";
		}
		
	}

	static function testWrongLogin($f3) {
		echo "Logging In";
		echo \Services\UserService::login('admin','notpassword');
		//echo \Template::instance()->render('views/index.htm');		
	}

	static function handlerpc($f3) {
		$rpc = new \Services\JSONRPC();
		$rpc->handle(new \Services\ReadmeRPC());
	}

	static function console($f3) {
		//throw new \Exception("FARTS");
		echo \Template::instance()->render('views/console.htm');		
	}
}
?>
