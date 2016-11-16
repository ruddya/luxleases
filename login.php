<?php
	session_start();
	include("functions/functions.php");
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
						<input type="email" class="form-control" name="email" placeholder="Email" required>
					</div>

					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" class="form-control" name="pass" placeholder="Password">
					</div>

					<a href="checkout.php?forgot_pass">Forgot Password?</a>
					<br>
					<br>

					<button type="submit" name="login" class="btn btn-default center-block">Login</button>
				</form>
			</div>

			<p class="login_txt">Admin? Log in <a href="login.php">here</a></p>
		</div>

		<?php
			include("includes/footer.php");
		?>
	</body>
</html>