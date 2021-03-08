 <?php  
 $connect = mysqli_connect("localhost", "root", "", "dahmasak");  
 //$query = "SELECT Chef_ID,COUNT(*)Number_OF_Recipes FROM recipe GROUP BY Chef_ID";  
 $query = "SELECT Chef_Name, COUNT(*)Number_OF_Recipes FROM recipe INNER JOIN chef WHERE recipe.Chef_ID = chef.Chef_ID GROUP BY Chef_Name";  
 $result = mysqli_query($connect, $query);  
 $query2 = "SELECT Recipe_Name, COUNT(*)Show_all_ratings FROM recipe INNER JOIN feedback WHERE recipe.Recipe_ID = feedback.Recipe_ID GROUP BY Recipe_Name";  
 $result2 = mysqli_query($connect, $query2); 
 $query3 = "SELECT Recipe_Name, COUNT(*)Number_OF_Saves FROM recipe INNER JOIN bookmark WHERE recipe.Recipe_ID = bookmark.Recipe_ID GROUP BY Recipe_Name ";
 $result3 = mysqli_query($connect, $query3);  


 include 'conn.php';
    
    $chinese = "SELECT COUNT(Recipe_ID) AS chinese FROM recipe WHERE Category_ID = '3'";
    $chineseresult = mysqli_query($conn, $chinese);
    $chinesevalues = mysqli_fetch_assoc($chineseresult);
    $chinese_num_rows = $chinesevalues['chinese'];

    
    $malay = "SELECT COUNT(Recipe_ID) AS malay FROM recipe WHERE Category_ID = '4'";
    $malayresult = mysqli_query($conn, $malay);
    $malayvalues = mysqli_fetch_assoc($malayresult);
    $malay_num_rows = $malayvalues['malay'];


    
    $indian = "SELECT COUNT(Recipe_ID) AS indian FROM recipe WHERE Category_ID = '5'";
    $indianresult = mysqli_query($conn, $indian);
    $indianvalues = mysqli_fetch_assoc($indianresult);
    $indian_num_rows = $indianvalues['indian'];

    
    $baba = "SELECT COUNT(Recipe_ID) AS baba FROM recipe WHERE Category_ID = '6'";
    $babaresult = mysqli_query($conn, $baba);
    $babavalues = mysqli_fetch_assoc($babaresult);
    $baba_num_rows = $babavalues['baba'];
    

 ?> 
 
 <!DOCTYPE html>  
 <html>  
 
      <head>  
           <title>Chef Contribution Report</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Chef_Name', 'Number_OF_Recipes'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Chef_Name"]."', ".$row["Number_OF_Recipes"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Chef Contribution Chart',  
                      is3D:true,  
                      pieHole: 0  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           }  
</script>  
                      <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Recipe_Name', 'Show_all_ratings'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["Recipe_Name"]."', ".$row["Show_all_ratings"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Rating per Recipe',  
                      is3D:true,  
                      pieHole: 0  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
                chart.draw(data, options);  
           }  
           </script> 

             

           </script>  
                      <script type="text/javascript">  
                         google.charts.load('current', {'packages':['corechart']});  
                         google.charts.setOnLoadCallback(drawChart);  
                         function drawChart()  
                         {  
                              var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', 'Slices');
                    data.addRows([
                         ['Chinese', <?php echo $chinese_num_rows ?>],
                         ['Malay', <?php echo $malay_num_rows ?>],
                         ['Indian', <?php echo $indian_num_rows ?>],
                         ['Baba Nyonya', <?php echo $baba_num_rows ?>]
          
        ]);  
                var options = {  
                      title: 'Recipe Categories',  
                      is3D:true,  
                      pieHole: 0  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
           }  
           </script>

<script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Recipe_Name', 'Number_OF_Saves'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["Recipe_Name"]."', ".$row["Number_OF_Saves"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Amount of Saved Recipes',  
                      is3D:true,  
                      pieHole: 0  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart4'));  
                chart.draw(data, options);  
           }  
 </script>



      </head>  
      <style>
           body{ 
               background-attachment: fixed;
               background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url("Image/c.jpg") no-repeat center center fixed;
               -webkit-background-size: cover;
               -moz-background-size: cover;
               -o-background-size: cover;
               background-size: cover;    
           }
           a{
                text-decoration:none;
                    color:black;
           }
           
      </style>
      <body> 
           <br /><br />  
           <h3 align="center" style="font-size:50px; color:white;">Graphs & Charts</h3>
           <br/>
           <div style="width:100%; height:500px; display:flex; padding-top:50px;">  
                <div id="piechart1" style="width: 45%; height: 450px; margin-left:2.5%; margin-right:2.5%;"></div>  
                <div id="piechart2" style="width: 45%; height: 450px; margin-left:2.5%; margin-right:2.5%;"></div>  
           </div>  <div style="width:100%; height:500px; display:flex; padding-top:50px;">  
                <div id="piechart3" style="width: 45%; height: 450px; margin-left:2.5%; margin-right:2.5%;"></div>  
                <div id="piechart4" style="width: 45%; height: 450px; margin-left:2.5%; margin-right:2.5%;"></div>  
           </div>  
           
           <center><button style='padding:15px 25px; background-color:orange;border:0px; border-radius:20px; margin-top:30px;'><a href='adminhome.html'>Back</a></button></center>
      </body>  
 </html>  