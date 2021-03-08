<html>
<link rel="stylesheet" href="style/Style.css">
<head></head>
<style>
    h6{color:white}
</style>
<body>	
    <div class="searchinsert">
        <h1>Search:</h1>
		<form action="Recipe.php" method="post">
		    <input type="text" name="search_recipe" placeholder="Please enter recipe name here!"/>
			<input type="submit" value="search" /><br/><br/>
		</form>
        
        
        <?php
        include "conn.php";
        session_start();
        $ruid = $_GET['id'];
		$uid = $_SESSION['id'];
		$search_recipe = isset($_POST['search_recipe'])?
		$_POST['search_recipe']:'';
		
		if ($search_recipe == NULL)
		{
		echo"<script>alert('Please key in recipe name!');</script>";
		}
		else{
		
		}
        //only display results from recipe where chef_id = Session...

		$sql = "SELECT * FROM recipe WHERE Recipe_ID = $ruid";
		$result=mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) <=0)
		{
		echo"<script>alert('No Result!');</script>";
		}
		else{

		
		while($rows= mysqli_fetch_array($result))
		{	
            echo"<div class='con1'>";
			echo"<h1>".$rows['Recipe_Name']."</h1>";
            echo"<div class='con2'><img style='border-radius:20px;' src='".$rows['Recipe_Image']."' width='100%' height='100%'></div>";
            echo"<div class='con3'>";

            echo"<div class='description'>";
			echo"<h4>Description</h4>";
            echo"<h6>".$rows['Descriptions']."</h6>";
            echo"</div>";

            echo"<div class='average'>";
            echo"<h4>Average Rating</h4>";
            echo"<h6>".$rows['Average_Star_Rating']."</h6>";
            echo"</div>" ;   

            echo"<div class='serving'>";
            echo"<h4>Serving Size</h4>";
            echo"<h6>".$rows['Serving']."</h6>";
            echo"</div>";

            echo"<div class='calories'>";
            echo"<h6>Total Calories</h6>";
            echo"<h5>".$rows['Calorie_Count']."kcal</h5>";
            echo"</div>";

            echo"<div class='cost'>";
            echo"<h6>Cost</h6>";
            echo"<h5>RM".$rows['Cost']."</h5>";
            echo"</div>";
            echo"</div>";   
             
            echo"<div class='con4'>";
            echo"<h6>Steps&Ingredients</h6><hr>";
            echo"<h6>".$rows['Recipe_ID']."</h6>";
            echo"</div>" ;  

            
            
            echo"<div class='video'>";  
            echo"<iframe width='572' height='400' src=".$rows['Video']." frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
            echo"</div>" ; 
            
            echo "<td><a href='save.php?rid=".$rows['Recipe_ID']."'><button>Save recipe</button></a></td>";
        }
        
    }
    

    ?>


    </body>
    </html>