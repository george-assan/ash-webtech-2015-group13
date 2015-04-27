<!DOCTYPE html>

<html>
<head>
<title>dashboard</title>
    
   
    
<script>
    //Function for sending requests
    function sendRequest ( u )
           {
               var obj = $.ajax({url:u,async:false});
                var result=$.parseJSON(obj.responseText);
                return result;
           }//end of sendRequest function
    
	//Function for department page
    function openDepartmentPage(){
	
	
				var url = "../controllers/user_controller.php?cmd=18";
               var obj = sendRequest ( url );
				if(obj.result==0){
				
				
				$(".addDeptBtn").hide();
				
				}
                 //displayallnurses();
                 //shownursedetails();
				$(".outercontainer").fadeOut('slow');
				$(".nurseoutercontainer").fadeOut('slow');
                $(".addDeptform").hide();
			 $(".contentarea").css("background-color"," #dbe5e3");
			 	displayalldepts();
				$(".departmentoutercontainer").fadeIn('slow');
				$(".contentspace").fadeIn('slow');
				
				 var u="../controllers/user_controller.php?cmd=23";
                  var obj1 = $.ajax({url:u,async:false});
				usern2.innerHTML =obj1.responseText;
				
			 }
    //Function for displaying all departments
    function displayalldepts(){
            $ ( document ).ready ( function ( )
            {
               
			   var url = "../controllers/user_controller.php?cmd=10";
               var obj = sendRequest ( url );
			
				
                if ( obj.result === 1 )
                {
					   
					var i = 0;
					var panels ="";
					
					for ( ; i < obj.dept.length; i++ )
                    {
					panels += "<div class='taskpanels' onClick='showdeptdetails("+obj.dept[i].department_id+")'><span class='checkboxes' style='z-index:7;margin-top:20px;margin-left:10px;position:absolute;display-table-cell;vertical-align:middle;'><input  type='checkbox' value='"+obj.dept[i].department_id+"'></span><span><div class='paneltaskname'>"+obj.dept[i].department_name+"</div><div class='paneltasksup'>Hospital ID "+obj.dept [i].hospital_id+"</div></span></div>";
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
    //Function for showing the details of the departments
    function showdeptdetails(id)
			{
                var theUrl="../controllers/user_controller.php?cmd=11&id="+id;
                var obj = sendRequest ( theUrl );
				var details ="";
                if ( obj.result === 1){
					 details +="	<div class='details'><div class='tasktitledetails'>"+obj.dept[0].department_id+"</div><div class='taskdescriptiondetails'>"+obj.dept[0].department_name+"</div><div class='taskdatedetails'>"+obj.dept[0].hospital_id+"</div></div><div class='descriptionbuttons'><span id='editDept'><button  onClick='editDepartmentForm("+obj.dept[0].department_id+")'class='desBtns'id='editBtn'>Edit</button></span><span><button  onClick='deleteDept("+obj.dept[0].department_id+")'class='desBtns'id='deleteDeptBtn'>Delete</button></span></div>";
				}
				$(".innerdeptdisplayextended").hide ();
				$(".innerdeptdisplayextended").html (details);
				$(".innerdeptdisplayextended").fadeIn();
				var url = "../controllers/user_controller.php?cmd=18";
				 var obj = sendRequest ( url );
				if(obj.result==0){
				
				
				$("#editDept").hide();
				$("#deleteDeptBtn").hide();
				}
				$(".innerdeptdisplayextended").slideDown();				
			 }
    //function for displaying the add department form
    function displayaddDeptForm(){
				$(".contentspace").slideDown('slow');
				$(".contentarea").css("background-color","white");
				$(".addDeptform").slideDown('slow');
				 var url = "../controllers/user_controller.php?cmd=14";
               var obj = sendRequest ( url );
			   var i=0;
			   var options="";
			   for(;i<obj.hospital.length;i++){
			   options+="<option value="+obj.hospital[i].hospital_id+">"+obj.hospital[i].hospital_name+"</option>";
			   }
			 $("#sel3").html(options);
			 }
		//Function for taking values from the form and sending to user_controller 
    function addDept(){
				var name = encodeURI(document.getElementById("deptname").value);
				var hospital = encodeURI(document.getElementById("sel3").value);
				
				 var url = "../controllers/user_controller.php?cmd=13&name="+name+"&hospital="+hospital;
               var obj = sendRequest ( url );
			  
			   $(".addDeptform").slideUp('slow');
				$(".contentarea").css("background-color"," #dbe5e3");
				 displayalldepts();
				$(".contentspace").fadeIn('slow');
			 }
			 
			 function showActiveTask(){
			 $(".nurseoutercontainer").fadeOut('slow');
			 
			 $(".addform").hide();
			 $(".contentarea").css("background-color"," #dbe5e3");
			 	displayalltasks();
				$(".outercontainer").fadeIn('slow');
				$(".contentspace").fadeIn('slow');
			 
			 }
			//Function for sediting a department form
			function editDepartmentForm(id){
			
			$(".contentspace").slideDown('slow');
				$(".contentarea").css("background-color","white");
				$(".editDeptform").slideDown('slow');
				 var url = "../controllers/user_controller.php?cmd=14";
               var obj = sendRequest ( url );
			   var i=0;
			   var options="";
			   for(;i<obj.hospital.length;i++){
			   options+="<option value="+obj.hospital[i].hospital_id+">"+obj.hospital[i].hospital_name+"</option>";
			   }
			 $("#nsel3.form-control").html(options);
			
				var theUrl="../controllers/user_controller.php?cmd=11&id="+id;
                var obj = sendRequest ( theUrl );
				
				document.getElementById("deptname1").value= obj.dept[0].department_name;
				document.getElementById("nsel3").value=obj.dept[0].hospital_id;
				document.getElementById("editDepartmentID").value = obj.dept[0].department_id;
				
			}
			//Function for making the send request call and submit entered values
			function editDepartment(){
				var name = encodeURI(document.getElementById("deptname1").value);
				var hospital = encodeURI(document.getElementById("nsel3").value);
				var id =  document.getElementById("editDepartmentID").value;
				 var url = "../controllers/user_controller.php?cmd=17&name="+name+"&hospital="+hospital+"&id="+id;
               var obj = sendRequest ( url );
			  
			   $(".editDeptform").slideUp('slow');
				$(".contentarea").css("background-color"," #dbe5e3");
				 displayalldepts();
				$(".contentspace").fadeIn('slow');
			
			}
			
			
			 function displaySearchedDept(){
					
			 var search = encodeURI(document.getElementById("searchbar").value);   
			   var url = "../controllers/user_controller.php?cmd=25&st="+search;
               var obj = sendRequest ( url );			
			
				
              	
                if ( obj.result === 1 )
                {
					   
					var i = 0;
					var panels ="";
					
					for ( ; i < obj.dept.length; i++ )
                    {
					panels += "<div class='taskpanels' onClick='showdeptdetails("+obj.dept[i].department_id+")'><span class='checkboxes' style='z-index:7;margin-top:20px;margin-left:10px;position:absolute;display-table-cell;vertical-align:middle;'><input  type='checkbox' value='"+obj.dept[i].department_id+"'></span><span><div class='paneltaskname'>"+obj.dept[i].department_name+"</div><div class='paneltasksup'>Hospital ID "+obj.dept [i].hospital_id+"</div></span></div>";
					}
					$ ( ".taskpanels" ).slideUp ( 'slow' );
					
                    $ ( ".innertaskdisplay" ).html (panels);
                 }
				 else{
					  $ ( "#header" ).text ( "Found no results" );
				 
				 }
				 $(".checkboxes").hide();
			 
			 }
			 
			 
				function deleteDept(id){
				 var theUrl="../controllers/user_controller.php?cmd=28&id="+id;
                var obj = sendRequest ( theUrl );
				if(obj.result==1){
					statusmessage(obj.message);
				}
				else{
					errormessage(obj.message);
				}
					displayalldepts();
				}
			 
			 
 </script>
</head>
<body>
	<div class="departmentoutercontainer">
            
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
      <input id="searchbar" type="text" class="form-control" placeholder="Search for departments...">
      <span class="input-group-btn">
        <button onClick="displaySearchedDept()"id="searchbutton" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</span>
<span id="usern2"></span>
<span id="usersettings" ><button onClick="logOut()" id="logout">Logout</button></span>
				<div class="navBarMinor">
				<span id="addtaskbtncontainer">
					<button onClick="displayaddDeptForm()" class="addDeptBtn" id="addtaskbtn" type="button">
							<span ><i id="addtaskicon" class="fa fa fa-plus"></i></span><span id="addtasktxt">Add department</span>
                  </button>	  
				</span>
			</div>
			
		</div>
			<?php
				include 'addDept.php';
				include 'editdepartment.php';
			?>
		<div class="contentspace">
			
			<!--<div class="multi-selectbar"><button id="multibtn1" onClick="multiEndTask()" type="button">
							<span ><i id="endedtaskicon" class="fa fa fa-close"></i></span><span id="multibtntxt1">Select multiple</span>
                  </button></div>-->
				<div class="taskdisplay">
					<div id= "divstatus">
						
					</div>
					<div class= "innertaskdisplay">
						
					</div>
				</div>
				<div class="taskdisplayextended">
					<div class="innerdeptdisplayextended">
					
					</div>
				</div>
				
		</div>
	</div>
	</div>
            
	</div>
</body>


</html>