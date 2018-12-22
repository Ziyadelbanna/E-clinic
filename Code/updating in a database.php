<?php

$conn = mysqli_connect('localhost','root','','dp');

if(!$conn){
	die();
}

$type = "ASDASAD";
$old =  "BMW";
// the word [WHERE] in the query is very important because if it is not mentioned the whole column will be updated

$sql = "UPDATE  cars SET car = ".$type." WHERE car = ".$old;
if(mysqli_query($conn,$sql)){
	echo "updated Successfully";
}
else{
	echo "ERROR WHILE UPDATING".$sql."<br>".mysqli_error($conn);
}

?>