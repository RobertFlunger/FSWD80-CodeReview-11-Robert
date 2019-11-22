<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cr11_robert_travelmatic";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ( !$conn ) {
	die("Connection failed") . mysqli_connect_error();
} else {
	/*echo "Connected successfully!";*/
}