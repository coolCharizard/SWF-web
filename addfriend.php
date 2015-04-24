<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userID = $_GET['userID'];
$friendID = $_GET['friendID'];

//enforce a rule where lower id is always user id, higher id is friend id, 
//so that reciprocal friendships can't be added.  Fixes bug with double add or missing friends.

//if ($friendID < $userID){
//	$temp = $userID;
//	$userID = $friendID;
//	$friendID = $temp;
//}

$sql = "Insert into FriendPairs (userID, friendID) Values ('$userID', '$friendID')";

if (mysqli_query($con,$sql) && $userID != $friendID)
{
   echo "success";
}
else
{
   echo "New friends failed to be inserted.";
}
mysqli_close($con);
?>
