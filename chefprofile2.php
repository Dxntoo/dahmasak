
<?php
include ("conn.php");//add connecton to the php page
?>
<?php
 
$msg = "";
$css_class = "";

$conn = mysqli_connect('localhost','root','','dahmasak');

if (isset($_POST['save-user'])){
    
    echo"<pre>", print_r($_FILES['profile_image']['name']), "</pre>";
    
    
    $profileImageName = time().'_'.$_FILES['profile_image']['name'];

    $target = 'Image/' . $profileImageName;

    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)) {
        $sql = "INSERT INTO chef (profile_image) VALUES ('$profileImageName')";
     if (mysqli_query($conn,$sql)) {
            $msg = "Image uploaded and saved to database";
            $css_class = "alert-success";
        } else {
            $msg = "Database Error: Failed to save user";
            $css_class = "alert-danger";
        }
        $msg = "Image uploaded";
        $css_class = "alert-success";
    }else{
        $msg = "Failed to upload";
        $css_class = "alert-danger";
    }
}


?>
<?php
$sql = "SELECT * FROM chef";

$result = mysqli_query($conn, $sql);
$chef = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
          crossorigin="anonymous">
          <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">
<body>
<style>
    body{
        background-attachment: fixed;
        background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url("Image/leaf.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .content-table{
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius:5px 5px 0 0;
        overflow:hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
    .content-table thead tr{
        background-color: orange;
        color:#ffffff;
        text-align:left;
        font-weight:bold;
    }

    .content-table th,
    .content-table td{
        padding: 12px 40px;
    }

    .content-table tbody tr{
        border-bottom: 1px solid #dddddd;
    }

    .content-table tbody tr:nth-of-type(even){
        background-color: #f3f3f3;
    }

    .content-table tbody tr:last-of-type{
        border-bottom: 2px solid orange;
    }

    .content-table tbody tr.active-row{
        font-weight:bold;
        color: white;
    }

</style>
<?php

//session_start();
//if(! isset($_SESSION['name'])){
//    header('location:cheflogin.php');//was location:cheflogin.php.php
    
//}
    


?>
</br>
</br>
<center>

    <h1 style="color:white;">Your Profile</h1>
   <table class="content-table">
   <thead>
        <th>Name</th>
        <th>Password</th>
        <th>Email</th>
        <th>Profile Image</th>
        
   </thead>
   <tbody>
   <tr class="active-row">  
   <?php foreach($chef as $chefs): ?>                         
    <?php endforeach; ?>
                          
   </tbody> 
   </tr>
        
   
   
   <?php
   include ("conn.php");
  
   $cid = intval($_GET['id']);
   

 

    $sql= "SELECT * FROM chef WHERE Chef_ID = $cid"; //add a new sql query
    $result = mysqli_query ($conn, $sql); //run the sqlquery and all the data store in varieble result
    

    if(mysqli_num_rows($result)<=0)// if no result, then run die(code)
    {
        die("<script>alert('No data from the database!');</script>");
    }

    //if got result, extract the data in $rows[] array(column by column)
    while($rows= mysqli_fetch_array($result))
    {
        echo "<tr style='color:black; background-color:white;'>";
        echo "<td>". $rows['Chef_Name']."</td>";
        echo "<td>". $rows['Password']."</td>";
        echo "<td>". $rows['Email']."</td>";
        echo "<td><img src=Image/".$rows['Profile_Image']." width='80'/></td>";
        
        echo "<a href='adminmgchef.php?' class ='btn btn-primary'>Back</a>";
        echo "<a style='margin-left:50px;' href='editchefprofile2.php?id=".$rows['Chef_ID']."' class ='btn btn-primary'>Edit</a>";
        echo "</tr>";
        
        

    }
    

 ?>

</table>
<h3 style="color:white;">Your Recipes</h3>
<select onchange="la(this.value) "name="Saved Recipe">
<option>----Select Your Recipes----</option>
<?php

$sql = "SELECT * FROM recipe WHERE Chef_ID = $cid";
$result = mysqli_query($conn, $sql);

$color1 = "lightblue";
$color2 = "teal";
$color = $color1;

while($rows = $result->fetch_assoc())
{
   $color == $color1 ? $color = $color2 : $color = $color1;
   $Recipe_ID = $rows['Recipe_ID'];
   $Recipe_Name = $rows['Recipe_Name'];
   
   echo "<option value='Recipe.php?id=".$rows['Recipe_ID']."' style ='background: $color;'>$Recipe_Name</option>";
   
   
}
echo "<a href='Recipe.php?id=".$rows['Recipe_ID']."'><button>Go to recipe</button></a>";

?>
</select>

<script>
   function la(src)
   {
       window.location = src;
   }
</script>





</center>



</body>