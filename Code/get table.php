<style>
	.error {color: #FF0000;}

	#errorPopUp
	{
		margin-top: 40px;
		text-align: center;

		font-weight: bold;
		font-style: normal;
		background: #E7E7E7;
		opacity: 0.98;
		padding-top: 20px;
		padding-bottom: 30px;
		padding-left: 10px;
		padding-right: 10px;
		border-radius: 15px;
	}

</style>
<?php


$doctors_id = $_SESSION['doctor'];
$chosen_date = $_SESSION['chosen_date'];

$conn = mysqli_connect('localhost','root','','dp');

if(!$conn){
	die();
}

$sql = "SELECT id,firstname,status,appointment,email,time,history,doctor_id,date,emergency FROM patients WHERE date='$chosen_date'";

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
	if($doctor_id == $data['doctor_id']){
		$final_table[$table_size]=$data;
		$table_size++;
}
}
}
if($table_counter==0 || $table_size==0){
?>
<span class="error"><h1 id="errorPopUp"> There Are No Patients For Today </h1></span>

<?php
}
?>
