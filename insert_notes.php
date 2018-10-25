<?php 
session_start(); 

/*
function to truncate title string
*/
function truncate($string){
	if (strlen($string) > 15){
		$string = substr($string, 0, 15) . '...';
	}
	return $string;
}






//users name
$uname = $_SESSION['username'];
//the note title and note body sent asynchronously
$title = $_REQUEST['ntitle'];
$noteContent = $_REQUEST['nbody'];
//Current date in the format dd/mm/yy
$date = date('d M Y');

//establishing connection to notes database
$dbconn = mysqli_connect('localhost','root','','notesdb');
if(!$dbconn){
	die("Connection failed:". mysqli_connect_error($dbconn));
}
//server-side form validation
if(empty($title) || empty($noteContent)){
	echo "no contents!";
	return;
}

// check the database, if theres a row containing an already used Title
$checkexist = mysqli_query($dbconn, "SELECT * FROM `notes_log`WHERE `username` = '$uname' AND `note-title` = '$title'");
//if such row exists, print out an error msg then do nothing.
if(mysqli_num_rows($checkexist)){
	echo "<center>";
	echo "Note not Saved. pls, use a unique title!";
	echo "</center>";
	return;

}else{
//if it doesnt exist, save it into the database
$sql = mysqli_query($dbconn,"INSERT INTO `notes_log` (`username`,`note-title`,`note-body`,`date-saved` ) VALUES ('$uname','$title','$noteContent','$date')");
}

//order by desc i.e Most recent appears always at the top
$result1 = mysqli_query($dbconn,"SELECT * FROM notes_log ORDER BY id DESC");
/*
loops through the query result and presents it in  an array i.e 'username:title:body:date' and is displayed in the notes-log div.
*/
while($extract = mysqli_fetch_array($result1)){
	if($extract['username'] === $uname){
		$title = $extract['note-title'];
		
		echo "<div class='saved-note'>";
		echo "<a href='#'><span id='note-title' >". truncate($title) ."</span></a>";
		echo "<span class='fa fa-ellipsis-v' id='fa-ellipsis-v'></span>";
		echo " <span id='note-date'> " .$extract['date-saved']."</span>";
		echo "</div>";
	}
}
















?>