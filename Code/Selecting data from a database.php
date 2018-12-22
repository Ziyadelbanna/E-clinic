<?php

$conn = mysqli_connect('localhost','root','','dp');

if(!$conn){
	die();
}

$sql = "SELECT id,car FROM cars";
$sql2 = "SELECT id,username FROM users";

$results = mysqli_query($conn,$sql);
$results2 = mysqli_query($conn,$sql2);

$arr = null;
$i = 1;

if(mysqli_num_rows($results2)>0){
	while($row = mysqli_fetch_assoc($results2)){
		
		/* 
			$arr is an arrays of associative arrays that each index in $arr represents a row in the table
			and each row is an associative array of the columns we ask for in the query 	
		*/ 

		$arr[$i]= $row;
		$i++; 
    }
}
else{
echo "0 results";
}

foreach($arr as $element=>$data){
	print_r($data);
	echo "<br>";
}
/*

needs to be made right 


die();
$user = '';

if(mysqli_num_rows($results)>0){
	while($row = mysqli_fetch_assoc($results)){
	
			foreach ($arr as $key => $value) {
				if( $value == $row["id"]){
					$user = 1;
				}
		}
		 echo "id: " . $row["id"]. " - car model: " . $row["car"]."<br>";
		}
    }


else{
echo "0 results";
}
*/
/*
**************************** PRINTING IN AN HTML TABLE (OBJECT ORIENTED WAY) **********************************

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
    }
    echo "</table>";


*/


/*
***************************************** LIMITS IN SELECTING *****************************************
THERE IS A WAY TO SPECIFY THE NUMBER OF LINES YOU WANT FROM A CERTAIN DATABASE : 

$sql = "SELECT * FROM Orders LIMIT 30";

DISCRIPTION OF THE ABOVE : SELECTS ALL RECORDS FROM 1 TO 30

$sql = "SELECT * FROM Orders LIMIT 10 OFFSET 15";

DISCRIPTION OF THE ABOVE : RETURNS 10 RECORDS STARTING FROM 16 [OFFSET 15]

$sql = "SELECT * FROM Orders LIMIT 15, 10";

DISCRIPTION OF THE ABOVE :  RETURNS 10 RECORDS STARTING FROM 16 

*/
?>