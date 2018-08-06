<?php
/**
 * SignSession class..
 */
class SignSession{
	
	public static function signinit(){
		if (version_compare(phpversion(), '5.4.0', '<')) {
			if (session_id() == '') {
				session_start();
			}
		}else{
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
		}
	}
  public static function set($keys, $value){
      $_SESSION[$keys] = $value;
  }
  public static function get($keys){
  	if (isset($_SESSION[$keys])) {
  		return $_SESSION[$keys];
  	}else{
  		return false;
  	}
  }

 public static function signcheckSession(){
  self::signinit();
  if (self::get("signin")== false) {
   self::signdestroy();
   header("Location:index.php"); /* check login if login so continue or not index page */
  }
 }

 public static function signcheckLogin(){
  self::signinit();
  if (self::get("signin")== true) {
   header("Location:index.php"); /* have a login to go this page */
  }
 }
 
 public static function signdestroy(){
  session_destroy();
 }
}