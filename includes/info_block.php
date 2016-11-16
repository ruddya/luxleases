<div class="info_block">
	<div class="info_txt">
		<?php
			if (isset($_SESSION['customer_email'])) {
				
				echo "Welcome <b>" . $_SESSION['customer_email'] . "</b>!";
			}
			else{

				echo "Welcome Guest!";
			}
		?>
	</div>
</div>