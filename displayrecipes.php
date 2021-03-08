<?php 
    

    $conn = mysqli_connect('localhost', 'root', '', 'dahmasak');

    //to check for error

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
      }

      //display data

    $recipeid = "";
    $desc = "";

    if(isset($_POST['user_login'])){
        $recipeid = mysqli_real_escape_string($conn,$_POST['Recipe_ID']);
        $recipename = mysqli_real_escape_string($conn,$_POST['Recipe_Name']);
        $calcount = mysqli_real_escape_string($conn,$_POST['Calorie_Count']);
        $cost = mysqli_real_escape_string($conn,$_POST['Cost']);
        $desc = mysqli_real_escape_string($conn,$_POST['Description']);
        $avgrating = mysqli_real_escape_string($conn,$_POST['Average_Star_Rating']);
        $chefid = mysqli_real_escape_string($conn,$_POST['Chef_ID']);
    }

    
    
	$sql = "SELECT * from recipe WHERE Recipe_ID = '$recipeid'";
    $result = mysqli_query($conn, $sql);

   
    
?>