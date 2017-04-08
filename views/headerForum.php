<header>
	<script src="../javascript/dropdown.js"></script>
	<nav>
		<div id="logo">
			<a href="../views/index.php"><img src="../images/logo.png" alt="Madeleine's"></a>
			<a href="../views/index.php"><img src="../images/cake.png" alt="cake"></a>
		</div>
		<div id="navbar">
			<ul>
				<li>
					<a href="../views/aboutus.php">About Us</a>
				</li>
				<li>
					<a href="../views/products.php">Products</a>
				</li>
				<li>
					<a href="../views/catering.php">Catering</a>
				</li>
				<li>
					<a href="../views/testimonials.php">Reviews</a>
				</li>
				<li>
					<a href="../views/contact.php">Contact Us</a>
				</li>
			</ul>
		</div>
		<div id="welcome">
			<?php
				if (isLoggedIn()){
					echo "<a href='../views/logout.php'>".$_SESSION['SESS_FIRST_NAME'].'  '.$_SESSION['SESS_LAST_NAME']."</a>";
				}
			?>
			
		</div>
		<div id="navshop">
			<a href="../views/cart.php" class="fa fa-shopping-cart fa-2x"></a>
			<div class="dropdown">
				<a class="fa fa-user-circle fa-2x dropbtn" onclick="drop()"></a>
				<div id="thisDropdown" class="dropdown-content">
					<a href="../views/useraccount.php">Account</a>
					<a href="forum.php">Forum</a>
					<a href="#">Log out</a>
				</div>
			</div>
		</div>
	</nav>
	<!--Keep the "clear" div so all the floated divs stay in the header-->
	

	<div class="clear"></div>
</header>