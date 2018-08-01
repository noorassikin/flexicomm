<?php

	$host = "mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com";
	$user = "mastermaster";
	$pass = "mastermaster";
	$db = "task";

	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		echo "Failed:" . $conn->connect_error;
	}
?>
