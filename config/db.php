<?php

//This line of code connects to mysql database
define("host", "localhost");
define("username", "root");
define("password", "");
define("dbname", "evoting");

//$db = new mysqli(host, username, password, dbname);
$db = mysqli_connect(host, username, password, dbname);

//This line of code checks if connection error exists.

//if($db->connect_error)
if(!$db) {
    //echo $db->connect_errno . " " . $db->connect_error;
	die ("Connection problemo  : " .mysqli_connect_error($db));
} else {
    echo "";
}