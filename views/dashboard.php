<!DOCTYPE html>

<html>
<head>
<title>dashboard</title>

 <link href="../assets/stylesheets/dashboard.css" rel="stylesheet" type="text/css">
        
        <!-- jQuery --> 
        <script src="../assets/javascripts/jquery-2.1.3.js"></script>
        
        <!--font awesome-->
        <link rel="stylesheet" href="../assets/font-awesome-4.3.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../assets/font-awesome-4.3.0/css/font-awesome.css" type="text/css">
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script>
			   //function for making ajax
			
			/**var timer;**/
				  /** timer = setInterval(function(){displayalltasks()}, 1000 );**/
				   
			/** $ ( document ).ready ( function ( )
            {
				
				displayalltasks();
				
			});**/
		//Function for sending requests
            function sendRequest ( u )
           {
               var obj = $.ajax({url:u,async:false});
                var result=$.parseJSON(obj.responseText);
                return result;
           }//end of sendRequest function
           
	//            Function to load the list of task
			function displayalltasks(){
            $ ( document ).ready ( function ( )
            {
                $(".editform").hide();
			   var url = "../controllers/user_controller.php?cmd=1";
               var obj = sendRequest ( url );
			
				
                if ( obj.result === 1 )
                {
					   
					var i = 0;
					var panels ="";
					
					for ( ; i < obj.tasks.length; i++ )
                    {
					panels += "<div class='taskpanels' onClick='showdetails("+obj.tasks[i].task_id+")'><span class='checkboxes' style='z-index:7;margin-top:20px;margin-left:10px;position:absolute;display-table-cell;vertical-align:middle;'><input  type='checkbox' value='"+obj.tasks[i].task_id+"'></span><span><div class='paneltaskname'>"+obj.tasks [i].task_name+"</div><div class='paneltasksup'>Assigned by "+obj.tasks [i].nurse_name+"</div></span></div>";
					}
					$ ( ".taskpanels" ).slideUp ( 'slow' );
					
                    $ ( ".innertaskdisplay" ).html (panels);
                 }
				 else{
					  $ ( "#header" ).text ( "Found no results" );
				 
				 }
				 $(".checkboxes").hide();
            });
			}
			
			//Function for showing the details of the tasks
			 function showdetails(id)
			{
                var theUrl="../controllers/user_controller.php?cmd=2&id="+id;
                var obj = sendRequest ( theUrl );
				var details;
                if ( obj.result === 1){
					 details ="	<div class='details'><div class='tasktitledetails'>"+obj.task[0].task_name+"</div><div class='taskdescriptiondetails'>"+obj.task[0].description+"</div><div class='taskdatedetails'>"+obj.task[0].due_date+"</div><div class='descriptionbuttons'><span><button class='desBtns' onClick='openEditForm("+obj.task[0].task_id+")'id='editBtn'>Edit</button></span><span><button class='desBtns' onClick='end_task("+obj.task[0].task_id+")' id='endTaskBtn'>End Task</button></span></div></div>";
				}
				$( ".innertaskdisplayextended" ).hide ();
				$( ".innertaskdisplayextended" ).html (details);
				$(".innertaskdisplayextended").fadeIn();
				 $(".innertaskdisplayextended").slideDown();				
			 }
			 
			 
			  function showdetailsforendedtask(id)
			{
                var theUrl="../controllers/user_controller.php?cmd=21&id="+id;
                var obj = sendRequest ( theUrl );
				var details;
                if ( obj.result === 1){
					 details ="	<div class='details'><div class='tasktitledetails'>"+obj.task[0].task_name+"</div><div class='taskdescriptiondetails'>"+obj.task[0].description+"</div><div class='taskdatedetails'>"+obj.task[0].due_date+"</div><div class='descriptionbuttons'><span><button class='desBtns' onClick='openEditForm("+obj.task[0].task_id+")'id='editBtn'>Edit</button></span><span><button class='desBtns' onClick='restore("+obj.task[0].task_id+")' id='endTaskBtn'>Restore</button></span></span><span><button class='desBtns' onClick='deleteTask("+obj.task[0].task_id+")' id='delete'>Delete task</button></span></div></div>";
				}
				$( ".innertaskdisplayextended" ).hide ();
				$( ".innertaskdisplayextended" ).html (details);
				$(".innertaskdisplayextended").fadeIn();
				 $(".innertaskdisplayextended").slideDown();				
			 }
			 
			 
			 
			 
			 
			 //Function for loging in. Submits the information to the user controller
			function login(){
			var username = encodeURI(document.getElementById("exampleInputEmail1").value);
			var password = encodeURI(document.getElementById("exampleInputPassword1").value);
		
			 var url = "../controllers/user_controller.php?cmd=3&username="+username+"&password="+password;
               var obj = sendRequest ( url );
			 if ( obj.result === 1){
				displayalltasks();
				 statusmessage(obj.message);
			 $(".outercontainer1").fadeOut('slow');	
			}
			else{
				errormessage(obj.message);
			}
				 var u="../controllers/user_controller.php?cmd=23";
                  var obj1 = $.ajax({url:u,async:false});
				usern.innerHTML =obj1.responseText;
				$("#endmultibtn").hide();
				 $(".unselect").hide();
				
			}
			
		
			//Function for multi-select button
			function multiEndTask(){
			$(".checkboxes").show();
			$("#endmultibtn").fadeIn();
			$("#multibtn").hide();
			 $(".unselect").fadeIn();
			}
			 
			 function unselect(){
			 $(".checkboxes").hide();
			 $(".unselect").hide();
			 $("#endmultibtn").hide();
			 $("#multibtn").fadeIn();
			 }
			 //Function for dispalying the add Task form
			 function displayaddTaskForm(){
				$(".editform").hide();
				$(".contentspace").slideDown('slow');
				$(".contentarea").css("background-color","white");
				$(".addform").slideDown('slow');
				 var url = "../controllers/user_controller.php?cmd=4";
               var obj = sendRequest ( url );
			   var i=1;
			   var options="";
			   for(;i<obj.nurses.length;i++){
			   options+="<option value="+obj.nurses[i].nurse_id+">"+obj.nurses[i].nurse_name+"</option>";
			   }
			 $("#sel1").html(options);
			 }
			 
			 //Function for adding task
			 function addtask(){
				var name = encodeURI(document.getElementById("taskname").value);
				var ddate = encodeURI(document.getElementById("datepicker").value);
				var des = encodeURI(document.getElementById("description").value);
				var nurse = encodeURI(document.getElementById("sel1").value);
				
				 var url = "../controllers/user_controller.php?cmd=5&nme="+name+"&ddate="+ddate+"&des="+des+"&nurse="+nurse;
               var obj = sendRequest ( url );
			  if(obj.result==1){
			  statusmessage(obj.message);
			  }
			  else{
			  errormessage(obj.message);
			  }
			   $(".addform").slideUp('slow');
				$(".contentarea").css("background-color"," #dbe5e3");
				 displayalltasks();
				$(".contentspace").fadeIn('slow');
			 }
			 
			 //Function for loading tasks
			 function showActiveTask(){
			 $(".nurseoutercontainer").fadeOut('slow');
              $(".departmentoutercontainer").fadeOut('slow');   
			  
			 $(".addform").hide();
			 $(".editform").hide();
			 $(".contentarea").css("background-color"," #dbe5e3");
			 	displayalltasks();
				$(".outercontainer").fadeIn('slow');
				$(".contentspace").fadeIn('slow');
			 
			 }
			 
			 
			 function displayedEndedTasks(){
			
					 $(".addform").slideUp();
					  $(".contentarea").css("background-color"," #dbe5e3");
				   $(".addform").hide();
				   $(".editform").hide();
				   
				   
			   var url = "../controllers/user_controller.php?cmd=6";
               var obj = sendRequest ( url );
			
				
                if ( obj.result === 1 )
                {
					   
					var i = 0;
					var panels ="";
					
					for ( ; i < obj.tasks.length; i++ )
                    {
					panels += "<div class='taskpanels' onClick='showdetailsforendedtask("+obj.tasks[i].task_id+")'><span class='checkboxes' style='z-index:7;margin-top:20px;margin-left:10px;position:absolute;display-table-cell;vertical-align:middle;'><input  type='checkbox' value='"+obj.tasks[i].task_id+"'></span><span><div class='paneltaskname'>"+obj.tasks [i].task_name+"</div><div class='paneltasksup'>Assigned by "+obj.tasks [i].nurse_name+"</div></span></div>";
					}
					$ ( ".taskpanels" ).slideUp ( 'slow' );
				
					$ ( ".innertaskdisplay" ).html (panels);
                 }
				 else{
					  $ ( "#header" ).text ( "Found no results" );
				 
				 }
				 $(".checkboxes").hide();
			 
			 
			 }
			 //Function for loading searched tasks
			function displaySearchedTask(){
					 $(".addform").slideUp();
					  $(".contentarea").css("background-color"," #dbe5e3");
				   $(".addform").hide();
				   $(".editform").hide();
			 var search = encodeURI(document.getElementById("searchbar2").value);   
			   var url = "../controllers/user_controller.php?cmd=7&st="+search;
               var obj = sendRequest ( url );
			
				
                if ( obj.result === 1 )
                {
					   
					var i = 0;
					var panels ="";
					
					for ( ; i < obj.tasks.length; i++ )
                    {
					panels += "<div class='taskpanels' onClick='showdetails("+obj.tasks[i].task_id+")'><span class='checkboxes' style='z-index:7;margin-top:20px;margin-left:10px;position:absolute;display-table-cell;vertical-align:middle;'><input  type='checkbox' value='"+obj.tasks[i].task_id+"'></span><span><div class='paneltaskname'>"+obj.tasks [i].task_name+"</div><div class='paneltasksup'>Assigned by "+obj.tasks [i].nurse_name+"</div></span></div>";
					}
					$ ( ".taskpanels" ).slideUp ( 'slow' );
				
					$ ( ".innertaskdisplay" ).html (panels);
                 }
				 else{
					  $ ( "#header" ).text ( "Found no results" );
				 
				 }
				 $(".checkboxes").hide();
			 
			 }
			 //Function for displaying edit form
			 function openEditForm(id){
				$(".contentspace").slideDown('slow');
				$(".contentarea").css("background-color","white");
				$(".editform").slideDown('slow');
				 var url = "../controllers/user_controller.php?cmd=4";
               var obj = sendRequest ( url );
			   var i=0;
			   var options="";
			   for(;i<obj.nurses.length;i++){
			   options+="<option value="+obj.nurses[i].nurse_id+">"+obj.nurses[i].nurse_name+"</option>";
			   }
			 $("#sel2.form-control").html(options);
				
				var theUrl="../controllers/user_controller.php?cmd=2&id="+id;
               var obj = sendRequest ( theUrl );
				
				document.getElementById("taskname1").value=obj.task[0].task_name;
				document.getElementById("datepicker1").value=obj.task[0].due_date;
				document.getElementById("description1").value=obj.task[0].description;
				document.getElementById("sel2").value=obj.task[0].nurse_id;
				document.getElementById("editID").value=obj.task[0].task_id;
			 }
			 //Function for editing tasks
			 function editTask(){
				var name = encodeURI(document.getElementById("taskname1").value);
				var ddate = encodeURI(document.getElementById("datepicker1").value);
				var des = encodeURI(document.getElementById("description1").value);
				var nurse = encodeURI(document.getElementById("sel2").value);
				var id = encodeURI(document.getElementById("editID").value);
				 var url = "../controllers/user_controller.php?cmd=15&nme="+name+"&ddate="+ddate+"&des="+des+"&nurse="+nurse+"&id="+id;
               var obj = sendRequest ( url );
				 if(obj.result==1){
			  statusmessage(obj.message);
			  }
			  else{
			  errormessage(obj.message);
			  }
			   $(".editform").slideUp('slow');
				$(".contentarea").css("background-color"," #dbe5e3");
				 displayalltasks();
				$(".contentspace").fadeIn('slow');
			 
			 }
			 
			 
			 function end_task(id){
				 var theUrl="../controllers/user_controller.php?cmd=2&id="+id;
                var obj = sendRequest ( theUrl );
                if ( obj.result === 1){
			
				var url="../controllers/user_controller.php?cmd=19&id="+id+"&nme="+obj.task[0].task_name+"&ddate="+obj.task[0].due_date+"&des="+obj.task[0].description+"&nurse="+obj.task[0].nurse_id+"&sid="+obj.task[0].superviser_id;
                var obj = sendRequest ( url );
				 if(obj.result==1){
				statusmessage(obj.message);
			  }
			  else{
			  errormessage(obj.message);
			  }
				}
				displayalltasks();
			 
			 }
			 
			  function restore(id){
				 var theUrl="../controllers/user_controller.php?cmd=21&id="+id;
                var obj = sendRequest ( theUrl );
                if ( obj.result === 1){
			
				var url="../controllers/user_controller.php?cmd=20&id="+id+"&nme="+obj.task[0].task_name+"&ddate="+obj.task[0].due_date+"&des="+obj.task[0].description+"&nurse="+obj.task[0].nurse_id+"&sid="+obj.task[0].superviser_id;
                var obj = sendRequest ( url );
					 if(obj.result==1){
				statusmessage(obj.message);
			  }
			  else{
			  errormessage(obj.message);
			  }
				}
				displayedEndedTasks();
			 
			 }
			 
			 function logOut(){
				 
				 $(".outercontainer1").fadeIn('slow');	
			 
			 
			 }
			 
			 function statusmessage(message){
			  $(".messages").css('background','#25e167');
			 msg.innerHTML=message;
			 $('.messages').fadeIn('slow');
			 setTimeout(function() {
				$('.messages').fadeOut('slow');
			}, 3000);
			 }
			 
			  function errormessage(message){
			  $(".messages").css('background','#c90606');
			 msg.innerHTML=message;
			 $('.messages').fadeIn('slow');
			 setTimeout(function() {
				$('.messages').fadeOut('slow');
			}, 3000);
			 }
			 
			 
			  function deleteTask(id){
				 var theUrl="../controllers/user_controller.php?cmd=26&id="+id;
                var obj = sendRequest ( theUrl );
				if(obj.result==1){
					statusmessage(obj.message);
				}
				else{
					errormessage(obj.message);
				}
					displayedEndedTasks();
				}
			 
			
 </script>
</head>
<body>
	<?php
	 include 'login.php';
	 
        include 'department.php';

include 'nurses.php';
	 ?>
	<div style="display:none" class="messages"><span id="msg">Error message</span><span></span></div>
	<div class="outercontainer">
		<div class="main">
			<div class="sidecontainer">
				<div id="header">
					<span>Task Manager</span>
				</div>
				<div class="leftnavigation">
				<div>
                    <button onClick="showActiveTask()" class="buttonsbuttons">Tasks</button>
                </div>
                <div>
                   <button onClick="openNursesPage()" class="buttonsbuttons">Nurses</button>
                </div>
                <div>
                    <button onClick="openDepartmentPage()" class="buttonsbuttons">Departments</button>
                </div>
				
			</div>
			</div>
			<div class="contentarea">
				<div class="topbar">
					<span id="search">
					<div class="row">
					<div class="col-lg-6">
    <div class="input-group">
      <input id="searchbar2" type="text" class="form-control" placeholder="Search for tasks...">
      <span class="input-group-btn">
        <button onClick="displaySearchedTask()"id="searchbutton" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</span>
<span id="usern"></span>
<span id="usersettings" ><button onClick="logOut()" id="logout">Logout</button></span>
				<div class="navBarMinor">
				<span id="addtaskbtncontainer">
					<button onClick="displayaddTaskForm()" id="addtaskbtn" type="button">
							<span ><i id="addtaskicon" class="fa fa fa-plus"></i></span><span id="addtasktxt">Create task</span>
                  </button>
				  <button id="activetaskbtn" onClick="showActiveTask()"type="button">
							<span ><i id="activetaskicon" class="fa fa fa-tasks"></i></span><span id="activetasktxt">Active tasks</span>
                  </button>
				  <button onClick="displayedEndedTasks()"id="endedtaskbtn" type="button">
							<span ><i id="endedtaskicon" class="fa fa fa-close"></i></span><span id="endedtasktxt">Ended tasks</span>
                  </button>
				  
				</span>
			</div>
			
		</div>
			<?php
				include 'addtask.php';
				include 'editTask.php';
			?>
		<div class="contentspace">
			
			<div class="multi-selectbar"><span><button id="endmultibtn" onClick="multiEndTask()" type="button">
							<span ><i id="endedtaskicon" class="fa fa fa-close"></i></span><span id="multibtntxt">End multiple task</span>
                  </button></span><span><button id="multibtn" onClick="multiEndTask()" type="button">
							<span ><i id="endedtaskicon" class="fa fa fa-close"></i></span><span id="multibtntxt">Select multiple</span>
                  </button></span><span><button id="multibtn" class="unselect" onClick="unselect()" type="button">
							<span ><i id="endedtaskicon" class="fa fa fa-close"></i></span><span id="multibtntxt">Unselect multiple</span>
                  </button></span></div>
				<div class="taskdisplay">
					<div id= "divstatus">
						
					</div>
					<div class= "innertaskdisplay">
						
					</div>
				</div>
				<div class="taskdisplayextended">
					<div class="innertaskdisplayextended">
					
					</div>
				</div>
				
		</div>
	</div>
	</div>
	</div>
</body>


</html>