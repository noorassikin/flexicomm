<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['manager_id'])){
header("location: manager_login.html");
}
?>


<?php

// Create connection
$con=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$project_name = $_POST['project_name'];
$project_description = $_POST['project_description'];
$project_status = $_POST['project_status'];
$project_date_created = $_POST['project_date_created'];
$project_due_date = $_POST['project_due_date'];

$sql = "INSERT INTO project (project_name, project_description, project_date_created, project_due_date, project_status)
	  VALUES ('$project_name','$project_description', '$project_date_created', '$project_due_date', '$project_status')";
$result = mysqli_query($con,$sql);

header('Location: manager_view_project_list.php');

?>

