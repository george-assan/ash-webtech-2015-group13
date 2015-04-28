<div class="addnurseform">
			<form>
				<div class="form-group">
				<label style="color:#454445;" >Nurse name</label>
				<input type="text" class="form-control" id="nursename" placeholder="Enter nurse name">
				</div>
				<div>
				<label for="datepicker" style="color:#454445;">Username</label>
				<input class="form-control" id="username"type="text" name="username" placeholder="Enter username" required>
				</div>
				<div class="form-group">
				<label  style="color:#454445;" for="password">Password</label>
				<input class="form-control" type="text"  id="password" placeholder="Enter password" required></input>
				</div>
				<div class="form-group">
					<label  style="color:#454445;" for="sel2">Department:</label>
						<select class="form-control" id="sel2" required>
						</select>
					</div>
				<button onClick="addnurse()" type="button">
							Add
                  </button>
			</form>			
</div>