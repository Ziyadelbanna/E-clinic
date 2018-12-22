<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Clinic</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

    .navbar {
    margin-bottom: 0px;
    }

    .large{
      font-size: 150%;
    }

    #logo{

      border-right: 1px white solid;
    }

    #bgImage{

        background: url("images/bg 2.jpg");
        position: fixed;
        height:100% ;
        width: 100%;
        background-size: cover;
    }

    #page2Content{

      margin-top: 90px;
    }

    .centered {

      text-align: center;
    }

    .tableText{

      color: #E9EDF0;
      font-weight:bold;
      font-family:Impact, Charcoal, sans-serif  ;
      font-size: 20px;
      -webkit-text-stroke-width: 1px;
   -webkit-text-stroke-color: black;

    }

    </style>

  </head>
  <body>
  <?php
	$user_surname = $_SESSION['surname'];
  ?>

    <!-- start navbar  -->
    <div class="navbar navbar-default navbar-fixed-top ">

      <div class="container">

        <div class="navbar-header">

          <a href="" class="navbar-brand" id="logo">
          <span class="glyphicon glyphicon-heart large " aria-hidden="true"></span> E-Clinic : <?php echo "   Hello MR.  ".$user_surname;?></a>

          <button type="button" class="navbar-toggle" data-toggle="collapse"
                  data-target=".navbar-collapse">

            <span class="sr-only">Toggle navigation </span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>

        <div class="collapse navbar-collapse">

           <ul class="nav navbar-nav navbar-right">

             <li class="centered"><a href="log_out_employee.php">log out</a></li>
             <li class="centered"><a href="about employee.php">about us</a></li>

           </ul>
        </div>


      </div>
    </div>

      <!-- end navbar  -->
<div  style='overflow: auto;' class="container" id="bgImage">

          <div id="page2Content">

<table class="table table-hover tableText">
  
<?php 
if($table_size>0){
	
  print "<tr><td><strong>Index</strong></td>";
  echo"      ";
  print "<td><strong>Time</strong></td>";
  echo"      ";
  print "<td><strong>Date</strong></td>";
  echo"      ";
  print "<td><strong>Day</strong></td>";
  echo"      ";
  print "<td><strong>First Name</strong></td>";
  echo"      ";
  print "<td><strong>Last Name</strong></td>";
  echo"      ";
  print "<td><strong>Status</strong></td>";
  echo"      ";
  print "<td><strong>Appointment</strong></td>";
  echo"      ";
  print "<td><strong>E_mail</strong></td></tr>";

$steps = 0;
$tmp = null;
do{
	$steps = 0;
	for($y=0 ; $y<($table_size-1) ; $y++){
		if($final_table[$y]['date']>$final_table[$y+1]['date']){
			$tmp = $final_table[$y];
			$final_table[$y] = $final_table[$y+1];
			$final_table[$y+1] = $tmp;
			$steps++;
		}
	}

}while($steps>0);


for($table_printer=0 ; $table_printer < $table_size ;$table_printer++){
      $row = $final_table[$table_printer];
	  $p_id = $table_printer+1;
	  $time = $row['time'];;
	  $date = $row['date'];	
	  $day = $row['day'];
	  $firstname = $row['firstname'];
	  $lastname = $row['lastname'];
	  $status = $row['status'];
	  $appointment = $row['appointment'];
	  $email = $row['email'];
	  
	  print "<tr><td>$p_id</td>";
	  print "<td>$time</td>";
	  print "<td>$date</td>";	    
	  print "<td>$day</td>";	    
	  print "<td>$firstname</td>";	  
	  print "<td>$lastname</td>";  
	  print "<td>$status</td>";	  
	  print "<td>$appointment</td>";	  
	  print "<td>$email</td></tr>";
	  		 
}
}
else{
  ?>
  <h1> There Are No Patients<h1>
  <?php
}
?>
</table >

             
          </div>

        </div>

</html>
  
