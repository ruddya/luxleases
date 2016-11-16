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

		<?php cart(); ?>

		<?php getIp(); ?>

		<div class="container">
			
			<?php include("includes/info_block.php"); ?>

			<div class="side_nav">
				<div class="side_nav_in">
					<h3 class="side_head">Car Type</h3>
					<ul>
						<?php getCats(); ?>
					</ul>

					<h3 class="side_head">Car Brands</h3>
					<ul>
						<?php getBrands(); ?>
					</ul>
				</div>
			</div>

			<div class="prod_cont">

				<?php

					if (isset($_GET['pro_id'])) {

						$product_id = $_GET['pro_id'];

						$get_pro = "SELECT * FROM products WHERE product_id = '$product_id'";

						$run_pro = mysqli_query($con, $get_pro);

						while ($row_pro = mysqli_fetch_array($run_pro)) {
							
							$pro_id = $row_pro['product_id'];
							$pro_name = $row_pro['product_name'];
							$pro_price = $row_pro['product_price'];
							$pro_image = $row_pro['product_image'];
							$pro_desc = $row_pro['product_desc'];

							echo "
								<div class='details_wrapper'>
									<h3 class='detail_title'>$pro_name</h3>
									<img src='product_images/$pro_image' class='center-block' alt='$pro_name'/>
									<p class='detail_price'> $$pro_price / Day </p>
									<p class='detail_price'> $pro_desc </p>
									<a href='details.php?add_cart=$pro_id'><button type='button' class='btn btn-secondary center-block'>Add to Cart</button></a>
								</div>
								<div class='review_wrapper'>
									<p class='rate_txt'>Rating: </p>
									<input type='hidden' name='rating' id='rating' />
									<ul onMouseOut='resetRating();'>
									  <li class='star' onmouseover='highlightStar(this);' onmouseout='removeHighlight();' onClick='addRating(this);'>&#9733;</li>
									  <li onmouseover='highlightStar(this);' onmouseout='removeHighlight();' onClick='addRating(this);'>&#9733;</li>
									  <li onmouseover='highlightStar(this);' onmouseout='removeHighlight();' onClick='addRating(this);'>&#9733;</li>
									  <li onmouseover='highlightStar(this);' onmouseout='removeHighlight();' onClick='addRating(this);'>&#9733;</li>
									  <li onmouseover='highlightStar(this);' onmouseout='removeHighlight();' onClick='addRating(this);'>&#9733;</li>
									</ul>

									<div class='form-group'>
									  <label for='comment'>Comment:</label>
									  <textarea class='form-control' rows='5' id='comment'></textarea>
									</div>
								</div>
							";
						}
					}
				?>
			</div>
		</div>

		<?php
			include("includes/footer.php");
		?>
	</body>
</html>