
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Clinic Employee login </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

    .login{

      margin-top: 150px;
      background: #E7E7E7;
      opacity: 0.98;

      padding-top: 20px;
      padding-bottom: 30px;
      padding-left: 10px;
      padding-right: 10px;
      border-radius: 15px;
    }

    .error {color: #FF0000;}

    .navbar {
    margin-bottom: 0px;
    }

    .large{
      font-size: 150%;
    }

    #bgImage{

      background: linear-gradient(white, #CFDCEF);
      position: fixed;
      height:100% ;
      width: 100%;
      background-size: cover;
    }

    #page1Content{

      margin-top: 90px;
    }

    .centered {

      text-align: center;
    }

    .btn-success {
    color: white ;
    background-color: #2285D3;
    border-color: #E7E7E7;
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
$_SESSION['Exceeded']=false;
$_SESSION['numberOfActions'] = 0;
$_SESSION['log'] = false;
include 'Checking employee.php';
?>

    <div class="navbar navbar-default navbar-fixed-top">

      <div class="container">

        <div class="navbar-header">

          <a href="" class="navbar-brand">
            <span class="glyphicon glyphicon-heart large" aria-hidden="true"></span>
            E-Clinic</a>

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


               <li class="centered active"><a href="">log in</a></li>
               <li class="centered"><a href="main.php">main page</a></li>
               <li class="centered"><a href="about.php">about us</a></li>

            </ul>
        </div>


      </div>
    </div>

    <div style='overflow: auto;' class="container" id="bgImage">
      <p><span class="error"></span></p>
      <form id="page1Content" method="POST">

        <div class="container">

          <div class="form-group login">

            <label for = "login">Log In </label>
            <input name="name" type="email" placeholder="e-mail" class="form-control"/>
           	<span class="error"><?php echo $nameErr;?></span><br><br>
            <input name="password" type="password" placeholder="password" class="form-control">
            <span class="error"><?php echo $passErr;?></span><br><br>


          </div>



            <br/>
            <input type="submit" name="submit" value="Sign In"  class="btn btn-success"/>

            <br/><br/>

          </div>

      </form>

    </div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>



  </body>
</html>
