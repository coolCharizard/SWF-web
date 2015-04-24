<?php
	include "/home/siddhwcs/public_html/artineer.com/sandbox/header.php";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully";
	    print "hi";
	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " . $e->getMessage();
	}
	?>
