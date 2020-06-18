<?php
ob_start();
?>

<?php

include 'db.php';

$query='SELECT * FROM html_code  ORDER BY html_id ASC';
 
$result=mysql_query($query,$db)or die(mysql_error());


while($row=mysql_fetch_array($result))
{

$row['html_tag']=str_replace("»",NULL,$row['html_tag']);



echo '<'.html_entity_decode($row['html_tag']).'>';

echo html_entity_decode($row['html_value']);


}



?>


