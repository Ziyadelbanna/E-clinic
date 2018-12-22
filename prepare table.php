<?php

$doctor_id = $_SESSION['doctor'];
$chosen_date = $_SESSION['chosen_date'];


$conn = mysqli_connect('localhost','root','','dp');

if(!$conn){
	die();
}

$sql = "SELECT * FROM patients";

$results = mysqli_query($conn,$sql);

$arr1 = null;
$i = 0;

if(mysqli_num_rows($results)>0){
	while($row = mysqli_fetch_assoc($results)){
		
		/* 
			$arr is an arrays of associative arrays that each index in $arr represents a row in the table
			and each row is an associative array of the columns we ask for in the query 	
		*/ 

		$arr1[$i]= $row;
		$i++; 
    }
}
else{
echo "0 results";
}

$count = 0;

foreach($arr1 as $element=>$data){
	//$id[$counter] = $data['id'];
	$history[$count] = $data['history'];
	$time[$count] = $data['time'];
	$date[$count] = $data['date'];
	$patient_firstname[$count] = $data['firstname'];
	$patient_email[$count] = $data['email'];
	$patient_doctor[$count] = $data['doctor_id'];
	$patient_status[$count] = $data['status'];
	$patient_appointment[$count] = $data['appointment'];
	$emergency[$count] = $data['emergency'];
	$count++;
} 
$arr2 = null;
$arr2_counter = 0;
for($co = 0 ; $co < $count ;$co++){
			if($patient_doctor[$co] == $doctor_id){
				$arr2[$arr2_counter] = $arr1[$co];
				$arr2_counter++;
				}
			}
$co = $arr2_counter;
$arr2_counter = 0;
$arr3_counter = 0;
for($arr2_counter = 0 ; $arr2_counter< $co ;$arr2_counter++){
			if(strcmp($date[$arr2_counter],$chosen_date)==0 ){
				$arr3[$arr3_counter] = $arr2[$arr2_counter];
				$arr3_counter++;
				}
			}


?>