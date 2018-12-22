<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MailBox</title>

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
           <li class="centered"><a href="profile.php">Back</a></li>
         </ul>
			</div>


		</div>
	</div>

		<!-- end navbar  -->

		<div style='overflow: auto;' class="container" id="bgImage">

			<div id="mailBoxContent">
				<div class="container">

          <div class="form-group mailBox">
            <div class="centered">
              <h1 class="boldUnderlined">Mail Box :</h1></br>
              <li><a href="sent.php">View Sent Messages</a> </li>
              <li><a href="recived.php">View recived  Messages</a> </li><br>
              <script>
  history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
</script>
 
              <?php
              session_start();
              ?>

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
