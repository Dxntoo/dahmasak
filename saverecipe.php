<?php
    include "conn.php";
    session_start();

    $uid = $_SESSION['id'];
    $rid = $_GET['rid'];

    $sql = "INSERT INTO bookmark (Recipe_ID, User_ID) VALUES
    ('$rid','$uid');";
    mysqli_query($conn, $sql);

    $sql1 = "SELECT Recipe_ID, User_ID FROM bookmarks WHERE Recipe_ID = $uid AND User_ID = $id";
    mysqli_query($conn, $sql);


if(mysqli_affected_rows($conn)<=0)
{
  echo "<script>alert('Unable to Save Recipe ! \\nPlease Try Again!');</script>";
  // die("<script>window.history.go(-1);</script>");
}else if(mysqli_fetch_assoc($sql1)>=1){
  echo "fuck you stop saving recipes you shit";
}else{
  echo "<script>alert('Saved Successfully');</script>";
  echo "<script>window.location.href='userhome.php';</script>";
}

 

?>

    
    
   
    
    
    