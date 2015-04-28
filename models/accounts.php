<?php
	include_once ( "adb.php" );
class accounts extends adb
{	
	/**
	* Constructor for manufacturers
	**/
	function  users( ){
	}
	
	/**
	* A function to establish a connection
	**/
		function get_account($username,$password){
			$str_query= "select * from accounts where account_email='$username' and account_password='$password'";
			return $this->query($str_query);
			
		
		}
		function get_accounts(){
			$str_query= "select * from accounts";
			return $this->query($str_query);
		
		}
}
//$obj = new manufacturers ( );
//$obj->add_manufacturer ( "Bartels" );
