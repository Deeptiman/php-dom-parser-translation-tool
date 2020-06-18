<?php
$db=mysql_connect("localhost","root","")or die(mysql_error());
        mysql_select_db("odia_translate",$db);
		
		mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES utf8");
?>

