<?php

class Nominees
{
	//Read Nominee by organization from the database
    public function READ_NOM_BY_ORG_POS($org, $pos) {
        global $db;

        $sql = "SELECT *
                FROM nominee
                WHERE nominee.org = ?
                AND nominee.pos = ?";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->bind_param("ss", $org, $pos);
            $stmt->execute();
            $result = $stmt->get_result();//Get data in the database
        }
        $stmt->free_result();
        return $result;//Display the data that have been retrieve
    }
	
	//Count votes that nominee receive
    public function COUNT_VOTES($candidate_id) {
        global $db;

        $sql = "SELECT candidate_id
                FROM votes
                WHERE candidate_id = ?";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->bind_param("i", $candidate_id);
            $stmt->execute();
            $result = $stmt->get_result();//Get data of votes receive in the database
        }
        $stmt->free_result();
        return $result;//Display the data of votes receive
    }
	
	/*
	//Insert Nominee into database
    public function INSERT_NOMINEE($org, $pos, $party, $logo, $name, $age, $education, $manifesto, $district, $image) {
        global $db;
        //Check to see if the nominee already exists in the database.
        $sql = "SELECT *
                FROM nominee
                WHERE name = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->bind_param("s", $name);//Get data of nominee in the database
            $stmt->execute();
            $result = $stmt->get_result();
        }
		//Message error for inserting nominee that already exist in database
        if($result->num_rows > 0) {
            echo "<div class='alert alert-danger'>Sorry the nominee you entered already exist in the database</div>";
        } else {
            //Insert nominee into the database
			$sql = "INSERT INTO nominee(org, pos, party, logo, name, age, education, manifesto, district, image)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            if(!$stmt = $db->prepare($sql)) {
                echo $stmt->error;//Check whether data success insert or not
            } else {
                $stmt->bind_param("ssssssssss", $org, $pos, $party, $logo, $name, $age, $education, $manifesto, $district, $image);
				//Insert org,pos, party, logo, name, age, education, manifesto, district, image into database
            }
			//Message Success for inserting nominee in database
            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Nominee was inserted successfully.</div>";
            }
            $stmt->free_result();
        }
        return $stmt;
    }
	
	//Read Nominee from the database
    public function READ_NOMINEE() {
        global $db;
        $sql = "SELECT *
                FROM nominee
                ORDER BY name ASC";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->execute();//Get data of nominee in the database
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result; //Display the data of nominee that have been retrieve
    }
	
	
	//For Edit Nominee
    public function EDIT_NOMINEE($nom_id) {
        global $db;

        $sql = "SELECT *
                FROM nominee
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $nom_id);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }
	
	//For Update after complete editing nominee
    public function UPDATE_NOMINEE($org, $pos, $name, $nom_id) {
        global $db;

        $sql = "UPDATE nominee
                SET org = ?, pos = ?, name = ?
                WHERE id = ? LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("sssi", $org, $pos, $name, $nom_id);
        }
        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Nominee was update successfully. <a href='add_nominee.php'> Go Back !</a></div>";
        }
        $stmt->free_result();
        return $stmt;
    }
	
	//For Delete the nominee from the system/database
    public function DELETE_NOMINEE($nom_id) {
        global $db;

        $sql = "DELETE FROM nominee
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $nom_id);
        }
        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Nominee successfully deleted. <a href='add_nominee.php'> Go Back !</a></div>";
            exit();
        }
        $stmt->free_result();
        return $stmt;
    }*/
}