<?php

$servername = "us-cdbr-iron-east-02.cleardb.net";
	
$username = "b0c12e17f9d7ef";

	$password = "cf353225";
	$dbname = "heroku_27c4863fa7534fa";
	$connect = new mysqli($servername, $username, $password, $dbname);

if($connect->connect_error) 
{	
	die("Connection Failed: " . $connect->connect_error);
}

mysqli_set_charset($connect, 'utf8');

//$connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

?>
