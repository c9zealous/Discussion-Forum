<link href="style.css" rel="stylesheet" type="text/css" />
<div class="header">
<?php
error_reporting(0);
session_start();
include("connect.php");
$userId = $_SESSION['uid'];
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
$rsid = $_GET['addr']; //subtopic id
$bmtopic = $_GET['gmtopic']; //maintopic id for back button
?>
<h3>Add Reply</h3>
<div class="content">
<form action="addr-action.php" method="post">
<textarea name="reply" style="width:300px"></textarea>
<br /><br />
<input type="hidden" name="rsid" value="<?php echo $rsid; ?>" />
<input type="hidden" name="ruid" value="<?php echo $userId; ?>" />
<input type="hidden" name="gmtopic" value="<?php echo $bmtopic; ?>" />
<input type="submit" value="Insert" />
</form>

