<?php 
    include "displayrecipes.php";


?>

<!DOCTYPE html>
    <head>
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Raleway&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" type="text/css" href="userhome.css">
        <title>User Homepage</title>
        
    </head>

    <body>
        <div class="nav-bar">
            
            <div class="searchbar">
                    <form>
                        <input type="text"  placeholder="Search for recipes...">
                        <button type="submit">Search</button>
                    </form>  
                </div>
                
            <div class="logo"><a href=""><img src="images/dahmasaklogo.png"></a></div>
            <ul>
                
                <li><a href="userprofile.php">Profile</a></li>
                <li><a href="">Recipes</a></li>
                <li><a href="">Home</a></li> 
                
            </ul>

           
            

        </div>

        

        <div class="userbody">

            <div class="rotd">
                <div class="leftcol">
                    <h1>Recipe of The Day</h1>
                    <img src="https://usercontent1.hubstatic.com/14337024_f1024.jpg" alt="test">
                </div>

                <div class="rotdright">
                    <h2>Pepperoni Pizza</h2>
                    <p>Lorem ipsum dolor sit amet, 
                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <h2>4.7/5.0</h2>
                    <button class="gotorecipe" href="recipepage.php">Go To Recipe</button>
                </div>
            </div>

            <h1>Other Recipes</h1>

            <div class="selectionbody">
                <div class="leftcol">
                    <a href="recipepage.php"> <!--Blank recipe page-->
                        <div class="recipebox">
                        <h3>Pepperoni Pizza</h3>
                        <img src="https://usercontent1.hubstatic.com/14337024_f1024.jpg" alt="test">
                    
                        <h2>4.7/5.0</h2>
                        <div class="recipedesc">
                            <p>This is the description for the reccipe stated.</p> <!--not working for some reason-->
                        </div>
                    </a>
                        
                    </div>

                    <a href="recipepage.php"> <!--Blank recipe page-->
                    <div class="recipebox">
                        <h3>Chicken Parmesan</h3>
                        <img src="https://thecozyapron.com/wp-content/uploads/2019/03/chicken-parmesan_thecozyapron_1.jpg">
                    
                        <h2>4.7/5.0</h2>
                        <div class="recipedesc">
                            <p>This is the description for the recipe stated.</p>
                        </div>
                    </a>

                    </div>
                </div>
            
                <div class="rightcol">

                    <a href="recipepage.php"> <!--Blank recipe page-->
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
                    </a>
                    
                    <a href="recipepage.php"> <!--Blank recipe page-->
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
                    </a>

                </div>
                
            </div>
        </div>
    </body>
<html>



