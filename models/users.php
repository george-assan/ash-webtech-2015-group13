<?php
	include_once ( "adb.php" );
class users extends adb
{	
	/**
	* Constructor for manufacturers
	**/
	function  users( ){
	}
	
	/**
	* A function to establish a connection
	**/
		function get_user($username,$password){
			$str_query= "select * from nurse where username ='$username' and password= '$password'";
			return $this->query($str_query);
			
		
		}
		function get_nurses(){
			$str_query= "select * from nurse";
			return $this->query($str_query);
		
		}
    
    function get_all_nurses($id){
			$str_query= "select * from nurse where nurse_id = '$id'";
			return $this->query($str_query);
		
		}
    
    function add_nurse($name,$user,$pass,$dept){
       $insert_query= "insert into nurse set nurse_name='$name', username = '$user', password ='$pass', department_id = '$dept'";
        return $this->query ( $insert_query );
    }
    
}
//$obj = new manufacturers ( );
//$obj->add_manufacturer ( "Bartels" );
