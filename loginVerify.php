<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title> EVOTING :: Login </title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<!-- Background Color of Blue -->
<body class="bg-gradient-primary">
<br><br><br><br><br>
<div class="container">
	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-xl-50 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5"><!-- For White Card on Register -->
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div><!-- For Image on the left side -->
						<div class="col-lg-6">
							<div class="p-5"><!-- Spacing between the text in the white card -->
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Welcome to Online Voting System !</h1>
								</div>
								<?php
								//these codes is for login process
								//check username & password is matched 

								$usernamez = $_POST['username']; 
								$passwordz = $_POST['password']; 

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
									
									$queryCheck = "select * from USER where username = '".$usernamez."' or password = '".$passwordz."' ";
									$resultCheck = mysqli_query($link, $queryCheck);  //assign query result to a variable 
									
										if(mysqli_num_rows($resultCheck) == 0) {
											echo "<center><div class='alert alert-danger'>Username doesn't exists
											<br><a href='index.php'> Login Again !</a></div></center>";
											}
											else
											{
											$row = mysqli_fetch_array($resultCheck, MYSQLI_BOTH);
											
											if($row["password"] == $passwordz ){
												
												//in order to asign, use or destroy session
												//calling the session_start() is compulsory 
												session_start();
												//Create session
												session_regenerate_id();
												$_SESSION['ID']   = $row["id"];
												$_SESSION['UName'] = $row["username"];
												$_SESSION["usertype"] = $row["usertype"];
												$_SESSION["district"] = $row["district"];
												session_write_close();
												
												//redirect to page home.php
												header("Location:home.php");
												
											}
											else
											{
												echo "<center><div class='alert alert-danger'>Wrong password
												<br><a href='index.php'> Login Again !</a></div></center>";
											}
										}
								}
									mysqli_close($link);
								?>
								<hr>
								<div class="text-center">
									<a class="small" href="register.php">Don't have an account? Register Here!</a>
								</div>
								<!-- To Forgot password page to reset password -->
								<div class="text-center">
									<a class="small" href="forgot-password.php">Forgot your password? Reset Here!</a>
								</div>
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