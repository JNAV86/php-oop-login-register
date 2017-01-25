<?php

/*
READ ME 
 
This file serves as the backbone. 
* Check for cookies for users who have opted to be remembered. "Remember Me" 
* It will autoload all the files responsible for the classes
* The configuration details for database login, session details and cookie details
* 


All in all, its pretty straight forward as to what it is.
*/

session_start();
 
$GLOBALS['config'] = array(
  'mysql' => array(
    'host'=> '127.0.0.1',
    'username'=> 'root',
    'password'=> '',
    'db'=> 'oop-login-register'
  ),
  'remember' => array(
    'cookie_name' => 'hash',
    'cookie_expiry' => 604800 
  ),
  'session' => array(
    'token_name' => 'token',
    'session_name'=> 'user' 
  )
);

spl_autoload_register(function($class){
  require_once 'classes/'.$class.'.php';

});

require_once 'functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){


  $hash = Cookie::get(Config::get('remember/cookie_name'));

  $hashCheck = DB::getInstance()->get('user_sessions',array('hash','=', $hash));

  if($hashCheck->count()){

    $user = new User($hashCheck->first()->user_id);

    $user->login();
  }


}

?>
