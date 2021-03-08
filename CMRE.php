<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style>
	body{
		background-image: linear-gradient(to right, #fffdc2, #fffdc2 15%, #ffd1b3 20%, #ffd1b3 80%,#fffdc2 85% );
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
		margin-top:20px;
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
	
	input[type=button]{
		height:45px;
		width:150px;
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
<body>
<?php
	
	include "conn.php";
	$recipename = $_GET['recipename'];
	$catid = $_GET['categoryid'];
	//edit.php?id=1
	$sql = "SELECT * from recipe where Recipe_Name = '$recipename'";
	$result = mysqli_query($conn,$sql);
	if($rows = mysqli_fetch_array($result))
	{
		$rid = $rows['Recipe_ID'];
		$recipename = $rows['Recipe_Name'];
		$rimage = $rows['Recipe_Image'];
		$rdesc = $rows['Descriptions'];
		$rserving = $rows['Serving'];
		$rsteps = $rows['Steps'];
		$rvideo = $rows['Video'];
		$rcost = $rows['Cost'];
		$rcalorie = $rows['Calorie_Count'];
		
		$chefid = $rows['Chef_ID'];
		$catid = $rows['Category_ID'];
	}
	else
	{
		echo "<script>alert('No data from db!Technical errors!');</script>";
		die("<script>window.location.href='CMR.php';</script>");
	}
	?>
	<center>
	<h1 style='font-size:50px;'>Chef Edit Recipe Page: </h1>
	<h3>To enlarge the boxes (drag in any direction) corners from the boxes in either the Description, Serving or Steps fields.</h3>
	<h3>The "Enter" button's function to move one line down is replaced by typing <img width='50px' height='20px' src="Image/br.png"></h3>
	<form method="post" action="CMRU.php">
	<table width='40%'height='auto'style='background-color:white; margin-left:;'> 
	 
	<tr>
		<th width="200px" height="50px" bgcolor="pink">Recipe ID:</th>
		<td width="300px" height="50px" bgcolor='#CC99FF' > <input type="text" name="recipeid" value="<?php echo $rid;?>" readonly/>
		</td>
	</tr> 
	 
	<tr>
		<th width="200px" height="50px" bgcolor="pink">Recipe Name:</th> 
		<td width="300px" height="50px" bgcolor='#CC99FF'>
		<input type="text" name="recipename" value="<?php echo $recipename;?>"
		required="required"/>
		</td>
	</tr> 
	 
	<tr>
		<th width="200px" height="50px" bgcolor="pink">Recipe Image:</th> 
		<td width="300px" height="50px" bgcolor='#CC99FF'> <input type="text" name="recipeimage" value="<?php echo $rimage;?>"
		/>
		</td>
	</tr> 
	 <tr>
		<th width="200px" height="50px" bgcolor="pink">Descriptions:</th> 
		<td width="300px" height="50px" bgcolor='#CC99FF'> <textarea name="recipedescriptions" required="required"><?php echo $rdesc;?></textarea>
		</td>
	</tr> 
	<tr>
		<th width="200px" height="50px" bgcolor="pink">Serving:</th> 
		<td width="300px" height="50px" bgcolor='#CC99FF'> <textarea name="rserving" required="required"><?php echo $rserving;?></textarea>
		</td>
	</tr>  
	<tr>
		<th width="200px" height="50px" bgcolor="pink">Steps:</th>
		<td width="300px" height="50px" bgcolor='#CC99FF'><textarea name="steps" required="required"><?php echo $rsteps;?></textarea>
		</td>
	</tr> 
	<tr>
		<th width="200px" height="50px" bgcolor="pink">Video:</th> 
		<td width="300px" height="50px" bgcolor='#CC99FF'><input type="text" name="video" value="<?php echo $rvideo;?>"
		required="required"/>
		</td>
	</tr> 
	<tr>
		<th width="200px" height="50px" bgcolor="pink">Cost:</th> 
		<td width="300px" height="50px" bgcolor='#CC99FF'><input type="text" name="cost" value="<?php echo $rcost;?>"
		required="required"/>
		</td>
	</tr> 
	<tr>
		<th width="200px" height="50px" bgcolor="pink">Calorie Count:</th>
		<td width="300px" height="50px" bgcolor='#CC99FF'> <input type="text" name="caloriecount" value="<?php echo $rcalorie;?>"
		required="required"/>
		</td>
	</tr> 
	<tr>
		<th width="200px" height="50px" bgcolor="pink">Chef ID:</th>
		<td width="300px" height="50px" bgcolor='#CC99FF'> <input type="text" name="chefid" value="<?php echo $chefid;?>"readonly/>

		</td>
	</tr> 
	<tr>
		<th width="200px" height="50px" bgcolor="pink">Category:</th>
		<td width="300px" height="50px" bgcolor='#CC99FF'>
			<?php 
				include "conn.php";
				
				$result=mysqli_query($conn,"Select * from category");
				echo"<select name='categoryid'>";
				echo"<option value='$catid'>$catid</option>";

				while($row=mysqli_fetch_array($result)){
				echo"<option value='$row[Category_ID]'>$row[Category_Name]</option>";
				}

				echo"</select>";?>
			
		</td>
		</td>
	</tr> 
	 	 
		<!--add a update button for this page-->    
 
</table> 
<center>
			<input type="submit" value="Update"/>&nbsp;&nbsp;
			<a href="CMR.php">
			<input type="button"value="Back to Previous Page"/>
			</a>
			</center>
</form>
</center>

</body>

</html>
