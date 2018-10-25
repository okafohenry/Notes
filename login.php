<?php
session_start();

$dbconn = mysqli_connect("localhost","root","","notesdb");
if(!$dbconn){
	die("Connection failed:". mysqli_connect_error($dbconn));
}


if (empty($_POST['username']) || empty($_POST['psd'])) {
	echo "<center>Please check that no field is empty and <a href='index.php'>retry</a></center>";
	return;
}else{
	$username = mysqli_real_escape_string($dbconn,$_POST['username']);
	$password = sha1(mysqli_real_escape_string($dbconn,$_POST['psd']));
}


	
$result1 = mysqli_query($dbconn,"SELECT * FROM `reg_users` WHERE username = '$username' AND password = '$password'");
//perform succeeding actions if row exists
if(mysqli_num_rows($result1)){
//present the result in an array i.e 'username:password' and store resulting array in a variable
//for future use.
	$res = mysqli_fetch_array($result1);
	$_SESSION['username'] = $res['username'];

	echo "<center>login successful!. click <a href='index.php'>here</a> to start Using Notes</center>";

}
else{
	echo "<center>Incorrect Username/password, <a href='index.php'>retry</a></center>";
	echo "<center>or</center>";
	echo "<center><a href='register.php'>create an account</a></center>";

}













?>