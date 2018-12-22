<?php

$conn = mysqli_connect('localhost','root','','dp');

if(!$conn){
	die();
}

$sql = "SELECT id,username,password,surname FROM doctors";

$results = mysqli_query($conn,$sql);

$arr = null;
$i = 1;

if(mysqli_num_rows($results)>0){
	while($row = mysqli_fetch_assoc($results)){
		
		/* 
			$arr is an arrays of associative arrays that each index in $arr represents a row in the table
			and each row is an associative array of the columns we ask for in the query 	
		*/ 

		$arr[$i]= $row;
		$i++; 
 
//$query = "SELECT * FROM alternatives WHERE $category LIKE '%".$criteria."%'";
    }
}
else{
echo "0 results";
}

$counter = 0;

foreach($arr as $element=>$data){
	$id[$counter] = $data['id'];
	$username[$counter] = $data['username'];
	$password[$counter] = $data['password'];
	$surname[$counter] = $data['surname'];
	$counter++;
} 

$nameErr ='';
$passErr ='';
$user_surname = '';
$namebool = false;
$passbool = false;
$enetred_name = '';
$entered_password = '';
if(isset($_POST["submit"])){
	if(!empty($_POST["name"]) && !empty($_POST["password"])){
		$enetred_name = check($_POST["name"]);	
		$entered_password = check($_POST["password"]);	
		for($co = 0 ; $co < $counter ;$co++){
			if(strcmp($username[$co],$enetred_name)==0 ){
				$namebool = true;
				if(strcmp($password[$co],$entered_password)==0){
					$passbool = true;
					session_start();
					$_SESSION['surname'] = $surname[$co]; 
					$_SESSION['doctor'] = $co+1; 
					
				}
			}
			if($namebool && $passbool){
				header('Location: profile.php');
			}
	}
	if($namebool && !$passbool){
		$passErr = "Invalid Password";
	}
	if(!$namebool && !$passbool){
		$nameErr = "Invalid Username and Password";
	}
}
if(empty($_POST["name"]) ){
	$nameErr = "Please Fill in the username";
}
if(empty($_POST["password"]) ){
	$passErr = "Please Fill in the password";
}
}


function check($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
return $data;
}

?>