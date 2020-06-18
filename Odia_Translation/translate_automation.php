<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
#abc
{
	width:380px;
	height:40px;
	background-color:#303;
	color:#CCC;
}

#xyz
{
	width:180px;
	height:40px;
	background-color:#EA2F06;
	color:#CCC;
	margin-left: 30px;
}

#txt
{
	height:50px;
	width:450px;
	font-size:20px;
	background-color:#fff;
}
</style>
<?php

include 'db.php';

ini_set('max_execution_time', 600);

$url=$_POST['url'];

$parse=parse_url($url);

$host="http://".$parse['host'];


$html_body=file_get_contents($url);

$url=$host;



$text=preg_replace("/<!--.*-->/Uis", "", $html_body); 



$html=htmlentities($text);

$ex=explode("&gt;",$html);

$sum=NULL;
$new_word=array();


													///// SRC SECTION/////
				
$sr=0;		
for($i=0;$i<sizeof($ex);$i++)
{
	
	$src=strpos($ex[$i],"src=&quot");
	
	if($src)
	{
	
		$tt=substr(trim($ex[$i]),0,$src+8);
	//	echo $src.'&nbsp;&nbsp;'.$tt[$src].'&nbsp;&nbsp;'.$ex[$i];
	//	echo '<br>';
	//echo $src.'&nbsp;'.$tt[$src].'&nbsp;&nbsp;'.$ex[$i];
	//	echo '<br>';
		
			$www=strpos($ex[$i],"www.");		
			$http=strpos($ex[$i],"http://");
			$https=strpos($ex[$i],"https://");
			
		if(!$www && !$http && !$https)
		{

		$sr++;
	$src_no[]=$i;
	
	$src_before[]=substr($ex[$i],0,$src+10);
	$src_after[]=substr($ex[$i],$src+10,strlen($ex[$i]));
		
		}
	}
}


	if($sr>0)
	{


for($i=0;$i<sizeof($src_after);$i++)
{
	$src_new[]=$url.'/'.$src_after[$i];
	
}

for($i=0;$i<sizeof($src_before);$i++)
{
	$j=$i+1;
//echo $j.'&nbsp;&nbsp;'.$src_before[$i];
//echo '<br>';
	
}


for($i=0;$i<sizeof($src_after);$i++)
{
	$j=$i+1;
//	echo $j.'&nbsp;&nbsp;'.$src_after[$i];
//	echo '<br>';
}

for($i=0;$i<sizeof($src_no);$i++)
{
	 $ex[$src_no[$i]]=NULL;
}

for($i=0;$i<sizeof($src_before);$i++)
{
	 $ex[$src_no[$i]]=$src_before[$i].$src_new[$i];
}
	
}
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////




													///// HREF SECTION/////
$hr=0;													
for($i=0;$i<sizeof($ex);$i++)
{
	$href=strpos($ex[$i],"href=&quot");
	
	if($href)
	{

			$www=strpos($ex[$i],"www.");
			$http=strpos($ex[$i],"http://");
			$https=strpos($ex[$i],"https://");
		if(!$www && !$http && !$https)
		{
			$hr++;
	$href_no[]=$i;
	$href_before[]=substr($ex[$i],0,$href+11);
	$href_after[]=substr($ex[$i],$href+11,strlen($ex[$i]));
		}
	}
}

	if($hr>0)
	{




for($i=0;$i<sizeof($href_after);$i++)
{
	$href_new[]=$url.'/'.$href_after[$i];
	
}


for($i=0;$i<sizeof($href_no);$i++)
{
	 $ex[$href_no[$i]]=NULL;
}


for($i=0;$i<sizeof($href_before);$i++)
{
	$ex[$href_no[$i]]=$href_before[$i].$href_new[$i];
}
	}
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	//////////////////////////// Striping of Tags into separate Array ///////////////////////////
	
for($i=0;$i<sizeof($ex);$i++)
{	
	
	if(substr(trim($ex[$i]),0,2)!="&l")
	{
		$num[]=$i;
		$repair[]=$ex[$i];
	
	}
	else
	{
		$no[]=$i;	
		$tag[]=$ex[$i];
		
	}

}



for($i=0;$i<sizeof($repair);$i++)
{
	$pos=strpos($ex[$num[$i]],"&l");

	$repair[$i]=str_replace(substr($ex[$num[$i]],0,$pos+4),NULL,$repair[$i]);
}

for($i=0;$i<sizeof($tag);$i++)
{
	
	$pos=strpos($ex[$no[$i]],"&lt;");
		
	$tag[$i]=str_replace(substr($ex[$no[$i]],0,$pos+4),NULL,$tag[$i]);
}



for($i=0;$i<sizeof($repair);$i++)
{
	$ex[$num[$i]]=$repair[$i];
}


for($i=0;$i<sizeof($tag);$i++)
{
	$ex[$no[$i]]=$tag[$i];
}


$text_value=explode("&gt;",$html);

for($i=0;$i<sizeof($text_value);$i++)
{
	
	if(substr(trim($text_value[$i]),0,2)!="&l")
	{
		$value_num[]=$i;
		
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////


		///////////////////////// Striping of Text Value into Separate Array /////////////////////////////

$tag_value=array();

for($i=0;$i<sizeof($text_value);$i++)
{
	$tag_value[]=NULL;	
}



for($i=0;$i<sizeof($value_num);$i++)
{
	
	
	$text=$text_value[$value_num[$i]];
	$n=strpos(trim($text),"&lt;");
	$newtext=substr(trim($text),0,$n);
	$xyz=$value_num[$i];
	$xyz.' '.$tag_value[$value_num[$i]-1]=$newtext;
	
}

$query='TRUNCATE TABLE html_code';
		mysql_query($query,$db);

$wscript_no=array();
$wscript_tag=array();
$wscript_value=array();

$dollar_no=array();
$dollar_tag=array();
$dollar_value=array();

$script_no=array();
$script_tag=array();
$script_value=array();

$style_no=array();
$style_tag=array();
$style_value=array();


$fword=array();

$style='style';
$script='scr';
$dollar='$(';

for($i=0;$i<sizeof($text_value);$i++)
{
	
	$j=$i+1;
	
	
	$st=strpos($ex[$i],$style);

	$scr=strpos($ex[$i],$script);
	
	$doll=strpos($ex[$i],$dollar);

	
	
	if($st===false && $scr===false && $doll===false)
	{
		$wscript_no[]=$j;
		$wscript_tag[]=$ex[$i];
		$wscript_value[]=$tag_value[$i];
		
	}
	else	
	{
		$style_no[]=$j;
		$style_tag[]=$ex[$i];
		$style_value[]=$tag_value[$i];

		
	}
	
				
		
			$new_word[]=NULL;	
			$fword[]=NULL;

}

for($k=0;$k<sizeof($wscript_value);$k++)
{

include 'translation_result_process.php';

if(!empty($final_sum_text))
{
	$new_word[$k]=$final_sum_text;
}

$final_sum_text=NULL;



}


?>

<?php

for($i=0;$i<sizeof($wscript_no);$i++)
{
	$text=$new_word[$i];
	$text=str_replace("1","୧",$text);
	$text=str_replace("2","୨",$text);
	$text=str_replace("3","୩",$text);
	$text=str_replace("4","୪",$text);
	$text=str_replace("5","୫",$text);
	$text=str_replace("6","୬",$text);
	$text=str_replace("7","୭",$text);
	$text=str_replace("8","୮",$text);
	$text=str_replace("9","୯",$text);
	$text=str_replace("0","୦",$text);
	
	$fword[$i]=$text;	
	
}


$x=sizeof($style_no)+sizeof($script_no)+sizeof($wscript_no);

echo '<br>';

$sort_no=array();

for($i=0;$i<$x;$i++)
{
	
	if(!empty($style_no[$i]))
	{	
		 $sort_no[]=$style_no[$i];
	}


	if(!empty($script_no[$i]))
	{	
		 $sort_no[]=$script_no[$i];
	}

	if(!empty($wscript_no[$i]))
	{
		$sort_no[]=$wscript_no[$i];
	}
	
	
}

sort($sort_no);

$final_no=array();
$final_tag=array();
$final_value=array();

for($i=0;$i<sizeof($sort_no);$i++)
{
	$j=$i+1;

$xy=$sort_no[$i];

	//echo $sort_no[$i];
	//echo ' ';
for($j=0;$j<sizeof($sort_no);$j++)
{
	
	if(!empty($style_no[$j]))
	{
	
		if($style_no[$j]==$xy)
		{
			$final_no[]=$style_no[$j];
			$final_tag[]=$style_tag[$j];
			$final_value[]=$style_value[$j];
			
		}
	}
	
	
	if(!empty($script_no[$j]))
	{
	
		if($script_no[$j]==$xy)
		{
			$final_no[]=$script_no[$j];
			$final_tag[]=$script_tag[$j];
			$final_value[]=$script_value[$j];
			
		}
	}
	
	
	if(!empty($wscript_no[$j]))
	{
			
		if($wscript_no[$j]==$xy)
		{
			$final_no[]=$wscript_no[$j];
			$final_tag[]=$wscript_tag[$j];
			$final_value[]=$fword[$j];
			
		}
	}
	
}
	
}
?>
<center>
<a href="translation_result_preview.php" style="text-decoration:none;"><input type="button" name="but" id="abc" value="Click here to see the Translated Webpage" /></a>
</center>
<br><br>

<input type="button" name="but" id="xyz" value="Dom Parsed Results" />

<?php

for($i=0;$i<sizeof($final_no)-1;$i++)
{
	

$query='INSERT INTO html_code
		(html_tag,html_value)
		VALUES
		("'.$final_tag[$i].'","'.$final_value[$i].'")';
		mysql_query($query,$db);

mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES utf8"); 

}
?>
<table align="center" border="1" bgcolor="#2507AB" width="1100" style="color:#FFF; font-size:14px;">
<tr>
<td align="center">
Sl.No
</td>
<td width="20%"></td>
<td align="center">
Tag_Name
</td>
<td align="center">
Tag_Value
</td>
</tr>
<?php
for($i=0;$i<sizeof($final_no);$i++)
{
?>
<tr>
<td align="center">
<?php echo $i+1;?>
</td>
<td width="20%"></td>
<td align="left">
<?php 
echo  $final_tag[$i];
?>
</td>
<td align="left">

<?php 

	echo $final_value[$i];
?>

</td>
<?php

if($ex[$i]=='!--')
{
	echo 'Yes';	
}
}

?>
