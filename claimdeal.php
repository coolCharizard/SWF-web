<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$listingID = $_GET['listingID'];
$dealID = $_GET['dealID'];

$sql = "UPDATE Deals
SET claimed=True,
WHERE ListingID='$listingID' and 'dealID = $dealID';";

if (mysqli_query($con,$sql))
{
   echo "success";
}
else
{
   echo "Deal failed to be claimed.";
}
mysqli_close($con);
?>
