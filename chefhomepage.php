<?php

session_start();
if(! isset($_SESSION['name'])){
    header('location: cheflogin.php');
    
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Home Page</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
          crossorigin="anonymous">    
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab" rel="stylesheet">
   <!-- <link rel="stylesheet" href="style.css">-->
    <link rel="stylesheet" href="all.css">
    <style>
    h1 {
  padding: 8px;
  background: rgba(255, 0, 0, 0.8);
  border-radius: 8px;
  margin: 0;
  font-size: 20px;
  font-family: "Roboto Slab", serif;
  padding: 10px 200px;
}
#searchBar{
    border: 1px solid #000000;
    font-size: 16px;
    padding: 30px;
    outline: none;
    width: 500px;
    -webkit-border-top-left-radius: 10px;
    -webkit-border-bottom-left-radius: 10px;
    -moz-border-radius-topleft: 10px;
    -moz-border-radius-bottomleft: 10px;
    border-top-left-radius:10px;
    border-bottom-left-radius:10px;

}
#searchButton{
    border:1px solid #000000;
    font-size: 16px;
    padding: 30px;
    background: #f1d829;
    font-weight: bold;
    cursor: pointer;
    outline: none;
    -webkit-border-top-right-radius: 10px;
    -webkit-border-bottom-right-radius: 10px;
    -moz-border-radius-topright: 10px;
    -moz-border-radius-bottomright: 10px;
    border-top-right-radius:10px;
    border-bottom-right-radius:10px;



}
  
    
    </style>
</head>

<body style="background:url(img/home.jpg);background-repeat: no-repeat; background-size: 100% 100%">

<div id="slideout-menu">
        <ul>
            
            <li>
                <a href="chefprofile.php">Profile</a>
            </li>
            
            
        </ul>
    </div>

    
      
<a class="float-right" href="logoutchef.php">LOGOUT</a>

<p>Welcome <?php echo $_SESSION['name']; ?> </p>


</div>


<script src="main.js"></script>
</body>

</html>
