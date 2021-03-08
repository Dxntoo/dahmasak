<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #d6d6d6;
  
  
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #ffbb00;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<?php
include "conn.php";
$nid = $_GET['id'];
$sql= "Select * from personal_notes where PersonalNotes_ID = $nid";
$result = mysqli_query($conn,$sql);
// echo $sql
 if($rows = mysqli_fetch_array($result))
 {
 	$nid = $rows ['PersonalNotes_ID'];
	$title = $rows ['Title'];
	$date = $rows ['Date'];
	$note = $rows ['Description'];
	$uid = $rows ['User_ID'];

}
else 
 	{echo "<script>alert ('No data is found from database');</script>";
  die("<script>window.location.href='search.html':</script>");
}

?>
<body>
<h2>Edit Your Note</h2>


<div class="container">
  <form method="post" action="savenotes.php">
  <div class="row">
    <div class="col-25">
      <label for="fname">Note ID</label>
    </div>
    <div class="col-75">
      <input type="text" name="nid" value="<?php echo $nid;?>"required="required" readonly/>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Title</label>
    </div>
    <div class="col-75">
      <input type="text" name="title" value="<?php echo $title;?>"required="required"/>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Date Created</label>
    </div>
    <div class="col-75">
      <input type="text" name="date" value="<?php echo $date;?>"required="required" readonly/>
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="subject">Content</label>
    </div>
    <div class="col-75">
      <textarea name="note" style="height:200px"><?php echo $note;?></textarea>
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Save">
  </div>
  <br/>
  <div class="row">
    <input type="submit"value="Back to Previous Page" formaction="userprofile.php"/>
  </div>
  </form>
</div>


<!-- <h1>Private Notes</h1>

<form action="savenotes.php" id="usrform">
  Title: <input type="text" name="title" value="">
  <input type="submit" value="Save">
  <textarea rows="4" cols="50" name="note" form="usrform" value="">
Enter text here...</textarea>
</form>
<br> -->




</body>
</html>