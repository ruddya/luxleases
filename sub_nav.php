<div class="sub-nav">
	<div class="sub-nav-in">
		<form class="input-group size" method="GET" action="results.php" enctype="multipart/form-data">
			<input type="text" name="user_query" class="form-control" placeholder="Search"/>
			<span class="input-group-btn">
		        <button class="btn btn-default" type="submit" name="search"><i class="fa fa-search"></i></button>
		      </span>
		</form>

		<div class="sub-nav-links">
			<?php
				if (!isset($_SESSION['logged_in'])) {
					
					echo "<a href='checkout.php' class='sub-nav-a'>Login</a>";
					echo "<a href='register.php' class='sub-nav-a'>Register</a>";
				}
				else{

					echo "<a href='logout.php' class='sub-nav-a'>Logout</a>";
				}
			?>
			
			<a href="#" class="sub-nav-a">Profile</a>
			<a href="cart.php" class="sub-nav-a"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i> <?php total_price(); ?></a>
		</div>
	</div>
</div>