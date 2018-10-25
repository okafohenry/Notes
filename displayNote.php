<?php
session_start();

$uname = $_SESSION['username'];
$note_title = $_REQUEST['note_content'];


//echo $note_title;

$dbconn = mysqli_connect("localhost","root","","notesdb");
if(!$dbconn){
	die("connection failed: ". mysqli_connect_error($dbconn));
}

$result1 = mysqli_query($dbconn, "SELECT * FROM notes_log WHERE `username` = '$uname' AND `note-title` = '$note_title'");
while($extract = mysqli_fetch_array($result1)){
	if($extract['username'] === $uname && $extract['note-title'] === $note_title){
		echo "<span id='disp-title'><h4><center>". ucwords($extract['note-title']). "</center></h4></span>";
		echo "<span id='disp-body'>". ucfirst($extract['note-body']). "</span>";
	}else{
		echo "<center>Not found!</center>";
		return;
	}
}



?>