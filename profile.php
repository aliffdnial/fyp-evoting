<?php
//Include authentication
require("auth.php");

//Include database connection
require("config/db.php");
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
	<li class="nav-item">
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
	<li class="nav-item active">
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

<!-- Topbar Search -->
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
<h1 class="h3 mb-0 text-gray-800">PROFILE</h1>
</div>

<!-- Content Row -->
<div class="row">

<!-- Area For Display -->
<div class="col-xl-12 col-lg-7">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">PROFILE</h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
			<div class="chart-area" style="height:400px;">
				<div class="col-md-8">
					<?php $id=$_SESSION['ID']; ?>
					<div class="table-responsive">
						<table class="table table-bordered table-condensed table-striped">
							<tr>
								<th>Username</th> <!-- Header for Username -->
								<th>Email</th> <!-- Header for Email -->
								<th>Password</th> <!-- Header for Password -->
								<th>Name</th> <!-- Header for Name -->
								<th>User Type</th> <!-- Header for User Type -->
								<th>District</th> <!-- Header for District -->
								<th><i class="far fa-edit"></i></th>
							</tr>
							<tr>
								<td><?php //Display Username of user
								$sql1 = "SELECT username FROM user where id=$id ";
								$result1 = $db->query($sql1);
								
								if (mysqli_num_rows($result1) > 0) {
								// output data of each row
								while($row1 = mysqli_fetch_assoc($result1)) {
									echo $row1['username']; 
									}
								}?></td>
								
								<td><?php //Display Email of user
								$sql1 = "SELECT email FROM user where id=$id ";
								$result1 = $db->query($sql1);
								
								if (mysqli_num_rows($result1) > 0) {
								// output data of each row
								while($row1 = mysqli_fetch_assoc($result1)) {
									echo $row1['email']; 
									}
								}?></td>
								
								<td><?php //Display Password of user
								$sql1 = "SELECT password FROM user where id=$id ";
								$result1 = $db->query($sql1);
								
								if (mysqli_num_rows($result1) > 0) {
								// output data of each row
								while($row1 = mysqli_fetch_assoc($result1)) {
									echo $row1['password']; 
									}
								}?></td>
								
								<td><?php //Display Name of user
								$sql1 = "SELECT name FROM user where id=$id ";
								$result1 = $db->query($sql1);
								
								if (mysqli_num_rows($result1) > 0) {
								// output data of each row
								while($row1 = mysqli_fetch_assoc($result1)) {
									echo $row1['name']; 
									}
								}?></td>
								
								<td><?php //Display Usertype of user
								$sql1 = "SELECT usertype FROM user where id=$id ";
								$result1 = $db->query($sql1);
								
								if (mysqli_num_rows($result1) > 0) {
								// output data of each row
								while($row1 = mysqli_fetch_assoc($result1)) {
									echo $row1['usertype']; 
									}
								}?></td>
								
								<td><?php //Display District of user
								$sql1 = "SELECT district FROM user where id=$id ";
								$result1 = $db->query($sql1);
								
								if (mysqli_num_rows($result1) > 0) {
								// output data of each row
								while($row1 = mysqli_fetch_assoc($result1)) {
									echo $row1['district']; 
									}
								}?></td>
								<td><a href="editprofile.php?id=<?php echo $id; ?>"><i class="far fa-edit"></i></a></td>
								<!-- For User to edit their details -->
							</tr>
						</table>
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