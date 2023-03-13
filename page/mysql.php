<?php
$host = "Localhost";
$username = "root";
$password = "";
$db = "assignment_3";
$conn = new mysqli($host,$username,$password,$db);
if($conn->connect_errno != 0){
    die("Connection Failed: " .$conn->connect_error);
}

?>