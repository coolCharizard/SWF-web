<?php
include(__DIR__.'/header.php');
$con=mysqli_connect($servername,$username,$password,$myDB);
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$userID = uniqid();
$userID = "U" . uniqid();
$username = $_GET['username'];
$email = $_GET['email'];
$password = $_GET['password'];
$name = $_GET['name'];

$alreadyExistsCheckSql = "SELECT * FROM AccountHolders where email='$email' or username='$username'";
$alreadyExistsCheck = mysqli_query($con, $alreadyExistsCheckSql);
if ($alreadyExistsCheck->num_rows > 0) {
   echo "username or email already in use";
} else {
	$sql1 = "Insert into AccountHolders (userID, username, email, password, isAdmin) Values('$userID', '$username', '$email', '$password', 0)";
	$sql2 = "Insert into Users (userID, name, description, flagCount) Values('$userID', '$name', '',0)";
	

	if (mysqli_query($con,$sql1))
	{
	   echo "Accountholder Values have been inserted successfully\n";
	   if (mysqli_query($con,$sql2))
	   {
	        echo "User Values have been inserted successfully\n";
	   }
	   else
           {
		echo "User Registration failed\n";
	   }
	}
	else
	{
		echo "AccountHolder Registration failed.\n";
	}
}
?>
