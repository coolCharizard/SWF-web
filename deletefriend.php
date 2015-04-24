<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userID = $_GET['userID'];
$friendID = $_GET['friendID'];

$sql = "Delete from FriendPairs where userID = '$userID' and friendID = '$friendID'";
$sql2 = "Delete from FriendPairs where userID = '$friendID' and friendID = '$userID";

if (mysqli_query($con,$sql))
{
   echo "success";
}
else
{
	if (mysqli_query($con,$sql2))
	{
		echo "success";
	}
	else
	{
   		echo "Friend pair failed to be deleted.";
	}
}
mysqli_close($con);
?>
