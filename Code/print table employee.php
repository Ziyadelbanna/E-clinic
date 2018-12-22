<style>
.error {color: #FF0000;}
.btn{
  color: white;
}
</style>
<?php
ob_start();
$found = false;
$surnames = null;
$ids=null;
$counter=0;
if($table_size>0){

  print "<tr><td><strong>Index</strong></td>";
  echo"      ";
  print "<td><strong>Doctor's Name</strong></td>";
  echo"      ";
  print "<td><strong>E_mail</strong></td>";
  echo"      ";
  print "<td><strong><span class=\"error\">Choose Doctor</strong></span></td></tr>";

for($table_printer=0 ; $table_printer < $table_size ;$table_printer++){
      $row = $final_table[$table_printer];
	  $d_id = $table_printer+1;
	  $surnames[$counter] = $row['surname'];
	  $ids[$counter] = $row['id'];
	  $surname = $row['surname'];
	  $email = $row['username'];
	  $counter++;
	  print "<tr><td>$d_id</td>";
	  print "<td>$surname</td>";
	  print "<td>$email</td>";
	  print "<form method=\"GET\" action=\"\">";
	  print "<td><input type =\"radio\" name=\"doctor\" value=\"$surname\"> </td></tr>";

}
}
 print "<td>  </td>";
 print "<td>  </td>";
 print "<td>  </td>";
 print "<td> <form method=\"GET\" action=\"\">
<input class=\"btn-success\" type =\"submit\" name=\"submit\" value=\"Submit\">
</form> </td>";

if(isset($_GET['submit'])){
	for($table_printer=0 ; $table_printer < $table_size ;$table_printer++){
		$row = $final_table[$table_printer];
	  	$surname = $row['surname'];
	  	$id = $row['id'];

	  	if(isset($_GET['doctor'])){
	  		if($_GET['doctor']==$surname){
	  		$_SESSION['doctor_id'] = $id;
	  		$_SESSION['doctor_name'] = $surname;
	  		$found = true;
	  		break;
	  	}
	  	}
	}
}
	if($found){
		header("Location: profile template.php");
	}
	ob_end_flush();
?>
