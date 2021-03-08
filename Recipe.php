<html>

<head></head>
<style>
    body{

        background-attachment: fixed;
        background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url("Image/random2.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        
        /*background-color:peachpuff;*/
        /* background-image: linear-gradient(to right, #fffdc2, #fffdc2 15%,#d7f0a2 20%,#d7f0a2 80%,#fffdc2 85% );
     */
    }
    h6{
        color:black;
        }
    .category h4:hover{ color:white;
                        transition:2s;
                    }

</style>
<body>	
    <?php

        include "conn.php";
        
        $search_recipe = $_GET['id'];
        //only display results from recipe where chef_id = Session...
        $sql = "SELECT * FROM recipe INNER JOIN category ON recipe.Category_ID = category.Category_ID  WHERE Recipe_ID = $search_recipe";

       
		$result=mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) <=0)
		{
		echo"<script>alert('No Result!');</script>";
		}
		else{

		
		while($rows= mysqli_fetch_array($result))
		{	
            echo"<div class='con1'style='
            height:auto;
         
            '>";
            echo"<h1 style='font-size:65px;
            padding-top:15px;
            padding-left:30px;
            padding-bottom:15px;
            margin-bottom:50px;
            background-color:rgba(0, 0, 0, 0.1);
            color:white;
            '>".$rows['Recipe_Name']."</h1>";
            
            echo"<div class='recipe1' style='display:flex;
            background-color:rgba(0, 0, 0, 0.1);
            padding-top:20px;
            margin-top:-30px;
            padding-bottom:20px;
            margin-bottom:50px;'>";

            echo"<div class='con2' style='
            height:400px;
            width:25%;
            padding-left:12px;
            margin-left:20px;
            margin-right:20px;
            background-color:rgba(0, 0, 0, 0.0);'>";
            echo"<img style='
            padding-left:15px;
            padding-top:15px;
            border-radius:50%;
            'src=".$rows['Recipe_Image']." width='350px' height='350px'>";
            
            echo"<div class='category' style='display:flex;'>";
            echo"<h2 style='padding-top:30px;
            margin:auto;
            color:white;
            margin-left:-1px;'>
            Category:  </h2>
           
            <center><h4 style='
            height:25px;
            padding-left:px;
            margin-top:55px;
            padding-top:7px;
            width:150px;
            margin-right:80px;
            background-color:#4FB92A ;
            border-radius:20px;
            border:2px solid black;'>".$rows['Category_Name']."</h4></center>
            </div>
            </div>";


            echo"<div class='con3' style='
            background-color:#F8FFDA;
            padding-top:17px;
            width:70%;'>";
            echo"<div class='description' style='
            padding-left:30px;
            overflow:auto;
            height:325px;          
            padding-right:30px;
            background-color:#F8FFDA;'>";
			echo"<h1>Description</h1><hr>";
            echo"<h3>".$rows['Descriptions']."</h3>";
            echo"</div>";

            echo"<div class='sc' style='
            float:left;
            width:100%;
            height:auto;
            background-color:black;
            margin-top:10px;
            display:flex;'>";

            echo"<div class='serving' style='padding-right:20px;
            padding-left:30px; 
            height:auto;
            background-color:#FFC300;
            width:33%;'>";
            echo"<h2>Serving Size</h2>";
            echo"<h5>".$rows['Serving']."</h5>";
            echo"</div>";

            echo"<div class='calories'style='padding-right:20px;
            padding-left:30px; 
            height:auto;
            background-color:#FF900C ;
            width:33%;'>";
            echo"<h2>Total Calories</h2>";
            echo"<h5>".$rows['Calorie_Count']."kcal</h5>";
            echo"</div>";
            

            echo"<div class='cost'style='padding-right:20px;
            padding-left:30px; 
            height:auto;
            background-color:#FF5733;
            width:33%;'>";
            echo"<h2>Cost</h2>";
            echo"<h5>RM".$rows['Cost']."</h5>";
            echo"</div>";
            echo"</div>";

            // echo"<div class='average'style='
            // float:left;
            // padding-left:30px; 
            // background-color:#F8FFDA;

            // height:auto;
            // width:97.3%;'>";
            // echo"<h2>Average Rating</h2>";
            // echo"<h5>".$rows['Average_Star_Rating']."</h5>";
            // echo"</div>" ;   
            echo"</div>";   
            echo"</div>";  

            echo"<div class='recipe2' style='
            display:flex;
            float:left;
            height:430px;
            width:1510px;
            margin-left:30px;
            margin:auto;
            background-color:rgba(0, 0, 0, 0.1);
            border-radius:0px;
            padding-top:30px;
            padding-left:12px;
            padding-right:40px;'>";// removed margin-top:300px;

            /*This is the start Con4 containing Steps & Ingredients */
            echo"<div class='con4' style='
            float:left;
            padding-left:6px;
            height:400px;
            width:50%;
            overflow:auto;
            background-color:#F8FFDA;
            margin-left:30px;
            margin-right:50px;
            margin-bottom:23px;
            '>"; 
            //echo"<h6 style='font-size:35px;'>Steps & Ingredients</h6>";
            echo"<h2 style='font-size:27px
            overflow:auto
            height:200px;
            ;'><h1>Steps & Ingredients</h1><hr>".$rows['Steps']."</h2>";
            echo"</div>";  
            /*End of Con 4*/

            /*This is the start of Video containing the video for each recipe */
            echo"<div class='video' style='
            height:400px;
            width:auto;'>";
            echo"<iframe width='750px' height='400px' src=".$rows['Video']." frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            echo"</div>";
            /*This is the end of Video Container*/

            echo"</div>";
        

        echo"<center><button style='padding:10px 12px; border-radius:20px; background-color:orange; border:0px; margin-top:50px;margin-left:20px; font-size:20px;' onclick='history.go(-1);'>Back </button>";
        echo"<a href='saverecipe.php?rid=".$rows['Recipe_ID']."'><button style='padding:10px 12px; border-radius:20px; background-color:orange; border:0px; margin-top:50px; margin-left:20px;  font-size:20px;'>Save Recipe</button><a/>";
        echo"<a href='show_rating.php?item_id=".$rows['Recipe_ID']."'><button style='padding:10px 12px; border-radius:20px; background-color:orange; border:0px; margin-top:50px; margin-left:20px; font-size:20px;'>Rate Here</button><a/></center>";
       

        }
	}

    ?>
    
    </body>
    </html>