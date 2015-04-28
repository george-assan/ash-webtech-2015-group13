<!DOCTYPE html>

<html>
<head>
<title>dashboard</title>
    
   
    
<script>
    
    function sendRequest ( u )
           {
               var obj = $.ajax({url:u,async:false});
                var result=$.parseJSON(obj.responseText);
                return result;
           }//end of sendRequest function
    
    function openDepartmentPage(){
                 //displayallnurses();
                 //shownursedetails();
				$(".outercontainer").fadeOut('slow');
				$(".nurseoutercontainer").fadeOut('slow');
                $(".addDeptform").hide();
			 $(".contentarea").css("background-color"," #dbe5e3");
			 	displayalldepts();
				$(".departmentoutercontainer").fadeIn('slow');
				$(".contentspace").fadeIn('slow');
			 
			 }
    
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
    
    function showdeptdetails(id)
			{
                var theUrl="../controllers/user_controller.php?cmd=11&id="+id;
                var obj = sendRequest ( theUrl );
				var details ="";
                if ( obj.result === 1){
					 details +="	<div class='details'><div class='tasktitledetails'>"+obj.dept[0].department_id+"</div><div class='taskdescriptiondetails'>"+obj.dept[0].department_name+"</div><div class='taskdatedetails'>"+obj.dept[0].hospital_id+"</div></div>";
				}
				$(".innerdeptdisplayextended").hide ();
				$(".innerdeptdisplayextended").html (details);
				$(".innerdeptdisplayextended").fadeIn();
				$(".innerdeptdisplayextended").slideDown();				
			 }
    
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
    
    function addDept(){
				var name = encodeURI(document.getElementById("deptname").value);
				var hospital = encodeURI(document.getElementById("sel1").value);
				
				 var url = "../controllers/user_controller.php?cmd=12&name="+name+"&hospital="+hospital;
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
      <input id="searchbar" type="text" class="form-control" placeholder="Search for nurses...">
      <span class="input-group-btn">
        <button onClick="displaySearchedNurse()"id="searchbutton" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
				<div class="navBarMinor">
				<span id="addtaskbtncontainer">
					<button onClick="displayaddDeptForm()" id="addtaskbtn" type="button">
							<span ><i id="addtaskicon" class="fa fa fa-plus"></i></span><span id="addtasktxt">Add department</span>
                  </button>	  
				</span>
			</div>
			
		</div>
			<?php
				include 'addDept.php';
			?>
		<div class="contentspace">
			
			<div class="multi-selectbar"><button id="multibtn" onClick="multiEndTask()" type="button">
							<span ><i id="endedtaskicon" class="fa fa fa-close"></i></span><span id="multibtntxt">Select multiple</span>
                  </button></div>
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