<?php

/*
	this page is required to get the doctors in a table
*/



$conn = mysqli_connect('localhost','root','','dp');

if(!$conn){
	die();
}

$query_1 = "SELECT id,surname,username FROM doctors";

$results = mysqli_query($conn,$query_1);

$final_table = null;
$table_size = 0;

if(mysqli_num_rows($results)>0){
	while($row = mysqli_fetch_assoc($results)){

		/*
			$arr is an arrays of associative arrays that each index in $arr represents a row in the table
			and each row is an associative array of the columns we ask for in the query
		*/

		$final_table[$table_size]= $row;
		$table_size++;
    }
}
else{
?>
<h1>There Is No Data To Show </h1>

<?php
}

?>
