
<div class="addform">
			<form>
				<div class="form-group">
				<label style="color:#454445;" >Task name</label>
				<input type="text" class="form-control" id="taskname" placeholder="Enter task name">
				</div>
				<div>
				<label for="datepicker" style="color:#454445;">Due date</label>
				<input id="datepicker"type="date" name="ddate" required>
				</div>
				<div class="form-group">
				<label  style="color:#454445;" for="comment">Description</label>
				<textarea class="form-control" rows="10" id="description" placeholder="Enter task description" required></textarea>
				</div>
				<div class="form-group">
					<label  style="color:#454445;" for="sel1">Assigned to:</label>
						<select class="form-control" id="sel1" required>
						</select>
					</div>
				<button onClick="addtask()" type="button">
							Insert
                  </button>
			</form>			
</div>