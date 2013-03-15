<?php
namespace Services;

class ReadmeRPC {


  static $login_documentation = "login to the server (returns username)";
  public function login($user, $passwd) {
    
   $username = \Services\UserService::login($user,$passwd);
    if ($username != null ) {
      $f3=\Base::instance();
      $f3->set('SESSION.user', $username);
      return $username;
    } 
  }


  static $whoami_documentation = "return user information";
  public function whoami() {
    $geo = new \Web\Geo();

    return array("your User Agent" => $_SERVER["HTTP_USER_AGENT"],
                 "your IP" => $_SERVER['REMOTE_ADDR'],
                 "you acces this from" => $_SERVER["HTTP_REFERER"]);
  }

  static $touch_documentation = "create a new post";
  public function touch() {
  }
}

?>