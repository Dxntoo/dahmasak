<?php
	include "conn.php";
	
?>

<?php
$Chef_ID=$_POST['Chef_ID'];
$name=$_POST['Chef_Name'];
$pass=$_POST['Password'];
$email=$_POST['Email'];
$profileImage=$_POST['profile_image'];



$sql="Update chef SET ".
"Chef_Name = '$name',".
"Password = '$pass',". 
"Email = '$email',". 
"profile_image = '$profileImage' Where Chef_ID = $Chef_ID";





mysqli_query($conn, $sql); 


if(mysqli_affected_rows($conn) <=0)
{
	die("<script>alert('Fail: Unable to insert data!'):windows.history.go(-1);</script>");
}
if(mysqli_affected_rows($conn)<=0)
{
	echo("<script>alert('Cannot update data!');</script>");
	echo "<script>window.location.href='chefprofile2.php?id=$Chef_ID';</script>";


}
echo "<script>alert('Successfully updated data!');</script>";
echo "<script>window.location.href='chefprofile2.php?id=$Chef_ID';</script>";
?>