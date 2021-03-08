
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
<body style="background:url(img/backgroundimage.jpg);background-repeat: no-repeat; background-size: 100% 100%">
<style>
table, th, td {
    width:80%;
    margin:auto;
    border:1px solid white;
    border-collapse:collapse;
    text-align:center;
    font-size:15px;
    table-layout:fixed;
    background:grey;
    opacity:1;
    color: white;
    margin-top:100px;
}



</style>
<?php

session_start();
if(! isset($_SESSION['name'])){
    header('location:cheflogin.php');//was location:cheflogin.php.php
    
}
    


?>
</br>
</br>
<center>

    <h1>Your Profile</h1>
   <table border="1" style="text-align: center">
   <thead>
        <th>Name</th>
        <th>Password</th>
        <th>Email</th>
        <th>Profile Image</th>
        
   </thead>
   <tbody>
       
   <?php foreach($chef as $chefs): ?>                         
    <?php endforeach; ?>
                          
   </tbody> 
   
        
   
   
   <?php

    $cid=$_SESSION['id'];
   

 

    $sql= "SELECT * FROM chef WHERE Chef_ID = $cid"; //add a new sql query
    $result = mysqli_query ($conn, $sql); //run the sqlquery and all the data store in varieble result
    

    if(mysqli_num_rows($result)<=0)// if no result, then run die(code)
    {
        die("<script>alert('No data from the database!');</script>");
    }

    //if got result, extract the data in $rows[] array(column by column)
    while($rows= mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>". $rows['Chef_Name']."</td>";
        echo "<td>". $rows['Password']."</td>";
        echo "<td>". $rows['Email']."</td>";
        echo "<td><img src=Image/".$rows['Profile_Image']." width='80'/></td>";

        echo "<td><a href='editchefprofile.php?id=".$rows['Chef_ID']."'><button>Edit</button></a></td>";
        echo "</tr>";

    }
    

 ?>

</table>


</center>
<?php
$result=mysqli_query($conn,"select * from item");
echo"<centre>";
echo"<h3>Recipes</h3>";
echo"<hr/>";
echo"<select>";
echo"<option>--My Recipes--</option>";

    while($row=mysqli_fetch_array($result))
{
    echo"<option>$row[id] |$row[name]  | $row[image] |</option>";
}
echo"</select>";
echo"<input type='submit' value='GO'>";
echo"</center>";
mysqli_close($conn);
?>

<footer>
            <div id="left-footer">
                <h3>Quick Links</h3>
                <p>
                    <ul>
                        <li>
                            <a href="chefhomepage.php">Home</a>
                        </li>
                        
                        
                        
                    </ul>
                </p>
            </div>

            
       
<script src="main.js"></script>
</body>