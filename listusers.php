<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$userID = $_GET['userID'];

$sql = "Select * from Users"; //works
//$sql = "Select * from Users INNER JOIN AccountHolders";
//$sql = "Select * from Users INNER JOIN AccountHolders where userID <> in(Select friendID from FriendPairs where userID = '$userID')"; 

//Result stores the cursor returned from the DB
$result = $con->query($sql);

//echo $result->fetch_assoc();
//USERS TABLE CONTENTS:  userID PK, name, description, flagCount
//FRIENDPAIRS TABLE CONTENTS: (userID, friendID) PK

//Now we iterate over the cursor and put all the data from its associative array and print it
if ($result->num_rows > 0) {
	$jsonRet = recordSetToJson($result);
	echo $jsonRet;
} else {
    echo "0 results";
}

mysqli_close($con);
?>
