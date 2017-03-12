<link href="style.css" rel="stylesheet" type="text/css" />
<div class="header"><p style="text-align:center; font-weight:bold">Welcome to registration on our Forum</p></div>
<div class="login">
<?php
$name = $_POST['name'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];
$email = $_POST['email'];

include("connect.php");
$urow=select("count(uname)","login","uname='$name'");
$erow=select("count(uemail)","login","uemail='$email'");
//echo $urow[0];
//echo $erow[0];
if($pass == "" || $name == "")
{
	echo "Please fill empty fields.";

}
else if($urow[0]=="1")
{
	echo "Username already exist.";
}
else if($erow[0]=="1")
{
	echo "User with this email already exist.";
}
else
{

$sql = "insert into login(uname,upass,uphone,uemail) values('$name',md5('$pass'),'$phone','$email')";
$result = mysql_query($sql);
	if (!$result) 
		{
		mysql_error();
		} 
	else
		{
		echo "Thanks for registration.";
		header("location:login.php");
		}
}
?>
</div>
