

<?php

$current_page =$_SERVER['SCRIPT_NAME'];

?>

<form method="POST" action="<?php echo $current_page; ?>">
Username :	<input type="text" name="username" placeholder="Enter Username"><br><br>
Password :	<input type="password" name="password" placeholder="Password"><br><br>
	<input type="submit" name="submit" value="SUBMIT !"><br><br>
</form>