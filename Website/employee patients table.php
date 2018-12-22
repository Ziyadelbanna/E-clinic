<?php

$doc_id = $_SESSION['doctor_id'];
$chosen_date = $_SESSION['chosen_date'];
 
$conn = mysqli_connect('localhost','root','','dp');

if(!$conn){
	die();
}

$sql = "SELECT id,firstname,status,history,appointment,email,time,doctor_id,date,emergency FROM patients WHERE doctor_id='$doc_id'";

$results = mysqli_query($conn,$sql);

$pre_table = null;
$table_counter = 0;

if(mysqli_num_rows($results)>0){
	while($row = mysqli_fetch_assoc($results)){
		
		/* 
			$arr is an arrays of associative arrays that each index in $arr represents a row in the table
			and each row is an associative array of the columns we ask for in the query 	
		*/ 

		$pre_table[$table_counter]= $row;
		$table_counter++; 
    }
}

$table_size = 0;
$final_table = null;
if($table_counter>0){
	foreach($pre_table as $element=>$data){
		if($chosen_date==$data['date']){
		$final_table[$table_size]=$data;
		$table_size++;
		}
	}

}
?>