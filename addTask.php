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
							<form method="POST" action="addTask.php">
				<div>
				 <input type="text" placeholder="Task name" name="tname" required>
				</div>
				<div>
				<input type="text" placeholder="Due-Date" name="ddate" required>
				</div>
				<div>
				<textarea  cols="30" rows ="5" placeholder="Description of task" name="tdes" required></textarea>
				</div>
				<div>
				<input type="text" placeholder="Nurse id" name="nurseid" required>
				</div>
				<div>
				<input type="text" placeholder="Supervisor id" name="supervisorid" required>
				</div>
				<input type="submit" name="button" value="Insert">
			</form>
			
			<?php
				if ( isset ( $_REQUEST [ 'button' ] ) )
				{
					require_once ( "task.php" );
					
					$obj = new task();
					$name = $_REQUEST [ 'tname' ];
					$date = $_REQUEST [ 'ddate' ];
					$description = $_REQUEST [ 'tdes' ];
					$nurse = $_REQUEST [ 'nurseid' ];
					$supervisor = $_REQUEST [ 'supervisorid' ];
					
					if ( !$obj->add_task($name,$date,$description,$nurse,$supervisor))
						{
							echo "Error Adding to task";
						}
					else
						{
							$name = "";
							echo "Successfully added to task";
						}
				}
			?>
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	