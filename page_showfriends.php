<!DOCTYPE html>
<?php include_once(__DIR__.'/allthephp.php');?>

	<head>
	</head>
		
	<body>
		<script src="jsonformat.js"></script>
		<div class="container">
			<div class="center_div">
				<h1>List of Friends!</h1>
				<p>Here is your friendly neighborhood list of users of Shopping with Friends.  Isn't this cool?</p>
				<div id="id01">
				</div>
				<script>
					var jsonString = <?php echo json_encode(call_listfriends(currentUserID)); ?>; //Don't forget the extra semicolon!
					friend_list = jsonToArray(jsonString);
					out = arrayToListHTML(friendData); 
					document.getElementById("id01").innerHTML = out;
				</script>
			</div>
		</div>
	</body>
</html>
