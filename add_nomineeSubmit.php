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

<title> Administrator - Online Voting System </title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<?php
$organization = $_POST['organization'];
$position = $_POST['position'];
$party = $_POST['party'];
$logo = $_POST['logo'];
$name = $_POST['name'];
$age = $_POST['age'];
$education = $_POST['education'];
$manifesto = $_POST['manifesto'];
$district = $_POST['district'];
$image = $_POST['image'];
?>

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
            <li class="nav-item active">
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
            <li class="nav-item">
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
				<h1 class="h3 mb-0 text-gray-800">ADMINISTRATOR ADD NOMINEE</h1>
			</div>

			<!-- Content Row -->
			<div class="row">

			<!-- Area For Display -->
			<div class="col-xl-12 col-lg-7">
				<div class="card shadow mb-4">
					<!-- Card Header -->
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">ADD NOMINEE</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-area" style="height:500px;">
							<?php
							$host = "localhost";
							$username = "root";
							$password = "";
							$dbname = "evoting";

							//create connections with DB
							$hubungan = mysqli_connect($host, $username, $password, $dbname);
							
							$sql="select * from nominee where (name='$name' and party='$party');"; //Check whether nominee already exist in database or not

							$res=mysqli_query($hubungan,$sql);

							if (mysqli_num_rows($res) > 0) {
									$row = mysqli_fetch_assoc($res);
									if($name==isset($row['name']) && $party==isset($row['party']))
									{
										echo "<center><div class='alert alert-danger'>Sorry, the nominee already exists in our database<br> <a href='add_nominee.php'> Go Back !</a></div></center>";
									}
							}else{
								//put query to insert record
								$q1 = "insert into nominee (org,pos,party,logo,name,age,education,
								manifesto,district,image)
								values ('".$organization."','".$position."','".$party."','".$logo."','".$name."','".$age."','".$education."','".$manifesto."','".$district."','".$image."')"; 

								//to execute $q1 query and stored into $resultInsert
								$resultInsert = mysqli_query($hubungan, $q1);
								
								if(!$resultInsert){
									die ("invalid query q1 " . mysqli_error($hubungan));
								}
								else{
									echo "<div class='alert alert-success'>Nominee was inserted successfully.<a href='add_nominee.php'> Go Back!</a></div>";
								}
							}
							?>
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
<?php
//Close database connection
$db->close();