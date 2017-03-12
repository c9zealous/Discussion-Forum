<link href="style.css" rel="stylesheet" type="text/css" />
<div class="header">
<?php
error_reporting(0);
session_start();
include("connect.php");
if($_SESSION['user']=="")
{
	echo "Welcome Guest &nbsp;| &nbsp;<a href=login.php>Login</a> |  &nbsp;<a href=register.php>Register</a> <br /><br />";
}
else
{
	echo "Welcome <strong class=changecase>".$_SESSION['user']."</strong> &nbsp;| &nbsp;<a href=logout.php>Logout</a> &nbsp;| &nbsp;<a href=insert-topic.php>Insert Topic</a> <br /><br />";
	
}
	?><a href="index.php"><strong>Home</strong></a>
<br />
</div>


<?php

$mtopic = $_GET['mtopic']; //get main topic id
//select for main topic name
$sqlt = "select * from main_topic where mid='$mtopic'";
$resultt = mysql_query($sqlt) or die(mysql_error());
$rowt =  mysql_fetch_array($resultt);
echo "<h3>" . $rowt['topic_name'] . "</h3>";

$sql = "select * from sub_topic where smid='$mtopic'";
$result = mysql_query($sql) or die(mysql_error());
//print($row[0]);
echo "<table cellspacing=0 cellpadding=0 border=0 style='width:60%'>";
echo "<tr><th><strong>Topic</strong></th><th><strong>No of Replys</strong></th><th><strong>Views</strong></th><th><strong>Creator</strong></th></tr>";
while ($row = mysql_fetch_array($result))
	{
		$total = select("count(*)","sub_topic,reply","sub_topic.sid=reply.rsid and rsid='$row[0]'");
	$creater = select("uname","login,sub_topic","sub_topic.suid=login.uid and suid='$row[3]'");
		echo "<tr><td><a href=reply.php?stopic=" . $row['sid'] . "&gmtopic=" . $mtopic . ">" . $row['subTopic_name'] . "</a></td>";
		echo "<td align=center>" . $total[0] . "</td>";
		echo "<td align=center>" . $row['view_id'] . "</td>";
		echo "<td align=center>" . $creater['uname'] . "</td>";
	}
echo "</table>";
?><br />

<a class="back" href="index.php"><strong><< Back</strong></a>