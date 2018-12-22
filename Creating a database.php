<?php


// Procedural
// the one used according to maghraby

$conn =  mysqli_connect('127.0.0.1','root','');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
echo "Connected successfully";

$sql = "CREATE DATABASE myDB";
if(mysqli_query($conn,$sql)){
	echo "Databse successfully created";
}
else{
	echo "Error Occurred".mysqli_error($conn);
}



?>