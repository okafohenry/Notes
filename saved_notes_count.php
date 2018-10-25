<?php
session_start();

$uname = $_SESSION['username'];


//creating a connection to the mysql database, name: chatbox00
$dbconn = mysqli_connect("localhost","root","","notesdb");
if(!$dbconn){
	die("connection failed: ". mysqli_connect_error($dbconn));
}

$result1 = mysqli_query($dbconn, "SELECT * FROM notes_log WHERE username = '$uname'");

echo $result1 -> num_rows;

/*
$result1 = mysqli_query($dbconn, "SELECT * FROM notes_log WHERE username = '$uname'");

 $count = mysqli_num_rows($result1); 



echo "$count";
*/

?>