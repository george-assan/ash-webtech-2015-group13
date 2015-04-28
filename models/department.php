<?php
	include_once ( "adb.php" );
class department extends adb
{	
	/**
	* Constructor for manufacturers
	**/
	function  department( ){
	}
	
	/**
	* A function to establish a connection
	**/
		function get_dept($id){
			$str_query= "select * from department where department_id='$id'";
			return $this->query($str_query);
			
		
		}
		function get_all_dept(){
			$str_query= "select * from department";
			return $this->query($str_query);
		
		}
    
        function add_dept($name,$hospital){
         $insert_query= "insert into department set department_name='$name', hospital_id = '$hospital'";
        return $this->query ( $insert_query );
        }
    
}
//$obj = new manufacturers ( );
//$obj->add_manufacturer ( "Bartels" );
