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
$usernameErr = $passwordErr = $emailErr = "";
$username = $name = $password = $password_confirm = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["username"])) {
     $usernameErr = "Username is required";
   } else {
     $username = test_input($_POST["username"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $usernameErr = "Only letters and white space allowed"; 
     }
   }

     $name = test_input($_POST["name"]);
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }

   if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
   } else {
     $password = test_input($_POST["password"])   ;
	}

	if (empty($_POST["password_confirm"])) {
     $passwordErr = "Password confirmation is required";
   } else {
     $password_confirm = test_input($_POST["password_confirm"])   ;
	}

	if ($password != $password_confirm) {
		$passwordErr = "Password confirmation must match password field";
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
		<h2>Registration Page</h2>
			<p><span class="error">* required field.</span></p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
			   Username: <input type="text" name="username" value="<?php echo $username;?>">
			   <span class="error">* <?php echo $usernameErr;?></span>
			   <br><br>
			   
			   Name: <input type="text" name="name" value="<?php echo $name;?>">
			   <br><br>
			   
			   Password: <input type="password" name="password" value="<?php echo $password;?>">
			   <span class="error">* <?php echo $passwordErr;?></span>
			   <br><br>
			   
			   Confirm Password: <input type="password" name="password_confirm" value="<?php echo $password_confirm;?>">
			   <br><br>
			   
			   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
			   <span class="error">* <?php echo $emailErr;?></span>
			   <br><br>
			   <input type="submit" name="submit" value="Submit"> 
			</form>
		
			<?php if (!empty($_POST['username']) && !empty($_POST['password'])) { ?>
			  <div class="output">
					<?php echo "<h1><span class=\"error\">registration failed</span></h1>";?>;
			  </div>
			<?php } ?>
			
			<?php
			$result = call_adduser($username,$password,$email,$name); 	

			echo $result;
			if (strpos($result,'success') !== false) {
				    header("Location:page_showusers.php");
			}

			?>

		</div>
	</div>

</body>
</html>