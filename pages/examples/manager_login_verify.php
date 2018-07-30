<?php
session_start();
// from form 
$manager_id=$_POST['manager_id']; 
$manager_password=$_POST['manager_password']; 

// Create connection
$con=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM manager WHERE manager_id='$manager_id' and manager_password='$manager_password'";
$result = mysqli_query($con,$sql);
$count=mysqli_num_rows($result);

// If result matched $manager_id and $manager_password, table row must be 1 row
if($count==1){

    // SAVE SESSION VARIABLES AND REDIRECT TO "page"
    $_SESSION['manager_id'] = $manager_id;
    $_SESSION['manager_password'] = $manager_password;
    header("location:manager_home.php");
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
header("location: manager_home.php");
}
else {
echo "Wrong manager ID or Password";
}*/

?>