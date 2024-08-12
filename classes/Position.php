<?php

class Position
{
	//Read Position by organization from the database
    public function READ_POS_BY_ORG($org) {
        global $db;

        $sql = "SELECT *
                FROM positions
                WHERE org = ?";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error; //Check for connection
        } else {
            $stmt->bind_param("s", $org); 
            $stmt->execute();
            $result = $stmt->get_result();//Get data of position according to organization in the database
        }
        $stmt->free_result();
        return $result; //Display the data of position according to organization that have been retrieve
    }
	
	//Insert Position into database
    /*public function INSERT_POS($org, $pos) {
        global $db;
        //Check to see if the position is already inserted
        $sql = "SELECT *
                FROM positions
                WHERE org = ?
                AND pos = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error; //Check for connection
        } else {
            $stmt->bind_param("ss", $org, $pos);
            $stmt->execute();//Get data of position and organization in the database
            $result = $stmt->get_result(); 
        }
		//Message error for inserting position that already exist in database
        if($result->num_rows > 0) {
            echo "<div class='alert alert-danger'>Sorry the position you entered is already inserted in the database.</div>";
        } else {
            //Insert position in the database
            $sql = "INSERT INTO positions(org, pos)VALUES(?, ?)";
            if(!$stmt = $db->prepare($sql)) {
                echo $stmt->error;//Check whether data success insert or not
            } else {
                $stmt->bind_param("ss", $org, $pos); //Insert org & pos into database
            }
			//Message Success for inserting position in database
            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Position was inserted successfully.</div>";
            }
            $stmt->free_result();
        }
        return $stmt;
    }
	
	//Read Position from the database
    public function READ_POS() {
        global $db;
        //Read positions in every organization
        $sql = "SELECT *
                FROM positions
                ORDER BY org ASC";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error; //Check for connection
        } else {
            $stmt->execute();//Get data of position and position in the database
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result; //Display the data of position that have been retrieve
    }
	
	//For Edit Position
    public function EDIT_POS($pos_id) {
        global $db;

        //Edit position
        $sql = "SELECT *
                FROM positions
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $pos_id);
            $stmt->execute();
            $result = $stmt->get_result();
        }
        $stmt->free_result();
        return $result;
    }
	
	//For Update after complete editing position
    public function UPDATE_POS($org, $pos, $pos_id) {
        global $db;

        //Update position
        $sql = "UPDATE positions
                SET org = ?, pos = ?
                WHERE id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("ssi", $org, $pos, $pos_id);
        }

        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Position was updated successfully.<a href='add_pos.php'> Go Back !</a></div>";
        }
        $stmt->free_result();
        return $stmt;
    }
	
	//For Delete the position from the system/database
    public function DELETE_POS($pos_id) {
        global $db;

        //Read positions in every organization
        $sql = "DELETE FROM positions
                WHERE id = ? LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;
        } else {
            $stmt->bind_param("i", $pos_id);
        }

        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Position successfully deleted. <a href='add_pos.php'> Go Back !</a></div>";
            exit();
        }
        $stmt->free_result();
        return $stmt;
    }*/
}