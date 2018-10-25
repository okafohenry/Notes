 <?php
 session_start();
if(!isset($_SESSION['username'])){


?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="login-body">
		<form action="login.php" method="POST" name="notes-user-login" class="input-group">
			
			<center><span id="login-txt"> LOGIN </span></center><br>
			<p>Username</p>
			<input type="textbox" name="username" required class="form-control" size="25" placeholder="Hajisky123"><br><br><br>
			<p>Password</p>
			<input type="password" name="psd" required class="form-control" placeholder="*****"><br><br><br>

			<input type="Submit" name="submit-login" value="Proceed" class="btn btn-info" size="25"><br><br>

			<span class="reg-alt">Yet to register your session? <a href="register.php" >Sign Up</a><span>

		</form>
	</div>
</body>
</html>

<?php
exit();
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>notes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
	<script type="text/javascript" src="notesJS.js"></script>
	<script type="text/javascript" src="notesAjax.js"></script>
	<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">

	
</head>
<body onload="loadCount()">
	<div class=" content-body">
		<!--Navigation-->
		<div>
			<nav class="main-nav">
				<a href="index.php" id="notes-logo"> Notes </a>
				<div class="side-options">
					<a href="#" onclick="on()" title="New Note" id="new">
						<span class="fa fa-plus"></span>
					</a>
					<span class="options-dropdown">
						<a href="#" title="Options" id="opt" role="button" onclick="dropdown()">
							<span class="fa fa-ellipsis-v"></span>
						</a>
							<!---  options drop down  ---->
							<div id="dropdownContent" class="dropdownContent-opt">
								<a href="logout.php">Logout</a>
								<a href="deleteAll.php" onclick="return confirm('Are you sure?')">Delete all</a>
							</div>
					</span>
					
				</div>
			</nav>
		</div>

		<!-- New Note overLay -->
		<div>
			<div class="new-note-overlay" id="new-note-overlay">
				<a href="#" id="close" onclick="off()">&times;</a>
				<div class="new-note-content">
					<form name="form1">
						<label >Title (18)</label><br>
						<input type="textbox" name="ntitle" placeholder="e.g My first day at work" id="note_title" class="form-control" size="40" maxlength="18"> <br>
						<label >Write Note (550)</label><br>
						<textarea name="nbody" id="note_body" class="form-control" cols="40" rows="10" maxlength="550"></textarea><br>
						<a href="#" class="btn btn-info" id="savebtn" onclick="submitNote()">save</a>
					</form>
				</div>
			</div>

			<!--Main-body-content-->
			<div class="grid-container container">
					<!--left nav - saved/recently added Notes-->
				<div class="row">
					<div class="col-md-5">
						<!-- saved notes nav-->
						<nav class="saved-notes-nav">
							<h5 id="saved-notes-count"></h5>
							<h5 id="recntly-added-text">Saved Notes</h5>
						</nav>
						<!--saved notes log -->
						<div id="notes-log"></div>
					</div>
					<!--new note pane-->
					<div class="col-md-7">
							<div class="crt-new-img-txt">
								<div class="note-display" id="note-display"></div>
								<center><span class="fa fa-file-text-o" id="file-text-o"></span>
								<h5 id="click-text">Click '+' to create a new note!</h5><center>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--

-->
</body>
</html>