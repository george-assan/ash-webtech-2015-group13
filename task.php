<?php
	include_once ( "adb.php" );
class task extends adb
{	
	/**
	* Constructor for manufacturers
	**/
	function  task( ){
	}
	
	/**
	* A function to establish a connection
	**/
	function add_task ( $name,$due_date,$description,$nurse_id,$supervisor_id)
	{
		$insert_query = "insert into task set task_name='$name', due_date = '$due_date', description ='$description', nurse_id = '$nurse_id', supervisor_id = '$supervisor_id'";
		echo "$insert_query";
		return $this->query ( $insert_query );
		echo "worked";
	}
	
	
}
//$obj = new manufacturers ( );
//$obj->add_manufacturer ( "Bartels" );
