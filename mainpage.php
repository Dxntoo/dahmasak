<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="Style/mainpage.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>  
    a{
        color:black;
        margin-bottom:40px;
        text-decoration:none;
    }
    .button:hover{
    background-color:black;
    
    transition:5s;
  }


</style>
<title>sup</title>
</head>
<body>
<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>

<div class="container" style="background-color:#f1f1f1">
  <div class="row">
    <div class="column-33">
      <img src="Image/user5.png" alt="user"style="margin-top:; width:480px; height:440px;">
    </div>
    <div class="column-66">
      
      <h1 class="xlarge-font"><b>Welcome To DahMasak</b></h1>
      <h1 class="large-font" style="color:orange;"><b>Share amazing recipes with the world</b></h1>
      <p><span style="font-size:36px">Looking for amazing recipes?</span> 
      <h3>If youre a regular user and you are looking for some amazing recipes to try out, feel free to Sign Up but clicking on the 'Sign Up' button below. If u alredy have an account however, you can click on the 'Log In' button to log in and begin browing those amazing recipes.
      </h3>
      </p>
      <br>
      <a href="UserLogin.html" class="button" style="background-color:orange;">User Login</a>
      <a href="UserSignUp.html" class="button" style="background-color:orange;">User Sign Up</a>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="column-66">
      <h1 class="xlarge-font"><b>You're a Chef ?</b></h1>
      <h1 class="large-font" style="color:orange;"><b>Share amazing recipes with the world</b></h1>
      <p><span style="font-size:36px">Already have existing account?</span> 
      <h3>
        If you have not created your Chef Account, I suggest you to get it while its free. Click on "Chef Sign Up" to sign up as chef. However, if you already have an account please login and start uploading your creative recipes and videos.
      </h3>
      </p>
      <br>
      <!-- Chef login still not done -->
      <a href="cheflogin.html" class="button" style="background-color:orange">Chef Login</a>
      <a href="ChefSignUp.html" class="button" style="background-color:orange">Chef Sign Up</a>
    </div>
     <div class="column-33">
        <img src="Image/chef7.png" style="margin-top:; width:350px; height:400px;" >
    </div> 
  </div>
</div>


<div class="container" style="background-color:#f1f1f1">
  <div class="row">
    <div class="column-33">
      <img src="Image/admin6.png" alt="Food" width="720px" height="1000px">
    </div>
    <div class="column-66">
      <h1 class="xlarge-font"><b>I Am The Admin</b></h1>
      <h1 class="large-font" style="color:orange;"><b>What we do?</b></h1>
    <p><span style="font-size:36px">We Manage and fix most of your problems.</span> 
      <h3>
      "If you are a chef and you wanna sign up, just CALL US with the number stated on the page after you click on the 'ChefSignUp' button."
     </h3>
      </p>
    <br>
      <a href="AdminLogin.html" class="button" style="background-color:orange">Admin Login</a>
      
    </div>
  </div>
</div>
<?php
include "inc/footer.php";
?>
<!-- <div class="column1">
    <div class="card">
    <img src="image/pizza.jpg" alt="Avatar" style="width:100%">
        <div class="container">
            <h4><b>John Doe</b></h4> 
            <p>Architect & Engineer</p> 
        </div>
    </div>

    <div class="card">
    <img src="image/cookies.jpg" alt="Avatar" style="width:100%">
        <div class="container">
            <h4><b>John Doe</b></h4> 
            <p>Architect & Engineer</p> 
        </div>
    </div>
</div> -->
<div class="footer" style=" display:flex; width:100%; height:70px; padding-top:10px; background-color:orange; margin-bottom:10px; margin-top:-10px;">
<center><h3 style='margin-left:100px; margin-right:100px; float:left;'>DahMasak © 2020</h3>
<h3 style=' margin-left:900px; float:left;'>Please call Helpline: 03-99999999</h3></center>

</div>

</body>
</html>
