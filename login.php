<?php
	session_start();
	include("includes/db_connect.php");
	include("functions/functions.php");

	//this runs when user submits login form
	if(isset($_POST['submit'])){
	    $username = $_POST['username'];
	    $password0 = $_POST['password'];
	    //encrypts password
	    $password = sha1($password0);
	    
	    //looks for a matching result (assuming user entered username)
	    $sql = "SELECT * FROM Users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
	    $result = mysqli_query($connection, $sql);

        //user successfully logged in, setting variables
        if (mysqli_num_rows($result) == 1){
        	$row = mysqli_fetch_row($result);
        	//variable to be checked per page to see if user logged in or not
        	$_SESSION['logged_in'] = true;
        	$_SESSION['logged_in_user'] = $username;
        	$message = "Welcome, ". $_SESSION['logged_in_user'] . "! You will be redirected to the homepage.";
        }

        //user's entries did not match database, look for matching email + pass
        else{
        	$sql = "SELECT * FROM Users WHERE username='".$email."' AND password='".$password."' LIMIT 1";
		    $result = mysqli_query($connection, $sql);

		    //user successfully logged in, setting variables
	        if (mysqli_num_rows($result) == 1){
	        	$row = mysqli_fetch_row($result);
	        	//variable to be checked per page to see if user logged in or not
	        	$_SESSION['logged_in'] = true;
	        	$_SESSION['logged_in_user'] = $username;
	        	$message = "Welcome, ". $_SESSION['logged_in_user'] . "! You will be redirected to the homepage.";
	        }
	        //still no match - send response message
	        else{
	        	$message = "Invalid username or password.";
	        }
        }
    //once logged in, redirect to homepage
    if (isset($_SESSION['logged_in'])) {
    	header("Refresh: 5; url=home.php");
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lux Leases - Login</title>
		<link rel="stylesheet" type="text/css" href="css/html5reset.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="https://use.fontawesome.com/51fbdde8ed.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body>
		<?php
			include("includes/sub_nav.php");

			include("includes/nav.php"); 
		?>

		<?php cart(); ?>

		<?php getIp(); ?>

		<div class="container">
			
			<?php include("includes/info_block.php"); ?>

			<h2 class="login_head">Login</h2>

			<div class="login_form">
				<form action="" method="POST">
					<div class="form-group">
						<label for="email">Username or Email address</label>
						<input type="email" class="form-control" id="username" name="email" placeholder="Email" required>
					</div>

					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" class="form-control" id="password" name="pass" placeholder="Password">
					</div>

					<a href="checkout.php?forgot_pass">Forgot Password?</a>
					<br>
					<br>

					<button type="submit" name="login" id="submit" class="btn btn-default center-block">Login</button>
				</form>
			</div>

			<p class="login_txt">Admin? Log in <a href="login.php">here</a></p>
		</div>

		<?php
			include("includes/footer.php");
		?>
	</body>
</html>