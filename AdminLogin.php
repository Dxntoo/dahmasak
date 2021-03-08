<?php
session_start();

include "conn.php";


	$email = mysqli_real_escape_string($conn,$_POST['Admin_Email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
		
	$sql = "Select * from admin where Email = '".$email."'
	and Password = '".$password."'";
	$result = mysqli_query($conn, $sql);	
	
if(mysqli_num_rows($result)<=0)
{
	//sql checking for the admin user
	$sql = "Select * from admin where Email = '".$email."'
	and Password = '".$password."'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result)<=0)
	{
		echo "<script>alert('Wrong username / password !Please Try Again!');";
		die("window.history.go(-1);</script>");
	}
}

if($row=mysqli_fetch_array($result))
{
$_SESSION['Admin_ID'] = $row['Admin_ID'];
$_SESSION['email'] = $row['Email'];
$_SESSION['password'] = $row['Password'];

}

echo "<script>alert('Welcome back admin ".$_SESSION['Admin_ID']."!');";
echo "window.location.href='adminhome.html';</script>";
// Change the directory of the User home page here


?>
