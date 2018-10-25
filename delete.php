<?php

$dbconn = mysqli_connect('localhost','root','','notesdb');
if(!$dbconn){
	die("Connection failed:". mysqli_connect_error($dbconn));
}
if (isset($_GET['id']) && is_numeric($_GET['id'])){ 
$delete = $_GET['id'];

// delete record from database
if ($stmt = mysqli_prepare($dbconn,"DELETE FROM notes_log WHERE id = ? LIMIT 1"))
{
$stmt->bind_param("i",$delete);
$stmt->execute();
$stmt->close();
}
else
{
echo "ERROR: could not prepare SQL statement.";
}
mysqli_close();

// redirect user after delete is successful
header("Location: index.php");
}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: index.php");
}

?>