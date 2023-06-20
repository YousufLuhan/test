<?php
//connection
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "student_management";

$connection = new mysqli($serverName,$userName,$password,$databaseName);

//check connection
if($connection->connect_error){
    die("Connection failed!".$connection->connect_error);
}

?>