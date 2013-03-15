<?php
namespace Services;

class UserService {

	private static $user = null;
	private static $userdb = null;
	private static $auth = null;
	private static $salt = "12bd9964c7aa01b566f5b008be42db39";
	private static $connection = null;

	public static function login($username, $password) {
		if (!self::$auth) {
			self::initAuth();
		}
		$saltedpw = crypt($password,self::$salt);
		$authObj = self::$auth->login($username,$saltedpw);
		if ($authObj == true) {
			self::$user = self::$userdb->load(array('username=?', $username));
			return self::$user->cast();
		} else {
			return null;
		}		
	}

	public static function newUser($username,$password,$email) {
		$connection = DBService::getConnection();
		$newuser = new \DB\SQL\Mapper($connection,'users');
		$newuser->username = $username;
		$newuser->password = crypt($password,self::$salt);
		$newuser->email = $email;
		$newuser->save();
	}

	public static function logout() {
		self::$user = null;
		self::$auth = null;
		self::$userdb = null;
	}

	public static function getUser(){
		return self::$user;
	}

	public static function getUsernameById($id) {
		if (!self::$connection)
			self::startDB();
		$list = self::$userdb->find('id='.$id);
		$usr = $list[0];
		return $usr->username;
		
	}

	private static function initAuth() {
		if (!self::$connection) 
			self::startDB();		
		self::$auth=new \Auth(self::$userdb,array('id'=>'username','pw'=>'password'));
	}

	private static function startDB() {
		self::$connection = DBService::getConnection();
		self::$userdb = new \DB\SQL\Mapper(self::$connection,'users');
	}


}