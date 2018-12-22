<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Welcome</title>

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

    .dropdown-menu {
      left: 50.7%;
      right: auto;
      text-align: center;
      transform: translate(-50%, 0);
    }

    button, input, optgroup, select, textarea {
    margin: 5px 47% 0px;
    font: inherit;
    color: inherit;
    }

    .mainPage{

      background: #E7E7E7;
      opacity: 0.98;
      padding-top: 20px;
      padding-bottom: 50px;
      padding-left: 10px;
      padding-right: 10px;
      border-radius: 15px;
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

        background:url("images/bg5.jpg");
        position: fixed;
        height:100% ;
        width: 100%;
        background-size: cover;
    }

    #introContent{

      margin-top: 200px;
    }


    .color{

      color:#5E5E5E;
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


    #head{

      text-align: center;
      margin-top: 100px;

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
  $_SESSION['log']=false;
  ?>

    <!-- start navbar  -->
    <div class="navbar navbar-default navbar-fixed-top ">

      <div class="container">

        <div class="navbar-header">

          <a href="" class="navbar-brand" id="logo">
          <span class="glyphicon glyphicon-heart large " aria-hidden="true"></span> E-clinic</a>

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

             <li class="centered "><a href="about.php">about us</a></li>

           </ul>
        </div>


      </div>
    </div>

      <!-- end navbar  -->

      <div style='overflow-y: auto; overflow-x: hidden;' class="container" id="bgImage">

        <div id="introContent">

          <div class="form-group mainPage">

            <h1 class="centered largeText color cursive"> Welcome to E-clinic</h1>

            <!--dropdown stars-->
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                You Are :
                <span class="caret" ></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="log in.php">A Doctor</a></li>
                <li><a href="log in employee.php">An Administrative Employee</a></li>
              </ul>
            </div>
            <!--dropdown ends-->

          </div>

        </div>
      </div>







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
