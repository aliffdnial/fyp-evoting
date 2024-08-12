<?php
//Start session
session_start();
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
<br><br><br><br><br>
	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-50 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5"><!-- For White Card on Register -->
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-password-image"></div><!-- For Image on the left side -->
						<div class="col-lg-6">
							<div class="p-5"><!-- Spacing between the text in the white card -->
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
									<p class="mb-4">We get it, stuff happens. Just enter your email address below
										and we'll direct you to the reset your password page!</p>
								</div>
								<!-- Called Error Message from classes/login.php -->
								<?php
									if(isset($_SESSION['ERROR_MSG_ARR']) && is_array($_SESSION['ERROR_MSG_ARR']) && COUNT($_SESSION['ERROR_MSG_ARR']) > 0) 
									{
										foreach($_SESSION['ERROR_MSG_ARR'] as $msg) 
										{
											echo "<div class='alert alert-danger'>";
											echo $msg;
											echo "</div>";
										}
										unset($_SESSION['ERROR_MSG_ARR']);
									}?>
									<form method="post" action="process/login.php" role="form">
									<!-- To Insert Email -->
										<div class="form-group has-feedback">
											<label for="email">Email</label>
											<input type="email" name="email" id="email" class="form-control" autocomplete="off">
											<span class="glyphicon glyphicon-user form-control-feedback"></span>
										</div>
										<!-- To Submit Form to process/login.php -->
										<div class="form-group">
											<input type="submit" name="reset" value="Reset Password" class="btn btn-info" style="margin-left:290px;">
										</div>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="index.php">Go Back</a>
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

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>
</html>