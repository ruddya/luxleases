<?php
	session_start();
	include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lux Leases - About</title>
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

			<h1 class="head-txt">About Us</h1>

			<div class="about">
				<p class="about-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

				<h1 class="head-txt">Our Team</h1>

				<div class="container-fluid">
					<div class="row center">
						<div class="col-xs-6 col-md-3">
							<div class="about-in">
								<div class="about-pic">
								</div>

								<p class="pro-name">Shianne Dyges</p>

								<p class="team-txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
							</div>
						</div>

						<div class="col-xs-6 col-md-3">
							<div class="about-in">
								<div class="about-pic">
								</div>

								<p class="pro-name">Richard Padilla</p>

								<p class="team-txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
							</div>
						</div>

						<div class="col-xs-6 col-md-3">
							<div class="about-in">
								<div class="about-pic">
								</div>

								<p class="pro-name">Amanda Ruddy</p>

								<p class="team-txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
							</div>
						</div>

						<div class="col-xs-6 col-md-3">
							<div class="about-in">
								<div class="about-pic">
								</div>

								<p class="pro-name">Eric Reed</p>

								<p class="team-txt">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
			include("includes/footer.php");
		?>
	</body>
</html>