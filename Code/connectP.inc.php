<?php

// Procedural
// the one used according to maghraby

$conn =  mysqli_connect('127.0.0.1','root','');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
echo "Connected successfully";
//SELECT car FROM cars
?>