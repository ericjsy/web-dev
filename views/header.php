<header>
	<script src="../javascript/dropdown.js"></script>
	<nav>
		<div id="logo">
			<a href="index.php"><img src="../images/logo.png" alt="Madeleine's">
			<img src="../images/cake.png" alt="cake"></a>
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
					echo $_SESSION['SESS_FIRST_NAME'].'  '.$_SESSION['SESS_LAST_NAME'];
				}
			?>
			
		</div>
		<div id="navshop">
			<a href='cart.php' class='fa fa-shopping-cart fa-2x'><span class="emptyLink">Shopping Cart</span></a>
			<?php
				if (isLoggedIn()){
					echo "
					<div class='dropdown'>
						<a class='fa fa-user-circle fa-2x dropbtn' onclick='drop()'><span class='emptyLink'>Drop Down Menu</span></a>
						<div id='thisDropdown' class='dropdown-content'>
							<a href='useraccount.php'>Account</a>
							<a href='../forum/forum.php'>Forum</a>
							<a href='logout.php'>Log out</a>
						</div>
					</div>
					";
				} else {
					echo "<a href='signin.php' class='fa fa-user-circle fa-2x'><span class='emptyLink'>Sign In</span></a>";
				}
			?>
			
		</div>
	</nav>
	<!--Keep the "clear" div so all the floated divs stay in the header-->
	

	<div class="clear"></div>
</header>