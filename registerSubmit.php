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
<?php
$usernamez = $_POST['username'];
$email = $_POST['email'];
$passwordz = $_POST['password'];
$name = $_POST['name'];
$usertype = $_POST['usertype'];
$district = $_POST['district'];
?>

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
					<?php
					$host = "localhost";
					$username = "root";
					$password = "";
					$dbname = "evoting";

					//create connections with DB
					$hubungan = mysqli_connect($host, $username, $password, $dbname);
					
					$sql="select * from user where (username='$usernamez' or email='$email');"; //Check whether username and email already exist in database or not
					//$sql="select username,email from user where (username='$usernamez' or email='$email');"; //Check whether username and email already exist in database or not

					$res=mysqli_query($hubungan,$sql);

					if (mysqli_num_rows($res) > 0) {
							$row = mysqli_fetch_assoc($res);
							if($email==isset($row['email']) && $usernamez==isset($row['username']))
							{
								echo "<center><div class='alert alert-danger'>username or email already exists in our database<br> <a href='register.php'> Go Back to register !</a></div></center>";
							}
					}else{
						//put query to insert record
						$q1 = "insert into user (username, email, password, name, usertype, district)
						values ( 
						'".$usernamez."', '".$email."', '".$passwordz."', '".$name."', '".$usertype."','".$district."')"; 

						//to execute $q1 query and stored into $resultInsert
						$resultInsert = mysqli_query($hubungan, $q1);
						
						if(!$resultInsert){
							die ("invalid query q1 " . mysqli_error($hubungan));
						}
						else{
							echo "<div class='alert alert-success'>Voter was inserted successfully.<a href='index.php'> Click Here to Login !</a></div>";
						}
					}
					?>
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