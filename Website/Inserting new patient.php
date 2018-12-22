<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Patient</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

		<style>
		.error {color: #FF0000;}

		.patientinfo{

      margin-top: 100px;
      background: #E7E7E7;
      opacity: 0.98;

      padding-top: 20px;
      padding-bottom: 50px;
      padding-left: 10px;
      padding-right: 10px;
      border-radius: 15px;
    }

		.navbar {
			margin-bottom: 0px;
		}

		.jumbotron{
			height: 100vh;
		}

		.large{
			font-size: 150%;
		}

		#logo{
			border-right: 1px white solid;
		}

		#bgImage{

      background: linear-gradient(#2285D3,white);
			position: fixed;
			height:100% ;
			width: 100%;
			background-size: cover;
		}

		#addPatientContent{

      margin-top: -10px;
		}

		.white{
			color:#f9f9f9;
		}

		.largeText{
			font-size :300%;
		}

		.bold {
			font-weight: bold;
		}

		.cursive{
			font-family: "Comic Sans MS", cursive, sans-serif;
			font-weight: bold;
			font-style: normal;
		}

		.centered {
			text-align: center;
		}

		#problemHeader{
			color: #E9EDF0;
			font-weight:bold;
			font-family:Impact, Charcoal, sans-serif  ;
			font-size: 20px;
			-webkit-text-stroke-width: 1px;
			-webkit-text-stroke-color: black;
		}

		#head{
			text-align: center;
			margin-top: 100px;
		}

		.btn-success {
    color: white ;
    background-color: #2285D3;
    border-color: #E7E7E7;
  }

		</style>
</head>

<body>

	<?php
	ob_start();
	session_start();
	$current_date = $_SESSION['chosen_date'];
	$doctor_id = $_SESSION['doctor_id'];
	$new_time = $_SESSION['new_time'];
	$doctor_name = $_SESSION['doctor_name'];

	$conn = mysqli_connect('localhost','root','','dp');
	if(!$conn){
		die();
	}

	$firstnameErr ="";
	$historyErr = "";
	$statusErr = "";
	$appointmentErr = "";
	$emailErr = "";

	if(isset($_POST["submit"])){
		if(!empty($_POST["firstname"]) && !empty($_POST["history"])&&
			!empty($_POST["status"]) && !empty($_POST["email"])&&
			!empty($_POST["appointment"])){

			$first_name = check($_POST["firstname"]);
			$history = check($_POST["history"]);
			$status = check($_POST["status"]);
			$appointment = check($_POST["appointment"]);
			$email = check($_POST["email"]);
			$new_patient_query = "INSERT INTO patients(firstname,history,status,appointment,email,doctor_id,time,date,emergency) VALUES ('$first_name','$history','$status','$appointment','$email','$doctor_id','$new_time','$current_date',0)";
			if(!mysqli_query($conn,$new_patient_query)){
							echo "<br><br>ERROR WHILE Adding<br><br>".$new_patient_query."<br>".mysqli_error($conn);
						}
						$current_time = date('Y-m-d H:i:00');
						$insertion_email_content = "dear Dr ".$doctor_name." You are being informed that a new patient[".$first_name[$j]."] has been added in your schedule in ".$current_date." at ".$new_time;

						$insertion_query = "INSERT INTO messages(sender,reciver,time,subject,content,seen) VALUES('Hospital Administration','$doctor_name','$current_time','Adding','$insertion_email_content',0)";

						if(!mysqli_query($conn,$insertion_query)){
							echo "<br><br>ERROR WHILE INSERTING<br><br>".$insertion_query."<br>".mysqli_error($conn);
						}
		header("Location: ".$_SESSION['page']);
	}
	if(empty($_POST["firstname"]) ){
		$firstnameErr = "Please Fill in the patient's first name";
	}
	if(empty($_POST["history"]) ){
		$historyErr = "Please Fill in the patient's history";
	}
	if(empty($_POST["status"]) ){
		$statusErr = "Please Fill in the patient's status";
	}
	if(empty($_POST["appointment"]) ){
		$appointmentErr = "Please Fill in the appointment";
	}
	if(empty($_POST["name"]) ){
		$emailErr = "Please Fill in the patient's email";
	}

	}









	function check($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
	return $data;
	}

	ob_end_flush();
	?>


	<!-- start navbar  -->
	<div class="navbar navbar-default navbar-fixed-top ">

		<div class="container">

			<div class="navbar-header">

				<a href="" class="navbar-brand" id="logo">
				<span class="glyphicon glyphicon-heart large " aria-hidden="true"></span> E-clinic</a>

			</div>

			<div class="collapse navbar-collapse">

				 <ul class="nav navbar-nav navbar-right"> </ul>
			</div>


		</div>
	</div>

		<!-- end navbar  -->

		<div style='overflow: auto;' class="container" id="bgImage">

			<div id="addPatientContent">
				<div class="container">

          <div class="form-group patientinfo">

						<h1 class="centered cursive">Patient Info</h1> </br>

						<div class="centered">

							<p><span class="error"></span></p>
							<form method="POST" action="">
							First Name : <input type="text" name="firstname" placeholder="First name"><br><br>
							<span class="error"><?php echo $firstnameErr;?></span><br><br>
							History : <input type="text" name="history" placeholder="History"><br><br>
							<span class="error"><?php echo $historyErr;?></span><br><br>
							Status : <input type="text" name="status" placeholder="Status"><br><br>
							<span class="error"><?php echo $statusErr;?></span><br><br>
							E_Mail : <input type="email" name="email" placeholder="E_Mail"><br><br>
							<span class="error"><?php echo $appointmentErr;?></span><br><br>
							Appointment : <select name="appointment">
							    <option value="surgical">surgical</option>
							    <option value="consolatory">consolatory	</option>

							  </select><br><br>
							<span class="error"><?php echo $emailErr;?></span><br><br>
							<input type="submit" name="submit" value="Submit" class="btn btn-success">


						</div>

          </div>

			</div>
		</div>






	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>
