<header>
	<nav>
		<div id="logo">
			<a href="index.php"><img src="../images/logo.png" alt="Madeleine's"></a>
			<a href="index.php"><img src="../images/cake.png" alt="cake"></a>
		</div>
		<div id="navbar">
			<ul>
				<li>
					<a href="aboutus.php">About Us</a>
				</li>
				<li>
					<a href="products.php">Products</a>
				</li>
				<li>
					<a href="catering.php">Catering</a>
				</li>
				<li>
					<a href="testimonials.php">Reviews</a>
				</li>
				<li>
					<a href="contact.php">Contact Us</a>
				</li>
			</ul>
		</div>
		<div id="welcome">
			<?php
				if (isLoggedIn()){
					echo "<a href='logout.php'>".$_SESSION['SESS_FIRST_NAME'].'  '.$_SESSION['SESS_LAST_NAME']."</a>";
				}
			?>
			
		</div>
		<div id="navshop">
			<a href="cart.php" class="fa fa-shopping-cart fa-2x"></a>
			<a href="signin.php" class="fa fa-user-circle fa-2x"></a>
		</div>
	</nav>
	<!--Keep the "clear" div so all the floated divs stay in the header-->
	

	<div class="clear"></div>
</header>