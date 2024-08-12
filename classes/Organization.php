<?php

class Organization
{
	//Read organization from the database
	 /*public function READ_ORG() {
        global $db;
        $sql = "SELECT * FROM organization";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error; //Check for connection
        } else {
            $stmt->execute(); //Get data of organization in the database
            $result = $stmt->get_result();
        }
        return $result; //Display the data of organization that have been retrieve
    }
	
    public function INSERT_ORG($organization) {
        global $db;

        //Check if the organization already exists in the database
        $sql = "SELECT *
                FROM organization
                WHERE org = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("s", $organization);
            $stmt->execute();
            $result = $stmt->get_result();
        }
		//Message error for inserting organization that already exist in database
        if($result->num_rows > 0) {
            echo "<div class='alert alert-danger'>Sorry the organization you are trying to insert already exists in the database.</div>";
        } else {
            //Successfully inserted
            $sql = "INSERT INTO organization(org)VALUES(?)";
            if(!$stmt = $db->prepare($sql)) {
                echo $stmt->error;
            } else {
                $stmt->bind_param("s", $organization);
            }
			//Message Success for inserting organization in database
            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Organization was inserted successfully.</div>";
            }
            $stmt->free_result();
        }
        $result->free();
        return $stmt;
    }
   
	//For Edit Organzation
    public function EDIT_ORG($org_id) {
        global $db;

        $sql = "SELECT *
                FROM organization
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $org_id);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }
	
	//For Update after complete editing organization
    public function UPDATE_ORG($org, $org_id) {
        global $db;

        $sql = "UPDATE organization
                SET org = ?
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("si", $org, $org_id);
        }

        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Organization was update successfully. <a href='add_org.php'> Go Back !</a></div>";
        }
        $stmt->free_result();
        return $stmt;
    }
	
	//For Delete the organization from the system/database
    public function DELETE_ORG($org_id) {
        global $db;

        //Delete organization
        $sql = "DELETE FROM organization
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $org_id);
        }

        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Organization successfully deleted. <a href='add_org.php'> Go Back !</a></div>";
            exit();
        }
        $stmt->free_result();
        return $stmt;
    }*/
}