<?php
session_start();
// from form
$admin_id=$_POST['admin_id'];
$admin_password=$_POST['admin_password'];

// Create connection
$con=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM admin WHERE admin_id='$admin_id' and admin_password='$admin_password'";
$result = mysqli_query($con,$sql);
$count=mysqli_num_rows($result);

// If result matched $admin_id and $admin_password, table row must be 1 row
if($count==1){

    // SAVE SESSION VARIABLES AND REDIRECT TO "page"
    $_SESSION['admin_id'] = $admin_id;
    $_SESSION['admin_password'] = $admin_password;
    header("location:admin_home.php");
    exit;
}
else {
    echo "Wrong Username or Password";
}
// If result matched $myusername and $mypassword, table row must be 1 row
/*if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("a");
session_register("b");
header("location: admin_home.php");
}
else {
echo "Wrong admin ID or Password";
}*/

?>
