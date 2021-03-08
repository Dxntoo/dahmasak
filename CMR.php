<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Chef Manage Recipe</title>
<style>
     body{
        background-attachment: fixed;
        background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url("Image/p4.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
	input[type=text]{
		height:40px;
		width:50%;
	}
	input[type=submit]{
		height:45px;
		width:100px;
		border:0px;
		border-radius:20px;
		background-color:#FFFF66;
	}
	input[type=submit]:hover{
		background-color:orange;
		border:2px solid black;
		
	}

	input[type=button]{
		height:45px;
		width:200px;
		border:0px;
		border-radius:20px;
		background-color:#FFFF66;
	}

	input[type=button]:hover{
		background-color:orange;
		border:2px solid black;
	}
	
	form th {
		width:200px;
		background-color:white;

	}
	form td {
		width:300px;
	}

</style>

</head>
<!--The script is for user to check image before submitting-->
<script src="Script\pictureupload.js"></script>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<body>
	<center>
		<div class="searchinsert"><h1 style='font-size:70px; color:white;'>Search:</h1>
		<form action="CMR.php" method="post">
		<input type="text" name="search_key" placeholder="Please enter recipe name here"/>
			<input type="submit" value="search" /><br/><br/>
		</form>

	

</center>

<center>
<h1 style='font-size:45px;color:white;'>View/Manage Recipe</h1>

		<?php
		session_start();
		include "conn.php";

		$chefid = $_SESSION['id'];
		$chefname = $_SESSION['name'];
		
		if(!isset($_SESSION['id'])){
            echo ("<script>alert('Please login')</script>;");
            echo "<script>history.go(-1);</script>";
        }
		
		$search_key = isset($_POST['search_key'])?
		$_POST['search_key']:'';
		
		if ($search_key == NULL)
		{
		echo"<script>alert('Please key in recipe name!');</script>";
		}
		else{
		
		}

		$sql = "SELECT * FROM recipe INNER JOIN category ON recipe.Category_ID = category.Category_ID  WHERE Chef_ID = $chefid AND Recipe_Name LIKE '%".$search_key. "%' ";

		$result=mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) <=0)
		{
		echo"<script>alert('No Result!');</script>";
		}
		else{
		
		echo"<table width='90%'style='background-color:white;' cellpadding='13'>";
		echo"<tr style='background-image: linear-gradient(to right, #FFC300,#FF900C,#FF5733');>";
		echo"<td>Recipe Name</td>";
		echo"<td>Recipe Image</td>";
		echo"<td>Descriptions</td>";
		echo"<td>Serving</td>";
		echo"<td>Steps</td>";
		echo"<td>Video</td>";
		echo"<td>Cost</td>";
		echo"<td>Calorie Count</td>";
		echo"<td>Category Name</td>";
		echo"<td>Edit</td>";
		echo"<td>Delete</td>";
		echo"</tr>";
		
		while($rows= mysqli_fetch_array($result))
		{	
		
			echo"<tr bgcolor='#F5F5F5'>";
			echo"<td>".$rows['Recipe_Name']."</td>";
			echo"<td><img src='".$rows['Recipe_Image']."' width='250px' height='200px'></td>";
			echo"<td>".$rows['Descriptions']."</td>";
			echo"<td>".$rows['Serving']."</td>";
			echo"<td>".$rows['Steps']."</td>";
			echo"<td>".$rows['Video']."</td>";
			echo"<td>".$rows['Cost']."</td>";
			echo"<td>".$rows['Calorie_Count']."</td>";
			echo"<td>".$rows['Category_Name']."</td>";
			echo"<td><a href='CMRE.php?recipename=".$rows['Recipe_Name']."& categoryid=".$rows['Category_ID']."'><button>Edit</button></a></td>";
			echo"<td><a href='CMRD.php?recipename=".$rows['Recipe_Name']."'><button>Delete</button></a></td>";
			echo"</tr>";
		}
		echo "</table>";}

		
	?>
</form></div>
		<div class="space" style="margin-bottom:100px;">
		<a href="chefhome.php">
			<input type="button"value="Back to Chef Home Page"  style="margin-top:50px;"/>
		</a>
		</div>
</center>
</body>

</html>
