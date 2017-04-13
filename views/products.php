<?php
	include 'functions.php';
	require_once('config.php');
	session_start();

	// Connect to server and select database.
	($GLOBALS["___mysqli_ston"] = mysqli_connect(DB_HOST,  DB_USER,  DB_PASSWORD))or die("cannot connect, error: ".((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . constant('DB_DATABASE')))or die("cannot select DB, error: ".((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	$tbl_name="topic"; // Table name // CHANGE ME
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Madeleine's</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
	<link rel="stylesheet" href="../style/products.css">
	<link rel="stylesheet" href="../style/printbase.css" media="print">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../javascript/products.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Italianno">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
	<!--
		$.noConflict();
	//-->
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../javascript/backtop.js"></script>
	<script src="../javascript/popup.js"></script>
	<link rel="stylesheet" href="../style/base.css" media="screen">
	<link rel="stylesheet" href="../style/popup.css" media="screen">
</head>

<body>
	<?php include 'header.php'; ?>
	<!--main content here-->
	<main id="main">
		<img id="printlogo" src="../images/whitelogo.png" alt="print logo" width="374" height="168">
		<a href="#" class="backup fa fa-chevron-circle-up fa-5x"><span class="emptyLink">Back to Top</span></a>
		<div id="filter">
			<ul>
				<li class="special">
					Filter by:
				</li>
				<li>
					<input type="checkbox" id="chkGlutenFree" onchange="hideGluten()">
					<img src="../images/icons/gluten.png" alt="Gluten Allergies" width="20" height="20">
					<label for="chkGlutenFree">Contains Gluten</label>
				</li>
				<li>
					<input type="checkbox" id="chkEggFree" onchange="hideEgg()">
					<img src="../images/icons/egg.png" alt="Egg Allergies" width="20" height="20">
					<label for="chkEggFree">Contains Eggs</label>
				</li>
				<li>
					<input type="checkbox" id="chkLactoseFree" onchange="hideMilk()">
					<img src="../images/icons/milk.png" alt="Lactose Allergies" width="20" height="20">
					<label for="chkLactoseFree">Contains Lactose</label>
				</li>
				<li>
					<input type="checkbox" id="chkPeanutFree" onchange="hidePeanut()">
					<img src="../images/icons/peanut.png" alt="Nut Allergies" width="20" height="20">
					<label for="chkPeanutFree">Contains Nuts</label>
				</li>
				<li>
					<input type="button" onclick="resetAll()" value="Show All" class="buttons">
				</li>
			</ul>
		</div>
		
		<h1>Click to view and add your favourite desserts!</h1>
		
	<div id="products">
			<!--Back to top links here-->
		<div id="wrap">
			<table class="tleft">
				<tr>
					<th id="brownies" class="sectionhead" colspan="3">
						Brownies
					</th>
				</tr>
				<tr>
					<td class="thumbnails">
						<figure>
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('bCB')">
								<img src="../images/products/brownies.jpg" width="150" height="112" alt="chocolate brownies" id="bCB">
							</button>
							<br>
							<div class="tooltip">
							<img src="../images/icons/allergyFree.png" alt="No Allergies" width="20" height="20">
								<span class="tooltiptext">Allergy-free</span>
							</div>
							<figcaption>Chocolate Brownie</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="gluten">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('bISB')">
								<img src="../images/products/brownies2.jpg" width="150" height="112" alt="iced sugar brownies" id="bISB">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/gluten.png" alt="Gluten Allergies" width="20" height="20">
								<span class="tooltiptext">Contains gluten</span>
							</div>
							<figcaption>Iced Sugar Brownie</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="milk">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('mBF')">
								<img src="../images/products/brownies3.jpg" width="150" height="112" alt="marshmallow fudges" id="mBF">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/milk.png" alt="Lactose Allergies" width="20" height="20">
								<span class="tooltiptext">Contains lactose</span>
							</div>
							<figcaption>Marshmallow Fudge</figcaption>
						</figure>
					</td>
				</tr>

				<tr>
					<th id="cakes" class="sectionhead" colspan="3">
					Cakes
					</th>
				</tr>
				<tr>
					<td class="thumbnails">
						<figure class="egg">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('cCC')">
								<img src="../images/chocolatecake.jpg" width="150" height="112" alt="chocolate cakes" id="cCC">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/egg.png" alt="Egg Allergies" width="20" height="20">
								<span class="tooltiptext">Contains eggs</span>
							</div>
							<figcaption>Chocolate Cake</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="milk">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('cCT')">
								<img src="../images/products/cakes2.jpg" width="150" height="112" alt="chocolate tarts" id="cCT">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/milk.png" alt="Lactose Allergies" width="20" height="20">
								<span class="tooltiptext">Contains lactose</span>
							</div>
							<figcaption>Chocolate Tart</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="milk">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('cRC')">
								<img src="../images/products/cakes3.jpg" width="150" height="112" alt="raspberry cakes" id="cRC">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/milk.png" alt="Lactose Allergies" width="20" height="20">
								<span class="tooltiptext">Contains lactose</span>
							</div>
							<figcaption>Raspberry Cake</figcaption>
						</figure>
					</td>
				</tr>

				<tr>
					<th id="cookies" class="sectionhead" colspan="3">
						Cookies
					</th>
				</tr>
				<tr>
					<td class="thumbnails">
						<figure class="gluten">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('coBC')">
								<img src="../images/products/cookies.jpg" width="150" height="112" alt="blueberry cookies" id="coBC">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/gluten.png" alt="Gluten Allergies" width="20" height="20">
								<span class="tooltiptext">Contains gluten</span>
							</div>
							<figcaption>Blueberry Cookie</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="nut">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('coAC')">
								<img src="../images/products/cookies2.jpg" width="150" height="112" alt="almond cookies" id="coAC">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/peanut.png" alt="Nut Allergies" width="20" height="20">
								<span class="tooltiptext">Contains nuts</span>
							</div>
							<figcaption>Almond Cookie</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="egg">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('coOC')">
								<img src="../images/products/cookies3.jpg" width="150" height="112" alt="oatmeal cookies" id="coOC">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/egg.png" alt="Egg Allergies" width="20" height="20">
								<span class="tooltiptext">Contains eggs</span>
							</div>
							<figcaption>Oatmeal Cookie</figcaption>
						</figure>
					</td>
				</tr>
			</table>
			<table class="tright">
				<tr>
					<th id="cupcakes" class="sectionhead" colspan="3">
						Cupcakes
					</th>
				</tr>
				<tr>
					<td class="thumbnails">
						<figure class="egg">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('cuLC')">
								<img src="../images/products/cupcakes.jpg" width="150" height="112" alt="lime cupcakes" id="cuLC">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/egg.png" alt="Egg Allergies" width="20" height="20">
								<span class="tooltiptext">Contains eggs</span>
							</div>
							<figcaption>Lime Cupcake</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="gluten">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('cuCC')">
								<img src="../images/products/cupcakes2.jpg" width="150" height="112" alt="chocolate cupcakes" id="cuCC">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/gluten.png" alt="Gluten Allergies" width="20" height="20">
								<span class="tooltiptext">Contains gluten</span>
							</div>
							<figcaption>Chocolate Cupcake</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="egg">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('cuVC')">
								<img src="../images/products/cupcakes3.jpg" width="150" height="112" alt="vanilla cupcakes" id="cuVC">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/egg.png" alt="Egg Allergies" width="20" height="20">
								<span class="tooltiptext">Contains eggs</span>
							</div>
							<figcaption>Vanilla Cupcake</figcaption> 
						</figure>
					</td>
				</tr>

				<tr>
					<th id="donuts" class="sectionhead" colspan="3">
						Donuts
					</th>
				</tr>
				<tr>
					<td class="thumbnails">
						<figure class="milk">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('dPD')">
								<img src="../images/products/donut.jpg" width="150" height="112" alt="powdered donuts" id="dPD">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/milk.png" alt="Lactose Allergies" width="20" height="20">
								<span class="tooltiptext">Contains lactose</span>
							</div>
							<figcaption>Powdered Donut</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="egg">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('dSD')">
								<img src="../images/products/donut2.jpg" width="150" height="112" alt="sugar donuts" id="dSD">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/egg.png" alt="Egg Allergies" width="20" height="20">
								<span class="tooltiptext">Contains eggs</span>
							</div>
							<figcaption>Sugar Donut</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="gluten">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('dHD')">
								<img src="../images/products/donut3.jpg" width="150" height="112" alt="homemade donuts" id="dHD">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/gluten.png" alt="Gluten Allergies" width="20" height="20">
								<span class="tooltiptext">Contains gluten</span>
							</div>
							<figcaption>Homemade Donut</figcaption>
						</figure>
					</td>
				</tr>

				<tr>
					<th id="macarons" class="sectionhead" colspan="3">
						Macarons
					</th>
				</tr>
				<tr>
					<td class="thumbnails">
						<figure class="nut">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('mRM')">
								<img src="../images/products/macaron.jpg" width="150" height="112" alt="raspberry macarons" id="mRM">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/peanut.png" alt="Nut Allergies" width="20" height="20">
								<span class="tooltiptext">Contains nuts</span>
							</div>
							<figcaption>Raspberry Macaron</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="nut">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('mPM')">
								<img src="../images/products/macaron2.jpg" width="150" height="112" alt="peach macarons" id="mPM">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/peanut.png" alt="Nut Allergies" width="20" height="20">
								<span class="tooltiptext">Contains nuts</span>
							</div>
							<figcaption>Peach Macaron</figcaption>
						</figure>
					</td>
					<td class="thumbnails">
						<figure class="egg">
							<button type="button" data-toggle="modal" data-target="#myModal"  onclick="uModal('mOM')">
								<img src="../images/products/macaron3.jpg" width="150" height="112" alt="oreo macarons" id="mOM">
							</button>
							<br>
							<div class="tooltip">
								<img src="../images/icons/egg.png" alt="Egg Allergies" width="20" height="20">
								<span class="tooltiptext">Contains eggs</span>
							</div>
							<figcaption>Oreo Macaron</figcaption>
						</figure>
					</td>
				</tr>
			</table>
		</div>
	</div>		
		
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="mcontent">
						<div class="lcol">
							<img src="../images/products/cupcakes3.jpg" alt="Cupcake" width="150" height="112" id="replimg">
							<p id="replprod">Product Name</p>
							<hr>
							<p>
								Allergens: <br> <br> 
								<img src="../images/icons/egg.png" alt="Contains eggs" height="50" width="50">
							</p>
						</div>
						<div class="rcol">
							<hr>
							<p id="detail">An elegant, fluffy strawberry cupcake with deliciously sweet blueberry icing powdered with cinnamon and sprinkled with fun! 
							Scrumptious for everyone and a beautiful treat for your parents, grandparents, siblings and friends!</p>
							<hr>
							<p>
								Sweetness factor:  
								<img src="../images/sweet.png" alt="+1 rating" width="25" height="25">
								<img src="../images/sweet.png" alt="+1 rating" width="25" height="25">
								<img src="../images/sweet.png" alt="+1 rating" width="25" height="25">
							</p>	
							<br>
							<table class="facts">
								<caption>Nutritional Facts per Cupcake:</caption>
								<tr>
									<td>Calories:</td>
									<td>300</td>
								</tr>
								<tr>
									<td>Total Fat:</td>
									<td>5%</td>
								</tr>
								<tr>
									<td>Calcium:</td>
									<td>25%</td>
								</tr>
								<tr>
									<td>Carbohydrates:</td>
									<td>14%</td>
								</tr>
							</table>
							<div class="add"> <!-- javascript:void(0); -->
								<form id="amount" action="cart.php" method="post" onsubmit="return validPopUp('txtQuantity')">
									<br> <label for="txtQuantity">How many would you like? (1 - 100) </label> <br>
									<input type="text" name="txtQuantity" id="txtQuantity" onblur="warnInvalidQuantity('txtQuantity')">
								<div id="tocart">
								<input id="submit" type="submit" value="Add to Cart"><span class="emptyLink">Add To Cart</span>
								</div>
								<p id="errQuantity" class="errorMessage"></p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include 'footer.php'; ?>
</body>

</html>