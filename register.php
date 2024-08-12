<?php
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

<title> EVOTING :: REGISTER </title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<!-- Background Color of Blue -->
<body class="bg-gradient-primary">

<div class="container">
<div class="card o-hidden border-0 shadow-lg my-5"><!-- For White Card on Register -->
	<div class="card-body p-0">
		<!-- Nested Row within Card Body -->
		<div class="row">
			<div class="col-lg-5 d-none d-lg-block bg-register-image"></div><!-- For Image on the left side -->
			<div class="col-lg-7">
				<div class="p-5"> <!-- Spacing between the text in the white card -->
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">Create an Account !</h1>
					</div>
					<form method="POST" action="registerSubmit.php" role="form">
						<!-- To Insert Username -->
						<div class="form-group row">
							<div class="col-sm-10 mb-3 mb-sm-0">
								<label for="name">Username</label>
								<input required type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
							</div>
						</div>
						<!-- To Insert Email -->
						<div class="form-group row">
							<div class="col-sm-10 mb-3 mb-sm-0">
								<label for="email">Email</label>
								<input required type="email" name="email" class="form-control" placeholder="Email" autocomplete="off">
							</div>
						</div>
						<!-- To Insert Password -->
						 <div class="form-group row">
							<div class="col-sm-10 mb-3 mb-sm-0">
								<label for="password">Password</label>
								<input required type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
							</div>
						</div>
						<!-- To Insert Full Name -->
						<div class="form-group row">
							<div class="col-sm-10 mb-3 mb-sm-0">
								<label for="name">Full Name</label>
								<input required type="text" name="name" class="form-control" placeholder="Full Name" autocomplete="off">
							</div>
						</div>
						<!-- To Select User Type -->
						<div class="form-group row">
							<div class="col-sm-10 mb-3 mb-sm-0">
								<label for="usertype">User Type</label>
								<br>
								<select name="usertype" required>
									<option value=""> - Please choose -</option>
									<option value="User">User</option>
									<!--<option value="Admin">Admin</option>-->
								</select>
							</div>
						</div> 
						<!-- To Select District -->
						<div class="form-group row">
							<div class="col-sm-10 mb-3 mb-sm-0">
								<label for="district">District</label>
								<br>
								<select name="district" required>
									<option value=""> - Please choose -</option>
									<option value="Shah Alam">Shah Alam</option>
									<option value="Bukit Jelutong">Bukit Jelutong</option>
									<option value="Kota Kemuning">Kota Kemuning</option>
									<!--<option value="Admin">Admin</option>-->
								</select>
							</div>
						</div>
						<!--<div class="form-group row">
							<div class="col-sm-10 mb-3 mb-sm-0">
								<label for="district">District</label>
								<input required type="text" name="district" class="form-control" placeholder="ex: Shah Alam / Bukit Jelutong / Kota Kemuning" autocomplete="off">
							</div>
						</div> -->
						<!-- To Submit Form-->
						<div class="form-group-sm">
							<input type="submit" name="register" value="Register" class="btn btn-info" style="margin-left:360px;">
						</div>
					</form>
					<hr>
					<!-- To Login page after creating an account -->
					<div class="text-center">
						<a class="small" href="index.php">Already have an account? Login !</a>
					</div>
				</div>
			</div>
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