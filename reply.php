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
$stopic = $_GET['stopic']; //subtopic id
$bmtopic = $_GET['gmtopic']; //maintopic id for back button
//select questions from questions table 
$sqlt = "select * from sub_topic,reply where sid='$stopic'";
$resultt = mysql_query($sqlt) or die(mysql_error());
$rowt =  mysql_fetch_array($resultt);
// View counter - fetching value from sub_topic table and increment
//echo $rowt[4];
$counter = $rowt[4];
$counter++;
//echo $counter;
$sqlu = "update sub_topic set view_id='$counter' where sid='$stopic'";
mysql_query($sqlu) or die(mysql_error());
echo "<h3>" . $rowt['subTopic_name'] . "</h3>";
echo "<div class=content>";
if($_SESSION['user']!="")
{
	echo "<p><a class=back href=add-reply.php?addr=". $stopic ."&gmtopic=".$bmtopic."><strong>Add Reply</strong></a></p>";
}
$sql = "select * from reply where rsid='$stopic'";
$result = mysql_query($sql) or die(mysql_error());
//print($row[0]);
echo "<table cellspacing=0 cellpadding=0 border=0 style='width:80%'>";
echo "<tr><th><strong>Reply</strong></th><th><strong>Creator</strong></th><th><strong>Delete</strong></th></tr>";
while ($row = mysql_fetch_array($result))
	{
	$creater = select("uname","login,reply","reply.ruid=login.uid and ruid='$row[3]'");
		echo "<tr><td>" . $row['reply'] . "</td>";
		echo "<td>" . $creater['uname'] . "</td>";
		//condition to check - only creator can delete - sending sub topic id with it to redirect on same page 
		if ($_SESSION['user'] == $creater['uname'])
		{
			echo "<td align=center><a href=delete-reply.php?deleter=" . $row['rid'] . "&dstopic=" . $stopic . ">Delete</a></td>";
		}
		else
		{
			echo "<td align=center style='color:#999'>Delete</td>";
		}
	}
echo "</table>";
echo "<a class='back' href=sub-topics.php?mtopic=" . $bmtopic . "><strong><< Back</strong></a>";
echo "</div>";
?>