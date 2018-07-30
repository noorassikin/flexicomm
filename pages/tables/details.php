

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
                    /*$sql = "SELECT project.project_id, project.project_name, project.project_description, project.project_date_created, project.project_due_date, project.project_status, employee.employee_id, employee.employee_name, task.employee_id
							FROM project, task, employee
							
							WHERE project.project_id = task.project_id
							AND task.employee_id = employee.employee_id
							AND task.project_id =  '$project_id'";*/
							
					$sql = "SELECT project.project_id, project.project_name, project.project_description, project.project_date_created, project.project_due_date, project.project_status, employee.employee_id, employee.employee_name, task.employee_id, 
							GROUP_CONCAT( DISTINCT employee.employee_name ) AS employee 
							FROM project, task, employee
							WHERE project.project_id = task.project_id
							AND task.employee_id = employee.employee_id
							AND task.project_id =  '$project_id'
							GROUP BY project.project_id
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


