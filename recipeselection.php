<!DOCTYPE html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Raleway&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="userhome.css">

    <title>Recipe Selection</title>

</head>

<body>

<div class="nav-bar">
            
            <div class="searchbar">
                    <form method ="POST" action="recipeselection.php">
                        <input type="text" name="searchkey" placeholder="Search for recipes...">
                        <button type="submit">Search</button>
                    </form>
                </div>
                
            <div class="logo"><a href="userhome.php"><img src="images/dahmasaklogo.png"></a></div>
            <ul>
                
                <li><a href="">Profile</a></li>
                <li><a href="">Recipes</a></li>
                <li><a href="">Home</a></li> 
                
            </ul>

           
            

        </div>

       
        

    </div>
<div class="selectionbody">

<?php
        include "conn.php";
        session_start();

        if(isset($_SESSION['userid'])){
            $userid = $_SESSION['userid'];
    
        }


        $searchkey = isset($_POST['searchkey'])?
        $_POST['searchkey']:'';
        

        $sql = "SELECT * FROM recipe WHERE Recipe_Name LIKE '%".$searchkey."%' OR Recipe_ID LIKE '%".$searchkey."%'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)<=0){
            echo("<script>alert('No data from database!');</script>");
        
        }
        else{

        }

        while ($rows = mysqli_fetch_array($result)){
            echo "<a href='Recipe.php?id=".$rows['Recipe_ID']."'>"; /*add recipe page from Ryan*/
            echo "<tr>";
            echo "<div class='leftcol'>
            <div class='recipebox'>
            <h3>".$rows['Recipe_Name']."</h3>
            <img src=".$rows['Recipe_Image']." alt='test'>
        
            <h2>".$rows['Average_Star_Rating']."</h2>
            <div class='recipedesc'>
                <p>".$rows['Descriptions']."</p>
            </div>
            
        </div> </div>";
            echo "</a>";
            
    
        }
        ?>
        </table>


    <!--<div class="leftcol">
        <div class="recipebox">
            <h3>Pepperoni Pizza</h3>
            <img src="https://usercontent1.hubstatic.com/14337024_f1024.jpg" alt="test">
        
            <h2>4.7/5.0</h2>
            <div class="recipedesc">
                <p>This is the description for the recipe stated.</p>
            </div>
            
        </div>

        <div class="recipebox">
            <h3>Chicken Parmesan</h3>
            <img src="https://thecozyapron.com/wp-content/uploads/2019/03/chicken-parmesan_thecozyapron_1.jpg">
        
            <h2>4.7/5.0</h2>
            <div class="recipedesc">
                <p>This is the description for the recipe stated.</p>
            </div>
            
        </div>
    </div>

    <div class="rightcol">
        <div class="recipebox">
            <h3>Chicken Curry and Rice</h3>
            <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/190509-coconut-chicken-curry-157-1558039780.jpg?crop=0.668xw:1.00xh;0.116xw,0&resize=980:*">
            
            <div class="starrating">
                <h2>4.7/5.0</h2>
            </div>
            <div class="recipedesc">
                <p>This is the description for the recipe stated.</p>
            </div>
        </div>

        <div class="recipebox">
            <h3>Chicken Escalope</h3>
            <img src="https://www.americangarden.us/wp-content/uploads/Chicken-Scalope.jpg">
            
            <div class="starrating">
                <h2>4.7/5.0</h2>
            </div>
            <div class="recipedesc">
                <p>This is the description for the recipe stated.</p>
            </div>
        </div>
    </div>-->
    
</div>
</body>
</html>