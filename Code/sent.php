<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sent Massages</title>

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

.mailBox{

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

#mailBoxContent{

	margin-top: 100px;
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

.boldUnderlined{

	font-weight: bold;
	font-style: normal;
	text-decoration: underline;
}

.centered {
	text-align: center;
}


</style>
</head>

<body>

  <!-- start navbar  -->
	<div class="navbar navbar-default navbar-fixed-top ">

		<div class="container">

			<div class="navbar-header">

				<a href="" class="navbar-brand" id="logo">
				<span class="glyphicon glyphicon-heart large " aria-hidden="true"></span> E-clinic</a>

			</div>

			<div class="collapse navbar-collapse">

				 <ul class="nav navbar-nav navbar-right">
           <li class="centered"><a href="MailBox.php">Back</a></li>
         </ul>
			</div>


		</div>
	</div>

		<!-- end navbar  -->
		<div style='overflow: auto;' class="container" id="bgImage">

			<div id="mailBoxContent">
				<div class="container">

					<h1>  Sent Messages  </h1>

					<table class="table table-hover tableText">
						<?php

						session_start();

						$conn = mysqli_connect('localhost','root','','dp');

						if(!$conn){
							die();
						}

						$surname = $_SESSION['surname'];
						$sent_query= "SELECT reciver,subject,time FROM messages WHERE sender='$surname'";


						$sent_results = mysqli_query($conn,$sent_query);

						$sent_mails = null;
						$sent_counter = 0;

						if(mysqli_num_rows($sent_results)>0){
							while($row = mysqli_fetch_assoc($sent_results)){

								$sent_mails[$sent_counter]= $row;
								$sent_counter++;
    			}
				}
				if($sent_counter==0){
					?>
					<span class="error"><h2> There Are No Sent E_Mails </h2></span><br><br>
					<?php
				}
				if($sent_counter>0){

  			print "<tr><td><strong>Index</strong></td>";
  		echo"      ";
  	print "<td><strong>Patient</strong></td>";
  	echo"      ";
  	print "<td><strong>Time</strong></td>";
  	echo"      ";
  	print "<td><strong>Subject</strong></td></tr>"."<br><br>";



		for($table_printer=0 ; $table_printer < $sent_counter ;$table_printer++){
    	$row = $sent_mails[$table_printer];
	  	$p_id = $table_printer+1;
	  	$patient = $row['reciver'];
	  	$time = $row['time'];;
	  	$subject = $row['subject'];
	
	  	print "<tr><td>$p_id</td>";
	  	print "<td>$patient</td>";
	  	print "<td>$time</td>";
	  	print "<td>$subject</td></tr>"."<br><br>";

		}
	}
	?>

	</table>

</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>
