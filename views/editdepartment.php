
<div class="editDeptform">
			<form>
				<div class="form-group">
				<label style="color:#454445;" >Department name</label>
				<input type="text" class="form-control" id="deptname1" placeholder="Enter department name">
				</div>
				
				<div class="form-group">
					<label  style="color:#454445;" for="sel3">Hospital:</label>
						<select class="form-control" id="nsel3" required>
						</select>
					</div>
				<div>
				<button onClick="editDepartment()" type="button">
							Edit
                  </button>
				  </div>
				  <div>
				  <input id="editDepartmentID" type="hidden" >
				  </div>
			</form>			
</div>