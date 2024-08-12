<?php
//Create authentication

//Start session
session_start();

if(!isset($_SESSION['ID'])) {
    header("location: home.php");
    exit();
}