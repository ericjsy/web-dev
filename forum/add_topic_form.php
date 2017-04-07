<?php
	require_once('auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>Create topic</title>

		<link rel="stylesheet" href="../style/base.css" media="screen">
		<link rel="stylesheet" href="css/forumNewTopic.css" media="screen">
</head>
<body>
<table id="parentTable" align="center">
<tr>
<form id="form1" name="form1" method="post" action="add_topic.php">
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
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" class="submit" name="Submit" value="Submit" /> <input type="reset" class="submit" name="Submit2" value="Reset" /></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</body>
</html>


