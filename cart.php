<?php
	session_start();
	include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lux Leases - Cart</title>
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
			
			<?php include("includes/info_block.php"); ?>

			 <?php cart(); ?>

			 <?php getIp(); ?>

			 <h2 class="head-txt">Shopping Cart</h2>

			 <a class="cont_shopping" href="vehicles.php"><i class="fa fa-angle-left" aria-hidden="true"></i> Continue Shopping</a>

			<form action="" method="POST" enctype="multipart/form-data">
				<table class="table cart_table">
					<thead>
						<tr>
							<th>Remove</th>
							<th>Product(s)</th>
							<th>Total Price</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$total = 0;

							global $con;

							$ip = getIp();

							$sel_price = "SELECT * FROM cart WHERE ip_add = '$ip'";

							$run_price = mysqli_query($con, $sel_price);

							while ($p_price = mysqli_fetch_array($run_price)) {
								
								$pro_id = $p_price['p_id'];

								$pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";

								$run_pro_price = mysqli_query($con, $pro_price);

								while ($pp_price = mysqli_fetch_array($run_pro_price)) {
									
									$product_price = array($pp_price['product_price']);

									$product_name = $pp_price['product_name'];
									$product_image = $pp_price['product_image'];

									$single_price = $pp_price['product_price'];
									
									$values = array_sum($product_price);

									$total += $values;

									?>

									<tr>
										<td class="col-md-2">
											<input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/>
										</td>

										<td class="col-md-4">
											<img src="product_images/<?php echo $product_image; ?>" width="60" height="60">
											<?php echo $product_name; ?>
										</td>

										<td class="col-md-2">
											<?php echo "$" . $single_price; ?>
										</td>
									</tr>

									<?php 
								}
							} 
						?>
						<tr>
							<td><b>Sub Total:</b></td>
							<td><?php echo "$" . $total; ?></td>
						</tr>
						<tr >
							<td>
								<input class="btn btn-secondary" type="submit" name="update_cart" value="Update Cart">
							</td>
							<td>
								<a href="checkout.php"><button type="button" class="btn btn-secondary">Checkout</button></a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>

			<?php
				//remove items from cart
				$ip = getIp();

				if (isset($_POST['update_cart'])) {
					
					foreach ($_POST['remove'] as $remove_id) {
						
						$delete_product = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip'";
						$run_delete = mysqli_query($con, $delete_product);

						if ($run_delete) {
							
							echo "<script>window.open('cart.php', '_self')</script>";
						}
					}
				}

				if (isset($_POST['continue'])) {
					
					echo "<script>window.open('vehicles.php', '_self')</script>";
				}
			?>
		</div>

		<?php
			include("includes/footer.php");
		?>
	</body>
</html>