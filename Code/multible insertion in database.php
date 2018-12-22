<?php

$conn = mysqli_connect('localhost','root','','dp');

if(!$conn){
	die();
}

/*

* to insert multible values there are things that must be considered :
		1- between each two queries there has to be a semicolon in the end of the query [NOTE THAT THE LAST QUERY DOESN'T END WITH A SEMICOLON] .
		2- instead of  mysqli_query() we use mysqli_multi_query() .  
		3- a ( . ) must be put after the variable name (EXCLUDING THE FIRST ONE) [We could say that this is for concatination].
*/
$sql = "INSERT INTO cars(car,users_id) VALUES('Toyota',4);";
$sql .= "INSERT INTO cars(car,users_id) VALUES('Skoda',3);";
$sql .= "INSERT INTO cars(car,users_id) VALUES('Sandero',1);";
$sql .= "INSERT INTO cars(car,users_id) VALUES('Logan',8);";
$sql .= "INSERT INTO cars(car,users_id) VALUES('Shark',5);";

if(mysqli_multi_query($conn,$sql)){
	
	echo "successfully<br><br><br>";
}
else{
	
	echo "ERROR".$sql."<br>".mysqli_error($conn);
}

mysqli_close($conn);
?>
