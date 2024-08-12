<?php
//Include authentication
require("auth.php");

//Include database connection
require("config/db.php");

//Include class Position
require("classes/Position.php");

//Include class Nominees
require("classes/Nominees.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title> Administrator - Online Voting System </title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
		
			<br>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon">
					<img src="logo.png" width="70">
                </div>
                <div class="sidebar-brand-text mx-3"> E-VOTING ORG</div>
            </a>
			
			<br>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
			
            <!-- Nav Item - Home -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>HOME</span></a>
            </li>
			
			<!-- Nav Item - Add Organization -->
            <li class="nav-item">
                <a class="nav-link" href="add_org.php">
                    <i class="fas fa-plus-circle"></i>
                    <span>ADD ORGANIZATION</span></a>
            </li>
			
			<!-- Nav Item - Add Position -->
            <li class="nav-item">
                <a class="nav-link" href="add_pos.php">
                    <i class="fas fa-plus-circle"></i>
                    <span>ADD POSITION</span></a>
            </li>
			
			<!-- Nav Item - Add Nominees -->
            <li class="nav-item">
                <a class="nav-link" href="add_nominee.php">
                    <i class="fas fa-plus-circle"></i>
                    <span>ADD NOMINEES</span></a>
            </li>
			
			<!-- Nav Item - Add Voters -->
            <li class="nav-item">
                <a class="nav-link" href="add_voters.php">
                    <i class="fas fa-plus-circle"></i>
                    <span>ADD VOTERS</span></a>
            </li>
			
			<!-- Nav Item - Vote Results -->
            <li class="nav-item active">
                <a class="nav-link" href="vote_resultAdmin.php">
                    <i class="fas fa-plus-circle"></i>
                    <span>VOTE RESULT</span></a>
            </li>
			
            <!-- Divider -->
            <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
					
                    <!-- Topbar Title -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-2 my-2 my-md-0 mw-100 ">
                        <div class="input-group">
                            <center><h2> ONLINE VOTING SYSTEM </h2></center>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Logout
						</a>
                    </ul>
                </nav>
                <!-- End of Topbar -->
				
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">ADMINISTRATOR VIEW RESULTS</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area For Display -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">VIEW RESULTS</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area" style="height:1700px;">
										<div class="col-md-3">
											<h3>Select Organization</h3><hr>
											<form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET" role="form">
												<div class="form-group">
													<label for="organization">Organization</label>
													<select name="organization" class="form-control">
														<option value=""> -- Select Organization -- </option>
														<?php
															include "config/db.php";  // Using database connection file here
															$records = mysqli_query($db, "SELECT org From organization");  // Use select query here 

															while($row = mysqli_fetch_array($records))
															{
																echo "<option value='". $row['org'] ."'>" .$row['org'] ."</option>";  // displaying data in option menu
															}	
															//Display organization name on the list
														?>  
														</option>
													</select>
												</div>
												<button type="submit" name="submit" class="btn btn-info">Submit</button>
											</form>
										</div>
										<br><br>

										<div class="col-md-9">
											<?php
											if(!isset($_GET['organization'])) {
												echo "<div class='alert alert-warning'>Please select organization and click submit to show vote result.</div>";
											} else {
											$org = $_GET['organization'];
											?>
												<a href="print_result.php?organization=<?php echo $org; ?>" target="_blank"><h3><span class="fas fa-print"></h3></span> </a>
												<h4><?php echo $org; //Organization Name?> Result</h4>
												<hr>

												<?php
												$readPos = new Position();
												$rtnReadPos = $readPos->READ_POS_BY_ORG($org);
												/*Will assign readPos to rtnReadPos where readPos refers to READ_POS_BY_ORG in Position class
												under classes/Position.php which will read the position that exists in the organization in database */
												?>
												
												<?php if($rtnReadPos) { ?>
													<?php while($rowPos = $rtnReadPos->fetch_assoc()) { ?>
													<h5><?php echo $rowPos['pos']; ?></h5>
														<?php
														$readNomOrgPos = new Nominees();
														$rtnReadNomOrgPos = $readNomOrgPos->READ_NOM_BY_ORG_POS($org, $rowPos['pos']);//Display each position below Organization Name
														/*Will assign readNomOrgPos to rtnReadNomOrgPos where readNomOrgPos refers to READ_NOM_BY_ORG_POS in Nominees class
														under classes/Nominees.php which will read the nominee organization and position that exists in database */
														?>
														<div class="table-responsive">
															<?php if($rtnReadNomOrgPos) { ?>
															<table class="table table-condensed table-striped">
																<tr>
																	<th>ID</th> <!-- Header for ID -->
																	<th>Party</th> <!-- Header for Party -->
																	<th>Name</th> <!-- Header for Name -->
																	<th>Age</th> <!-- Header for Age -->
																	<th>Education</th> <!-- Header for Education -->
																	<th>Image</th> <!-- Header for Image -->
																	<th>Votes</th> <!-- Header for Votes -->
																</tr>
																<?php while($rowCountVotes = $rtnReadNomOrgPos->fetch_assoc()) { ?>
																	<?php
																	$countVotes = new Nominees();
																	$rtnCountVotes = $countVotes->COUNT_VOTES($rowCountVotes['id'])
																	/*Will assign countVotes to rtnCountVotes where countVotes refers to COUNT_VOTES in Nominees class
																	under classes/Nominees.php which will display the votes that the nominee received from the voters */
																	?>
																	<tr>
																		<td style="width: 5%;"><?php echo $rowCountVotes['id']; ?></td>
																		<td style="width: 10%;"><?php echo $rowCountVotes['party']; //Party?><br>
																		<img src="<?php echo $rowCountVotes['logo']; //Logo?>" width="100px";></td>
																		<td style="width: 10%;"><?php echo $rowCountVotes['name']; //Name?></td>
																		<td style="width: 10%;"><?php echo $rowCountVotes['age']; //Age?></td>
																		<td style="width: 10%;"><?php echo $rowCountVotes['education']; //Education?></td>
																		<td style="width: 10%;"><img src="<?php echo $rowCountVotes['image']; //Image?>" width="150px";></td>
																		<td style="width: 10%;"><?php echo $rtnCountVotes->num_rows;//Display Total Votes they receives from voters ?></td>
																	</tr>
																<?php } //End while ?>
															</table>
															<br><br>
															<?php $rtnReadNomOrgPos->free(); } //End if ?>
														</div>
													<?php } //End while ?>
												<?php $rtnReadPos->free(); } //End if ?>
											<?php } //End if ?>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Your Website 2021</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="index.php">Logout</a>
			</div>
		</div>
	</div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>
</html>