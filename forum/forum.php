<?php
	require_once('config.php');

	// Connect to server and select database.
	($GLOBALS["___mysqli_ston"] = mysqli_connect(DB_HOST,  DB_USER,  DB_PASSWORD))or die("cannot connect");
	((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . constant('DB_DATABASE')))or die("cannot select DB");
	$tbl_name="topic"; // Table name

<<<<<<< HEAD
	// Question 1c) Modify our SQL statement to get poster name
	
=======
>>>>>>> efdbc93bdc19031fd1a3101fe5deb9eff61c223e
	$sql="SELECT * FROM $tbl_name JOIN members ON members.member_id = topic.member_id";
	// ORDER BY id DESC is order result by descending
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
?>

<<<<<<< HEAD
<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="7%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>

<!-- Question 1c) Add header cell Name -->

<td width="6%" align="center" bgcolor="#E6E6E6"><strong>Name</strong></td>
</tr>

<?php
while($rows=mysqli_fetch_array($result)){ // Start looping table row
?>

<tr>
<td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>

<!-- Question 1c) Add user name here -->
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['firstname']; ?></td>
</tr>

<?php
// Exit looping and close connection
}
((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="add_topic_form.php"><strong>Create New Topic</strong> </a></td>
</tr>
</table>
=======
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Madeleine's</title>
	<link rel="stylesheet" href="style/printbase.css" media="print">
	<link rel="stylesheet" href="style/base.css" media="screen">
	<link rel="stylesheet" href="style/forum.css" media="screen">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Italianno">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
	<!--
		$.noConflict();
	//-->
	</script>
	<script src="../javascript/backtop.js"></script>
</head>

<body>
	<!--header-->
	<header>
		<nav>
			<div id="logo">
				<a href="index.html"><img src="../images/logo.png" alt="Madeleine's"></a>
				<a href="index.html"><img src="../images/cake.png" alt="cake"></a>
			</div>
			<div id="navbar">
				<ul>
					<li>
						<a href="aboutus.html">About Us</a>
					</li>
					<li>
						<a href="products.html">Products</a>
					</li>
					<li>
						<a href="catering.html">Catering</a>
					</li>
					<li>
						<a href="testimonials.html">Reviews</a>
					</li>
					<li>
						<a href="contact.html">Contact Us</a>
					</li>
				</ul>
			</div>
			<div id="navshop">
				<a href="cart.html" class="fa fa-shopping-cart fa-2x"></a>
				<a href="signin.html" class="fa fa-user-circle fa-2x"></a>
			</div>
		</nav>
		<!--Keep the "clear" div so all the floated divs stay in the header-->
		<div class="clear"></div>
	</header>
	
	<!--main content here-->
	<main id="main">
		<a href="#" class="backup fa fa-chevron-circle-up fa-5x"></a>
		<img id="printlogo" src="../images/whitelogo.png" alt="print logo" width="374" height="168">

	<button id="addtopic">
		<a href="add_topic_form.php">>>>New Topic<<<</a>
	</button>
			
	<table>
	<tr>
	<th>Name</th>
	<th>Topic</th>
	<th>Date/Time</th>
	</tr>

	<?php
	while($rows=mysqli_fetch_array($result)){ // Start looping table row
	?>

	<tr>
	<td><?php echo $rows['firstname']; ?></td>
	<td><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
	<td><?php echo $rows['datetime']; ?></td>
	</tr>

	<?php
	// Exit looping and close connection
	}
	((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
	?>

	</table>
</main>
	
	<!--footer-->
	<footer>
		<div class="footbox0">
			<div id="info">
				<div id="hours">
					Weekdays 8 - 4 | Weekends 10 - 3  <br>
					<a href="tel:6048888888">(604) 888 - 8888</a>
				</div>
				<div id="slogan">
					- A little bliss in every bite -
				</div>
				<div id="address">
					1234 Bakery Lane Vancouver <br>
					B.C. Canada V8W 5K9
				</div>
			</div>
		</div>
		<div class="footbox1">
			<div id="anchor">
				<div id="links"> 
					<a href="aboutus.html" id="aboutus">About Us</a> |
					<a href="products.html">Products</a> |
					<a href="catering.html">Catering</a> |
					<a href="testimonials.html">Reviews</a> |
					<a href="contact.html">Contact Us</a>
				</div>
				<div id="logo2">
					<a href="index.html"><img id="translogo" src="../images/translogo.png" alt="logo"></a>
				</div>
				<div id="sm">
					<a href="https://www.facebook.com" class="fa fa-facebook fa-2x" id="fb"></a>
					<a href="https://www.twitter.com" class="fa fa-twitter fa-2x"></a>
					<a href="https://www.instagram.com" class="fa fa-pinterest fa-2x"></a>
					<a href="https://www.pinterest.com" class="fa fa-instagram fa-2x"></a>
				</div>
			</div>
		</div>
		<div class="footbox2">
			<div id="copyr">
				Copyright &copy; Madeleine's, All Rights Reserved
			</div>
		</div>
	</footer>
</body>

</html>
>>>>>>> efdbc93bdc19031fd1a3101fe5deb9eff61c223e
