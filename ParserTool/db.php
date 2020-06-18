<?php

$db=mysql_connect("localhost","root","");
mysql_select_db("odia_unicode",$db);

mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES utf8");

?>
