<?php
    
	$conn = new mysqli("localhost", "phpmyadmin", "hello", "youarestrong");
    
    if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }
?>