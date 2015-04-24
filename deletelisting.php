<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userID = $_GET['listingID'];
$listingID = $_GET['friendID'];

$sql = "Delete from UserListingPairs where listingID = '$listingID', userID = '$userID')";
$sql2 = "Delete from Listings where listingID = 'listingID'";

if (mysqli_query($con,$sql) && mysqli_query($con,$sql2))
{
   echo "success";
}
else
{
   echo "Listing failed to be deleted properly.  Please check the UserListingPairs and Listings.";
}
mysqli_close($con);
?>
