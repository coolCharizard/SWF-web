<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userID = $_GET['userID'];
$sql = "SELECT Listings.listingID, title,price,description 
FROM UserListingPairs 
INNER JOIN Listings on Listings.listingID=UserListingPairs.listingID 
where UserListingPairs.userID = '$userID'";

$result = $con->query($sql);

//Now we iterate over the cursor and put all the data from its associative array and print it

if ($result->num_rows > 0) {
	$jsonRet = recordSetToJson($result);
	echo $jsonRet;
} else {
    echo "0 results";
}


mysqli_close($con);




//if ($result->num_rows > 0) {
    // output data of each row
//    while($row = $result->fetch_assoc()) {
//	$listingId = $row["listingID"];
//	$listingSql = "Select * from Listings where listingID='$listingId'";
//        $listingResult = $con->query($listingSql);
//	$theListingRow = $listingResult->fetch_assoc();
//	$price = $theListingRow["Price"];
//	$title = $theListingRow["Title"];
//	$description = $theListingRow["Description"];
//	echo $title . "~" . $price . "~" . $description . "<br>";
//    }
//} else {
//   echo "0 results";
//}

?>
