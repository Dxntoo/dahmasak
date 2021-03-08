<?php
include "conn.php";

$uid = $_POST['uid'];
$name = $_POST['name'];
$email = $_POST['User_Email'];


$sql="Update User SET ".
"User_Name = '$name', ".
"Email = '$email' where User_ID = $uid ";

mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn)<=0)
{die ("<script>alert ('Cannot Update Data');</script>");
	echo"<script>window.location.href='adminedituser.php?id=$id';</script>";
}
	echo "<script>alert ('Successfully updated table');</script>";
	echo"<script>window.location.href='adminedituser.php?id=$uid';</script>";



?>
