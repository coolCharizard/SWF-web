<!DOCTYPE HTML> 
<?php include_once(__DIR__.'/allthephp.php');?>

<html>
<head>
	<LINK href="stylesheet.css" rel="stylesheet" type="text/css">
	<style>
	.error {color: #FF0000;}
	</style>
</head>
<body> 

<?php
// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["username"])) {
     $usernameErr = "Username is required";
   } else {
     $username = test_input($_POST["username"]);
   }

   if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
   } else {
     $password = test_input($_POST["password"])   ;
	}

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

	<div class="container">
		<div class="center_div">
		<h1>Welcome to "Shopping With Friends"<h1>
		<h2>Login Page</h2>
			<p><span class="error">* required field.</span></p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
			   Username: <input type="text" name="username" value="<?php echo $username;?>">
			   <span class="error">* <?php echo $usernameErr;?></span>
			   <br><br>
			   
			   Password: <input type="password" name="password" value="<?php echo $password;?>">
			   <span class="error">* <?php echo $passwordErr;?></span>
			   <br><br>
			   <input type="submit" name="submit" value="Submit"> 
			</form>
		
			<?php
			$result = call_getloginkey($username,$password); 	
			echo $result;
			
			if (strpos($result,'NOSUCHUSER') == false) {
					global $currentUserID;
					$currentUserID = $result;
				    header("Location:page_showusers.php");
			}
			else{
					echo "<h1><style=color:red>login failed</style></h1>";
			}
			?>


			
		</div>
	</div>

</body>
</html>