<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userID = $_GET['userID'];

$listingID = "L" . uniqid();
$title = $_GET['title'];
$description = $_GET['description'];
$price = $_GET['price'];
$location = $_GET['location'];
$imagelink = $_GET['imagelink'];

$sql1 = "Insert into Listings (listingID, Title, Description, Price, Location, imagelink, flagCount, closed) 
Values('$listingID', '$title', '$description', '$price', '$location', '$imagelink', 0, False)";
$sql2 = "Insert into UserListingPairs (listingID, userID) Values ('$listingID','$userID')";
$sql3 = "Delete from UserListingPairs where listingID = '$listingID', userID = '$userID')";

	if (mysqli_query($con,$sql1))
	{
	   echo "Listing Values have been inserted successfully\n";
	   if (mysqli_query($con,$sql2))
	   {
	   	echo "User-Listing Values have been inserted successfully\n";
	   }
	   else
           {
		echo "Add user-listing association failed\n";	
	   }
	}
	else
	{
		echo "Add listing failed.\n";		
	}



mysqli_close($con);
?>
