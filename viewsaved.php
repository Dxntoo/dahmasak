<?php
session_start();   // if don't have session user..then
 include('conn.php');

	if(!isset($_SESSION['email']))  {
		die("<script>alert('Please login first before proceed!');
		window.location.href='login.html';</script>");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Saved Recipes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>


    <center>
      <h1>Saved Recipes</h1>

    <!--display in html table-->
      <table cellpadding='10px' border="1" style="text-align:center; border-collapse: collapse">
    <tr bgcolor="orange">
    
    <th>Recipe Name</th>
    <th>Image</th>
    <th>Description</th>
    <th>Calorie Count</th>
    <th>Rating</th>
    <th>Jump</th>

    </tr>

    <?php
    $uid=$_SESSION['id'];
    include ("conn.php"); //add connection to the php page
        
    $sql = "SELECT * FROM bookmark INNER JOIN recipe ON bookmark.Recipe_ID = recipe.Recipe_ID where User_ID = $uid ;"; //add a new sql query
    $result = mysqli_query ($conn,$sql); //run the sql query and all the data store in variable result
    
    
    if(mysqli_num_rows($result)<=0)//if no result ,then run die () code
    {
      die("<script>alert('No data from the database!');</script>");
      
    }

    

    //if got result , extract the data in $rows[] array (column by column)
    while ($rows = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>". $rows['Recipe_Name']."</td>";
      echo"<td><img src='".$rows['Recipe_Image']."' width='50px' height='50px'></td>";
      echo "<td>". $rows['Descriptions']."</td>";
      echo "<td>". $rows['Calorie_Count']."</td>";
      echo "<td>". $rows['Average_Star_Rating']."</td>";
      //create 2 buttons (edit button and delete button in each column)
      echo "<td><a href='specificrecipe.php?id=".$rows['Recipe_ID']."'><button>Go to Recipe</button></a></td>";

      echo "</tr>";
    }
    
    ?>