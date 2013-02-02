<?
namespace Controllers;

class BlogController {
	
    static function show() {
    	echo "controller test";
		/*
		$url=parse_url('mysql://b7171039c55598:b2e8bb66@us-cdbr-east-03.cleardb.com/heroku_87f7c241b70c126?reconnect=true');		
	    $server = $url["host"];
    	$username = $url["user"];
    	$password = $url["pass"];
    	$db = substr($url["path"],1);
            
		$db=new DB\SQL(
		    'mysql:host='.$server.';port=3306;dbname='.$db,
		    $username,
			$password
		);
		$posts=new DB\SQL\Mapper($db,'posts');
		$latestPosts = $posts->find();
		$f3->set('latestPosts',$latestPosts);
	
		$f3->set('name','oreth');
		echo Template::instance()->render('views/index.htm');		
		*/
	}
}
?>
