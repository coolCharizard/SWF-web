<?php
$servername = "localhost";
$username = "swfuser";
$password = "p0n13s^y";
$myDB = "swfdb";

function recordSetToJson($mysql_result) {
 $rs = array();
 while($rs[] = $mysql_result->fetch_assoc()) {
    // you don´t really need to do anything here.
  }
 return json_encode($rs);
}


?>
