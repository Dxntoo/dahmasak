<?php
include "conn.php";

$username= mysqli_real_escape_string($conn,$_POST['ChefName']);
$email = mysqli_real_escape_string($conn,$_POST['ChefEmail']);
$phone = mysqli_real_escape_string($conn,$_POST['ChefPhone']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$confirmpassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);


if($password !== $confirmpassword)
{
  echo "<script>alert('Password and confirmed password are not same')";
  die("window.history.go(-1);</script>"); 
//   THIS IS NOT WORKING
}

$sql = "INSERT INTO chef (Chef_Name, Email, Phone_Number, Password, Profile_Image) VALUES 
('$username','$email','$phone','$password','test')";
mysqli_query($conn, $sql);

//echo $sql;
if(mysqli_affected_rows($conn)<=0)
{
  echo "<script>alert('Unable to add new chef ! \\nPlease Try Again!');</script>";
  die("<script>window.history.go(-1);</script>");
}

echo "<script>alert('Chef Added Successfully!');</script>";
echo "<script>window.location.href='adminmgchef.php';</script>";

?>