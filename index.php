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

<h3>Topics</h3>
<?php
//select topics from questions table
$sql = "select * from main_topic";
$result = mysql_query($sql) or die(mysql_error());
//print($row[0]);
echo "<table cellspacing=0 cellpadding=0 border=0 style='width:60%'>";
echo "<tr><th><strong>Topic</strong></th><th><strong>No of Sub Topics</strong></th><th><strong>Creator</strong></th></tr>";
while ($row = mysql_fetch_array($result))
	{
		//count of sub topics
		$total = select("count(*)","sub_topic,main_topic","main_topic.mid=sub_topic.smid and smid='$row[0]'");
		//creator
		$creater = select("uname","login,main_topic","main_topic.muid=login.uid and muid='$row[2]'");
		echo "<tr><td><a href=sub-topics.php?mtopic=" . $row['mid'] . ">" . $row['topic_name'] . "</a></td>";
		echo "<td align=center>" . $total[0] . "</td>";
		echo "<td align=center>" . $creater['uname'] . "</td>";
	}
echo "</table>";
?>