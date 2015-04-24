<?php
$servername = "localhost";
$username = "siddhwcs_temp";
$password = "p0n13s^y";
$myDB = "siddhwcs_artinkcx_swf";
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user = $_GET['username'];
$pass = $_GET['password'];
$result = mysqli_query($con,"SELECT * FROM Users where Email='$user'");
$row = mysqli_fetch_array($result);
$data = $row[0];
if($data){
echo $data;
}else{
echo "*NOSUCHUSER";
}
mysqli_close($con);
?>
