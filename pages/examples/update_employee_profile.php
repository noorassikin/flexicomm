
<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['employee_id'])){
header("location: employee_login.html");
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
$abc=$_SESSION['employee_id'];
if(isset($_POST['employee_name'])){
	$a = $_POST['employee_name'];
	$b = $_POST['employee_department'];
	$c = $_POST['employee_position'];
	$d = $_POST['employee_email'];
	$e = $_POST['employee_phoneno'];
	$f = $_POST['employee_address'];
	//$g = $_POST['ID'];

	$sql = "UPDATE employee SET
				employee_name='$a',
				employee_department='$b',
				employee_position='$c',
				employee_email='$d',
				employee_phoneno= '$e',
				employee_address= '$f'
			WHERE employee_id='$abc'";

	$result = mysqli_query($con,$sql);
}

header('Location: employee_view_profile.php');
?>
