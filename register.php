<?php
	session_start();
	include("functions/functions.php");
	include("includes/db_connect.php");

	$message = "";
    $un_message = "";
    $em_message = "";
    $pw_message = "";
    
    if(isset($_POST['submit'])){
    	//set as empty again to clear if resubmitting
        $message = "";
        $un_message = "";
        $em_message = "";
        $pw_message = "";
        
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

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
				<form action="" method="POST">
					<div class="form-group">
						<label for="c_fname">First Name</label>
						<input type="text" class="form-control" id="f_name" name="c_fname" placeholder="First Name" required>
					</div>

					<div class="form-group">
						<label for="c_lname">Last Name</label>
						<input type="text" class="form-control" id="l_name" name="c_lname" placeholder="Last Name" required>
					</div>

					<div class="form-group">
						<label for="c_uname">Username</label>
						<input type="text" class="form-control" id="username" name="c_uname" placeholder="Username" required>
					</div>

					<div class="form-group">
						<label for="c_email">Email address</label>
						<input type="email" class="form-control" id="email" name="c_email" placeholder="Email" required>
					</div>

					<div class="form-group">
						<label for="c_phone">Phone Number</label>
						<input type="text" class="form-control" id="phone" name="c_phone" placeholder="Phone Number" required>
					</div>

					<div class="form-group">
						<label for="c_pass">Password</label>
						<input type="password" class="form-control" id="password" name="c_pass" placeholder="Password">
					</div>

					<div class="form-group">
						<label for="c_pass_again">Re-enter Password</label>
						<input type="password" class="form-control" id="password2" name="c_pass_again" placeholder="Password">
					</div>

					<br>
					<br>

					<button type="submit" name="register" class="btn btn-default center-block">Register</button>
				</form>
			</div>
		</div>

		<?php
			include("includes/footer.php");
		?>
	</body>
</html>