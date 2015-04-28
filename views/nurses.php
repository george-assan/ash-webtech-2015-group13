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
    
	
	//Function for opening nurse page
    function openNursesPage(){
				var url = "../controllers/user_controller.php?cmd=18";
               var obj = sendRequest ( url );
				if(obj.result==0){
				
				
				$(".addNurseBtn").hide();
				
				}
				
                 //displayallnurses();
                 //shownursedetails();
				$(".outercontainer").fadeOut('slow');
				$(".departmentoutercontainer").fadeOut('slow');
                 $(".addnurseform").hide();
			 $(".contentarea").css("background-color"," #dbe5e3");
			 	displayallnurses();
				$(".nurseoutercontainer").fadeIn('slow');
				$(".contentspace").fadeIn('slow');
			 
				 var u="../controllers/user_controller.php?cmd=23";
                  var obj1 = $.ajax({url:u,async:false});
				usern1.innerHTML =obj1.responseText;
			 }
    //Function for displaying all nurses
    function displayallnurses(){
            $ ( document ).ready ( function ( )
            {
               
			   var url = "../controllers/user_controller.php?cmd=4";
               var obj = sendRequest ( url );
			
				
                if ( obj.result === 1 )
                {
					   
					var i = 1;
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
    //Function for showing nurse details
    function shownursedetails(id)
			{
                var theUrl="../controllers/user_controller.php?cmd=9&id="+id;
                var obj = sendRequest ( theUrl );
				var details ="";
                if ( obj.result === 1){
					 details +="	<div class='details'><div class='tasktitledetails'>"+obj.nurses[0].nurse_id+"</div><div class='taskdescriptiondetails'>"+obj.nurses[0].nurse_name+"</div><div class='taskdatedetails'>"+obj.nurses[0].username+"</div></div><div class='descriptionbuttons'><span id='nurseEdit'><button class='desBtns' onClick='opennurseEditForm("+obj.nurses[0].nurse_id+")'id='editBtn'>Edit</button></span><span id='nurseEdit'><button class='desBtns' onClick='deleteNurse("+obj.nurses[0].nurse_id+")'id='nurseDelBtn'>Delete</button></span></div>";
				}
				$( ".innernursedisplayextended" ).hide ();
				$( ".innernursedisplayextended" ).html (details);
				$(".innernursedisplayextended").fadeIn();
					var url = "../controllers/user_controller.php?cmd=18";
               var obj = sendRequest ( url );
				if(obj.result==0){
				
				
				$("#nurseEdit").hide();
				$("#nurseDelBtn").hide();
				}
				 $(".innernursedisplayextended").slideDown();				
			 }
    //Function for displaying  add nurse form
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
    //Function for connecting to controller to add nurse
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
			//Function for opening  edit form
			function opennurseEditForm(id){
				$(".contentspace").slideDown('slow');
				$(".contentarea").css("background-color","white");
				$(".editnurseform").slideDown('slow');
				 var url = "../controllers/user_controller.php?cmd=10";
               var obj = sendRequest ( url );
			   var i=0;
			   var options="";
			   for(;i<obj.dept.length;i++){
			   options+="<option value="+obj.dept[i].department_id+">"+obj.dept[i].department_name+"</option>";
			   }
			 $("#nsel2.form-control").html(options);
				
				var theUrl="../controllers/user_controller.php?cmd=9&id="+id;
                var obj = sendRequest ( theUrl );
				
				document.getElementById("nursename1").value=obj.nurses[0].nurse_name;
				document.getElementById("username1").value=obj.nurses[0].username;
				document.getElementById("password1").value=obj.nurses[0].password;
				document.getElementById("nsel2").value=obj.nurses[0].department_id;
				document.getElementById("neditID").value=obj.nurses[0].nurse_id;
			 }
			 //Function for editing nurse by making request to user_controller
			 function editNurse(){
				var name = encodeURI(document.getElementById("nursename1").value);
				var user = encodeURI(document.getElementById("username1").value);
				var pass = encodeURI(document.getElementById("password1").value);
				var dept = encodeURI(document.getElementById("nsel2").value);
				var id = encodeURI(document.getElementById("neditID").value);
				 var url = "../controllers/user_controller.php?cmd=16&name="+name+"&user="+user+"&pass="+pass+"&dept="+dept+"&id="+id;
               var obj = sendRequest ( url );
			  
			   $(".editnurseform").slideUp('slow');
				$(".contentarea").css("background-color"," #dbe5e3");
				 displayallnurses();
				$(".contentspace").fadeIn('slow');	 
			 
			 
			 }
			 
			 
			 	function displaySearchedNurse(){
					
			 var search = encodeURI(document.getElementById("searchbar3").value);   
			   var url = "../controllers/user_controller.php?cmd=24&st="+search;
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
			 
			 }
			 
			 function deleteNurse(id){
				 var theUrl="../controllers/user_controller.php?cmd=27&id="+id;
                var obj = sendRequest ( theUrl );
				if(obj.result==1){
					statusmessage(obj.message);
				}
				else{
					errormessage(obj.message);
				}
					displayallnurses();
				}
    
 </script>
</head>
<body>
	<div class="nurseoutercontainer">
            
            <div class="main">
			<div class="sidecontainer">
				<div id="header">
					<span><img src="../assets/images/taskgenie1.png" alt="Task manger"width="55%"></span>
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
      <input id="searchbar3" type="text" class="form-control" placeholder="Search for nurses...">
      <span class="input-group-btn">
        <button onClick="displaySearchedNurse()"id="searchbutton" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
</span>
<span id="usern1"></span>
<span id="usersettings" ><button onClick="logOut()" id="logout">Logout</button></span>
				<div class="navBarMinor">
				<span id="addtaskbtncontainer">
					<button onClick="displayaddNurseForm()" class="addNurseBtn"id="addtaskbtn" type="button">
							<span ><i id="addtaskicon" class="fa fa fa-plus"></i></span><span id="addtasktxt">Add nurse</span>
                  </button>	  
				</span>
			</div>
			
		</div>
			<?php
				include 'addnurse.php';
				include 'editnurse.php';
			?>
		<div class="contentspace">
			
			<!--<div class="multi-selectbar"><button id="multibtn2" onClick="multiEndTask()" type="button">
							<span ><i id="endedtaskicon" class="fa fa fa-close"></i></span><span id="multibtntxt2">Select multiple</span>
                  </button></div>-->
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