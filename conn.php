<?php
	$servername = 'localhost';
	$username ='root';
    $password ='';
    // change dbname to dahmasak
	$dbname ='dahmasak';
	$conn = mysqli_connect ('localhost','root','','dahmasak');
	
	if(mysqli_connect_error())
	{
	die('<script>alert("Connection failed: Please check your SQL connection!");</script>');
	}		

	

	?>
