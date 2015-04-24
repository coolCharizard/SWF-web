<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$name = $_GET['name'];
$email = $_GET['email'];
$result = mysqli_query($con,"SELECT * FROM AccountHolders where email='$email'");
$row = mysqli_fetch_array($result);
$data = $row[0];

if($data){
	echo $data;
}else{
	echo "*NOSUCHUSER";
}
mysqli_close($con);
?>
