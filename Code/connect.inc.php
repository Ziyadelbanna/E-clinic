<?php

// Object Oriented
// not the one used according to maghraby

$conn =  new mysqli('127.0.0.1','root','');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
//SELECT car FROM cars
?>