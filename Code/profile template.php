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

    .sameLine
    {
      display: block;
-webkit-margin-before: 1em;
-webkit-margin-after: 1em;
-webkit-margin-start: 0px;
-webkit-margin-end: 0px;
    }

    .navbar {
    margin-bottom: 0px;
    }

    .left {
    float: left;
    }


    .large{
      font-size: 150%;
    }

    #logo{

      border-right: 1px white solid;
    }

    #bgImage{

        background: linear-gradient(#a0a29d,#f8f8f8);
        position: fixed;
        height:100% ;
        width: 100%;
        background-size: cover;
    }

    .putFrame{

      margin-top: 100px;
      margin-left: 30%;
      margin-right:30%;
      background: #E7E7E7;
      opacity: 0.98;

      padding-top: 20px;
      padding-bottom: 30px;
      padding-left: 10px;
      padding-right: 10px;
      border-radius: 15px;
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
 

 <?php
    session_start();
    $user_surname = $_SESSION['employee_surname'];
    $_SESSION['chosen_date'] = date('d-m-Y');
    $doctor_name = $_SESSION['doctor_name'];
    ?>
    
   <!-- start navbar  -->
    <div class="navbar navbar-default navbar-fixed-top ">

      <div class="container">

        <div class="navbar-header">

          <a href="" class="navbar-brand" id="logo">


    <?php
    $user_surname = $_SESSION['employee_surname'];
    $_SESSION['chosen_date'] = date('d-m-Y');
    $doctor_name = $_SESSION['doctor_name'];
    ?>
    


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

             <li style="margin-top:15px ;margin-left:0;margin-right:200px;font-weight: bold;font-size:125%">*This Is <?php echo  $_SESSION['chosen_date']."'s Schedule" ;?>*</li>
             <li class="centered"><a href="log_out_employee.php">log out</a></li>
             <li class="centered"><a href="profile employee.php">profile</a></li>
             <li class="centered"><a href="about employee.php">about us</a></li>


           </ul>
        </div>


      </div>
    </div>

      <!-- end navbar  -->

<?php
            if(isset($_GET['show'])&&isset($_GET['date'])){
              $_SESSION['chosen_date'] = $_GET['date'];
              $_SESSION['chosen'] = true;
            }
           // else if(isset($_GET['show'])&& $_GET['date']==""){
           //  $_SESSION['chosen_date'] = date('d-m-Y');
           // }
            else{
              if(!$_SESSION['chosen'] = true){
                 $_SESSION['chosen_date'] = date('d-m-Y');
              }
            }
            ?>
 

              <!-- Start of popup modal -->

            <div class="modal" id="myModel">

              <div class="modal-dialog modal-md">

                <div class="modal-content">

                  <div class="modal-header">

                    <button class="close" data-dismiss = "modal">x</button>

                    <h4 class="modal-title">Actions</h4>

                  </div>


                  <div class="modal-body">
                  <?php include 'Actions employee.php'; ?>
                  </div>

                  <div class="modal-footer">

                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>


                  </div>
                </div>


              </div>

            </div>

            <!-- end of popup modal -->

        <div  style='overflow: auto;' class="container" id="bgImage">

          <div id="page2Content">
                <h3 class="centered putFrame"><strong>Doctor <?php echo $doctor_name?>'s apointments</strong></h3><br>
                <form method="GET" action="">
                <h4 class="left">Another Day : <input type="date" name="date" selected="date('d-m-Y')">
                <input type="submit" name="show" value="Show"> </h4>
                </form>
                  <br><br>
                  <table class="table table-hover tableText">
                      <?php include 'print patients table.php';?>
                  </table>

                        <!-- launch Modal btn-->
                        <button class="btn btn-success" data-toggle="modal" data-target= "#myModel">
                          Actions
                          </button>

          </div>

        </div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
