<?php
	session_start();
	include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lux Leases</title>
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

		<div class="container">
			<h1 class="head-txt">Get in Touch</h1>

			<p class="contact-txt">1-800-000-0000</p>
			<p class="contact-txt">info@luxleases.com</p>
			<p class="contact-txt">4000 Central Florida Blvd, Orlando, FL 32816</p>

			<div class="contact-form">
				<form>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" id="phone">
					</div>
					<div class="form-group">
						<label for="message">Message</label>
						<textarea class="form-control" rows="4" id="message"></textarea>
					</div>
					
					<button type="submit" class="btn btn-default center-block">Send</button>
				</form>
			</div>
		</div>

		<?php
			include("includes/footer.php");
		?>
	</body>
</html>