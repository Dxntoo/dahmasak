<?php
session_start();

include "conn.php";


	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
		
	$sql = "Select * from chef where email = '".$email."'
	and password = '".$password."'";
	$result = mysqli_query($conn, $sql);	
	
if(mysqli_num_rows($result)<=0)
{
	//sql checking for the admin user
	$sql = "Select * from chef where email = '".$email."'
	and password = '".$password."'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result)<=0)
	{
		echo "<script>alert('Wrong username / password !Please Try Again!');";
		die("window.history.go(-1);</script>");
	}
}

if($row=mysqli_fetch_array($result))
{
$_SESSION['id'] = $row['Chef_ID'];
$_SESSION['name'] = $row['Chef_Name'];
$_SESSION['email'] = $row['Email'];
$_SESSION['password'] = $row['Password'];

}

echo "<script>alert('Welcome back ".$_SESSION['name']."!');";
echo "window.location.href='chefhome.php';</script>";
// Change the directory of the User home page here


?>
