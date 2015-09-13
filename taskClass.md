#task.php class reference.
<h1>task Class</h1>
A class which extends adb class. It encapsulates functions that make queries to obtain data from task table in database.

<h2>Methods</h2>

<h3>add_task($name,$due_date,$description,$nurse_id,$superviser_id)</h3>
> This method has an insert query that takes these parameters and inserts into database

<h3>edit_task($name,$due_date,$description,$nurse_id,$superviser_id,$id)</h3>

This method takes in the above parameters and using an update query makes a query to the database.

<h3>get_all_tasks()</h3>

This method sends queries the database to obtain all tasks

<h3>get_all_ended_tasks()</h3>

This method sends queries the database to obtain all data in the finished\_tasks table

<h3>get_user_tasks($id)</h3>

The method queries the database to get all tasks of the user with the given id..

<h3>get_ended_tasks($id)</h3>

This method queries the database to get all data in the finished\_task table of a user with the given id

<h3>get_search_tasks($id,$search_text)</h3>

This method queries the database to get all tasks which have their tasks names containing strings equal to $search\_text.

<h3>add_finished_task($id,$name,$due_date,$description,$nurse_id,$superviser_id)</h3>

This method inserts a task into the database given the above parameters.

<h3>remove_task($id)</h3>

This sends the query that deletes a task with the given id from the database.

<h3>get_task($id)</h3>

This sends the query to get a task with the given id

<h3>get_ended_task($id)</h3>

This sends the query to get a task from the finished\_task table with the given id

<h3>restore ($id,$name,$due_date,$description,$nurse_id,$superviser_id)</h3>

This method adds back into the task table given the above parameters.

<h3>remove_finishedtask($id)</h3>

This sends the query that deletes a task with the given id from finished\_task table in the database.