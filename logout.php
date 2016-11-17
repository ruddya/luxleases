<?php
        //take the session
	session_start();
        
        $_SESSION['logged_in'] = false;

        //and THROW IT ON THE GROUND
	session_unset();
	
        //immediate redirect
	header("Location: login.php");
?>