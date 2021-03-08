<!DOCTYPE html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Raleway&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="chefhome.css">
    <title>Chef Homepage</title>
</head>

<body>
    <form action="adminhome.php" method="POST">
        <button class="logoutBtn" name="logoutBtn">LOGOUT</button>
    </form>

    <?php

        if(!isset($_SESSION['Admin_ID']))

    ?>
    

    <center><h1 class="title">Chef Homepage</h1>
        <?php
        include "conn.php";
        session_start();

        if(!isset($_SESSION['Admin_ID'])){
            echo ("<script>alert('Please login')</script>;");
            echo "<script>history.go(-1);</script>";
        }

        $adminid = $_SESSION['Admin_ID'];
        
        

        $sql = "SELECT * FROM admin";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)<=0){
            echo("<script>alert('No data from database!');</script>");
            
        }
         ?>
            <h2 class="cheftitle">Welcome, <?php echo "Admin "; echo $adminid ?></h2>
    </center> 
    <center>
    <div class="centerbody">
        
            <a href="admininsertnewchef.html">
                <div class="module">
                    <img src="images/RecipeIcon.png" width="100px" height="100px">
                    <h1>Insert New Chef</h1>
                </div>
            </a>
            <a href="adminmgchef.php">
                <div class="module">
                    <img src="images/ProfileIcon.png" width="100px" height="100px">
                    <h1>Edit Chefs</h1>
                </div>
            </a>
        
    </center>
    </div>

    <?php

        if(isset($_POST['logoutBtn'])){
            session_start();
            unset($_SESSION['id']);
            unset($_SESSION['name']);
            session_destroy();
            header("Location: mainpage.php");
            exit;
        }else{

        }
       
        
    ?>
</body>
</html>