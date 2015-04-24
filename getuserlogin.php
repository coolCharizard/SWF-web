<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user = $_GET['username'];
$pass = $_GET['password'];
$result = mysqli_query($con,"SELECT * FROM AccountHolders where username='$user' and Password='$pass'");
$row = mysqli_fetch_array($result);
$data = $row[0];

if($data){
	echo $data;
}else{
	echo "*NOSUCHUSER";
}
mysqli_close($con);
?>
