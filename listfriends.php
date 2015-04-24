<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userID = $_GET['userID'];

//USERS TABLE CONTENTS:  userID PK, name, description, flagCount
//FRIENDPAIRS TABLE CONTENTS: (userID, friendID) PK


$sql = "Select FriendPairs.friendID, email, name, description, username from FriendPairs 
INNER JOIN Users on FriendPairs.friendID = Users.userID 
INNER JOIN AccountHolders on AccountHolders.userID = FriendPairs.friendID 
where FriendPairs.userID = '$userID'";

//TODO: FIX BUG where some friends are missed because the user is their friend, and not vice versa


//$sql = "Select * from Users where userID in(Select friendID from FriendPairs where userID = '$userID')"; //also works
$result = $con->query($sql);

if ($result->num_rows > 0) {
	$jsonRet = recordSetToJson($result);
	echo $jsonRet;
} else {
    echo "0 results";
}


mysqli_close($con);











    //output data of each row
//  while($row = $result->fetch_assoc()) {
//	$friendID = $row["userID"];
//	$getEmailSql = "Select * from AccountHolders where userID='$friendID'";
//	$accountHoldersResult = $con->query($getEmailSql);
//	$theRow = $accountHoldersResult->fetch_assoc();
//	$email = $theRow["email"];
//	$username = $theRow["username"];
        //echo "userid: " . $friendID . "- Email: " . $email . " - Name: " . $row["name"]. " - Description: " . $row["description"]. "<br>";
//	echo $friendID . "~" . $email . "~" . $row["name"]. "~" . $row["description"] . "~" . $username . "<br>";
//}

?>
