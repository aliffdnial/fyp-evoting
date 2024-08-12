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
						<div class="chart-area" style="height:4000px;">
							<form method="POST" action="add_nomineeSubmit.php" role="form" enctype="multipart/form-data">
								<div class="form-group-sm">
									<label for="organization">Organization</label><!-- To Select Organization  -->
									<select required name="organization">
										<option value=""> -- Select Organization -- </option>
										<?php
											include "config/db.php";  // Using database connection file here
											$records = mysqli_query($db, "SELECT org From organization");  // Use select query here 

											while($row = mysqli_fetch_array($records))
											{
												echo "<option value='". $row['org'] ."'>" .$row['org'] ."</option>";  
												// displaying data in option menu
											}	
										?>  
									</select>
								</div>
								<br>
								<div class="form-group-sm">
									<label for="position">Position</label><!-- To Select Position  -->
									<select name="position" required>
										<option value=""> -- Select Position -- </option>
										<!-- <option value="A-21 Shah Alam">A-21 Shah Alam</option>
										<option value="B-21 Kota Kemuning">B-21 Kota Kemuning</option>
										<option value="C-21 Bukit Jelutong">C-21 Bukit Jelutong</option>
										<option value="D-21 Kota Raja">D-21 Kota Raja</option> -->
										<?php
											include "config/db.php";  // Using database connection file here
											$records = mysqli_query($db, "SELECT pos From positions");  // Use select query here 

											while($row = mysqli_fetch_array($records))
											{
												echo "<option value='". $row['pos'] ."'>" .$row['pos'] ."</option>";  
												// displaying data in option menu
											}	
										?> 
									</select>
								</div>
								<br>
								<div class="form-group-sm">
									<label for="party">Party</label><!-- To Select from which party  -->
									<select name="party" required>
										<option value=""> -- Select Party -- </option>
										<option value="Awan Menyatu">Awan Menyatu</option>
										<option value="Bintang Menyerlah">Bintang Menyerlah</option>
										<option value="Bulan Purnama">Bulan Purnama</option>
										<option value="Bebas">Bebas</option>
									</select>
								</div>
								<br>
								<div class="form-group-sm">
									<label for="logo">Logo</label><!-- To Insert Party Logo  -->
									<input type="text" name="logo" size="150" maxlength="150" placeholder="Place link of image from the internet">
								</div>
								<br>
								<div class="form-group-sm">
									<label for="name">Name</label><!-- To Insert Name -->
									<input required type="text" name="name" size="30" maxlength="30" placeholder="Full Name" autocomplete="off">
									
								</div>
								<br>
								<div class="form-group-sm">
									<label for="age">Age</label><!-- To Insert Age -->
									<input required type="number" min="20" max="28" name="age" placeholder="Min age 20 / Max age 28">
								</div>
								<br>
								<div class="form-group-sm">
									<label for="education">Education</label><!-- To Select Education -->
									<select name="education" required>
										<option value=""> -- Select Level Of Education -- </option>
										<option value="SPM">SPM</option>
										<option value="Diploma">Diploma</option>
										<option value="Degree">Degree</option>
										<option value="Master">Master</option>
										<option value="PhD">PhD</option>
									</select>
								</div>
								<br>
								<div class="form-group-sm">
									<label for="manifesto">Manifesto</label><br><!-- To Insert Manifesto -->
									<textarea required id="manifesto" name="manifesto" rows="3" cols="100" placeholder="Insert Your Manifesto Here"></textarea>
								</div>
								<br>
								<div class="form-group-sm">
									<label for="district">District</label><!-- To Select which district  -->
									<select name="district" required>
										<option value=""> -- Select District -- </option>
										<option value="Shah Alam">Shah Alam</option>
										<option value="Bukit Jelutong">Bukit Jelutong</option>
										<option value="Kota Kemuning">Kota Kemuning</option>
										<option value="Kota Raja">Kota Raja</option>
									</select>
								</div>
								<br>
								<div class="form-group-sm">
									<label for="image">Image</label><!-- To Insert Image  -->
									<input type="text" name="image" size="150" maxlength="200" placeholder="Place link of image from the internet">
								</div>
								<br>
								<hr/>
								<div class="form-group-sm">
									<input type="submit" name="submit" value="Submit" class="btn btn-info">
								</div>
							</form>
							<br><br>
							<!-- Table of display -->
							<div class="col-md-10">
							<h4>List of Nominees</h4><hr>
							<?php
							$conn = mysqli_connect("localhost","root","","evoting");
							$query = "select * from nominee ORDER BY pos,name ASC";
							$query_run = mysqli_query($conn,$query);
							//Query to display nominee that exists in database
							?>
							<div class="table-responsive">
								<table class="table table-bordered table-condensed table-striped">
									<tr>
										<th>Organization</th> <!-- Header for Organization -->
										<th>Position</th> <!-- Header for Position -->
										<th>Party</th> <!-- Header for Party -->
										<th>Name</th> <!-- Header for Name -->
										<th>Age</th> <!-- Header for Age -->
										<th>Education</th> <!-- Header for Education -->
										<th>Manifesto</th> <!-- Header for Manifesto -->
										<th>District</th> <!-- Header for District -->
										<th>Image</th> <!-- Header for Image -->
										<th><i class="far fa-edit"></i></th>
										<th><i class="far fa-trash-alt"></i></th>
									</tr>
									<?php
									if(mysqli_num_rows($query_run) > 0) //record is there or not
									{
										foreach($query_run as $row)
										{
										?>
									<tr>
										<td><?php echo $row['org']; //Organization Name ?></td>
										<td><?php echo $row['pos']; //Position ?></td>
										<td><?php echo $row['party'];//Party?> <br><img src="<?php echo $row['logo']; //Logo?>" width="100px";></td>
										<td><?php echo $row['name']; //Name of Nominees ?></td>
										<td><?php echo $row['age']; //Age ?></td>
										<td><?php echo $row['education']; //Education ?></td>
										<td><?php echo $row['manifesto']; //Manifesto ?></td>
										<td><?php echo $row['district']; //District ?></td>
										<td><img src="<?php echo $row['image']; //Image?>" width="150px";> </td>
										<td><a href="EditViewNom.php?id=<?php echo $row['id']; //To Edit ?>"><i class="far fa-edit"></i></a></td>
										<td><a href="DeleteViewNom.php?id=<?php echo $row['id']; //To Delete ?>"><i class="far fa-trash-alt"></i></a></td>
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
<?php
//Close database connection
$db->close();