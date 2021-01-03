<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "370project1";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Database Connection Failed";
}

?>
