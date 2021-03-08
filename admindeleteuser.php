<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
include "conn.php";

$id=intval($_GET['id']);

$sql="DELETE FROM User WHERE User_ID=$id";
$result=mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)<=0)
{
echo "<script>alert('Unable to delete data!');";
die ("window.location.href='adminmguser.php';</script>");
}

echo "<script>alert('Data deleted!');</script>";
echo "<script>window.location.href='adminmguser.php';</script>";


?>
</body>

</html>