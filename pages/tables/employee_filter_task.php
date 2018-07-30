<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['employee_id'])){
header("location: employee_login.html");
}
?>

<?php
if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "task");  
      $output = ''; 
	 /* $abc=$_SESSION['employee_id']; 
                    $query = "SELECT task.task_id,task.task_title, task.task_status, task.task_due_date, task.task_description, project.project_id, project.project_name, employee.employee_id
							FROM task,project, employee
							WHERE task_created BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'
							
							";	
$result = mysqli_query($connect, $query);   */ 
$output .= '
<table class="table table-bordered table-striped table-hover dataTable js-exportable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Project</th>
			<th>Tasks</th>
			<th>Status</th>
			<th>Due Date</th>
			<th>Issues</th>
        </tr>
    </thead>
';
$abc=$_SESSION['employee_id']; 
                    $sql = "SELECT task.task_id,task.task_title, task.task_status, task.task_due_date, task.task_description, project.project_id, project.project_name, employee.employee_id
							FROM task,project, employee
							WHERE task_created BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'
							AND task.project_id = project.project_id 
							AND task.employee_id = employee.employee_id 
							AND  task.employee_id = '$abc'";
                    $result = $connect->query($sql);
if(mysqli_num_rows($result) > 0)  
    {
	$x=1;	
        while($row = mysqli_fetch_array($result))  
        {
			/*$task_id = $row['task_id'];
            $task_title = $row['task_title'];
            $project_name = $row['project_name'];
			$task_status = $row['task_status'];
            $task_due_date = $row['task_due_date'];
			$task_description = $row['task_description'];*/
			
            $output .= '
				<tbody>
					<tr>
						<td>'.$x.'</td>
						<td>'. $row["project_name"] .'</td>
						<td>'. $row["task_title"] .'</td>
						<td>'. $row["task_status"] .'</td>
						<td>'. $row["task_due_date"] .'</td>
						<td>'. nl2br($row["task_description"]) .'</td>
						
						</tr>
				</tbody>
			';
		$x++;  }
	}  
	else  
	{  
			$output .= '
			 <tr>  
                     <td colspan="6">No Task Found</td>  
                </tr>  
           ';  
		   
	}  
			$output .= '</table>';
			echo $output;
}

           //#END# Exportable Table -->
 ?>