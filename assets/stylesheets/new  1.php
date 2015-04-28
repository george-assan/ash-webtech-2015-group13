<div class="addform">
			<form>
				<div class="form-group">
				<label >Task name</label>
				<input type="text" class="form-control" id="task" placeholder="Enter task name">
				</div>
				<div class="container">
				<label >Due date</label>
			<div class="row">
			<div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script>
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>
				<div class="form-group">
				<label for="comment">Description</label>
				<textarea class="form-control" rows="10" id="description"></textarea>
				</div>
				<div class="form-group">
					<label for="sel1">Assigned to:</label>
						<select class="form-control" id="sel1">
						</select>
					</div>

				<input onClick ="addTask()" type="submit" name="button" value="Insert">
			</form>			
</div>