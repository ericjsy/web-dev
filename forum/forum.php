<?php
	include 'functions.php';
	require_once('config.php');
	session_start();

	// Connect to server and select database.
	($GLOBALS["___mysqli_ston"] = mysqli_connect(DB_HOST,  DB_USER,  DB_PASSWORD))or die("cannot connect");
	((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . constant('DB_DATABASE')))or die("cannot select DB");
	$tbl_name="topic"; // Table name

	// get value of id that sent from address bar
	$id=$_GET['id'];

	//id is ordered descending
	$sql="SELECT * FROM $tbl_name JOIN members ON members.member_id = topic.member_id ORDER BY id DESC";

	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

	if (!isLoggedIn()){
		header("location: ../views/signin.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Madeleine's</title>
	<link rel="stylesheet" href="style/printbase.css" media="print">
	<link rel="stylesheet" href="../style/base.css" media="screen">
	<link rel="stylesheet" href="css/forum.css" media="screen">
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
	<?php include '../views/headerForum.php'; ?>
	<main id="main">
		<a href="#" class="backup fa fa-chevron-circle-up fa-5x"></a>
		<img id="printlogo" src="../images/whitelogo.png" alt="print logo" width="374" height="168">

		<a href="add_topic_form.php"><button id="addtopic">New Topic</button></a>
			
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
	<?php include '../views/footerForum.php'; ?>
</body>

</html>