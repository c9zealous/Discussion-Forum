
<?php
mysql_connect("mysql3.000webhost.com","a2223715_ajinkya","ajinkya123");
mysql_select_db("a2223715_forum");

function select($field,$table,$condition) {
$sql = "select ".$field." from ".$table." where ".$condition;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);
return $row ;
}

function insert($table,$field,$value)
	{
		$sql = "insert into ".$table." ( ".$field." ) values ( ".$value." ) ";
		//echo $sql;
		mysql_query($sql) or die(mysql_error());
	}



?>