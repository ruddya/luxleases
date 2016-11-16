<?php
	// Create connection
	$con = new mysqli("localhost", "root", "", "luxleases");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	//get featured products
	function getFeatPro(){

		global $con;

		$get_feat_pro = "SELECT * FROM products ORDER BY RAND() LIMIT 0,3";

		$run_feat_pro = mysqli_query($con, $get_feat_pro);

		while ($row_feat_pro = mysqli_fetch_array($run_feat_pro)) {
			
			$feat_pro_id = $row_feat_pro['product_id'];
			$feat_pro_cat = $row_feat_pro['product_cat'];
			$feat_pro_brand = $row_feat_pro['product_brand'];
			$feat_pro_name = $row_feat_pro['product_name'];
			$feat_pro_price = $row_feat_pro['product_price'];
			$feat_pro_image = $row_feat_pro['product_image'];

			echo "
				<div class='col-xs-6 col-md-4'>
					<div class='grid-in'>
						<h3 class='feat_name'> $feat_pro_name </h3>
						<a href='details.php?pro_id=$feat_pro_id'><img src='product_images/$feat_pro_image' class='center-block img-responsive' alt='$feat_pro_name'/></a>
						<p class='feat_price'> $$feat_pro_price / Day </p>
						<a href='home.php?add_cart=$feat_pro_id'><button type='button' class='btn btn-secondary center-block all_btns'>Add to Cart</button></a>
					</div>
				</div>
			";
		}
	}

	//getting categories
	function getCats(){

		global $con;

		$get_cats = "SELECT * FROM categories";

		$run_cats = mysqli_query($con, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			
			$cat_id = $row_cats['cat_id'];
			$cat_name = $row_cats['cat_name'];

			echo "<li><a href='vehicles.php?cat=$cat_id'> $cat_name </a></li>";
		}
	}

	//getting brands
	function getBrands(){

		global $con;

		$get_brands = "SELECT * FROM brands";

		$run_brands = mysqli_query($con, $get_brands);

		while ($row_brands = mysqli_fetch_array($run_brands)) {
			
			$brand_id = $row_brands['brand_id'];
			$brand_name = $row_brands['brand_name'];

			echo "<li><a href='vehicles.php?brand=$brand_id'> $brand_name </a></li>";
		}
	}

	//getting ip address
	function getIp() {

    	$ip = $_SERVER['REMOTE_ADDR'];

    	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        	$ip = $_SERVER['HTTP_CLIENT_IP'];
    	} 
    	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    	}

    	return $ip;
	}

	//getting the total items
	function total_items(){

		if (isset($_GET['add_cart'])) {
			
			global $con;

			$ip = getIp();

			$get_items = "SELECT * FROM cart WHERE ip_add = '$ip'";

			$run_items = mysqli_query($con, $get_items);

			$count_items = mysqli_num_rows($run_items);
		}
		else{

			global $con;

			$ip = getIp();

			$get_items = "SELECT * FROM cart WHERE ip_add = '$ip'";

			$run_items = mysqli_query($con, $get_items);

			$count_items = mysqli_num_rows($run_items);
		}

		echo $count_items;
	}

	//getting the total price

	function total_price(){

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

				$values = array_sum($product_price);

				$total += $values;
			}
		}

		echo "$" . $total;
	}

	//getting products
	function getPro(){

		if (!isset($_GET['cat'])) {
			
			if (!isset($_GET['brand'])) {

				global $con;

				$get_pro = "SELECT * FROM products ORDER BY RAND() LIMIT 0,15";

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
								<a href='vehicles.php?add_cart=$pro_id'><button type='button' class='btn btn-secondary center-block all_btns'>Add to Cart</button></a>
							</div>
						</div>
					";
				}
			}
		}
	}

	//category filter
	function getCatPro(){

		if (isset($_GET['cat'])) {
			
			$cat_id = $_GET['cat'];

			global $con;

			$get_cat_pro = "SELECT * FROM products WHERE product_cat = '$cat_id'";

			$run_cat_pro = mysqli_query($con, $get_cat_pro);

			$count_cats = mysqli_num_rows($run_cat_pro);

			if ($count_cats == 0) {
				echo "<h2 class='no_prod'>There are no products in this category!</h2>";
				exit();
			}

			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
				
				$pro_id = $row_cat_pro['product_id'];
				$pro_cat = $row_cat_pro['product_cat'];
				$pro_brand = $row_cat_pro['product_brand'];
				$pro_name = $row_cat_pro['product_name'];
				$pro_price = $row_cat_pro['product_price'];
				$pro_image = $row_cat_pro['product_image'];

				echo "
					<div class='col-xs-6 col-md-4'>
						<div class='home-in'>
							<h3 class='prod_name'>$pro_name</h3>
							<a href='details.php?pro_id=$pro_id'><img src='product_images/$pro_image' class='center-block' alt='$pro_name'/></a>
							<p class='prod_price'> $$pro_price / Day </p>
							<a href='vehicles.php?add_cart=$pro_id'><button type='button' class='btn btn-secondary center-block all_btns'>Add to Cart</button></a>
						</div>
					</div>
				";
				
			}	
		}
	}

	//brand filter
	function getBrandPro(){

		if (isset($_GET['brand'])) {
			
			$brand_id = $_GET['brand'];

			global $con;

			$get_brand_pro = "SELECT * FROM products WHERE product_brand = '$brand_id'";

			$run_brand_pro = mysqli_query($con, $get_brand_pro);

			$count_brand = mysqli_num_rows($run_brand_pro);

			if ($count_brand == 0) {
				echo "<h2 class='no_prod'>There are no products in this category!</h2>";
				exit();
			}

			while ($row_brand_pro = mysqli_fetch_array($run_brand_pro)) {
				
				$pro_id = $row_brand_pro['product_id'];
				$pro_cat = $row_brand_pro['product_cat'];
				$pro_brand = $row_brand_pro['product_brand'];
				$pro_name = $row_brand_pro['product_name'];
				$pro_price = $row_brand_pro['product_price'];
				$pro_image = $row_brand_pro['product_image'];

				echo "
					<div class='col-xs-6 col-md-4'>
						<div class='home-in'>
							<h3 class='prod_name'>$pro_name</h3>
							<a href='details.php?pro_id=$pro_id'><img src='product_images/$pro_image' class='center-block' alt='$pro_name'/></a>
							<p class='prod_price'> $$pro_price / Day </p>
							<a href='vehicles.php?add_cart=$pro_id'><button type='button' class='btn btn-secondary center-block all_btns'>Add to Cart</button></a>
						</div>
					</div>
				";
				
			}	
		}
	}

	//cart
	function cart(){
		if (isset($_GET['add_cart'])) {
			
			global $con;

			$ip = getIp();
			$pro_id = $_GET['add_cart'];

			$check_pro = "SELECT * FROM cart WHERE ip_add = '$ip' AND p_id = '$pro_id'";

			$run_check = mysqli_query($con, $check_pro);

			if (mysqli_num_rows($run_check) > 0) {

				echo "";
			}
			else{

				$insert_pro = "INSERT INTO cart (p_id, ip_add) VALUES ('$pro_id', '$ip')";
				$run_pro = mysqli_query($con, $insert_pro);

				echo "<script>window.open('cart.php', '_self')</script>";
			}
		}
	}
?>