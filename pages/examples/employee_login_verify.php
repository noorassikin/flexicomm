<?php
session_start();
// from form
$employee_id=$_POST['employee_id'];
$employee_password=$_POST['employee_password'];

// Create connection
$con=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM employee WHERE employee_id='$employee_id' and employee_password='$employee_password'";
$result = mysqli_query($con,$sql);
$count=mysqli_num_rows($result);

// If result matched $employee_id and $employee_password, table row must be 1 row
if($count==1){

    // SAVE SESSION VARIABLES AND REDIRECT TO "page"
    $_SESSION['employee_id'] = $employee_id;
    $_SESSION['employee_password'] = $employee_password;
    header("location:employee_home.php");
    exit;
}
else {
    echo "<script>alert('Wrong username or password');
	window.location = 'sign-in.html';</script>";
}
// If result matched $myusername and $mypassword, table row must be 1 row
/*if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("a");
session_register("b");
header("location: employee_home.php");
}
else {
echo "Wrong employee ID or Password";
}*/

?>
