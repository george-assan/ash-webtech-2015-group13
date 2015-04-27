
<div class="editform">
			<form>
				<div class="form-group">
				<label style="color:#454445;" >Task name</label>
				<input type="text" class="form-control" id="taskname1" placeholder="Enter task name">
				</div>
				<div>
				<label for="datepicker" style="color:#454445;">Due date</label>
				<input id="datepicker1"type="date" name="ddate" required>
				</div>
				<div class="form-group">
				<label  style="color:#454445;" for="comment">Description</label>
				<textarea class="form-control" rows="10" id="description1" placeholder="Enter task description" required></textarea>
				</div>
				<div class="form-group">
					<label  style="color:#454445;" for="sel1">Assigned to:</label>
						<select  id="sel2" class="form-control" required>
						</select>
					</div>
				<div>
					<input id="editID" type="hidden" >
					</div>
				<button onClick="editTask()" type="button">
							Edit
                  </button>
			</form>			
</div>