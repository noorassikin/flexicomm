<?php
include 'config.php';

$id = $_REQUEST['id'];

$sql = "Select * from chat WHERE project_id = $id ORDER BY id DESC";
$result = $result=mysqli_query($conn,$sql);
while($row =  $result->fetch_assoc())
{
echo("<a class='list-group-item list-group-item-action' href='#'>
		<div class='media'>
			<div class='media-body'>
			<strong>" . $row['user'] . "</strong> " . $row['message'] . ".
			<div class='text-muted smaller'>" . $row['date'] . "</div>
			</div>
		</div>
	</a>");
}
?>