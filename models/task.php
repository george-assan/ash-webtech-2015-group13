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
	function add_task ( $name,$due_date,$description,$nurse_id,$superviser_id)
	{
		$insert_query = "insert into task set task_name='$name', due_date = '$due_date', description ='$description', nurse_id = '$nurse_id', superviser_id = '$superviser_id'";
		return $this->query ( $insert_query );
	}
	
	function get_all_tasks(){
		$str_query = "Select * from task,nurse where task.nurse_id = nurse.nurse_id";
		return $this->query ( $str_query );
	}
	function get_user_tasks($id){
		$str_query = "Select * from task,nurse where task.nurse_id = nurse.nurse_id and task.nurse_id='$id'";
		return $this->query ( $str_query );
	}
	
		function get_ended_tasks($id){
		$str_query = "Select * from finished_task,nurse where finished_task.nurse_id = nurse.nurse_id and finished_task.nurse_id='$id'";
		return $this->query ( $str_query );
	}
	
		function get_search_tasks($id,$search_text){
		$str_query = "select * from task,nurse where task_name like '%$search_text%' and task.nurse_id = nurse.nurse_id and task.nurse_id='$id' ";
		return $this->query ( $str_query );
	}
	
	
	
	
	
	function get_task($id){
		$str_query = "Select * from task where task_id = '$id'";
		return $this->query ( $str_query );
	}
}
//$obj = new manufacturers ( );
//$obj->add_manufacturer ( "Bartels" );
