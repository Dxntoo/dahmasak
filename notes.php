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
    <title>Your Notes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>


    <center>
      <h1>Your Notes</h1>

    <!--display in html table-->
      <table cellpadding='10px' border="1" style="text-align:center; border-collapse: collapse">
    <tr bgcolor="orange">
    
    <th>Note ID</th>
    <th>Title</th>
    <th>Created On</th>
    <th>Note</th>
    <th>User ID</th>
    <th>Edit</th>

    </tr>

    <?php
    $uid=$_SESSION['id'];
    include ("conn.php"); //add connection to the php page
        
    $sql = "Select * from personal_notes where User_ID = $uid"; //add a new sql query
    $result = mysqli_query ($conn,$sql); //run the sql query and all the data store in variable result
    echo "<a href='addnotes.php?id=$uid'><button>Add Notes</button></a>" ;
    
    if(mysqli_num_rows($result)<=0)//if no result ,then run die () code
    {
      die("<script>alert('No notes are available, create a new note!');</script>");
      
    }

    

    //if got result , extract the data in $rows[] array (column by column)
    while ($rows = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>". $rows['PersonalNotes_ID']."</td>";
      echo "<td>". $rows['Title']."</td>";
      echo "<td>". $rows['Date']."</td>";
      echo "<td>". $rows['Description']."</td>";
      echo "<td>". $rows['User_ID']."</td>";
      //create 2 buttons (edit button and delete button in each column)
      echo "<td><a href='privatenotes.php?id=".$rows['PersonalNotes_ID']."'><button>Edit</button></a></td>";

      echo "</tr>";
    }
    
    ?>