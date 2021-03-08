<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Edit Page</title>
</head>
<?php
include "conn.php";
$id = $_GET['id'];
$sql= "Select * from User where User_ID = $id";
$result = mysqli_query($conn,$sql);
if($rows = mysqli_fetch_array($result))
{
	$name = $rows ['User_Name'];
	$email = $rows ['Email'];
	
}
	else 
	{echo "<script>alert ('No data is found from database');</script>";
	die("<script>window.location.href='viewdata.php':</script>");
	}

?>

<body>

<center>
	<div class="logincard">
	<h1>Edit Page: </h1>
	<form method="post" action="adminupdateuser.php">
	<table>


		<tr><th width="200px">User ID:</th>
		<td width="300px">
		<input type="text" name="uid" value="<?php echo $id;?>" readonly/>
		</td>
		</tr>


		<tr><th width="200px">User Name:</th>
		<td width="300px">
		<input type="text" name="name" value="<?php echo $name;?>"
		required="required"/>
		</td>
		</tr>



		<tr><th width="200px">Email:</th>
		<td width="300px">
		<input type="text" name="User_Email" value="<?php echo $email;?>"
		required="required"/>
		</td>
		</tr>





	<tr><td colspan="2">
	<br />
	<center><input type="submit" value="Update"/>&nbsp;&nbsp;
	<input type="submit"value="Back to Previous Page" formaction="adminmguser.php"/>
	</center>
	</td></tr>
	</table>
	</form>
	</div>
</center>
</body>

</html>