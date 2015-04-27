
<html>
<head><title>login</title>

 <link href="../assets/stylesheets/login.css" rel="stylesheet" type="text/css">
        
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
			 	 
 </script>
</head>
<body>
	<div class="outercontainer1">
			<div id="header1">
				
                <span><img src="../assets/images/taskgenie.png" width="100%"></span>
                
			</div>
		<form class="loginform" >
			
			<div class="form-group">
			<label style="font-size:15px;color:white;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=50)';filter: alpha(opacity=50);-moz-opacity: 0.5;-khtml-opacity: 0.5; opacity: 0.5;">Username</label>
			<input style="color:white;border:none;background:#515052;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=50)';filter: alpha(opacity=50);-moz-opacity: 0.5;-khtml-opacity: 0.5; opacity: 0.5;"type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter username">
		</div>
		<div class="form-group">
		<label style="font-size:15px;color:white;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=50)';filter: alpha(opacity=50);-moz-opacity: 0.5;-khtml-opacity: 0.5; opacity: 0.5;" for="exampleInputPassword1">Password</label>
		<input style=" color:white;border:none;background:#515052;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=50)';filter: alpha(opacity=50);-moz-opacity: 0.5;-khtml-opacity: 0.5; opacity: 0.5;"type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
		</div>
		<div style="text-align:center">
			<button id="loginbtn"  onClick="login()" type="button">Login</button>
		</div>
		
		</form>
	</div>
</body>


</html>