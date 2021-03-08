
<?php
session_start();



    if(!isset($_SESSION['name'])){
        die("<script>alert('Please login first before proceeding!');
        window.location.href='cheflogin.html';</script>");
    }
?>
<link rel="stylesheet" href="style.css">
<?php
    include "conn.php";
    $Chef_ID=$_GET['id'];
    $sql= "Select * from chef where Chef_ID = $Chef_ID";
    $result=mysqli_query($conn,$sql);
    if($rows=mysqli_fetch_array($result))
    {
        
        $name=$rows['Chef_Name'];
        $pass=$rows['Password'];
        $email=$rows['Email'];
        $profileImage=$rows['Profile_Image'];
        
        
        
    }
    else{
        echo "<script>alert('No data is found from database');</script>";
        die("<script>window.location.href=search.php':</script>");
    }
    

    
    ?>
 <?php if(!empty($msg)):  ?>
                        <div class = "alert <?php echo $css_class; ?>">
                          <?php echo $msg; ?>
                        </div>  
                    <?php endif ?>
                    
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" href="style.css">
<title>Edit Profile</title>
<style>
.profile-box{
	
    max-width:700px;
    float: none;
    margin: 150px auto;
    align-items: center;
}
.profile-center{
	
	padding: 30px;
}
#profile{
    border: 1px solid #000000;
    background: #fff;
    font-size: 16px;
    padding: 30px;
    outline: none;
    width: 500px;
    -webkit-border-top-left-radius: 10px;
    -webkit-border-bottom-left-radius: 10px;
    -moz-border-radius-topleft: 10px;
    -moz-border-radius-bottomleft: 10px;
    border-top-left-radius:10px;
    border-bottom-left-radius:10px;
    -webkit-border-top-right-radius: 10px;
    -webkit-border-bottom-right-radius: 10px;
    -moz-border-radius-topright: 10px;
    -moz-border-radius-bottomright: 10px;
    border-top-right-radius:10px;
    border-bottom-right-radius:10px;

}
</style>

</head>


<body style="background:url(img/backgroundimage.jpg);background-repeat: no-repeat; background-size: 100% 100%">
<div class="profile-box">
<div class="profile-center">
<center>
        <h1>Edit Your Profile </h1>
        <form method="post" action="updatechefprofile.php">
            <table id=profile>

            <tr>
                    <th width="200px"> Your ID:</th>
                    <td width="300px">
                        <input type="text" name="Chef_ID" value="<?php echo $Chef_ID;?>" readonly />
                    </td>
                </tr>
            <tr>
                    <th width="200px">Username:</th>
                    <td width="300px">
                        <input type="text" name="Chef_Name" value="<?php echo $name;?>"
                               required="required" />
                    </td>
                </tr>
                <tr>
                    <th width="200px">Password:</th>
                    <td width="300px">
                        <input type="text" name="Password" value="<?php echo $pass;?>"
                               required="required" />
                    </td>
                </tr>
                <tr>
                    <th width="200px">Email:</th>
                    <td width="300px">
                        <input type="email" name="Email" value="<?php echo $email;?>"
                               required="required" />
                    </td>
                </tr>
                <tr>
                    <th width="400px">Profile Image:</th>
                    <td width="300px">
                        <input type="file" name="profile_image" id="profile_image" value="<?php echo"<img src=Image/".$rows['Profile_Image']." width='80'/>";?>" />
                    </td>
                </tr>
               
                <br />   
                           
                        
                </td>
                    <td colspan="2">
                        <br />
                        <center>
                            <input type="submit" name="save-user" value="Update" />&nbsp;&nbsp;
                            <input type="submit" value="Back to Previous Page" formaction="chefprofile.php" />
                        </center>
                    </td>

                </tr>
        </form>
    </center>
</div>
</div>

    
</body>



</html>
