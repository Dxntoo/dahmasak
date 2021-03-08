<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Insert Page</title>
<style>
     body{
        background-attachment: fixed;
        background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url("Image/p4.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
	th{
		background-color:#FFC300;
		width:25%;
		height:50px;
	}
	td{
		background-color:white;
		width:100px;
		height:50px;
	}
	input[type=text]{
		height:48px;
		margin:auto;
		width:99%;
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
	}

	textarea{
		height:48px;
		width:98%;
	}

	select{
		height:50px;
		width:100%;
	}
	
	button{
		height:45px;
		width:100px;
		border:0px;
		border-radius:20px;
		background-color:#FFFF66;
		
	}
	a{
		color:black;
		text-decoration:none;
	}
	button:hover{
		background-color:orange;
		border:2px solid black;
	}

</style>
</head>
<!--The script is for user to check image before submitting-->
<script src="Script\pictureupload.js"></script>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<body>
	

	<center>
	<h1 style='font-size:50px;color:white;'>Chef Insert Recipe Page:</h1>
	<form method="post" action="CMRI.php" enctype="multipart/form-data">
	
	<table width='40%'height='auto'style='background-color:white; margin-left:;'>
	<tr>
		<th>Recipe Name:</th> 
		<td><input type="text" name="rname" value="" required="required"/>
		</td>
	</tr> 	 
	</tr>
	<tr>
		<th>Recipe Image:</th> 
		<td style='width:100px; border:2px black;'>   
		 <input type="File" onchange="readURL(this);" name="rimage" id="rimage" accept="image/*">
		 <img id="blah" src="#" alt="your image"/>
		</td>
	</tr> 
	<tr>
		<th>Descriptions:</th> 
		<td><input type="text" name="rdesc" value="" required="required"/>
		</td>
	</tr> 	
	<tr>
		<th>Serving:</th> 
		<td><input type="text" name="rserving" value="" required="required"/>
		</td>
	</tr> 
	<tr>
		<th>Steps:</th> 
		<td><textarea name="rsteps" value="" required="required" rows="4" cols="20"></textarea>
		</td>
	</tr>
	<tr>
		<th>Video:</th> 
		<td><input type="text" name="rvideo" value="" required="required"/>
		</td>
	</tr> 	 		 
	<tr>
		<th>Cost:</th> 
		<td><input type="text" name="rcost" value="" required="required"/>
		</td>
	</tr> 	 	  
	<tr>
		<th>Calorie Count:</th> 
		<td><input type="text" name="rcalorie" value="" required="required"/>
		</td>
	</tr> 	 


	<tr>
	<th>Category: </th>
		<td>
			<?php 
				include "conn.php";
				
				$result=mysqli_query($conn,"Select * from category");
				echo"<select name='catid'>";
				echo"<option>--Please pick category--</option>";

				while($row=mysqli_fetch_array($result)){
				echo"<option value='$row[Category_ID]''>$row[Category_Name]</option>";
				}

				echo"</select>";?>
			
		</td>
	</tr>      
</table></center>
<div class="button" style='margin-top:20px;'>
	<center><input type="submit" name="submit" recipename=".$rows['Recipe_Name']."& categoryid=".$rows['Category_ID']."/></center>&nbsp;&nbsp;
</div>
<div class="button1" style='margin-top:20px;'>
	<center><button onclick='history.go(-1);'>Back </button></center>
</div>
<?php 

include "conn.php";





if (isset($_POST['submit'])) {
	
session_start();

	$chefid = $_SESSION['id'];
	$chefname = $_SESSION['name'];
		
	$msg="";
	$rname = $_POST['rname'];
	$rimage = $_FILES['rimage']['name'];
	$rdesc = $_POST['rdesc'];
	$rserving = $_POST['rserving'];
	$rsteps = $_POST['rsteps'];
	$rvideo = $_POST['rvideo'];
	$rcost = $_POST['rcost'];
	$rcalorie = $_POST['rcalorie'];
	$catid = $_POST['catid'];
	$target = "../dahmasak/Image/";
	$target_file= $target .
		basename ($_FILES['rimage']['name']);

	
	$sql = "INSERT INTO recipe (Recipe_Name,Recipe_Image,Descriptions,Serving,Steps,Video,Cost,Calorie_Count,Chef_ID,Category_ID)
	Values ('$rname','$target_file','$rdesc','$rserving','$rsteps','$rvideo','$rcost','$rcalorie','$chefid','$catid');";

	mysqli_query($conn, $sql);

	// execute query
	if (move_uploaded_file($_FILES['rimage']['tmp_name'], $target_file)) {
		$msg = "Image uploaded successfully";
	}else{
		$msg = "Failed to upload image";
	}
}


if(mysqli_affected_rows($conn) <=0)
{
	die("<script>alert('Fail: Unable to insert data!'):windows.history.go(-1);</script>");
}

echo "<script>alert('Successfully inserted data!')</script>";
echo "<script>window.history.back();</script>";
exit;




//while ($row = mysqli_fetch_array($result)) {
//	$image=$row['Recipe_Image'];
//	echo "<img src='".$image."' >";
//}
?>
<?php


    

	/*
	#Begin of Insert Code

		#retrieve file title
		$rname = $_POST["rname"];
		#file name with a random number so that similar dont get replaced
		$rimage = rand(1000,10000)."".$_POST["File"]["name"];			
		$rdesc = $_POST['rdesc'];
		$rsteps = $_POST['rsteps'];
		$rcost = $_POST['rcost'];
		$rcalorie = $_POST['rcalorie'];
		#temporary file name to store file
		$tname = $_POST["File"]["tmp_name"];
		#upload directory path
		$uploads_dir = 'Image';
		#TO move the uploaded file to specific location
		move_uploaded_file($tname, $uploads_dir.'/'.$rimage);
	  

		if (isset($_POST["submit"])){
		

		   $sql = "INSERT into recipe (Recipe_Name,Recipe_Image,Descriptions,Steps,Cost,Calorie_Count)
		   Values('$rname',$rimage,'$rdesc','$rsteps','$rcost','$rcalorie');";
		 

		 mysqli_query($conn,$sql);

		 if(mysqli_affected_rows($conn)<=0) {  
		  echo "<script>alert('Unable to delete data!');";
		   } 
		echo "<script>alert('Data deleted!');</script>";
	   }*/
  ?>
</body>

</html>
