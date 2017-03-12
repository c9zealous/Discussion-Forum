<link href="style.css" rel="stylesheet" type="text/css" />
<div class="header">
<?php
error_reporting(0);
session_start();
include("connect.php");
$userId = $_SESSION['uid'];
//echo $userId;
if($_SESSION['user']=="")
{
	//echo "Welcome Guest &nbsp;| &nbsp;<a href=login.php>Login</a> |  &nbsp;<a href=register.php>Register</a> <br /><br />";
	header("location:logout.php");
}
else
{
	echo "Welcome <strong class=changecase>".$_SESSION['user']."</strong> &nbsp;| &nbsp;<a href=logout.php>Logout</a> &nbsp;| &nbsp;<a href=insert-topic.php>Insert Topic</a> <br /><br />";
	
}
	?><a href="index.php"><strong>Home</strong></a>
<br />
</div>

<h3>Insert Topics</h3>

<?php
$in_topic = $_REQUEST['insert'];
//echo $itopic;
if ($in_topic == "itopic")
	{//main topic
	$topic = $_POST['topic'];
	$muid = $_POST['muid'];
	$sql = "select count(topic_name) from main_topic where topic_name='$topic'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	//print_r($row);
	if ($row[0] == "1")
		{
		echo "<div class=content>Topic already exists.</div>";	
		}
		else
		{
		$sqli = insert("main_topic","topic_name,muid","'$topic','$muid'");
		header("location:insert-topic.php");
		}
	}
else
	{//sub topic
	$smid = $_POST['smid'];
	$stopic = $_POST['stopic'];
	$suid = $_POST['suid'];
	$sql = "select count(subTopic_name) from sub_topic where smid='$smid' and subTopic_name='$stopic'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	//print_r($row);
	if ($row[0] == "1")
		{
		echo "<div class=content>Sub Topic already exists.</div>";	
		}
		else
		{
		$sqli = insert("sub_topic","subTopic_name,smid,suid","'$stopic','$smid','$suid'");
		header("location:insert-topic.php");
		}
	}

?>

