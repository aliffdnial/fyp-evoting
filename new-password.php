<?php
//Include database connection
require("config.php");

//Include class Voters
require("classes/Voters.php");

//Start session
session_start();
$_SESSION['email'];
if(isset($_SESSION["email"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title> EVOTING :: Forgot Password</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<!-- Background Color of Blue -->
<body class="bg-gradient-primary">
<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">
	
		<div class="col-xl-10 col-lg-12 col-md-9"><br><br><br><br>
			<div class="card o-hidden border-0 shadow-lg my-5"><!-- For White Card on Register -->
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-password-image"></div><!-- For Image on the left side -->
						<div class="col-lg-6">
							<div class="p-5"><!-- Spacing between the text in the white card -->
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
									<p class="mb-4">Please enter your new password down below. Thank You!</p>
								</div>
								<form method="POST" action="password-update.php" role="form">
									<div class="form-group row">
											<div class="col-sm-10 mb-3 mb-sm-0">
												<label for="email">Email: </label>
												<?php echo $_SESSION['email']; //Display email of user that wanted to changed their password ?>
											</div>
									</div>
									
									<div class="form-group row">
									<!-- To Insert New Password that will replace your old password that you forget -->
										<div class="col-sm-10 mb-3 mb-sm-0">
											<label for="password">New Password</label>
											<input required type="password" name="password" class="form-control" placeholder="New Password">
										</div>
									</div>
									<!-- To Submit Form to password-update.php -->
									<div class="form-group-sm">
										<input type="submit" name="update" value="Update" class="btn btn-info" style="margin-left:200px;">
									</div>
								</form>
							</div>
						</div>
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
<?php 
}
else
{
	echo "No session exists or session has expired. Please log in again.<br>";
	echo "<a href=index.php> Login </a>";
}
?>