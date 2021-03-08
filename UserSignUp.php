<?php
include "conn.php";
$username= mysqli_real_escape_string($conn,$_POST['User_Name']);
$email = mysqli_real_escape_string($conn,$_POST['User_Email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$confirmpassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);


if($password !== $confirmpassword)
{
  echo "<script>alert('Password and confirmed password are not same')";
  die("window.history.go(-1);</script>"); 
//   THIS IS NOT WORKING
}

$sql = "Insert into user (User_Name, Email, Password) VALUES
('$username','$email','$password');";
mysqli_query($conn, $sql);

//echo $sql;
if(mysqli_affected_rows($conn)<=0)
{
  echo "<script>alert('Unable to register ! \\nPlease Try Again!');</script>";
  die("<script>window.history.go(-1);</script>");
}

echo "<script>alert('Registered Successfully!Please login now!');</script>";
echo "<script>window.location.href='UserLogin.html';</script>";

?>