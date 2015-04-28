<?php
	include_once ( "adb.php" );
class hospital extends adb
{	
	/**
	* Constructor for manufacturers
	**/
	function  hospital( ){
	}
	
	/**
	* A function to establish a connection
	**/
		function get_hosp($id){
			$str_query= "select * from hospital where hospital_id='$id'";
			return $this->query($str_query);
			
		
		}
		function get_all_hosp(){
			$str_query= "select * from hospital";
			return $this->query($str_query);
		
		}
    
        function add_hosp($name,$location){
         $insert_query= "insert into hospital set hospital_name='$name', location = '$location";
        return $this->query ( $insert_query );
        }
    
}
//$obj = new manufacturers ( );
//$obj->add_manufacturer ( "Bartels" );
