<?php 
 
class Hash{

	//Encode strings with sha256 algorithm

	public static function make($string, $salt = ''){
		return hash('sha256', $string, $salt);
	}

	public static function salt($length){
		return mcrypt_create_iv($length);
	}

	public static function unique(){
		return self::make(uniqid());

	}
}

 
?>