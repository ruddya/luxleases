<?php
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
					if (isset($_GET['search'])) {

						$search_query = $_GET['user_query'];

						$get_pro = "SELECT * FROM products WHERE product_keywords LIKE '%$search_query%'";

						$run_pro = mysqli_query($con, $get_pro);

						while ($row_pro = mysqli_fetch_array($run_pro)) {
							
							$pro_id = $row_pro['product_id'];
							$pro_cat = $row_pro['product_cat'];
							$pro_brand = $row_pro['product_brand'];
							$pro_name = $row_pro['product_name'];
							$pro_price = $row_pro['product_price'];
							$pro_image = $row_pro['product_image'];

							echo "
								<div class='col-xs-6 col-md-4'>
									<div class='home-in'>
										<h3 class='prod_name'>$pro_name</h3>
										<a href='details.php?pro_id=$pro_id'><img src='product_images/$pro_image' class='center-block' alt='$pro_name'/></a>
										<p class='prod_price'> $$pro_price / Day </p>
										<a href='results.php?add_cart=$pro_id'><button type='button' class='btn btn-secondary center-block'>Add to Cart</button></a>
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