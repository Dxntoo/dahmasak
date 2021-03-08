<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>
 
<body>
<?php
include "conn.php";
 
$chefid=$_GET['chefid'];
 
$sql2="DELETE FROM chef WHERE Chef_ID= '$chefid'";
$result2=mysqli_query($conn, $sql2);

 
if(mysqli_affected_rows($conn)<=0)
{
echo "<script>alert('Unable to delete data!');";
echo "<script>window.location.href='adminmgchef.php';</script>";
}
 
echo "<script>alert('Data deleted!');</script>";
echo "<script>window.location.href='adminmgchef.php';</script>";
echo$sql;
?>
</body>
 
</html>
