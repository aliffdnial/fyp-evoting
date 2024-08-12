<?php
//Include authentication
require("auth.php");

//Include database connection
require("config/db.php");

//Include class Voting
require("classes/Voting.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title> Online Voting System </title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
rel="stylesheet">

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

<!-- Nav Item - Voting -->
<li class="nav-item active">
	<a class="nav-link" href="voting.php">
		<i class="fas fa-vote-yea"></i>
		<span>VOTING</span></a>
</li>

<!-- Nav Item - Results -->
<li class="nav-item">
	<a class="nav-link" href="vote_result.php">
		<i class="fas fa-fw fa-poll"></i>
		<span>RESULTS</span></a>
</li>

<!-- Nav Item - Profile -->
<li class="nav-item">
	<a class="nav-link" href="profile.php">
		<i class="fas fa-fw fa-user-alt"></i>
		<span>PROFILE</span></a>
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
		<h1 class="h3 mb-0 text-gray-800">VOTING PAGE</h1>
	</div>

	<!-- Content Row -->
	
	<!-- Checks for a variable "organization" in the URL, return
	true if organization is a parameter that gets passed to GET Array -->
	<?php
	if(isset($_GET['organization'])) {
		$org = $_GET['organization'];
	}
	?>
	
	<!-- Prepare statement to read position from database -->
	<?php
	$readPos = new Voting();
	$rtnReadPos = $readPos->READ_POSITION($org);
	/*Will assign readPos to rtnReadPos where readPos refers to READ_POSITION in Voting class
	under classes/Voting.php which will read the position that exists in database */
	?>
	<div class="row">
		<!-- Area For Display -->
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">VOTING</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area" style="height:1500px;">
					<br><br>
					<?php if($rtnReadPos) { ?>
					<div class="col-md-6 col-md-offset-3">
					<!-- Prepare variable to submit when click Vote button -- Statement to check if voter have votes already or not -->
						<?php
						if(isset($_POST['vote'])) {
						$org            = trim($_POST['org']);
						$pos            = trim($_POST['pos']);
						$candidate_id   = trim($_POST['id']);
						$voters_id       = trim($_POST['voter_id']);

						$insertVote = new Voting();
						$rtnInsertVote = $insertVote->VOTE_NOMINEE($org, $pos, $candidate_id, $voters_id);
						/*Will assign insertVote to rtnInsertVote where insertVote refers to VOTE_NOMINEE in Voting class
						under classes/Voting.php which will submit the vote of voters together with the candidate id & voter id into database */
						}
						?>
						<div class="voting-con"><h4 style="text-align: center;"><?php echo $org; //Print Organization Name ?> Voting Page</h4><hr />
						<?php while($rowPos = $rtnReadPos->fetch_assoc()) { ?>
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
							<p class="help-block"><b><?php echo $rowPos['pos']; //Print Position to be compete ?></b></p>
								<?php
								$readNominee = new Voting();
								$rtnReadNominee = $readNominee->READ_NOMINEES($org, $rowPos['pos']); //Display Nominee that compete in each Position
								/*Will assign readNominee to rtnReadNominee where readNominee refers to READ_NOMINEES in Voting class
								under classes/Voting.php which will read the nominee that exists in database */
								?>
								<?php $dis = $_SESSION["district"]; //Assign session district to variable $dis?>
								<?php if($_SESSION["district"] == "Shah Alam" || "Bukit Jelutong" || "Kota Kemuning") {?>	
								 <div class="card-body">
								 <?php
									$conn = mysqli_connect("localhost","root","","evoting");
									
									$query = "select * from nominee where district = '".$dis."' ";
									$query_run = mysqli_query($conn,$query);
									//Query to select nominee that have the same district with the voter
								 ?>
								<table class="table">
									<thead>
										<tr>
											<th></th>
											<th> ID </th> <!-- Header for ID -->
											<th> Party </th> <!-- Header for Party -->
											<th> Name  </th> <!-- Header for Name -->
											<th> Age </th> <!-- Header for Age -->
											<th> Education </th> <!-- Header for Education -->
											<th> Manifesto </th> <!-- Header for Manifesto -->
											<th> Image </th> <!-- Header for Image -->
										</tr>
									</thead>
									<tbody>
									<?php
										if(mysqli_num_rows($query_run) > 0) //record is there or not
										{
											foreach($query_run as $row)
											{
												?>
													<tr>
														<td><input type="radio" name="id" value="<?php echo $row['id'];?>" required></td>
														<td><?php echo $row['id']; ?></td>
														<td><?php echo $row['party'];//Party?> <br><img src="<?php echo $row['logo']; //Logo?>" width="100px";></td>
														<td><?php echo $row['name']; //Name?></td>
														<td><?php echo $row['age']; //Age?></td>
														<td><?php echo $row['education']; //Education?></td>
														<td><?php echo $row['manifesto']; //Manifesto?></td>
														<td><img src="<?php echo $row['image']; //Image?>" width="150px";></td>
													</tr>
												<?php
											}
										}
										else
										{
											?>
											<tr>
												<td> No Records Available </td>
											</tr>
											<?php
										}
									?>
									</tbody>
								</table>
								 </div>
								 <?php
									}
								 ?>
								<input type="hidden" name="org" value="<?php echo $org; ?>">
								<input type="hidden" name="pos" value="<?php echo $rowPos['pos']; ?>">
								<input type="hidden" name="voter_id" value="<?php echo $_SESSION['ID']; ?>">
								
							<!-- To Check User have cast their vote or not -->
							<?php
							$validateVote = new Voting();
							$rtnValVote = $validateVote->VALIDATE_VOTE($org, $rowPos['pos'], $_SESSION['ID'])
							/*Will assign validateVote to rtnValVotertnValVote where validateVote refers to VALIDATE_VOTE in Voting class
							under classes/Voting.php which will check in the database whether the voters have cast their vote or not */
							?>
								<button type="submit" name="vote"
										<?php if($rtnValVote->num_rows > 0) { ?>
										<?php echo "class='btn btn-default disabled'>"; //Message error display bcs user have cast their vote before and that result num_rows to return 0?>
										<?php } else { ?>
										<?php echo "class='btn btn-info' >";//Succcess message display that user successfully cast their vote?>
										<?php } //End if ?>
									Vote
								</button>
						</form><hr />
						<?php } //End while ?>
						</div>
					</div>
					<?php } //End if ?>
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