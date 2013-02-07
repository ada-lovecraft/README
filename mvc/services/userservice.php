<?php
namespace Services;

class UserService {

	private static $user = null;
	private static $userdb = null;
	private static $auth = null;
	private static $salt = "12bd9964c7aa01b566f5b008be42db39";

	public static function login($username, $password) {
		if (!self::$auth) {
			self::initAuth();
		}
		$saltedpw = crypt($password,self::$salt);
		$authObj = self::$auth->login($username,$saltedpw);
		if ($authObj == true) {
			self::$user = self::$userdb->load(array('username=?', $username));
			return self::$user->username;
		} else {
			return null;
		}
		
	}

	public static function logout() {
		self::$user = null;
		self::$auth = null;
		self::$userdb = null;
	}

	private static function initAuth() {
		$connection = DBService::getConnection();
		self::$userdb = new \DB\SQL\Mapper($connection,'users');
		self::$auth=new \Auth(self::$userdb,array('id'=>'username','pw'=>'password'));
	}
}