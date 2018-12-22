<?php

$conn = mysqli_connect('localhost','root','','dp');

if(!$conn){
	die();
}
$sql = "INSERT INTO cars(car,users_id) VALUES('Mercedes',2)";
if(mysqli_query($conn,$sql)){
	// Getting the ID of the inserted value      $conn used Not $sql
	$id = mysqli_insert_id($conn);
	echo "successfully<br><br><br>".$id;
}
else{
	
	echo "ERROR".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);
?>
