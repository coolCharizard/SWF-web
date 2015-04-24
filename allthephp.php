<!DOCTYPE html>
<head>
<LINK href="stylesheet.css" rel="stylesheet" type="text/css">
</head>

<?php

global $currentUserID;

$url = 'http://localhost/old_sandbox/';

function call_listusers(){
	ob_start(); // begin collecting output
	include_once(__DIR__.'/listusers.php');
	$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	return $result;
	}
	
function call_getloginkey($username,$password){
	global $url;
	ob_start(); // begin collecting output
	include_once($url.'getuserlogin.php?'.'username='.$username.'&password='.$password);
	$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	return $result;
	}
	
function call_getuser($name,$email){
	global $url;
	ob_start(); // begin collecting output
	include_once($url.'getuser.php?'.'name='.$name.'&email='.$email);
	$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	return $result;
	}
	
function call_adduser($username,$password,$email,$name){
	global $url;
	ob_start(); // begin collecting output
	include_once($url.'adduser.php?'.'username='.$username.'&password='.$password.'&email='.$email.'&name='.$name);
	$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	return $result;
	}

function call_deleteuser($userID){
	global $url;
	ob_start(); // begin collecting output
	include_once($url.'deleteuser.php?'.'userID='.$userID);
	$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	return $result;
	}

function call_addfriend($userID,$friendID){
	global $url;
	ob_start(); // begin collecting output
	include_once($url.'addfriend.php?'.'userID='.$userID.'&friendID='.$friendID);
	$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	return $result;
	}

function call_addlisting($userID,$price,$location,$description,$image_link){
	global $url;
	ob_start(); // begin collecting output
	include_once($url.'addlisting.php?'.'userID='.$userID.'&price='.$price.'&location='.$location."&image_link".$description."&description");
	$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	return $result;
	}

function call_deletelisting($listingID){
	global $url;
	ob_start(); // begin collecting output
	include_once($url.'deletelisting.php?'.'listingID='.$listingID);
	$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	return $result;
	}

function call_adddeal($userID,$listingID,$price,$location,$description,$image_link){
	global $url;
	ob_start(); // begin collecting output
	include_once($url.'addlisting.php?'.'userID='.$userID.'&listingID='.$listingID.'&price='.$price.'&location='.$location."&image_link".$description."&image_link");
	$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	return $result;
	}

function call_claimdeal($listingID,$dealID){
	global $url;
	ob_start(); // begin collecting output
	include_once($url.'claimdeal.php?'.'listingID='.$listingID.'&dealID='.$dealID);
	$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
	return $result;
	}

	?>

</html>
