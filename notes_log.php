<?php
session_start(); 

/*
function to truncate title string

function truncate($string){
	if (strlen($string) > 20){
		$string = substr($string, 0, 20) . '...';
	}
	return $string;
}

*/

//users name
$uname = $_SESSION['username'];

//establishing connection to notes database
$dbconn = mysqli_connect('localhost','root','','notesdb');
if(!$dbconn){
	die("Connection failed:". mysqli_connect_error($dbconn));
}


//order by desc i.e Most recent appears always at the top
$result1 = mysqli_query($dbconn,"SELECT * FROM notes_log ORDER BY id DESC");
/*
loops through the query result and presents it in  an array i.e 'username:title:body:date' and is displayed in the notes-log div.
*/
while($extract = mysqli_fetch_array($result1)){
	if($extract['username'] === $uname){
		//$rows = mysqli_num_rows($extract['username']); //get the number of rows related to the username
		$title = $extract['note-title'];

	echo "<div class='saved-note' >";
	echo "<a href='#' id='n-t-l'><span id='note-title'  class='note-title' onclick='displayNote(this)'>". $title ."</span></a>";
	echo "<div class='trig-dropdown'>
			<span class='fa fa-ellipsis-v' id='fa-ellipsis-v'></span>
			<div class='dropdowncontent-noteslog' id='dropdowncontent-noteslog'>
			<a href='delete.php?id=".$extract['id']. "'>delete</a></div></div>";
	echo " <span id='note-date'> " .$extract['date-saved']."</span>";
	echo "</div>";

	}
}





?>