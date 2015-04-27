
<div class="editnurseform">
			<form>
				<div class="form-group">
				<label style="color:#454445;" >Nurse name</label>
				<input type="text" class="form-control" id="nursename1" placeholder="Enter nurse name">
				</div>
				<div>
				<label for="datepicker" style="color:#454445;">Username</label>
				<input class="form-control" id="username1"type="text" name="username" placeholder="Enter username" required>
				</div>
				<div class="form-group">
				<label  style="color:#454445;" for="password">Password</label>
				<input class="form-control" type="text"  id="password1" placeholder="Enter password" required></input>
				</div>
				<div class="form-group">
					<label  style="color:#454445;" for="sel2">Department:</label>
						<select class="form-control" id="nsel2" required>
						</select>
					</div>
				<div>
				<button onClick="editNurse()" type="button">
							Edit
                  </button>
				  </div>
				  <div>
					<input id="neditID" type="hidden" >
					</div>
			</form>			
</div>




 