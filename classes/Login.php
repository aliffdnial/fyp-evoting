<?php

/*class Login
{
	private $_username;
    private $_password;

	public function __construct($c_username, $c_password) {
        $this->_username = $c_username;
        $this->_password = $c_password;
    }

    public function LoginUser() {
        global $db;

        //Start session
        session_start();

        //Array to store error message
        $error_msg_array = array();

        //Error messages
        $error_msg = FALSE;
		
		//Need to insert username
		if($this->_username == "") {
            $error_msg_array[] = "Please input your username";
            $error_msg = TRUE;
        }
		
		//Need to insert password
		if($this->_password == "") {
            $error_msg_array[] = "Please input your password";
            $error_msg = TRUE;
        }
		
		//Direct page to index.php if incorrect credentials
		if($error_msg) {
            $_SESSION['ERROR_MSG_ARRAY'] = $error_msg_array;
            header("location: ../index.php");
            exit();
        }
		
		//Checking for credentials in database from user table
		$sql = "SELECT * FROM user WHERE username = ? AND password = ? LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("ss", $this->_username, $this->_password);
            $stmt->execute();
            $result = $stmt->get_result();
        }
		
		//Granted access will redirect to home.php page
		if($result->num_rows > 0) {
            //Login successful
            $row = $result->fetch_assoc();

            //Create session
            session_regenerate_id();
            $_SESSION['ID']   = $row["id"];
            $_SESSION['UName'] = $row["username"];
			$_SESSION["usertype"] = $row["usertype"];
			$_SESSION["district"] = $row["district"];
            session_write_close();

            /*header("location: ../index.php");
			header("location: ../home.php");

        } else {
            //Login failed
            $error_msg_array[] = "The username and password you entered is incorrect.";
            $error_msg = TRUE;

            if($error_msg) {
                $_SESSION['ERROR_MSG_ARR'] = $error_msg_array;
                /*header("location: ../index.php");
				header("location: ../index.php");
                exit();
            }
            $stmt->free_result();
        }
        $result->free();
        return $result;
    }
}*/

class ResetPassword
{
	private $_email;
	
	public function __construct($c_email) {
		$this->_email = $c_email;
	}

	public function ResetPass() {
		global $db;

		//Start session
		session_start();

		//Array to store error message
		$error_msg_array = array();

		//Error messages
		$error_msg = FALSE;
		
		//Need to insert email
		if($this->_email == "") {
			$error_msg_array[] = "Please input your email";
			$error_msg = TRUE;
		}
		
		//Direct page to forgot-password.php if incorrect credentials
		if($error_msg) {
			$_SESSION['ERROR_MSG_ARRAY'] = $error_msg_array;
			header("location: ../forgot-password.php");
			exit();
		}
		
		//Checking for email credentials in database from user table
		$sql = "SELECT email FROM user WHERE email = ? LIMIT 1";
		if(!$stmt = $db->prepare($sql)) {
			echo $stmt->error;
		} else {
			$stmt->bind_param("s", $this->_email);
			$stmt->execute();
			$result = $stmt->get_result();
		}
		
		//Valid email address will redirect to new-password.php page
		if($result->num_rows > 0) {
			//Redirect to reset password
			$row = $result->fetch_assoc();

			//Create session
			session_regenerate_id();
			//$_SESSION['id']   = $row["id"];
			$_SESSION['email']   = $row["email"];
			session_write_close();

			/*header("location: ../index.php");*/
			header("location: ../new-password.php");

		} else {
			//Invalid email address
			$error_msg_array[] = "The email you entered is incorrect. <a href='index.php'> Go Back!</a>";
			$error_msg = TRUE;

			if($error_msg) {
				$_SESSION['ERROR_MSG_ARR'] = $error_msg_array;
				/*header("location: ../index.php");*/
				header("location: ../forgot-password.php");
				exit();
			}
			$stmt->free_result();
		}
		$result->free();
		return $result;
	}
}