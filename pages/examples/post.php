<?php
date_default_timezone_set("Asia/Kuala_Lumpur");

if(isset($_POST["user"]))

{
include 'config.php';

$user = mysqli_real_escape_string($conn, $_POST["user"]);
$message = mysqli_real_escape_string($conn, $_POST["message"]);
$project_id = mysqli_real_escape_string($conn, $_POST["project_id"]);

$date = date("Y-m-d h:i:s a");

$query = "INSERT INTO chat(user, message, date, project_id)VALUES ('$user', '$message', '$date', '$project_id')";
mysqli_query($conn, $query);
}
?>