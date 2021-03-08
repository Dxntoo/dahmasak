<?php
session_start();
session_destroy();


echo "<script>alert ('Thanks for using dahmasak');</script>";
header ('location:mainpage.php');


?>

