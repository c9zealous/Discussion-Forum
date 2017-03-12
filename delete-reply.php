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
$deleter = $_GET['deleter'];
$dstopic = $_GET['dstopic'];
//select questions from questions table 
$sql = "delete from reply where rid='$deleter'";
mysql_query($sql) or die(mysql_error());
header("location:reply.php?stopic=$dstopic");

?>