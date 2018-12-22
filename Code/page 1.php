<html>
<head>

<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<h1> Loging in page :</h1>
<br>
<?php
include 'Checking user.php';
?>
</body>
<p><span class="error"></span></p>
<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "POST">
USERNAME :	<input type = "text" name="name" placeholder="Username">
			<span class="error"><?php echo $nameErr;?></span><br><br>
PASSWORD :	<input type = "password" name="password" placeholder="Password">
			<span class="error"><?php echo $passErr;?></span><br><br>

<input type = "submit" name="submit" value="Log in">

</html>