<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			
		</script>
	</head>
	<body>
		<table align="center">
			<tr>
				<td colspan="2" id="pageheader">
					Nurse Task Manager
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">Tasks</div>
					<div class="menuitem">Nurse Logs</div>
					<div class="menuitem">Finished Work</div>
					<div class="menuitem"></div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span style = 'padding:1%' class="menuitem1" ><a href='index.php' style="text-decoration:none;color:#42433c">View tasks</a></span>
						<span style = 'padding:1%' class="menuitem1" ><a href='addTask.php'style="text-decoration:none;color:#42433c">Add task</a></span>
						<span style='float:right' ><input  type="text" placeholder = "Search" id="txtSearch" />
						<span><input type="submit" name="button" value="Go"></span>		
						</span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						Content space
						<span class="clickspot">click here </span>
				
						<?php
								include('adb.php');
								$obj = new adb;
								
								$obj->connect();
								$select_query = "Select * from task,nurse where task.nurse_id = nurse.nurse_id";
							
								
								$obj->query( $select_query );
								
								echo "<table border='1' id='tableExample' class='reportTable' width='100%'>";
									echo "<tr style = 'Background-color:#066d5d' class='header'>";
								echo "<td>Task id</td>";
								echo "<td>Task name</td>";
								echo "<td>Due date</td>";
								echo "<td>Description</td>";
								echo "<td>Nurse</td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "</tr>";
	
								$row = $obj->fetch();
							
								while($row){
								echo "<tr>";
							
								echo "<td width=7% >".$row['task_id']."</td>";
								echo "<td>".$row['task_name']."</td>";
								echo"<td td width=10%>".$row['due_date']."</td>";
								echo "<td>".$row['description']."</td>";
								echo "<td >".$row['nurse_name']."</td>";
								echo "<td width=5% style='text-align:center;font-weight: bold'><a href=''style='text-decoration:none;color:#066d5d'>log</a></td>";
								echo "<td width=8% style = 'text-align:center;font-weight: bold'><a href=''style='text-decoration:none;color:#066d5d'>End task</a></td>";
								echo "</tr>";
								$row = $obj->fetch();
								
								}
								echo "</table>";
	
						?>
						
						
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	