<?php
session_start();

include("connect.php");

$user=$_POST['uname'];
$upass=$_POST['upass'];

$row=select("uid,upass","login","uname='$user'");
//echo md5($upass)."<br>";
//echo $row['upass']."<br>";

if($user==""||$upass=="")
{
	echo "user or pass is blank";
}
else if(md5($upass)!=$row['upass'])
{
	echo "username or pass is wrong";
}
else
{
$_SESSION['user']=$user;
$_SESSION['uid']=$row['uid'];
header("location:index.php");
}

?>