<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$listingID = $_GET['listingID'];
$sql = "SELECT * FROM Deals where listingID='$listingID'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
	$jsonRet = recordSetToJson($result);
	echo $jsonRet;
} else {
    echo "0 results";
}

mysqli_close($con);
?>
