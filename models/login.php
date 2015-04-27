
<?php
include_once ( "adb.php" );
class login extends adb{
    
    function login($nurse_name,$password){
    
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

//if (isset($_POST['submit'])) {
//if (empty($_POST['username']) || empty($_POST['password'])) {
    
$error = "Username or Password is invalid";
    
}
else
{
// Define $username and $password
//$username=$_POST['username'];
//$password=$_POST['password'];

$insert_query = mysql_query("select * from nurse where password='$password' AND nurse_name ='$username'", $connection);
return $this->query($insert_query);
if ($this.get_num_rows() == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: dashboard.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
}
}

//}
//}
?>