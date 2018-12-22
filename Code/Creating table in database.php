<?php

// the database in this case carries the name myDB
// Create connection

$conn = mysqli_connect('localhost','root','','dp');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE savings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(50),
name_id INT(6),
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table savings created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>