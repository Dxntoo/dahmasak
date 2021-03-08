
<?php
	include "conn.php";
	
?>

<?php
$user_id=$_POST['User_ID'];
$name=$_POST['User_Name'];
$pass=$_POST['Password'];
$email=$_POST['Email'];
$profileimage=$_POST['Profile_Picture'];



$sql="Update user SET ".
"User_Name = '$name',".
"Password = '$pass',". 
"Email = '$email',". 
"Profile_Picture = '$profileimage' Where User_ID = $user_id";




mysqli_query($conn, $sql); 


if(mysqli_affected_rows($conn) <=0)
{
	die("<script>alert('Fail: Unable to insert data!'):windows.history.go(-1);</script>");
}
if(mysqli_affected_rows($conn)<=0)
{
	echo("<script>alert('Cannot update data!');</script>");
	echo "<script>window.location.href='userprofile.php?id=$user_id';</script>";


}
echo "<script>alert('Successfully updated data!');</script>";
echo "<script>window.location.href='userprofile.php?id=$user_id';</script>";
//if(mysqli_affected_rows($conn)<=0)
//{
//	echo("<script>alert('Cannot update data!');</script>");
//	echo "<script>window.location.href='userprofile(testing).php?id=$user_id';</script>";


//}
//echo "<script>alert('Successfully updated data!');</script>";
//echo "<script>window.location.href='userprofile(testing).php?id=$user_id';</script>";
?>