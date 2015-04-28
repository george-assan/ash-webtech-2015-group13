<?php


if ( isset ( $_REQUEST [ 'cmd' ] ) )
{
    $cmd = $_REQUEST[ 'cmd' ];
    
    switch ( $cmd )
    {
        case 1:
            displaytasks ( );
            break;
        case 2:
            get_details ( );
            break;
		  case 3:
            login_session( );
            break;
		case 4:
            get_nurses( );
            break;
		case 5:
            add_task( );
            break;
		case 6:
            display_endedTask( );
            break;
		case 7:
			display_searchedTask( );
			break;
        case 8:
			displaynurses( );
			break;
        case 9:
			get_nurse_details( );
			break;
        case 10:
			get_all_dept( );
			break;
        case 11:
			get_dept( );
			break;
        case 12:
			add_nurse( );
			break;
        case 13:
			add_dept( );
			break;
        case 14:
			get_all_hosp( );
			break;
        default:
            echo '{"result":0,message:"failed command"}';
            break;
    }//end of switch
    
}//


//display nurses
function displaynurses ( ){

	include("../models/users.php");
	
	$obj=new users();
	if(!$obj->get_nurses()){
		//return error
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"nurses":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
}

function get_nurse_details( ){
	include("../models/users.php");
	$obj=new users();
    session_start();
	$user_id = $_SESSION['login_id'];
	$id=$_REQUEST['id'];
	if(!$obj->get_all_nurses($id)){
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	else{
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"nurses":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
	}
}


// display all tasks function
function displaytasks ( ){

	include("../models/task.php");
	
	$obj=new task();
	session_start();
	$user_id = $_SESSION['login_id'];
	if(!$obj->get_user_tasks($user_id)){
		//return error
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"tasks":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
}

function get_details( ){
	include("../models/task.php");
	$obj=new task();
	$id=$_REQUEST['id'];
	if(!$obj->get_task($id)){
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	else{
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"task":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
	}
}


function login_session(){
include("../models/users.php");
	$obj=new users();
	$username=$_REQUEST['username'];
	$password=$_REQUEST['password'];
	if(!$obj->get_user($username, $password)){
		echo '{"result":0,"message": "failed to access information"}';
		return;
	}
	else{
	$row=$obj->fetch();
	if($obj->get_num_rows()==1){
	session_start();
	$_SESSION['login_user'] = $row['username'];	
	$_SESSION['login_id'] = $row['nurse_id'];
		echo '{"result":1,"message":""}';
	}
	else{
		echo '{"result":0,"message": "failed to access information"}';
	}

}
}


function get_nurses( ){

	include("../models/users.php");
	
	$obj=new users();

	$obj->get_nurses();
	
	
	$row = $obj->fetch();
	echo '{"result":1,"nurses":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
}


function get_all_dept( ){

	include("../models/department.php");
	
	$obj=new department();
if(!$obj->get_all_dept()){
		//return error
		echo '{"result":0,"message": "failed to display"}';
		return;
	}else{
	
	$row = $obj->fetch();
	echo '{"result":1,"dept":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
}
}

function get_dept(){

	include("../models/department.php");
	
	$obj=new department();
    $id=$_REQUEST['id'];
	
    if(!$obj->get_dept($id)){
		//return error
		echo '{"result":0,"message": "failed to display"}';
		return;
	}else{
	
	
	$row = $obj->fetch();
	echo '{"result":1,"dept":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
        
    }
}


function add_task( ){
	include("../models/task.php");
	$obj=new task();
	$name=$_REQUEST['nme'];
	$ddate=$_REQUEST['ddate'];
	$des=$_REQUEST['des'];
	session_start();
	$supv_id=$_SESSION["login_id"];
	
	$nurse_id= $_REQUEST['nurse'];
	
	if(!$obj->add_task($name,$ddate,$des,$nurse_id,$supv_id)){
		echo  '{"result":0,"message": "failed to add task"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully added task"}';
	
	}
}

function add_dept( ){
	include("../models/department.php");
	$obj=new department();
	$name=$_REQUEST['name'];
	$hospital=$_REQUEST['hospital'];
	
	if(!$obj->add_dept($name,$hospital)){
		echo  '{"result":0,"message": "failed to add department"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully added department"}';
	
	}
}


function add_nurse( ){
	include("../models/users.php");
	$obj=new users();
	$name=$_REQUEST['name'];
	$user=$_REQUEST['user'];
	$pass=$_REQUEST['pass'];
    $dept =$_REQUEST['dept'];
	//session_start();
	//$supv_id=$_SESSION["login_id"];
	
	//$nurse_id= $_REQUEST['nurse'];
	
	if(!$obj->add_nurse($name,$user,$pass,$dept)){
		echo  '{"result":0,"message": "failed to add nurse"}';
	}
	else{
		echo  '{"result":1,"message": "Successfully added nurse"}';
	
	}
}

function get_all_hosp( ){

	include("../models/hospital.php");
	
	$obj=new hospital();

	
	 if(!$obj->get_all_hosp()){
		//return error
		echo '{"result":0,"message": "failed to display"}';
		return;
     }else{
	$row = $obj->fetch();
	echo '{"result":1,"hospital":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
     }
}



function display_endedTask( ){

	include("../models/task.php");
	
	$obj=new task();
	session_start();
	$user_id = $_SESSION['login_id'];
	if(!$obj->get_ended_tasks($user_id)){
		//return error
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"tasks":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
}


function display_searchedTask( ){
	if(isset($_REQUEST['st'])){
	include("../models/task.php");
	$st = $_REQUEST['st'];
	$obj=new task();
	session_start();
	$user_id = $_SESSION['login_id'];
	if(!$obj->get_search_tasks($user_id,$st)){
		//return error
		echo '{"result":0,"message": "failed to display"}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"tasks":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
}
else
	echo '{"result":0,"message": "failed to display"}';
}


?>