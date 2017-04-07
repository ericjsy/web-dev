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

	$sql="SELECT * FROM $tbl_name JOIN members ON members.member_id = topic.member_id WHERE id='$id'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

	$rows=mysqli_fetch_array($result);
	
	// Question 1b: Display response portion only when user is logged in
	
	if (!isLoggedIn()){
		header("location: ../views/signin.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>View topic</title>

		<link rel="stylesheet" href="../style/base.css" media="screen">
		<link rel="stylesheet" href="css/forumViewTopic.css" media="screen">
</head>

<table id="outerTopic" border="0" align="center">
<tr>
<td><table id="innerTopic" border="0">
<tr>
<td><strong><?php echo $rows['topic']; ?></strong></td>
</tr>

<tr>
<td><?php echo $rows['detail']; ?></td>
</tr>

<tr>
<td><strong>By : </strong><?php echo $rows['firstname']; ?></td>
</tr>

<!-- Add name after By : -->

<tr>
<td><strong>Date/time : </strong><?php echo $rows['datetime']; ?></td>
</tr>
</table></td>
</tr>
</table>
<BR>
<?php
$tbl_name2="response"; // Switch to table "response"

// Question 1d) Fixed bug
$sql2="SELECT * FROM $tbl_name2 JOIN members ON members.member_id = response.member_id WHERE topic_id='$id'";
$result2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);

while($rows=mysqli_fetch_array($result2)){
?>
<table id="outerResponse" border="0" align="center">
<tr>
<td><table id="innerResponse" border="0" cellpadding="3" cellspacing="1">
<tr>
<td><strong>ID</strong></td>
<td>:</td>
<td><?php echo $rows['id']; ?></td>
</tr>
<tr>
<td width="18%"><strong>Name</strong></td>
<td width="5%">:</td>
<td width="77%"><?php echo $rows['firstname']; ?></td>
</tr>
<tr>
<td><strong>Response</strong></td>
<td>:</td>
<td><?php echo $rows['response']; ?></td>
</tr>
<tr>
<td><strong>Date/Time</strong></td>
<td>:</td>
<td><?php echo $rows['datetime']; ?></td>
</tr>
</table></td>
</tr>
</table><br>

<?php
}
((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>

<BR>
<table id="outerInput" border="0" align="center">
<tr>
<form name="form1" method="post" action="add_response.php">
<td>
<table id="innerInput" border="0">
<tr>
<td valign="top"><strong>Response</strong></td>
<td valign="top">:</td>
<td><textarea name="response" cols="45" rows="7" id="answer"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
<td><input type="submit" class="submit" name="Submit" value="Submit"> <input type="reset" class="submit" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
