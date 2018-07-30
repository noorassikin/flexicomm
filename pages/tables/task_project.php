

<?php 
	$project_name = $_GET['project_name'];
	$project_id = $_GET['project_id'];
	//echo "<label>Project Name:</label>" ;
	//echo $project_name;
?>
						
 <?php
$con=mysqli_connect("localhost","root","","task");
$project_id = $_GET['project_id'];

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
					$abc=$_SESSION['employee_id']; 		
					$sql = "SELECT task.task_id,task.task_title, task.task_status, task.task_due_date, task.task_description, project.project_id, project.project_name, employee.employee_id
							FROM task,project, employee
							WHERE task.project_id = project.project_id 
							AND task.employee_id = employee.employee_id 
							AND task.employee_id = '$abc'
							AND task.project_id =  '$project_id'
							";
                    $result = $con->query($sql);
					

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            //$id = $row['id'];
							echo "ID: " . $row["project_id"]."<br>";
							echo "Title:". $row["project_name"]."<br>";
							echo "Description:". $row["project_description"]."<br>";
							echo "Date:". $row["project_date_created"]."<br>";
							echo "Due Date:". $row["project_due_date"]."<br>";
							echo "Status:". $row["project_status"]."<br>";
							echo "Employee:". $row["employee"]."<br>";
						}
					} else {
						echo "0 results";
					}
$con->close();
?>


