<?php
include "conn.php";
session_start();
$uid = $_SESSION['id'];
$title= $_POST['title'];
$note = $_POST['note'];




$sql = "Insert into personal_notes (Title, Description, User_ID) VALUES
('$title','$note', '$uid');";
mysqli_query($conn, $sql);

echo $sql;

if(mysqli_affected_rows($conn)<=0)
{
  echo "<script>alert('Unable to add note ! \\nPlease Try Again!');</script>";
//   die("<script>window.history.go(-1);</script>");
}

echo "<script>alert('Note Added Successfully');</script>";
 echo "<script>window.location.href='userprofile.php';</script>";

?>