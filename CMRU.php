<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php

	include "conn.php";
    $rid = $_POST['recipeid'];
    $recipename = $_POST['recipename'];
    $rimage = $_POST['recipeimage'];
	$rdesc = $_POST['recipedescriptions'];
	$rserving = $_POST['rserving'];
	$rsteps = $_POST['steps'];
	$rvideo = $_POST['video'];
    $rcost = $_POST['cost'];
    $rcalorie = $_POST['caloriecount'];
	$chefid = $_POST['chefid'];
	$catid = $_POST['categoryid'];

	//here
	$sql="Update recipe SET ".
	"Recipe_ID ='$rid',".
	"Recipe_Name ='$recipename',".
    "Recipe_Image ='$rimage',".
	"Descriptions ='$rdesc',".
	"Serving ='$rserving',".
	"Steps ='$rsteps',".
	"Video ='$rvideo',".
    "Cost ='$rcost',".
    "Calorie_Count ='$rcalorie',".
	"Chef_ID ='$chefid',".
	"Category_ID ='$catid'
	Where Recipe_ID = '$rid'";
	
	
	mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)<=0)
	{
		echo("<script>alert('Cannot update data. Do not resubmit the same information!');</script>");
		echo "<script>window.location.href='CMRE.php?recipename=$recipename';</script>";
	}
		
	echo "<script>alert('Successfully updated data!');</script>";
	echo "<script>window.location.href='CMRE.php?recipename=$recipename & categoryid=$catid';</script>";

?>

</body>

</html>
