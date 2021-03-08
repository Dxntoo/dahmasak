

<!DOCTYPE html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Raleway&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="chefmg.css">
    <title>Manage Users</title>
</head>

<body>
    <center>
    <div class="searchbar">
        <form action="adminmguser.php" method="POST">
        <input type="text" name="search_key" placeholder="Please put in your keyword!"/>
            <button type="submit" value="Search">Search</button>
        </form>
    </div>
    </center>

    <center>
        <h1>All Users</h1>

        <br/>

        <br/>

        <table border="1" style="text-align: center">
            <tr>
                
                <th>User Name</th>
                <th>Email</th>
                <th>Profile Picture</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

        <?php
        include "conn.php";
        session_start();

        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);

        $adminid = $_SESSION['Admin_ID'];

        $search_key = isset($_POST['search_key'])?
        $_POST['search_key']:'';
        

        $sql = "SELECT * FROM user WHERE User_Name LIKE '%".$search_key."%' OR Email LIKE '%".$search_key."%' OR User_ID LIKE '%".$search_key."%'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)<=0){
            echo("<script>alert('No data from database!');</script>");
        
        }
        else{

        }

        while ($rows = mysqli_fetch_array($result)){
           
            echo "<tr>";
            echo "<td>".$rows['User_Name']."</td>";
            echo "<td>".$rows['Email']."</td>";
            echo "<td><img src=Image/".$rows['Profile_Picture']." width='80'/></td>";
            
            echo "<td><a href=userprofile2.php?id=".$rows['User_ID']."><button>Edit</button></a></td>";
			echo "<td><a href=admindeleteuser2.php?id=".$rows['User_ID']."><button>Delete</button></a></td>";
			echo "</tr>";
        }

        ?>
        </table>

        </br></br></br>
        
        <a href="adminhome.html"><!--Admin Index Page--><button class="btn">Back to Home Page</button></a>
    </center>

    <!--<div class="userlist">
        <h1>All Chefs</h1>
        <h2 class="chefname">Chef Names</h2>
        <div class="user">
            <img src="https://pbs.twimg.com/media/DgTu3EDVQAItodt?format=jpg&name=large" alt="user">
            <h2>Felix Lengyel</h2>
        </div>
        <div class="user">
            <img src="https://static-cdn.jtvnw.net/jtv_user_pictures/1f47965f-7961-4b64-ad6f-71808d7d7fe9-profile_image-300x300.png" alt="user">
            <h2>Tyler Niknam</h2>
        </div>
        <div class="user">
            <img src="https://img.resized.co/dexerto/eyJkYXRhIjoie1widXJsXCI6XCJodHRwczpcXFwvXFxcL2ltYWdlcy5kZXhlcnRvLmNvbVxcXC91cGxvYWRzXFxcLzIwMjBcXFwvMDNcXFwvMDYwNjQzMDFcXFwvdHlsZXIxLWhpdHMtYmFjay1pd2QuanBnXCIsXCJ3aWR0aFwiOlwiXCIsXCJoZWlnaHRcIjpcIlwiLFwiZGVmYXVsdFwiOlwiaHR0cHM6XFxcL1xcXC9zMy1ldS13ZXN0LTEuYW1hem9uYXdzLmNvbVxcXC9wcGx1cy5pbWFnZXMuZGV4ZXJ0by5jb21cXFwvdXBsb2Fkc1xcXC8yMDE5XFxcLzExXFxcLzExMjE0OTQzXFxcL3BsYWNlaG9sZGVyLmpwZ1wifSIsImhhc2giOiI5OTQzMTUzNzI0NWJjZmY2YmY3NDIwOTUwZTI3NDUxNGI0NzkwOTRhIn0=/tyler1-hits-back-iwd.jpg" alt="user">
            <h2>Tyler Steinkamp</h2>
        </div>
        <div class="user">
            <img src="https://img.resized.co/dexerto/eyJkYXRhIjoie1widXJsXCI6XCJodHRwczpcXFwvXFxcL2ltYWdlcy5kZXhlcnRvLmNvbVxcXC91cGxvYWRzXFxcL3RodW1ibmFpbHNcXFwvX3RodW1ibmFpbExhcmdlXFxcL3R3aXRjaC1zdHJlYW1lci1zdWZmZXJzLXNlcmllcy1vZi1oaWxhcmlvdXMtbWlzdGFrZXMtZHVyaW5nLWJyb2FkY2FzdC5qcGdcIixcIndpZHRoXCI6NjIwLFwiaGVpZ2h0XCI6MzQ3LFwiZGVmYXVsdFwiOlwiaHR0cHM6XFxcL1xcXC9zMy1ldS13ZXN0LTEuYW1hem9uYXdzLmNvbVxcXC9wcGx1cy5pbWFnZXMuZGV4ZXJ0by5jb21cXFwvdXBsb2Fkc1xcXC8yMDE5XFxcLzExXFxcLzExMjE0OTQzXFxcL3BsYWNlaG9sZGVyLmpwZ1wifSIsImhhc2giOiJlYmRiZmFjZTU2NTQ3NjJmZTFhMTE2MjEyNDg5NjE3MDM2Nzg4NDgxIn0=/twitch-streamer-erobb-suffers-three-hilarious-fails-in-just-30-seconds.jpg" alt="user">
            <h2>Eric Lamont Robbins Jr</h2>
        </div>
        <div class="user">
            <img src="https://static-cdn.jtvnw.net/jtv_user_pictures/c901b680-9876-4e67-826a-e141381628e5-profile_image-300x300.jpg" alt="user">
            <h2>Anthony Romeo</h2>
        </div>
    </div>-->

</body>

</html>