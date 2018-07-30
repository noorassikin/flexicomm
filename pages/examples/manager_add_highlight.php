<?php
session_start();
//error_reporting(0);
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

$highlight_date = $_POST['highlight_date'];
$highlight_message = $_POST['highlight_message'];
$highlight_status = $_POST['highlight_status'];
$manager_id = $_SESSION['manager_id'];

$sql = "INSERT INTO highlight (highlight_date, highlight_message, highlight_status, manager_id)
	  VALUES (NOW(),'$highlight_message','$highlight_status','$manager_id')";
$result = mysqli_query($con,$sql);

header('Location: manager_home.php');

?>

