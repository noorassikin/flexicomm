
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
$abc=$_SESSION['manager_id'];
if(isset($_POST['manager_name'])){
	$a = $_POST['manager_name'];
	$d = $_POST['manager_email'];
	$e = $_POST['manager_phoneno'];
	$f = $_POST['manager_address'];
	//$g = $_POST['ID'];

	$sql = "UPDATE manager SET
				manager_name='$a',
				manager_email='$d',
				manager_phoneno= '$e',
				manager_address= '$f'
			WHERE manager_id='$abc'";

	$result = mysqli_query($con,$sql);
}

header('Location: manager_view_profile.php');
?>
