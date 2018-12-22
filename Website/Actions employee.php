<?php ob_start()   ?>
<style>
.error {color: #FF0000;}
#errorPopUp
{
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
$current_date = $_SESSION['chosen_date'];

$doctor_id = $_SESSION['doctor_id'];
$conn = mysqli_connect('localhost','root','','dp');
$doctor_name = $_SESSION['doctor_name'];
$user_surname = $_SESSION['employee_surname'];

if(!$conn){
	die();
}

$msql = "SELECT id,firstname,time,doctor_id,date,history,emergency FROM patients WHERE date='$current_date'";

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
	$patient_id[$coun] = $info['id'];
	$date[$coun] = $info['date'];
	$history[$coun] = $info['history'];
	$time[$coun] = $info['time'];
	$first_name[$coun] = $info['firstname'];
	$emergency[$coun] = $info['emergency'];
	$coun++;
}
}
}
if($i==0 || $coun==0){
	?>
<span class="error errorPopUp"><h2> There Are No Patients For Today </h2></span><br><br>
	<?php
}
$index = 0;

$j=0;
echo '
<form method="POST" action="">
 ';
if(!$_SESSION['Exceeded'] && $i>0 && $coun>0){
echo 'Choose the action you want to perform .<br><br>';
while ($j<$coun){
	if($emergency[$j]==0){


?>

<input type="checkbox" name="<?php echo $first_name[$index];?>">&nbsp&nbsp&nbsp&nbsp<?php echo $first_name[$index];?><br><br><br>
<?php
}
$index++;

$j=$j+1;
}
if($coun>0){


echo'<input type="radio" name="action" value="cancel">&nbsp&nbsp Cancel patient&nbsp&nbsp&nbsp&nbsp
<input type="radio" name="action" value="emergency">&nbsp&nbsp Highlight Emergency <br><br><br>
<input type="submit" name="submit" value="Submit!"><br><br>
';
}
}
echo'
<input type="submit" name="insert" value="Add new patient">&nbsp&nbsp
</form>';

if($_SESSION['numberOfActions']<2){

if(isset($_POST['action']) && isset($_POST['submit'])){
		if($_POST['action'] == 'cancel'){

			for($j=0;$j<$coun;$j++){
				if(isset($_POST[$first_name[$j]])){
					$_SESSION['numberOfActions']++;


					$current_time = date('Y-m-d H:i:00');
					$canceling_email_content = "dear Dr ".$doctor_name." we are informing you that one of your patients [".$first_name[$j]."] canceled the appointment";
					$query1 = "DELETE FROM patients WHERE firstname = '$first_name[$j]'";

					$query2 = "INSERT INTO messages(sender,reciver,time,subject,content,seen) VALUES('$user_surname','$doctor_name','$current_time','Cancelation','$canceling_email_content',0)";

					if(!mysqli_query($conn,$query1)){
						echo "<br><br>ERROR WHILE Deleting<br><br>".$query1."<br>".mysqli_error($conn);
					}
					if(!mysqli_query($conn,$query2)){
						echo "<br><br>ERROR WHILE Inserting<br><br>".$query2."<br>".mysqli_error($conn);
					}

				if($_SESSION['numberOfActions']>=2){
						$_SESSION['Exceeded'] = true;
						break;
					}
				}
			}

		}
		else if($_POST['action'] == 'emergency'){
			for($j=0;$j<$coun;$j++){
				if(isset($_POST[$first_name[$j]])){
					$emergency[$j]= 1;
					$_SESSION['numberOfActions']++;

					$query3 = "UPDATE patients SET emergency=1 WHERE firstname='$first_name[$j]'";

					if(!mysqli_query($conn,$query3)){
						echo "<br><br>ERROR WHILE UPDATING<br><br>".$query3."<br>".mysqli_error($conn);
					}

					$current_time = date('Y-m-d H:i:00');
					$emergency_email_content = "dear Dr ".$doctor_name." You are being informed that the case one of your patients [".$first_name[$j]."] has developed rapidly to become an emergency so you cannot postpone or referre this case";

					$query4 = "INSERT INTO messages(sender,reciver,time,subject,content,seen) VALUES('$user_surname','$doctor_name','$current_time','Emegency','$emergency_email_content',0)";

					if(!mysqli_query($conn,$query4)){
						echo "<br><br>ERROR WHILE INSERTING<br><br>".$query4."<br>".mysqli_error($conn);
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
	else if(isset($_POST['insert'])){
		if($coun == 0){
	$new_time="08:00:00";
}
else{
		$new_time = date('H:i:00', strtotime($time[$coun-1] . " +1 hour"));
}
		$_SESSION['new_time']=$new_time;
		$_SESSION['page'] = $_SERVER['SCRIPT_NAME'];
		header("Location: Inserting new patient.php");
	}
	

}
else{
		$_SESSION['Exceeded'] = true;

	?>

	<span class="error"><h3> You Have Reached The Maximum Number Of Actions To Perform</h3></span><br><br>

	<?php
	}





?>
<?php ob_end_flush()   ?>
