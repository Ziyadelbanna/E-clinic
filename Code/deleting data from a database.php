<?php

$conn = mysqli_connect('localhost','root','','dp');

if(!$conn){
	die();
}

// the word [WHERE] in the query is very important because if it is not mentioned the whole column will be deleted  

$sql = "DELETE FROM cars WHERE car = 'LADA'";
if(mysqli_query($conn,$sql)){
	echo "deleted Successfully";
}
else{
	echo "ERROR WHILE DELETING".$sql."<br>".mysqli_error($conn);
}


?>