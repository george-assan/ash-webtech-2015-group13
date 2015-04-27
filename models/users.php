
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
       $insert_query= "insert into nurse set nurse_name='$name', username = '$user', password ='$pass', department_id = '$dept', usertype='REGULAR'";
        return $this->query ( $insert_query );
    }
	
	
	function edit_nurse($name,$user,$pass,$dept,$id){
       $insert_query= "Update nurse set nurse_name='$name', username = '$user', password ='$pass', department_id = '$dept' where nurse_id='$id'";
        return $this->query ( $insert_query );
    }
    
		function get_search_nurses($search_text){
		$str_query = "select * from nurse where nurse_name like '%$search_text%' ";
		return $this->query ( $str_query );
	}
	
	function remove_nurse($id){
			$delete_query= "Delete from nurse where nurse_id='$id'";
			return $this->query ($delete_query );
		}
}
//$obj = new manufacturers ( );
//$obj->add_manufacturer ( "Bartels" );
