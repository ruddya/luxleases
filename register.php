<?php
	session_start();
	include("functions/functions.php");
	include("includes/db_connect.php");

	$message = "";
    $un_message = "";
    $em_message = "";
    $pw_message = "";
    
    if(isset($_POST['register'])){
    	//set as empty again to clear if resubmitting
        $message = "";
        $un_message = "";
        $em_message = "";
        $pw_message = "";
        
        $f_name = $_POST['c_fname'];
        $l_name = $_POST['c_lname'];
        $username = $_POST['c_uname'];
        $email = $_POST['c_email'];
        $phone = $_POST['c_phone'];
        $password = $_POST['c_pass'];
        $password2 = $_POST['c_pass_again'];

        if($password !== $password2){
            $pw_message = "Passwords do not match, please try again!";
        }
        else{
            //sha1 encrypts the password
            $password = sha1($password);
        }
		
        //checks if account exists (no duplicate usernames!)
        $sql = "SELECT * FROM Users WHERE username='".$username."' LIMIT 1";
        $result = mysqli_query($connection,$sql);
        //checks for duplication of email (1 account per email)
        $sql = "SELECT * FROM Users WHERE email='".$email."'LIMIT 1";
        $result2 = mysqli_query($connection,$sql);
        
        if (mysqli_num_rows($result) == 1){
            $un_message = "Account already exists. Please try a new username or log in.";
        }
        elseif(mysqli_num_rows($result2) == 1){
            $em_message = "There is already an account connected to this email. Please log in.";
        }
        else{
        	$access = 1;
            //Populates database with new user info
            $sql = "INSERT INTO Users (f_name,l_name,username,email,phone,password,access_level) VALUES('$f_name','$l_name','$username','$email','$phone','$password','$access')";
            mysqli_query($connection,$sql);
            $message = "Account successfully created. Log in to get started! You will be redirected to the login page in 5 seconds.";
            //redirects to login page
            header("Refresh: 5; url=login.php");
    }
	
    }else{
        // do nothing
        // this is when the user has not yet clicked submit
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lux Leases - Register</title>
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

			<h2 class="login_head">Register</h2>

			<div class="login_form">
				<?php 
                    if($message){
                        echo "<p class='form-message'>";
                        echo $message;
                        echo "</p>";
                    }
                ?>
				<form id="register" method="post">
					<div class="form-group">
						<label for="c_fname">First Name</label>
						<input type="text" class="form-control" name="c_fname" placeholder="First Name" required>
					</div>

					<div class="form-group">
						<label for="c_lname">Last Name</label>
						<input type="text" class="form-control" name="c_lname" placeholder="Last Name" required>
					</div>

					<div class="form-group">
						<?php 
		                    if($un_message){
		                        echo "<p class='form-message'>";
		                        echo $un_message;
		                        echo "</p>";
		                    }
		                ?>
						<label for="c_uname">Username</label>
						<input type="text" class="form-control" name="c_uname" placeholder="Username" required>
					</div>

					<div class="form-group">
						<?php 
		                    if($em_message){
		                        echo "<p class='form-message'>";
		                        echo $em_message;
		                        echo "</p>";
		                    }
		                ?>
						<label for="c_email">Email address</label>
						<input type="email" class="form-control" name="c_email" placeholder="Email" required>
					</div>

					<div class="form-group">
						<label for="c_phone">Phone Number</label>
						<input type="text" class="form-control" name="c_phone" placeholder="Phone Number" required>
					</div>

					<div class="form-group">
						<?php 
		                    if($pw_message){
		                        echo "<p class='form-message'>";
		                        echo $pw_message;
		                        echo "</p>";
		                    }
		                ?>
						<label for="c_pass">Password</label>
						<input type="password" class="form-control" name="c_pass" placeholder="Password">
					</div>

					<div class="form-group">
						<label for="c_pass_again">Re-enter Password</label>
						<input type="password" class="form-control" name="c_pass_again" placeholder="Password">
					</div>

					<br>
					<br>

					<input type="submit" name="register" value="Register" class="btn btn-default center-block"/>
				</form>
			</div>
		</div>

		<?php
			include("includes/footer.php");
		?>
	</body>
</html>