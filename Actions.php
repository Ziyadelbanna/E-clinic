<style>
	.error {color: #FF0000;}

</style>

<?php ob_start()   ?>
<style>
.error {color: #FF0000;}
</style>
<?php

$current_date = $_SESSION['chosen_date'];
$doctor_id = $_SESSION['doctor'];
$conn = mysqli_connect('localhost','root','','dp');


if(!$conn){
	die();
}

$msql = "SELECT id,firstname,time,history,doctor_id,date,emergency FROM patients WHERE date='$current_date'";

$result = mysqli_query($conn,$msql);

$arr = null;
$i = 0;

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		$arr[$i]= $row;
		$i++;
    }
}
else{
//echo "0 results";
}
$coun = 0;
if($i>0){

	$steps = 0;
    $tmp = null;
    do{
    	$steps = 0;
    	for($y=0 ; $y<($i-1) ; $y++){
    		if($arr[$y]['time']>$arr[$y+1]['time']){
    			$tmp = $arr[$y];
    			$arr[$y] = $arr[$y+1];
    			$arr[$y+1] = $tmp;
    			$steps++;
    		}
    	}

    }while($steps>0);

foreach($arr as $element=>$info){
	if($doctor_id==$info['doctor_id']){
	$jd[$coun] = $info['id'];
	$date[$coun] = $info['date'];
	$history[$coun] = $info['history'];
	$time[$coun] = $info['time'];
	$emergency[$coun] = $info['emergency'];
	$first_name[$coun] = $info['firstname'];
	$coun++;
}
}
}
if($i==0 || $coun==0){
	?>
<span class="error "><h2> There Are No Patients For Today </h2></span><br><br>
	<?php
}
$index = 0;

$j=0;
if(!$_SESSION['Exceeded'] && $i>0 && $coun>0){
echo 'Choose the patient and the action you want to perform :<br><br>';
while ($j<$coun){
	if($emergency[$j]==0){


?>

<form method="POST" action="">

<input type="checkbox" name="<?php echo $first_name[$index];?>">&nbsp&nbsp&nbsp&nbsp<?php echo $first_name[$index];?><br><br><br>
<?php
}

$index++;
$j=$j+1;
}
if($coun>0){


echo'<input type="radio" name="action" value="postpone">&nbsp&nbsp postpone&nbsp&nbsp&nbsp&nbsp
<input type="radio" name="action" value="referre">&nbsp&nbsp referre <br><br><br>
<input class="btn btn-success" type="submit" name="submit" value="Submit!">
</form>';

}
}
if($_SESSION['numberOfActions']<2){

if(isset($_POST['action']) && isset($_POST['submit'])){
		if($_POST['action'] == 'postpone'){

			for($j=0;$j<$coun;$j++){
				if(isset($_POST[$first_name[$j]])){
					$_SESSION['numberOfActions']++;
					$doctor_name = $_SESSION['surname'];
					$new_date = date('Y-m-d', strtotime($date[$j] . ' +1 day'));
					$new_time = updateTime($doctor_id,$new_date);
					$current_time = date('Y-m-d H:i:00');
					$postponing_email_content = "dear mr/mrs ".$first_name[$j]." I am very sorry to inform you that our appointment has been					 postponed to ".$new_date." at ".$new_time;
					$query = "UPDATE patients SET date='$new_date' WHERE firstname='$first_name[$j]'";
					$query1 = "UPDATE patients SET time='$new_time' WHERE firstname='$first_name[$j]'";
					$query5 = "INSERT INTO messages(sender,reciver,time,subject,content,seen) VALUES('$doctor_name','$first_name[$j]','$current_time','Postponing','$postponing_email_content',0)";
					if(!mysqli_query($conn,$query)){
						echo "<br><br>ERROR WHILE UPDATING<br><br>".$query."<br>".mysqli_error($conn);
					}
					if(!mysqli_query($conn,$query1)){
						echo "<br><br>ERROR WHILE UPDATING<br><br>".$query1."<br>".mysqli_error($conn);
					}
					
					if(!mysqli_query($conn,$query5)){
						echo "<br><br>ERROR WHILE INSERTING<br><br>".$query5."<br>".mysqli_error($conn);
					}
				if($_SESSION['numberOfActions']>=2){
						$_SESSION['Exceeded'] = true;
						break;
					}
				}
			}

		}
		else if($_POST['action'] == 'referre'){
			for($j=0;$j<$coun;$j++){
				if(isset($_POST[$first_name[$j]])){
					$_SESSION['numberOfActions']++;
					$new_d_id = 2;
					$doctor_name = $_SESSION['surname'];

					$query7 = "SELECT surname FROM doctors WHERE id = $new_d_id";
					$selecting_result = mysqli_query($conn,$query7);
					$arr = null;

					if(mysqli_num_rows($selecting_result)>0){
						while($row = mysqli_fetch_assoc($selecting_result)){
						$arr= $row;
				    	}
					}
					else{
					echo "0 results";
					}
						$new_doctor = $arr['surname'];

					$new_time = updateTime($new_d_id,$date[$j]);
					$current_time = date('Y-m-d H:i:00');
					$referring_email_content = "dear mr/mrs ".$first_name[$j]." I am very sorry to inform you that our appointment has been	canceled so you have been referred to doctor ".$new_doctor." at ".$new_time." in the same day ,of course you have the right to cancel the appointment or change the doctor if you want , But I am sorry to say that in the next couble of days i will not be available";
					$query3 = "UPDATE patients SET doctor_id = $new_d_id WHERE firstname='$first_name[$j]'";
					$query4 = "UPDATE patients SET time='$new_time' WHERE firstname='$first_name[$j]'";
					$query6 = "INSERT INTO messages(sender,reciver,time,subject,content,seen) VALUES('$doctor_name','$first_name[$j]','$current_time','Referring','$referring_email_content',0)";

					if(!mysqli_query($conn,$query3)){
						echo "<br><br>ERROR WHILE UPDATING<br><br>".$query3."<br>".mysqli_error($conn);
					}
					if(!mysqli_query($conn,$query4)){
						echo "<br><br>ERROR WHILE UPDATING<br><br>".$query4."<br>".mysqli_error($conn);
					}
					if(!mysqli_query($conn,$query6)){
						echo "<br><br>ERROR WHILE INSERTING<br><br>".$query6."<br>".mysqli_error($conn);
					}
					if($_SESSION['numberOfActions']>=2){
						$_SESSION['Exceeded'] = true;
						break;
					}
				}
			}

		}
			header('Refresh: 0');
	}

}
else{
		$_SESSION['Exceeded'] = true;

	?>

	<span class="error"><h3> You Have Reached The Maximum Number Of Actions To Perform</h3></span><br><br>

	<?php
	}


function updateTime($doc_id,$new_date){

	$conn2 = mysqli_connect('localhost','root','','dp');

	if(!$conn2){
		die();
	}
	$time_query = "SELECT time,doctor_id FROM patients WHERE date='$new_date'";

	if(!mysqli_query($conn2,$time_query)){
		echo "<br><br>ERROR WHILE UPDATING<br><br>".$time_query."<br>".mysqli_error($conn2);
	}

	$same_doc = false;
	$result_time = mysqli_query($conn2,$time_query);

	$array = null;
	$time_counter = 0;
	$time = null;
	$time_counter_2 = 0;
	$time_changed = date('07:00:00');

	if(mysqli_num_rows($result_time)>0){
		while($row = mysqli_fetch_assoc($result_time)){
			if($doc_id == $row['doctor_id']){
				$same_doc = true;
				$array[$time_counter]= $row;
				$time_counter++;
	 	   	}
	}

	if($time_counter>0){
		foreach ($array as $key => $value) {
			$time[$time_counter_2] = $value['time'];
			if($time_changed<=$time[$time_counter_2]){
				$time_changed = $time[$time_counter_2];
			}
			$time_counter_2++;
		}
	}

	$updated_time = date('H:i:00', strtotime($time_changed . " +1 hour"));
	}
	else{
		$updated_time = date('08:00:00');
	}
	if(!$same_doc && $time_counter==0){
	$updated_time = date('08:00:00');
	}
	else if(!$same_doc && $time_counter>0){
	$updated_time = date('H:i:00', strtotime($time_changed . " +1 hour"));
	}


	return $updated_time;
}

?>
<?php ob_end_flush()   ?>
