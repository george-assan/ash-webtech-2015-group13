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
    
    function openNursesPage(){
                 //displayallnurses();
                 //shownursedetails();
				$(".outercontainer").fadeOut('slow');
				$(".departmentoutercontainer").fadeOut('slow');
                 $(".addnurseform").hide();
			 $(".contentarea").css("background-color"," #dbe5e3");
			 	displayallnurses();
				$(".nurseoutercontainer").fadeIn('slow');
				$(".contentspace").fadeIn('slow');
			 
			 }
    
    function displayallnurses(){
            $ ( document ).ready ( function ( )
            {
               
			   var url = "../controllers/user_controller.php?cmd=4";
               var obj = sendRequest ( url );
			
				
                if ( obj.result === 1 )
                {
					   
					var i = 0;
					var panels ="";
					
					for ( ; i < obj.nurses.length; i++ )
                    {
					panels += "<div class='taskpanels' onClick='shownursedetails("+obj.nurses[i].nurse_id+")'><span class='checkboxes' style='z-index:7;margin-top:20px;margin-left:10px;position:absolute;display-table-cell;vertical-align:middle;'><input  type='checkbox' value='"+obj.nurses[i].nurse_id+"'></span><span><div class='paneltaskname'>"+obj.nurses [i].nurse_name+"</div><div class='paneltasksup'>Department ID "+obj.nurses [i].department_id+"</div></span></div>";
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
    
    function shownursedetails(id)
			{
                var theUrl="../controllers/user_controller.php?cmd=9&id="+id;
                var obj = sendRequest ( theUrl );
				var details ="";
                if ( obj.result === 1){
					 details +="	<div class='details'><div class='tasktitledetails'>"+obj.nurses[0].nurse_id+"</div><div class='taskdescriptiondetails'>"+obj.nurses[0].nurse_name+"</div><div class='taskdatedetails'>"+obj.nurses[0].username+"</div></div>";
				}
				$( ".innernursedisplayextended" ).hide ();
				$( ".innernursedisplayextended" ).html (details);
				$(".innernursedisplayextended").fadeIn();
				 $(".innernursedisplayextended").slideDown();				
			 }
    
    function displayaddNurseForm(){
				$(".contentspace").slideDown('slow');
				$(".contentarea").css("background-color","white");
				$(".addnurseform").slideDown('slow');
				 var url = "../controllers/user_controller.php?cmd=10";
               var obj = sendRequest ( url );
			   var i=0;
			   var options="";
			   for(;i<obj.dept.length;i++){
			   options+="<option value="+obj.dept[i].department_id+">"+obj.dept[i].department_name+"</option>";
			   }
			 $("#sel2").html(options);
			 }
    
    function addnurse(){
				var name = encodeURI(document.getElementById("nursename").value);
				var user = encodeURI(document.getElementById("username").value);
				var pass = encodeURI(document.getElementById("password").value);
				var dept = encodeURI(document.getElementById("sel1").value);
				
				 var url = "../controllers/user_controller.php?cmd=12&name="+name+"&user="+user+"&pass="+pass+"&dept="+dept;
               var obj = sendRequest ( url );
			  
			   $(".addnurseform").slideUp('slow');
				$(".contentarea").css("background-color"," #dbe5e3");
				 displayallnurses();
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
	<div class="nurseoutercontainer">
            
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
					<button onClick="displayaddNurseForm()" id="addtaskbtn" type="button">
							<span ><i id="addtaskicon" class="fa fa fa-plus"></i></span><span id="addtasktxt">Add nurse</span>
                  </button>	  
				</span>
			</div>
			
		</div>
			<?php
				include 'addnurse.php';
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
					<div class="innernursedisplayextended">
					
					</div>
				</div>
				
		</div>
	</div>
	</div>
            
	</div>
</body>


</html>