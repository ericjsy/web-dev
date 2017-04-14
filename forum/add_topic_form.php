<?php

	include 'functions.php';
	require_once('config.php');
	require_once('auth.php');
	session_start();

	// Connect to server and select database.
	($GLOBALS["___mysqli_ston"] = mysqli_connect(DB_HOST,  DB_USER,  DB_PASSWORD))or die("cannot connect");
	((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . constant('DB_DATABASE')))or die("cannot select DB");
	$tbl_name="topic"; // Table name

	// get value of id that sent from address bar
	$id=$_GET['id'];

	$sql="SELECT * FROM $tbl_name JOIN members ON members.member_id = topic.member_id WHERE id='$id'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

	$rows=mysqli_fetch_array($result);
	
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

		<link rel="stylesheet" href="../style/base.css" media="screen">
		<link rel="stylesheet" href="../style/printbase.css" media="print">
		<link rel="stylesheet" href="css/forumNewTopic.css" media="screen">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Italianno">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
		<!--
			$.noConflict();
		//-->
		</script>
		<script src="../javascript/backtop.js"></script>
		<script src="js/addtopicresponse.js"></script>
</head>

<body>
	<?php include '../views/headerForum.php'; ?>
	<main id="main">
		<a href="#" class="backup fa fa-chevron-circle-up fa-5x"></a>
		<img id="printlogo" src="../images/whitelogo.png" alt="print logo" width="374" height="168">
	
		<table id="parentTable" align="center">
			<tr>
				<form id="form1" name="form1" method="post" action="add_topic.php" onsubmit="return validtopic()">
					<td>
						<table id="childTable" border="0">
							<tr>
								<th colspan="3"><strong>Create New Topic</strong> </td>
							</tr>
							<tr>
								<td width="14%"><strong>Topic</strong></td>
								<td width="2%">:</td>
								<td width="84%"><input name="topic" type="text" id="topic" /></td>
							</tr>
							<tr>
								<td valign="top"><strong>Detail</strong></td>
								<td valign="top">:</td>
								<td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td id="errLogin"></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input type="submit" class="submit" name="Submit" value="Submit" /> <input type="reset" class="submit" name="Submit2" value="Reset" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><a href="forum.php" class="return">Cancel</a></td>
							</tr>
						</table>
					</td>
				</form>
			</tr>
		</table>
		<br>
	</main>
	<?php include '../views/footerForum.php'; ?>
</body>

</html>


