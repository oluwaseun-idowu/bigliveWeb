<?php 
// Database configuration 
$dbHost     = "localhost";  //  your hostname
$dbUsername = "root";       //  your table username
$dbPassword = "";          // your table password
$dbName     = "biglive";  // your database name
 
// Create database connection 
$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($con->connect_error) { 
    die("Connection failed: " . $con->connect_error); 
} 
?>