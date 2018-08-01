<!DOCTYPE html>

<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['employee_id'])){
header("location: employee_login.html");
}

$employee_id = $_SESSION['employee_id'];
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FlexiCOMM| Assignment Details</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

	<style>
        .scroll-box {
            overflow-y: scroll;
				height: 400px;
            padding: 1rem
        }
	</style>

</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../pages/examples/employee_home.php">Flexi<b>COMMUNICATOR</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>

							 <?php
								$con=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task");

								if (mysqli_connect_errno())
								{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
								$abc=$_SESSION['employee_id'];
								$sql  = '
										SELECT employee_id,task_status, COUNT(*)
										 AS count
										 FROM task
										 WHERE task_status="delayed"
										 AND employee_id = "'.$_SESSION['employee_id'].'"
										 ';

										 $result=mysqli_query($con,$sql);
											if($result)
											{
												while($row=mysqli_fetch_assoc($result))
												{
													//echo $row['c'];

													echo '<span class="label-count">'.$row['count'].'</span>';
												}
											}
							?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="employee_open_delay_task.php">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">date_range</i>
                                            </div>
                                            <div class="menu-info">

													<?php
														$con=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task");
														$t = "SELECT employee_id,task_status, COUNT(*)
																	 AS count
																	 FROM task
																	 WHERE task_status='delayed'
																	 AND employee_id = '".$_SESSION['employee_id']."'
																	 '";
														$result=mysqli_query($con,$sql);

														if($result)
														{
															while($row=mysqli_fetch_assoc($result))
															{
														echo '<h4>';
														 echo '
																 You have '.$row['count'].' delayed task
																';
																echo '<h4>';
														 }}
													?>

                                               <p>
                                                    <i class="material-icons">access_time</i>
                                                </p>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <!-- <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li> -->
                        </ul>
                    </li>
                    <!-- #END# Notifications -->

                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                   <!-- <img src="../../images/user.png" width="48" height="48" alt="User" /> -->
                </div>

				<?php

							$con=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task");

							if (mysqli_connect_errno())
							  {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							  }
							$abc=$_SESSION['employee_id'];
							$sql = mysqli_query($con,"SELECT * FROM employee WHERE employee_id = '$abc'");
							$row = mysqli_fetch_array($sql);
							$employee_id=$row['employee_id'];
							$employee_name=$row['employee_name'];
							$employee_email=$row['employee_email'];
				?>

                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $employee_name; ?></div>
                    <div class="email"><?php echo $employee_email; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="../../pages/examples/employee_update_profile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="#changepass" data-toggle="modal"><i class="material-icons">create</i>Edit Password</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="../../pages/examples/employee_logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="../../pages/examples/employee_home.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

					<li>
                        <a href="../../pages/examples/employee_view_profile.php">
                            <i class="material-icons">person</i>
                            <span>Profile</span>
                        </a>
                    </li>

					<li class="active">
                        <a href="../../pages/tables/employee_view_project_list.php">
                            <i class="material-icons">view_list</i>
                            <span>Assignments</span>
                        </a>
                    </li>

					<li>
                        <a href="../../pages/tables/employee_open_task.php">
                            <i class="material-icons">date_range</i>
                            <span>Tasks</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                                        <a href="javascript:void(0);">Powered by <a href= "http://flexcility.com/"><img src="../../images/flexcility.png" alt="Flexcility Logo" width="100" height="20"> </a></a>.
                </div>
                <div class="version">
                    &copy; 2018 <b>Version: </b> 1.1

                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <!-- <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li> -->
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">

				<div class="body">

                            <ol class="breadcrumb">
                                <li>
                                    <a href="../../pages/examples/employee_home.php">
                                        <i class="material-icons">home</i> Home
                                    </a>
                                </li>
                                <li>
									<a href="../../pages/tables/employee_view_project_list.php">
										<i class="material-icons">library_books</i> Assignments
									</a>
                                </li>
								<li class="active">
                                    <i class="material-icons">details</i> Assignment Details
                                </li>
                            </ol>

                 </div>
                        <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
								<?php
									$project_name = $_GET['project_name'];
									//echo "<label>Project Title:</label>" ;
									echo 'ASSIGNMENT : ';

									echo '<font color= "red">' .$project_name. '</font>';
								?>
                            </h2>

                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">details</i> Details
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">assignment</i> Task
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#messages_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">chat_bubble_outline</i> Discussion
                                    </a>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                    <b>

									</b>

                                    <p>
                                    <!-- Basic Table -->
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="card">
											   <!-- <div class="header">
													<h2>
														<?php
																$project_name = $_GET['project_name'];
																//echo "<label>Project Title:</label>" ;
																echo $project_name;
															?>
													</h2>

												</div> -->
												<div class="body table-responsive">
													<table class="table">

														<tbody>

																 <?php
																	$con=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task");
																	$project_id = $_GET['project_id'];

																	if (mysqli_connect_errno())
																	  {
																	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
																	  }


																	$sql = "SELECT project.project_id, project.project_name, project.project_description,
																			project.project_date_created, project.project_due_date, project.project_status, employee.employee_id,
																			employee.employee_name, task.employee_id,
																			GROUP_CONCAT( DISTINCT employee.employee_name ) AS pic
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
																			echo "<tr>";
																				echo "<th>ID</th>";
																				echo "<td>" . $row["project_id"]. "</td>";
																			echo "</tr>";

																			echo "<tr>";
																				echo "<th>Title</th>";
																				echo "<td>" . $row["project_name"]. "</td>";
																			echo "</tr>";

																			echo "<tr>";
																				echo "<th>Description</th>";
																				echo "<td>" . $row["project_description"]. "</td>";
																			echo "</tr>";

																			echo "<tr>";
																				echo "<th>Start Date</th>";
																				echo "<td>" . $row["project_date_created"]. "</td>";
																			echo "</tr>";

																			echo "<tr>";
																				echo "<th>Due Date</th>";
																				echo "<td>" . $row["project_due_date"]. "</td>";
																			echo "</tr>";

																			echo "<tr>";
																				echo "<th>Status</th>";
																				echo "<td>" . $row["project_status"]. "</td>";
																			echo "</tr>";

																			echo "<tr>";
																				echo "<th>Staff (PIC)</th>";
																				echo "<td>" . $row["pic"]. "</td>";
																			echo "</tr>";


																		}
																	} else {
																		echo "0 results";
																	}
																	$con->close();
																?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- #END# Basic Table -->
                                    </p>
                                </div>



                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    <!--<b>Profile Content</b>-->
                                    <p>
									<!-- Exportable Table -->
										<div class="row clearfix">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="card">

													<div class="body">

														<table class="table table-bordered table-striped table-hover dataTable js-exportable">
															<thead>
																<tr>
																	<!--<th width="5%">No.</th>-->
																	<th width="25%">Tasks</th>
																	<th width="15%">Start Date</th>
																	<th width="15%">Due Date</th>
																	<th width="15%">Status</th>
																	<th width="25%">Issues</th>
																	<th width="25%">Solutions</th>
																	<th width="15%">Action</th>
																</tr>
																</tr>
															</thead>

															<tbody>
																<?php
																$conn=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task");

																if (mysqli_connect_errno())
																  {
																  echo "Failed to connect to MySQL: " . mysqli_connect_error();
																  }

																$abc=$_SESSION['employee_id'];
																$sql = "SELECT task.task_id,task.task_title, task.task_status, task.task_created, task.task_due_date, task.task_description, task.task_comment, project.project_id, project.project_name, employee.employee_id
																		FROM task,project, employee
																		WHERE task.project_id = project.project_id
																		AND task.employee_id = employee.employee_id
																		AND task.employee_id = '$abc'
																		AND task.project_id =  '$project_id'";
																$result = $conn->query($sql);
																if ($result->num_rows > 0) {
																	// output data of each row
																	$x=1;
																	while($row = $result->fetch_assoc()) {
																		$task_id = $row['task_id'];
																		$task_title = $row['task_title'];
																		$project_name = $row['project_name'];
																		$task_status = $row['task_status'];
																		
																		
																		if($task_status == 'Delayed'){
																			$alert = "<div class='badge bg-red'>
																			<strong>$task_status</strong> 
																			</div>";
																			
																		}else if($task_status == 'In Progress'){
																			$alert = "<div class='badge bg-blue'>
																			<strong>$task_status</strong> 
																			</div>";
																			
																		}else {
																			$alert = $alert = "<div class='badge bg-green'>
																			<strong>$task_status</strong> 
																			</div>";	
																			}

																		$task_created = $row['task_created'];
																		$task_due_date = $row['task_due_date'];
																		$task_description = $row['task_description'];
																		$task_comment = $row['task_comment'];
																		/*echo "<tr>
																			  <td>$x</td>
																			  <td>$task_title</td>
																			  <td>$task_created</td>
																			  <td>$task_due_date</td>
																			  <td>$task_status</td>
																			  <td>$task_description</td>
																			  <td>$task_comment</td>
																			"; */
																?>

																			<tr>
																			<!--<td><?php echo $x; ?></td>-->
																			<td><?php echo $task_title; ?></td>
																			<td><?php echo $task_created; ?></td>
																			<td><?php echo $task_due_date; ?></td>
																			<td><?php echo $alert; ?></td>
																			<td><?php echo nl2br($task_description); ?></td>
																			<td><?php echo nl2br($task_comment); ?></td>
																<td>
																	<div>
																		<a href="#defaultModal<?php echo $task_id;?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>
																		<a href="#delete<?php echo $task_id;?>" data-toggle="modal"><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></a>
																		<a href="#complete<?php echo $task_id;?>" data-toggle="modal"><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button></a>

																	</div>
																</td> 



																 <!-- Update Task List -->
																			<div class="modal fade" id="defaultModal<?php echo $task_id; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel">UPDATE TASK</h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="edit_task_id" value="<?php echo $task_id; ?>">
															<input type="hidden" name="edit_employee_id" value="<?php echo $employee_id;  ?>">
														
															<div class="row clearfix">
																							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																								<label for="task_title">Task Details</label>
																							</div>
																							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																								<div class="form-group">
																									<div class="form-line">
																										<input type="text" id="task_title" name="task_title" value="<?php echo $task_title; ?>" class="form-control" placeholder="Enter Tasks Title" required>
																									</div>
																								</div>
																							</div>
																						</div>

																						<div class="row clearfix">
																							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																								<label for="task_due_date">Due Date</label>
																							</div>
																							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																								<div class="form-group">
																									<div class="form-line">
																										<input type="date" id="task_due_date" name="task_due_date" value="<?php echo $before30=date('Y-m-d', strtotime("$task_due_date")); ?>" class="form-control date" placeholder="Ex: 30/07/2018">
																									</div>
																								</div>
																							</div>
																						</div>

																						<div class="row clearfix">
																							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																								<label for="task_description">Issues</label>
																							</div>
																							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																								<div class="form-group">
																									<div class="form-line">
																									<textarea name="task_description" id="task_description" cols="30" rows="5" class="form-control no-resize" placeholder="Enter Issues"><?php echo $task_description; ?></textarea>
																									</div>
																								</div>
																							</div>
																						</div>
																						
																						<div class="row clearfix">
																							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																								<label for="task_comment">Solutions</label>
																							</div>
																							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																								<div class="form-group">
																									<div class="form-line">
																									<textarea name="task_comment" id="task_comment" cols="30" rows="5" class="form-control no-resize" placeholder="Enter Correction Action"><?php echo $task_comment; ?></textarea>
																									</div>
																								</div>
																							</div>
																						</div>
															
															<div class="modal-footer">
																<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																<button type="submit" class="btn btn-success waves-effect" name="update_task"><span class="glyphicon glyphicon-edit"></span>SAVE</button>
															</div>
														</form>													
													</div>
												</div>
											</div>
										</div>
										
										
									 <!-- Delete Task List -->
										<div class="modal fade" id="delete<?php echo $task_id; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel">DELETE TASK</h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="delete_id" value="<?php echo $task_id; ?>">
															
																<p><strong>Are you sure you want to delete <?php echo $task_title; ?> ?</strong></p>
															
															
															<div class="modal-footer">
																<button type="button" class="btn btn-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																<button type="submit" class="btn btn-success waves-effect" name="delete"><span class="glyphicon glyphicon-trash"></span>DELETE TASK</button>
															</div>
														</form>													
													</div>
												</div>
											</div>
										</div>
										
										
									<!-- Complete Task List -->
										<div class="modal fade" id="complete<?php echo $task_id; ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel">Completed Task</h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="edit_task_complete" value="<?php echo $task_id; ?>">
															
																<p><strong>Change status <?php echo $task_title; ?> to <font color = 'blue'>Completed</font>?</strong></p>
															
															
															<div class="modal-footer">
																<button type="button" class="btn btn-info waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>Close</button>
																<button type="submit" class="btn btn-success waves-effect" name="complete"><span class="glyphicon glyphicon-ok"></span>Completed</button>
															</div>
														</form>													
													</div>
												</div>
											</div>
										</div>
									
									
									<?php
									$x++;}
									
									//Update Task
									if(isset($_POST['update_task'])){
										$edit_task_id = $_POST['edit_task_id'];
										//$task_id = $_POST['task_id'];
										//$edit_employee_id = $_POST['edit_employee_id'];
										$project_name = $_POST['project_name'];
										$task_title = $_POST['task_title'];
										$task_due_date = $_POST['task_due_date'];
										$task_description = $_POST['task_description'];
										$task_comment = $_POST['task_comment'];
										$sql = "UPDATE task SET 
											task_title='$task_title',
											task_due_date='$task_due_date',
											task_description='$task_description',
											task_comment='$task_comment'
										   WHERE task_id='$edit_task_id' ";
										if ($conn->query($sql) === TRUE) {
											echo "<script>alert('*Updated*');window.location.href='javascript:history.back(-1);'</script>";
										} else {
											echo "Error updating record: " . $conn->error;
										}
									}
									
									//Complete Task
									if(isset($_POST['complete'])){
										$edit_task_complete = $_POST['edit_task_complete'];
										//$task_id = $_POST['task_id'];
										//$edit_employee_id = $_POST['edit_employee_id'];
										$project_name = $_POST['project_name'];
										$task_title = $_POST['task_title'];
										$task_due_date = $_POST['task_due_date'];
										$task_description = $_POST['task_description'];
										$task_comment = $_POST['task_comment'];
										$sql = "UPDATE task SET 
											task_status='Completed'
											
										   WHERE task_id='$edit_task_complete' ";
										if ($conn->query($sql) === TRUE) {
											echo "<script>alert('*Completed*');window.location.href='javascript:history.back(-1);'</script>";
										} else {
											echo "Error updating record: " . $conn->error;
										}
									}
									
									
									// Delete Task
									if(isset($_POST['delete'])){
										
										$delete_id = $_POST['delete_id'];
										$sql = "DELETE FROM task WHERE task_id='$delete_id' ";
										if ($conn->query($sql) === TRUE) {
											echo '<script>window.location.href="employee_open_task.php"</script>';
											} else {
												echo "Error deleting record: " . $conn->error;
											}
										} 
									
								}
								
																?>


															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- #END# Exportable Table -->
										</p>

									</div>



								<div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                                    <center><font color = 'green'><b>CHAT WITH YOUR TEAM MEMBERS!</b></font></center>
                                    <p>
									<!-- Basic Example -->

									<?php
									$con=mysqli_connect("mytaskdb.cxqaqsbao9lc.ap-southeast-1.rds.amazonaws.com","mastermaster","mastermaster","task");

									if (mysqli_connect_errno())
									  {
									  echo "Failed to connect to MySQL: " . mysqli_connect_error();
									  }

									$project_idd = $_GET['project_id'];
									$select = "SELECT employee_id from task where project_id = $project_idd";
									$result = $con->query($select);
									while($rows = $result->fetch_assoc()){
										$employeeid = $rows["employee_id"];

										if ($employeeid == $employee_id){
									?>
												<div class="row clearfix">
													<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12" >
														<div class="card">

															<div class="body">
															<div class="scroll-box">
															<div id="news" onload="GetNews()"></div>
															</div>
															<script>
															function GetNews() {
																$.ajax({
																	url: "loaddata.php?id=<?php echo $_REQUEST['project_id']; ?>",
																	success: (function (result) {
																		$("#news").html(result);
																	})
																})
															};

															GetNews(); // To output when the page loads
															setInterval(GetNews, (2 * 1000)); // x * 1000 to get it in seconds
															</script>

															<form class="form-align" id = "form">
																<div class="input-group">
																	<input type="hidden" name="user" value="<?php echo $employee_id; ?>">
																	<div class="form-line">
																		<input type="text" name="message" class="form-control" placeholder = "Type your message here" >
																	</div>
																	<input type="hidden" name="project_id" class="form-control" value="<?php echo $_REQUEST['project_id']; ?>">
																	<span class="input-group-btn">
																	<button type="submit" name="submit" class="btn btn-success">SEND</button>
																	</span>
																</div>
															</form>
															<script>
															  $(function () {
																$('#form').on('submit', function (e) {
																  e.preventDefault();
																  $.ajax({
																	type: 'post',
																	url: 'post.php',
																	data: $('#form').serialize(),
																  });
																});
															  });
															</script>




															</div>
														</div>
													</div>
												</div>
												<!-- #END# Basic Example -->
												</p>
												<?php
												break;
												}
												/*elseif($employeeid != $employee_id){
												echo '<div class="alert alert-warning">';
												echo "Sorry! Not part of project team";
												echo '</div>';

												break;
												}*/
												}
												?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->

				<!-- Update Password -->
										<div class="modal fade" id="changepass" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title" id="defaultModalLabel">Change Password</h4>
													</div>
													<div class="modal-body">

														<form method="post" class="form-horizontal" role="form">
															<input type="hidden" name="edit_id" value="<?php echo $employee_id; ?>">


															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="employee_password">Current Password</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="password" id="employee_password" name="employee_password" value="" class="form-control" placeholder="Enter Current Password">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="password1">New Password</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="password" id="password1" name="password1" value="" class="form-control" placeholder="Enter New Password">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row clearfix">
																<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
																	<label for="password2">Confirm Password</label>
																</div>
																<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
																	<div class="form-group">
																		<div class="form-line">
																			<input type="password" id="password2" name="password2" value="" class="form-control" placeholder="Enter Confirm Password">
																		</div>
																	</div>
																</div>
															</div>
																<input type="hidden" name="employee_id" value="<?php echo $_SESSION['employee_id']; ?>"  />

															<div class="modal-footer">
																<button type="button" class="btn btn-bg-grey waves-effect" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>CLOSE</button>
																<button type="submit" class="btn btn-success waves-effect" name="update_password"><span class="glyphicon glyphicon-edit"></span>UPDATE</button>
															</div>

														<?php

															if(isset($_POST['update_password'])){
																$host = "localhost";
																$user = "root";
																$pass = "";
																$db = "task";

																$employee_id = mysqli_real_escape_string($con,$_POST['employee_id']);
																$password1 = mysqli_real_escape_string($con,$_POST['password1']);
																$password2 = mysqli_real_escape_string($con,$_POST['password2']);
																$employee_password = mysqli_real_escape_string($con,$_POST['employee_password']);

																$select = "SELECT * FROM employee WHERE employee_id = '$employee_id' ";
																$result = $con->query($select);
																while($row = $result->fetch_assoc()){
																	$password = $row["employee_password"];
																}

																if($employee_password == $password){
																	if($password1===$password2){

																		$query = "UPDATE employee SET employee_id= '$employee_id', employee_password='$password1' WHERE  employee_id='$employee_id'  ";
																		echo "<script type = \"text/javascript\">
																					alert(\"Password Updated\");

																				</script>";
																		$result = $con->query($query);
																	}
																	else{
																		echo "<script type = \"text/javascript\">
																					alert(\"Password Not Match\");
																					window.location = (\"../../pages/examples/employee_home.php\")
																				</script>";
																	}
																}
																else{
																	echo "<script type = \"text/javascript\">
																					alert(\"Wrong Password\");
																					window.location = (\"../../pages/examples/employee_home.php\")
																				</script>";
																}
															}
														?>

														</form>
													</div>
												</div>
											</div>
										</div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>
