<?php
namespace Controllers;

class AdminController {



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


	static function logout($f3) {
		\Services\UserService::logout();
		$f3->set('SESSION.auth', null);
		$f3->set('SESSION.success',"You have been logged out");

		$f3->reroute('/');
	}


	static function index($f3) {
		echo \Template::instance()->render('views/admin/index.htm');		

	}

	static function createPost($f3) {
		echo \Template::instance()->render('views/admin/createPost.htm');		
	}

	static function savePost($f3) {
			$connection = \Services\DBService::getConnection();
			$newPost = $f3->get('POST.post');
			$titleLine = strtok($newPost, "\n");
			$title = preg_replace("/[^a-zA-Z0-9]+/", "-", preg_replace("/#/","",$titleLine));
			$post=new \DB\SQL\Mapper($connection,'posts');

			$post->title = strtolower($title);
			$post->body = $f3->get('POST.post');
			$post->save();
			$f3->set('SESSION.success','<a href="/'.$post->title.'">Your post</a> was successfully saved');
			$f3->reroute('/admin');
	}


	static function editPost($f3) {
		$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		$originalPost = $posts->load(array('title=?',$f3->get('PARAMS.title')));
		$f3->set('originalPost',$originalPost->body);
		echo \Template::instance()->render('views/admin/editPost.htm');		
	}

	static function editSavePost($f3) {
		$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		$originalPost = $posts->load(array('title=?',$f3->get('PARAMS.title')));
		$originalPost->body = $f3->get('POST.postBody');
		$originalPost->save();
		$f3->set('SESSION.success','<a href="/' . $originalPost->title . '">Your post</a> was successfully saved');

		$f3->reroute('/admin');	
	}

	static function createUser($f3) {
			
			echo \Template::instance()->render('views/admin/createUser.htm');
	}

	static function saveUser($f3) {
		echo $f3->get('POST.email');
		\Services\UserService::newUser($f3->get('POST.username'),$f3->get('POST.password'),$f3->get('POST.email'));
		$f3->set('SESSION.success', 'Succesfully created: <b>' . $f3->get('POST.username').'</b>');
		$f3->reroute('/admin');		
	}

	static function beforeRoute($f3) {
		if (!$f3->get('SESSION.auth')) {
			$f3->set('SESSION.fail','You must log in first....');
			$f3->reroute('/login');

		}

	}
	static function afterRoute($f3)
	{
		$f3->set('SESSION.success',null);
		$f3->set('SESSION.fail',null);
	}

}