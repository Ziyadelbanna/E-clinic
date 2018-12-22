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

        background: linear-gradient(#f8f8f8, #a0a29d);
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

<script>
  history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
</script>
 
  

          <?php ob_start()?>
          <?php

          include'Checking employee.php';
          session_start();
          $_SESSION['log'] = true;
          $user_surname = $_SESSION['employee_surname'];

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
                  include 'get table employee.php';
                  include 'print table employee.php';
                  ?>

                  </table >


                  <?php ob_end_flush()   ?>

          </div>

        </div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
