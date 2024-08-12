<?php

class Voting
{
    public function READ_ORG() {
        global $db;

        $sql = "SELECT org FROM organization ORDER BY org ASC";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->execute();
            $result = $stmt->get_result();//Get data in the database
        }
        return $result;//Display the data that have been retrieve
    }

	//Read Position from the database
    public function READ_POSITION($org) {
        global $db;

        $sql = "SELECT *
                FROM positions
                WHERE org = ?";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->bind_param("s", $org);
            $stmt->execute();
            $result = $stmt->get_result();//Get data in the database
        }
        $stmt->free_result();
        return $result;//Display the data that have been retrieve
    }
	
	//Read Nominee from the database
    public function READ_NOMINEES($org, $pos) {
        global $db;

        $sql = "SELECT *
                FROM nominee
                WHERE org = ?
                AND pos = ?";
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
	
	//To check whether voters has cast their vote or not
    public function VALIDATE_VOTE($org, $pos, $voters_id) {
        global $db;
        //Check to see if the voter votes already
        $sql = "SELECT *
                FROM votes
                WHERE org = ?
                AND pos = ?
                AND voters_id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->bind_param("ssi", $org, $pos, $voters_id);
            $stmt->execute();
            $result = $stmt->get_result();//Get data in the database
        }
        $stmt->free_result();
        return $result;//Display the data that have been retrieve
    }

	//To check whether nominee have been vote or not
    public function VOTE_NOMINEE($org, $pos, $candidate_id, $voters_id) {
        global $db;

        //Check to see if the voter votes already
        $sql = "SELECT *
                FROM votes
                WHERE org = ?
                AND pos = ?
                AND voters_id = ?
                LIMIT 1";
        if(!$stmt = $db->prepare($sql)) {
            echo $stmt->error;//Check for connection
        } else {
            $stmt->bind_param("ssi", $org, $pos, $voters_id);
            $stmt->execute();
            $result = $stmt->get_result();//Get data in the database
        }

        if($result->num_rows > 0) {
			//Error Message for voting
            echo "<div class='alert alert-danger'>Sorry you voted in that position already.</div>";
        } else {
            //Vote successful.
            $sql = "INSERT INTO votes(org, pos, candidate_id, voters_id)VALUES(?, ?, ?, ?)";
            if(!$stmt = $db->prepare($sql)) {
                echo $stmt->error;
            } else {
                $stmt->bind_param("ssii", $org, $pos, $candidate_id, $voters_id);
            }
			//Message Success for voting
            if($stmt->execute()) {
                echo "<div class='alert alert-success'>Vote successful.</div>";
            }
            $stmt->free_result();
        }
        return $stmt;
    }
}