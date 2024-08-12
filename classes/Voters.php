<?php

class Voters
{
	//For Edit Password
	public function EDIT_PASS($voter_id) {
        global $db;
        $sql = "SELECT *
                FROM user
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->bind_param("i", $voter_id);
            $stmt->execute();
            $result = $stmt->get_result();//Get data of user in the database
        }
        $stmt->free_result();
        return $result;//Display the data that have been retrieve
    }
	
	//For Update Password if you forgot your password
	public function UPDATE_PASS($password, $voter_id) {
        global $db;
        $sql = "UPDATE user
                SET password = ? 
                WHERE id = ? LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->bind_param("si", $password, $voter_id);//Insert edited password according to user id into database
        }
		//Message Success for update password in database
        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Password was updated successfully.<a href='./index.php'> Go Back !</a></div>";
        }
        $stmt->free_result();
        return $stmt;
    }
	
	/*
	//Insert Voters into database
    public function INSERT_VOTER($username, $email, $password, $name, $usertype, $district) {
        global $db;
        //Check to see if the voter exists
        $sql = "SELECT *
                FROM user
                WHERE username = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->bind_param("s", $username);//Get data of voters in the database
            $stmt->execute();
            $result = $stmt->get_result();
        }
		//Message error for inserting user that already exist in database
        if($result->num_rows > 0) {
            echo "<div class='alert alert-danger'>Sorry the voter you entered already exists in the database. <a href='add_voters.php'> Go Back !</a></div>";
        } else {
            //Insert voter into database
            $sql = "INSERT INTO user(username, email, password, name, usertype, district)VALUES(?, ?, ?, ?, ?, ?)";
            if(!$stmt = $db->prepare($sql)) {
                echo $stmt->error;//Check whether data success insert or not
            } else {
                $stmt->bind_param("sssss", $username, $email, $password, $name, $usertype, $district);
				//Insert username, email, password, name, usertype, district into database
            }
			//Message Success for inserting voter in database
            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Voter was inserted successfully. <a href='add_voters.php'> Go Back !</a></div>";
            }
            $stmt->free_result();
        }
        return $stmt;
    }
	
	//Register Voters
	public function REGISTER_VOTER($username, $email, $password, $name, $usertype, $district) {
        global $db;
        //Check to see if the voter exists
        $sql = "SELECT *
                FROM user
                WHERE username = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->bind_param("s", $username);//Get data of voters in the database
            $stmt->execute();
            $result = $stmt->get_result();
        }
		//Message error for inserting user that already exist in database
        if($result->num_rows > 0) {
            echo "<div class='alert alert-danger'>Sorry the voter you entered already exists in the database.</div>";
        } else {
            //Register voter into database
            $sql = "INSERT INTO user(username, email, password, name, usertype, district)VALUES(?, ?, ?, ?, ?, ?)";
            if(!$stmt = $db->prepare($sql)) {
                echo $stmt->error;//Check whether data success insert or not
            } else {
                $stmt->bind_param("ssssss", $username, $email, $password, $name, $usertype, $district);
				//Register username, email, password, name, usertype, district into database
            }
			//Message Success for register voter in database
            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Voter was inserted successfully.</div>";
            }
            $stmt->free_result();
        }
        return $stmt;
    }
	
	//Read Voters from the database
    public function READ_VOTERS() {
        global $db;
        $sql = "SELECT *
                FROM user
                ORDER BY name ASC";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->execute();//Get data of voters in the database
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;//Display the data of voters that have been retrieve
    }
	
	//For Edit Voter Details
    public function EDIT_VOTER($voter_id) {
        global $db;

        $sql = "SELECT *
                FROM user
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $voter_id);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }
	
	//For Update after complete editing voter Details
    public function UPDATE_VOTER($username, $email, $password, $name, $usertype,$district, $voter_id) {
        global $db;

        $sql = "UPDATE user
                SET username = ?, email = ?, password = ?, name = ?, usertype = ?, district = ? 
                WHERE id = ? LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("ssssssi", $username, $email, $password, $name, $usertype, $district, $voter_id);
        }

        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Voter was updated successfully.<a href='add_voters.php'> Go Back !</a></div>";
        }
        $stmt->free_result();
        return $stmt;
    }
	
	//For Delete the voter from the system/database
    public function DELETE_VOTER($voter_id) {
        global $db;

        $sql = "DELETE FROM user
                WHERE id = ? LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $voter_id);
        }

        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Voters successfully deleted. <a href='add_voters.php'> Go Back !</a></div>";
            exit();
        }
        $stmt->free_result();
        return $stmt;
    }*/
}