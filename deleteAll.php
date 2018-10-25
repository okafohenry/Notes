<?php 
session_start();

$uname = $_SESSION['username'];

$dbconn = mysqli_connect('localhost','root','','notesdb');
if(!$dbconn){
	die("Connection failed:". mysqli_connect_error($dbconn));
}
if($stmt = $dbconn->prepare("DELETE FROM notes_log where username = ? ")){
	$stmt->bind_param("s",$uname);
	$stmt->execute();
	$stmt->close();
}else{
	echo "ERROR: could not prepare SQL statement:". $dbconn->error;
}
mysqli_close($dbconn);
// redirect user after delete is successful!
header("Location: index.php");


?>