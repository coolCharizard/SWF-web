<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userID = $_GET['userID'];
$listingID = $_GET['listingID'];

$dealID = "D" . uniqid();
$title = $_GET['title'];
$description = $_GET['description'];
$price = $_GET['price'];
$location = $_GET['location'];
$imagelink = $_GET['imagelink'];

$sql1 = "Insert into Deals (ownerID, listingID, dealID, title, description, price, location, imagelink, flagCount, claimed) 
Values('$userID','$listingID','$dealID', '$title', '$description', '$price', '$location', '$imagelink', 0, False)";

$sql2 = "UPDATE Listings
SET hasSeenDeals=False
WHERE ListingID='$listingID'";


	if (mysqli_query($con,$sql1))
	{
	   echo "Deal Values have been inserted successfully\n";
		if (mysqli_query($con,$sql2)){
			echo "hasSeenDeals has been updated in an entry in Listings successfully";
		}
                else
	        {
		         echo "hasSeenDeals failed to update in listing.\n";
		        //echo mysqli_error($con);	
	        }
	}
	else
	{
		echo "Add deal failed.\n";
		//echo mysqli_error($con);	
	}



mysqli_close($con);
?>
