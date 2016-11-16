<?php
	$username = "am073448";
	$password = "13Isagoodnumber!";
    $database = "dig4530c0001";
        
	$connection = mysqli_connect("sulley.cah.ucf.edu" , "$username", "$password", "$database") or die(mysql_error());  //(host,username,password,) Connects to mysql server. Throws error if it cannot connect. 
	//mysql_select_db("am073448" , $connection); //(nameOfDatabase , mysql connection variable)
?>