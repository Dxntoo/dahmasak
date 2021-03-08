
<body>

<?php
session_start();



    if(!isset($_SESSION['name'])){
        die("<script>alert('Please login first before proceeding!');
        window.location.href='UserLogin.html';</script>");
    }
?>
<link rel="stylesheet" href="style.css">
<?php
    include "conn.php";
    $user_id=$_GET['id'];
    $sql= "Select * from user where User_ID = $user_id";
    $result=mysqli_query($conn,$sql);
    if($rows=mysqli_fetch_array($result))
    {
        
        $name=$rows['User_Name'];
        $pass=$rows['Password'];
        $email=$rows['Email'];
        $profileimage=$rows['Profile_Picture'];
        
        
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
    
    echo"<pre>", print_r($_FILES['Profile_Picture']['name']), "</pre>";
    
    
    $profileImageName = time().'_'.$_FILES['Profile_Picture']['name'];

    $target = 'Image/' . $profileImageName;

    if (move_uploaded_file($_FILES['Profile_Picture']['tmp_name'], $target)) {
        $sql = "INSERT INTO chef (Profile_Picture) VALUES ('$profileImageName')";
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

body{
        
        background-attachment: fixed;
        background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url("Image/hand.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

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
    text-decoration: none;
    color: #8B4513;
    font-weight: 400;
    text-align: center;
    display: inline-block;
    background-color: #DAA520;
}

.btn{
    border: 1px solid ;
    background: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: "montserrat";
}

.btn,.btn2{}

.btn1:hover,.btn2:hover{
    color: #fff;
}

.btn::before{
    content: "";
    position: absolute;
    left: 0;
    width: 100%;
    height: 0;
    background:orange;
    z-index: -1;
    transition: 0.8s;
    position: relative;
    overflow: hidden;
}

.btn1::before{
    top: 0;
    border-radius: 0 0 50% 50%;
}

.btn2::before{
    bottom: 0;
    border-radius: 50% 50% 0 0;
}

.btn1:hover::before,.btn2:hover::before{
    height: 180%;
}


</style>

</head>


<body>
<div class="profile-box">
<div class="profile-center">
<center>
        <h1 style='color:white;'>Edit Your Profile </h1>
        <form method="post" action="updateprofile.php">
            <table id=profile>

            <tr>
                    <th width="200px"> Your ID:</th>
                    <td width="300px">
                        <input type="text" name="User_ID" value="<?php echo $user_id;?>" readonly />
                    </td>
                </tr>
            <tr>
                    <th width="200px">Username:</th>
                    <td width="300px">
                        <input type="text" name="User_Name" value="<?php echo $name;?>"
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
                        <input type="file" name="Profile_Picture" id="Profile_Picture" value="<?php echo"<img src=Image/".$rows['Profile_Picture']." width='80'/>";?>" />
                    </td>
                </tr>
                <br />              
                        
                </td>
                    <td colspan="2">
                        <br />
                        <center>
                            <input type="submit" class ="btn btn1" name="submit" value="Update" />&nbsp;&nbsp;

                            <input type="submit" class ="btn btn2" value="Back to Previous Page" formaction="userprofile.php" />
                        </center>
                    </td>

                </tr>
        </form>
    </center>
</div>
</div>

    
</body>


</html>
