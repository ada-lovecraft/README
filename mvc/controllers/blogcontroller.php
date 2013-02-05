<?php
namespace Controllers;

class BlogController {
	
    static function show($f3) {
    	$connection = \Helpers\DBConnector::getConnection();
		$posts=new \DB\SQL\Mapper($connection,'posts');
		$latestPosts = $posts->find();
		$f3->set('latestPosts',$latestPosts);
		$f3->set('name','oreth');
		echo \Template::instance()->render('views/index.htm');		
	}

	static function create($f3) {
		echo \Template::instance()->render('views/admin/create.htm');		
	}

	static function createPost($f3) {
		$connection = \Helpers\DBConnector::getConnection();
		$post=new \DB\SQL\Mapper($connection,'posts');
		$post->title = $f3->get('POST.title');
		$post->body = $f3->get('POST.body');
		$post->save();
	}



	static function test() {
		echo "Name is: " . $params['name'];

		//echo \Template::instance()->render('views/index.htm');		
	}


}
?>
