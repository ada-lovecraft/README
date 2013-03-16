<?php
namespace Controllers;

class AdminController {



	static function doLogin($f3) {
		$user = \Services\UserService::login($f3->get('POST.username'),$f3->get('POST.password'));
		if ($username != null ) {
			$f3->set('SESSION.auth', $user);
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
		$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		//$posts->html =Markdown($posts->body`);
		$list = $posts->find('status="draft"',array('order'=>'id DESC'));
		$f3->set('newPostId', time());
		$f3->set('drafts',$list);
		echo \Template::instance()->render('views/admin/createPost.htm');		
	}

	static function saveNewDraft($f3) {
		$connection = \Services\DBService::getConnection();
		$newPost = $f3->get('POST.postBody');
		$titleLine = strtok($newPost, "\n");
		$slug = preg_replace("/[\s]+/", "-", \Utilities\ReadmeUtils::stripPunctuation($titleLine));
		$user = $f3->get('SESSION.auth');

		$post=new \DB\SQL\Mapper($connection,'posts');

		$post->slug = strtolower($slug);
		$post->body = $f3->get('POST.postBody');
		$post->title = trim(\Utilities\ReadmeUtils::stripPunctuation($titleLine));
		$post->author = $user['id'];
		$post->save();

		echo json_encode($post->cast());
	}

	static function updateDraft($f3) {
		$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		$newPost = $f3->get('POST.postBody');
		$titleLine = strtok($newPost, "\n");
		$slug = preg_replace("/[\s]+/", "-", \Utilities\ReadmeUtils::stripPunctuation($titleLine));
		
		$draft = $posts->load(array('id=?',$f3->get('POST.draftId')));
		$draft->slug = strtolower($slug);
		$draft->title = trim(\Utilities\ReadmeUtils::stripPunctuation($titleLine));
		$draft->body = $f3->get('POST.postBody');
		$draft->save();
		echo json_encode($draft->cast());

	}

	static function savePost($f3) {
		$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		
		$newPost = $f3->get('POST.postBody');
		$titleLine = strtok($newPost, "\n");
		$slug = preg_replace("/[\s]+/", "-", \Utilities\ReadmeUtils::stripPunctuation($titleLine));
		Xdebug_break();
		$post = $posts->load(array('id=?',$f3->get('POST.draftId')));
		$post->slug = strtolower($slug);
		$post->title = trim(\Utilities\ReadmeUtils::stripPunctuation($titleLine));
		$post->body = $newPost;
		$post->status = "published";
		$post->save();

		$f3->set('SESSION.success','<a href="/' . $post->title . '">Your post</a> was successfully saved');

		$f3->reroute('/admin');	
	}


	static function editPost($f3) {
		$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		$originalPost = $posts->load(array('slug=?',$f3->get('PARAMS.slug')));
		$f3->set('originalPost',$originalPost->body);
		echo \Template::instance()->render('views/admin/editPost.htm');		
	}

	static function editSavePost($f3) {
		$connection = \Services\DBService::getConnection();
		$posts = new \DB\SQL\Mapper($connection,'posts');
		$originalPost = $posts->load(array('slug=?',$f3->get('PARAMS.slug')));
		$originalPost->body = $f3->get('POST.postBody');
		$originalPost->status = "published";
		$originalPost->save();
		$f3->set('SESSION.success','&lt;a href="/' . $originalPost->slug . '">' . $originalPost->slug . '</a> was successfully saved');

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