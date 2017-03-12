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
$reply = $_POST['reply'];
$rsid = $_POST['rsid'];
$bmtopic = $_POST['gmtopic'];
$ruid = $_POST['ruid'];
$sqli = insert("reply","reply,rsid,ruid","'$reply','$rsid','$ruid'");
header("location:reply.php?stopic=".$rsid."&gmtopic=".$bmtopic."");
?>


