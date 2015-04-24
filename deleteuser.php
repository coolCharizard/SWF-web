<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userID = $_GET['userID'];

$sql = "Delete from AccountHolders where userID = '$userID'";

if (mysqli_query($con,$sql))
{
   echo "success";
}
else
{
   echo "account holder failed to be deleted";
}
mysqli_close($con);
?>
