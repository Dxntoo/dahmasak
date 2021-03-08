<?php 
    include "displayrecipes.php";
?>

<!DOCTYPE html>
    <head>
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Raleway&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" type="text/css" href="userhome.css">
        <title>User Homepage</title>
        <style>
            body{
               
                background-attachment:fixed;
                background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url("Image/random2.jpg") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                }

                .recipebox{
                    background-color:white;
                   
                }
                
                .selectionbody .leftcol .recipebox{
                width: 80%;
                height: 320px;
                position: relative;
                word-break: break-word;
                overflow: hidden;
                float: left;
                box-shadow: 2px 5px 10px ;
                 }


                .selectionbody .rightcol .recipebox{
                    width: 80%;
                    height: 300px;
                    position: relative;
                    word-break: break-word;
                    overflow: hidden;
                    float: left;
                    box-shadow: 2px 5px 10px ;
                    }
        </style>
    </head>

    <body>
        <div class="nav-bar">
            
            <div class="searchbar">
                    <form method="POST" action="userhome.php">
                        <input type="text" name="searchkey" placeholder="Search for recipes...">
                        <button type="submit">Search</button>
                    </form>
                </div>
                
            <div class="logo"><a href=""><img src="images/dahmasaklogo.png"></a></div>
            <ul>
                
                <li><a href="userprofile.php">Profile</a></li>
                <li><a href="">Recipes</a></li>
                <li><a href="">Home</a></li> 
                <li><a href="logout.php">Log Out</a></li> 
                
            </ul>

           
            

        </div>

        
        <?php 
            //connection
            include "conn.php";
            session_start();
            //userid declaration
            if(isset($_SESSION['userid'])){
                $userid = $_SESSION['userid'];

            }

            //query to search for appropriate recipe for ROTD
            //$rotd = "SELECT * FROM recipe WHERE Recipe_Name = 'Chicken Rice'";
            $sql2 = "SELECT AVG(feedback.ratingNumber),recipe.Recipe_ID FROM feedback INNER JOIN recipe ON recipe.Recipe_ID = feedback.Recipe_ID GROUP BY recipe.Recipe_ID LIMIT 1";
            
            $rotdresult = mysqli_query($conn, $sql2);
            $sql2result = mysqli_fetch_array($rotdresult);
            $something = $sql2result['Recipe_ID'];
            $sql3 = "SELECT Round(AVG(ratingNumber),1),recipe.Recipe_ID, recipe.Recipe_Name, recipe.Recipe_Image, recipe.Descriptions, feedback.ratingNumber FROM feedback INNER JOIN recipe ON recipe.Recipe_ID = feedback.Recipe_ID WHERE recipe.RECIPE_ID ='$something' ";
            
            //$rotd = "SELECT * FROM recipe INNER JOIN feedback ON recipe.Recipe_ID = feedback.Recipe_ID WHERE Average_Star_Rating='5' LIMIT 1;";
            //$rotd = "SELECT AVG(ratingNumber) FROM feedback INNER JOIN recipe ON recipe.Recipe_ID = feedback.Recipe_ID WHERE recipe.RECIPE_ID = 81 ";
            
            $connectsql = mysqli_query($conn, $sql3);
        

        // below is the initial testing code
        if(mysqli_num_rows($connectsql)<=0){
            echo("<script>alert('No data from database!');</script>");
        }else{

        }while($rows = mysqli_fetch_array($connectsql)){
            echo "<div class='userbody'>

            <div class='rotd' style='background-color:#ef8000;'>
                <div class='leftcol'>
                    <h1 style='color:white;'>Recipe of The Day</h1>
                    <img src=".$rows['Recipe_Image']." alt='test'>
                </div>

                <div class='rotdright'>
                    <h2 style='color:white;'>".$rows['Recipe_Name']."</h2>
                    <p style='font-size:22px;'>".$rows['Descriptions']."</p>
                   
                    <h2 style='color:white;'>".$rows['Round(AVG(ratingNumber),1)']."/5</h2>
                    <a href='Recipe.php?id=".$rows['Recipe_ID']."'><button class='gotorecipe'>Go To Recipe</button></a>
                </div>
            </div>";
        }
            
            ?>
            <!--default code-->
            

            <h1 style='color:#FE9B13;'>Other Recipes</h1>

<div class="selectionbody">

<?php
        include "conn.php";
        

        if(isset($_SESSION['userid'])){
            $userid = $_SESSION['userid'];
    
        }


        $searchkey = isset($_POST['searchkey'])?
        $_POST['searchkey']:'';
        

        $sql = "SELECT * FROM recipe  WHERE Recipe_Name LIKE '%".$searchkey."%' OR Recipe_ID LIKE '%".$searchkey."%' LIMIT 10";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)<=0){
            echo("<script>alert('No data from database!');</script>");
        
        }
        else{

        }

        while ($rows = mysqli_fetch_array($result)){
            
            $rotd = "SELECT ROUND(AVG(ratingNumber),1) FROM feedback INNER JOIN recipe ON recipe.Recipe_ID = feedback.Recipe_ID WHERE recipe.RECIPE_ID =".$rows['Recipe_ID']." ";
            $rotdresult = mysqli_query($conn, $rotd);
            $hello=mysqli_fetch_array($rotdresult);
            echo "<a href='Recipe.php?id=".$rows['Recipe_ID']."'>";
            echo "<tr>";
            echo "<div class='leftcol'>
            <div class='recipebox'>
            <h3>".$rows['Recipe_Name']."</h3>
            <img src=".$rows['Recipe_Image']." alt='test'>
        
            <h2>".$hello['ROUND(AVG(ratingNumber),1)']."/5</h2>
            <div class='recipedesc'>
                <p>".$rows['Descriptions']."</p>
            </div>
            
        </div> </div>";
            echo "</a>";
       
    
        }
        ?>
        


                
            </div>
</div>
    </body>
<html>



