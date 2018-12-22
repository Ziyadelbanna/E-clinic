<html>
<head>
<title> php new file </title>
</head>
<body>

<h1> HEADER ONE </h1>
</br>
</br>
</br>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST">
	NAME :	<input type="text" name="name" placeholder="Enter Your Name in Here" ><br><br><br>
	PASSWORD : <input type="password" name="password" placeholder="password" ><br><br><br>
	GENDER : <br><br><input type="radio" name="gender" value="male">Male<br><br><input type="radio" name="gender" value="female">Female<br><br><br>
	<input type="submit" name="submit" value="SUBMIT"><br>
</form>


</br>
</br>
</br>
<h2> ENDING THE GAMES </h2>
</body>
</html>