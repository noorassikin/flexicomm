<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['manager_id'])){
header("location: manager_login.html");
}
?>


<?php

// Create connection
$con=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task" );

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$employee_id = $_POST['employee_id'];
$employee_password = $_POST['employee_password'];

$sql = "INSERT INTO employee (employee_id, employee_password)
	  VALUES ('$employee_id','$employee_password')";
$result = mysqli_query($con,$sql);

header("Location: manager_view_employee.php");

?>
