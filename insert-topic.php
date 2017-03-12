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
<div class="content">
<form action="insertq-action.php?insert=itopic" method="post">
<strong>Main Topic </strong><br />
<input type="text" name="topic" style="width:300px" /><br /><br />
<input type="hidden" name="muid" value="<?php echo $userId; ?>" />
<input type="submit" value="Insert" />
</form>
<hr color="#CCCCCC" />
<form action="insertq-action.php?insert=istopic" method="post">
<strong>Sub Topic </strong><br />
<?php
$sql = "select * from main_topic where muid='$userId'";
$result = mysql_query($sql) or die(mysql_error());
?>
<select name="smid">
<?php
while ($row = mysql_fetch_array($result))
{
	echo "<option value=" .$row['mid']. ">". $row['topic_name'] ."</option>";
}
?>
</select>
<input type="text" name="stopic" style="width:300px" /><br /><br />
<input type="hidden" name="suid" value="<?php echo $userId; ?>" />
<input type="submit" value="Insert" />
</form>
</div>
