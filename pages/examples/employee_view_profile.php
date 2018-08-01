<!DOCTYPE html>

<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['employee_id'])){
header("location: sign-in.html");
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FlexiCOMM | Employee Profile</title>
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

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />

	<!-- Sweet Alert Css -->
    <link href="../../pages/plugins/sweetalert/sweetalert.css" rel="stylesheet" />




</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-cyan">
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
                                        <a href="../../pages/tables/employee_open_delay_task.php">
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
                             <!--<li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>-->
                        </ul>
                    </li>
                    <!-- #END# Notifications -->

                   <!-- <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li> -->
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
                     <!--<img src="../../images/user.png" width="48" height="48" alt="User" />-->
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
                            <li><a href="employee_update_profile.php"><i class="material-icons">person</i>Edit Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="#changepass" data-toggle="modal"><i class="material-icons">create</i>Edit Password</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="employee_logout.php"><i class="material-icons">input</i>Sign Out</a></li>
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

					<li  class="active">
                        <a href="../../pages/examples/employee_view_profile.php">
                            <i class="material-icons">person</i>
                            <span>Profile</span>
                        </a>
                    </li>

					<li>
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
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
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
									<a href="../../pages/examples/employee_update_profile.php">
									<i class="material-icons">edit</i> Manage Profile
									</a>
								</li>
								<li class="active">
									<i class="material-icons">person</i>View Profile Details
								</li>
						 </ol>
			</div>
        </div>

		<!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Profile Details</h2>

                        </div>
                        <div class="body">

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
							$employee_department=$row['employee_department'];
							$employee_position=$row['employee_position'];
							$employee_email=$row['employee_email'];
							$employee_phoneno=$row['employee_phoneno'];
							$employee_address=$row['employee_address'];

							//$result = $con -> query($sql);

						?>
                            <form id="form_validation" action="update_employee_profile.php" method="post">
                                <div class="form-group form-float">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="employee_name">Name</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<?php echo $employee_name; ?>
											</div>
										</div>
									</div>
                                </div>

								<div class="form-group form-float">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="employee_department">Department</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<?php echo $employee_department; ?>
											</div>
										</div>
									</div>
                                </div>

								<div class="form-group form-float">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="employee_position">Position</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<?php echo $employee_position; ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group form-float">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="employee_email">Email</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<?php echo $employee_email; ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group form-float">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="employee_phoneno">Phone Number</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<?php echo $employee_phoneno; ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group form-float">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="employee_address">Address</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<?php echo $employee_address; ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group" align="right">
									<a href = "employee_update_profile.php" class="btn btn-success waves-effect"><span class="glyphicon glyphicon-edit"></span>UPDATE</button></a>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->



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
																					window.location = (\"employee_home.php\")
																				</script>";
																	}
																}
																else{
																	echo "<script type = \"text/javascript\">
																					alert(\"Wrong Password\");
																					window.location = (\"employee_home.php\")
																				</script>";
																}
															}
														?>

														</form>
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

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

	<!-- Sweet Alert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>

	<!-- Jquery Validation Plugin Css -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>

	<!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/forms/form-validation.js"></script>
</body>

</html>
