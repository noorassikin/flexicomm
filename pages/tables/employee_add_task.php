<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['employee_id'])){
header("location: employee_login.html");
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
//$project_name = $_POST['project_name'];
$task_title = $_POST['task_title'];
$task_created = $_POST['task_created'];
$task_due_date = $_POST['task_due_date'];
$task_description = $_POST['task_description'];
$project_id = $_POST['project_id'];
$employee_id = $_SESSION['employee_id'];

$sql = "INSERT INTO task (task_title, task_created, task_status, task_due_date, task_description, project_id, employee_id)
	  VALUES ('$task_title',NOW(),'In Progress','$task_due_date','$task_description','$project_id','$employee_id')";
$result = mysqli_query($con,$sql);

header('Location: employee_open_task.php');

?>

