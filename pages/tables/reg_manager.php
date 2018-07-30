<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['manager_id'])){
header("location: manager_login.html");
}
?>


<?php

// Create connection
$con=mysqli_connect("localhost","root","","task");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$manager_id = $_POST['manager_id'];
$manager_password = $_POST['manager_password'];

$sql = "INSERT INTO manager (manager_id, manager_password)
	  VALUES ('$manager_id','$manager_password')";
$result = mysqli_query($con,$sql);

header("Location: manager_view_manager.php");

?>

