<?php
	if (isset($_POST['submit-reg'])) {
		//parsing field values into a php variables
		$dbconn = mysqli_connect('localhost','root','','notesdb');
		if(!$dbconn){
			die('connection failed!'. mysqli_connect_error($dbconn));
		}

		if (empty($_POST['note-uname']) || empty($_POST['note-psd1']) || empty($_POST['note-psd2'])) {
			echo "<center>Please ensure that no field is empty! <a href='register.php'>retry</a></center>";
			return;
		}else{
			$username  = mysqli_real_escape_string($dbconn, $_POST['note-uname']);
			$psd1 = sha1(mysqli_real_escape_string($dbconn, $_POST['note-psd1']));
			$psd2 = sha1(mysqli_real_escape_string($dbconn, $_POST['note-psd2']));
		}

		//inserting parsed values into database
		if($psd1 == $psd2){
			$checkexist = mysqli_query($dbconn, "SELECT * FROM reg_users WHERE username = '$username'");
			if(mysqli_num_rows($checkexist)){
				echo "<center>Username is taken, choose a unique username!<a href='register.php'> retry</a></center>";
			}else{
				$result = mysqli_query($dbconn, "INSERT INTO reg_users (`username`,`password`) VALUES ('$username','$psd1')"); 
				if($result){
					echo "<center>Successfully added to database, click <a href='index.php'>here</a> to login</center>";
				}
			}

		}else{
			echo "<center>passwords don't match, <a href='register.php'>retry!</a></center>";
			return;
		}
		


		
	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign up to create your Session</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="reg-container">
		<form name="notes-user-reg" action="register.php" method="POST" class="input-group">
			<center><span id="regtr-txt"> SIGN UP </span></center><br>
			<p>Username</p>
			<input type="textbox" name="note-uname" required class="form-control" size="25" placeholder="Hajisky123"><br><br><br>
			<p>Password</p>
			<input type="password" name="note-psd1" required class="form-control" placeholder="*****"><br><br><br>

			<p>Confirm Password</p>
			<input type="password" name="note-psd2" class="form-control" placeholder="*****"><br><br><br>

			<input type="Submit" name="submit-reg" value="Register" class="btn btn-info" size="25"><br><br>
			<span class="log-alt">Already have an account? <a href="index.php" >login</a> </span>
		</form>
	</div>
</body>
</html>