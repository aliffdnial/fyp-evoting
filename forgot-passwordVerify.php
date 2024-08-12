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
								<?php
								//these codes is for login process
								//check username & password is matched 

								$email = $_POST['email'];

								require "config.php";

								//create connections with DB
								$link = mysqli_connect($host, $username, $password, $dbname);

								if (!$link) //to check if connection IS NOT OK
								{
									die ("Connection problemo  : " .mysqli_connect_error($link));
								// display MySQL error
								}
								else
								{
									//connect succesfully
									//check username is exist
									
									$queryCheck = "select * from USER where email = '".$email."' ";
									$resultCheck = mysqli_query($link, $queryCheck);  //assign query result to a variable 
									
										if(mysqli_num_rows($resultCheck) == 0) {
											echo "<center><div class='alert alert-danger'>Email doesn't exists
											<br><a href='forgot-password.php'> Insert Email Again !</a></div></center>";
											}
											else
											{
												//in order to asign, use or destroy session
												//calling the session_start() is compulsory 
												session_start();
												//Create session
												session_regenerate_id();
												$_SESSION['email']   = $row["email"];
												session_write_close();
												
												//redirect to page new-password.php
												header("Location:new-password.php");
											}
								}
									mysqli_close($link);
								?>
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