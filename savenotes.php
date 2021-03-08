<?php
include "conn.php";

	$nid = $_POST ['nid'];
	$title = $_POST ['title'];
	$date = $_POST ['date'];
	$note = $_POST ['note'];
	// $uid = $_POST ['User_ID'];



$sql="Update personal_notes SET ".
"Title = '$title', ".
"Date = '$date', ".
"Description = '$note' where PersonalNotes_ID = $nid ";

mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn)<=0)
{die ("<script>alert ('Cannot Save Note \n Please try again');</script>");
	
	 echo"<script>window.location.href='privatenotes.php?id=$nid';</script>";
}
	echo "<script>alert ('Successfully Saved Note');</script>";
	 echo"<script>window.location.href='privatenotes.php?id=$nid';</script>";



?>
