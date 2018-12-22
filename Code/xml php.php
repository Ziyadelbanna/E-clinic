<?php

$xml = simplexml_load_file('xml example.xml');

foreach($xml->inventor as $inventor){
echo $inventor->name."  :  ".$inventor->company."<br><br><br><br>";
}
?>