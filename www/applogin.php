<?php
mysql_connect('localhost','root',''); 
mysql_select_db("useriddata");

$userpassword = $_POST["password"];

$sqldate = "SELECT pass FROM `registerdata` WHERE userid = " . $_POST["id"];

$sqlpassword = mysql_query($sqldate);
$resultpassword = mysql_fetch_row($sqlpassword);

if($_POST["password"]== $resultpassword[0] )
		echo 't';
	else
		echo 'f';
?>