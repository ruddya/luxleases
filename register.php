<?php
	session_start();
	include("functions/functions.php");
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
						<input type="text" class="form-control" name="c_fname" placeholder="First Name" required>
					</div>

					<div class="form-group">
						<label for="c_lname">Last Name</label>
						<input type="text" class="form-control" name="c_lname" placeholder="Last Name" required>
					</div>

					<div class="form-group">
						<label for="c_uname">Username</label>
						<input type="text" class="form-control" name="c_uname" placeholder="Username" required>
					</div>

					<div class="form-group">
						<label for="c_email">Email address</label>
						<input type="email" class="form-control" name="c_email" placeholder="Email" required>
					</div>

					<div class="form-group">
						<label for="c_phone">Phone Number</label>
						<input type="text" class="form-control" name="c_phone" placeholder="Phone Number" required>
					</div>

					<div class="form-group">
						<label for="c_pass">Password</label>
						<input type="password" class="form-control" name="c_pass" placeholder="Password">
					</div>

					<div class="form-group">
						<label for="c_pass_again">Re-enter Password</label>
						<input type="password" class="form-control" name="c_pass_again" placeholder="Password">
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