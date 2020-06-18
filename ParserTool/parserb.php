<title> Gyan Oriya </title>
<?php

$parser_url=str_replace(' ','%20',$parser_url);   

$web_url=$parser_url;
     
set_time_limit(8000); 
 
$url=$parser_url;
		   
$parse=parse_url($web_url);

$host="http://".$parse['host'];

$html_body=file_get_contents($url);

$url=$host;

$text=preg_replace("/<!--.*-->/Uis", "", $html_body); 

$html=htmlentities($text);

/*

$html=str_replace('&laquo;','',$html);

$html=str_replace('&Acirc;','',$html);

*/

//$html=str_replace('',' ',$html);

$html=str_replace('&nbsp;',' ',$html);

$html=str_replace('&quot;','',$html);

$html=str_replace('amp;','',$html);

/*
for($sg=0;$sg<strlen($html);$sg++)
{
	$sg1=$sg+1;
	
	echo $html[$sg].' ';
	
	echo ' ';
	
	
}
*/

$ex=explode("&gt;",$html);

$sum_text=NULL;

$mysum=NULL;

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
	
			$http=strpos($ex[$i],"http://");
			$https=strpos($ex[$i],"https://");
		if(!$http && !$https)
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
			$http=strpos($ex[$i],"http://");
			$https=strpos($ex[$i],"https://");
		if(!$http && !$https)
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


for($i=0;$i<sizeof($href_before);$i++)
{
	$j=$i+1;
//	echo $j.'&nbsp;'.$href_before[$i];
//	echo '<br>';
}


for($i=0;$i<sizeof($href_after);$i++)
{
	$j=$i+1;
//	echo $j.'&nbsp;'.$href_after[$i];
//	echo '<br>';
}

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
	if(!empty($ex[$num[$i]]))
	{
	
	
	$pos=strpos($ex[$num[$i]],"&l");

	$repair[$i]=str_replace(substr($ex[$num[$i]],0,$pos+4),NULL,$repair[$i]);
	
	}
	
}

for($i=0;$i<sizeof($tag);$i++)
{
	
	if(!empty($ex[$no[$i]]))
	{
	
	$pos=strpos($ex[$no[$i]],"&lt;");
		
	$tag[$i]=str_replace(substr($ex[$no[$i]],0,$pos+4),NULL,$tag[$i]);
	
	}
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


$tag_value=array();


for($i=0;$i<sizeof($text_value);$i++)
{
	$tag_value[]=NULL;	
}

 
 
	///// Font Testing ////
			
	$sa_text=NULL;
	
	for($i=0;$i<sizeof($value_num)-1;$i++)
	{
				
		$sa_text=$sa_text.$text_value[$value_num[$i]];
		
	}
	
		$sa=0;
		
		$tt='Ð';
		
		$sa_pos=strpos($sa_text,'&ETH;');
		
		if($sa_pos===false)
		{
			
			 $sa++;   /// The Text of the Webpages are not in Sarala font ///
			
		}
		else
		{
					 
			 $sa=0;   /// The Text of the Webpages are in Sarala font ///
			
		}


//////////////////////////////////////////////////////////////////////////////////////////////
 
for($i=0;$i<sizeof($value_num)-1;$i++)
{
	
	
	if(!empty($text_value[$value_num[$i]]))
	{
	
		$text=$text_value[$value_num[$i]];
		
			
		if($sa>0)
		{
			
			$na=strpos(trim($text),"&lt;");
		
		}
		else if($sa==0)
		{
		
			$na=strpos(trim($text),"&lt;/");
		
		}
		
		if($na===false)
		{
			
			 
				
				$ntxt=$text_value[$value_num[$i]+1];				 
				
			if($sa>0)
			{
			
				$na1=strpos(trim($ntxt),"&lt;");

			}
			else if($sa==0)
			{
				
				$na1=strpos(trim($ntxt),"&lt;/");				
				
			}
				$ntext=substr(trim($ntxt),0,$na1);
				
				$text_value[$value_num[$i]+1]=NULL;
												
				$tag_value[$value_num[$i]-1]=$text.' '.$ntext;				
			
			 
			
		}
		else
		{
		
				$newtext=substr(trim($text),0,$na);
			
				$tag_value[$value_num[$i]-1]=$newtext;
	
		}
	
	}
}

  

for($i=0;$i<sizeof($text_value);$i++)
{
	
	$new_word[]=NULL;	
}
 
 
for($k=0;$k<sizeof($value_num);$k++)
{
	
	if(!empty($tag_value[$value_num[$k]-1]))
	{

		$new_word[$value_num[$k]-1]=$tag_value[$value_num[$k]-1];	 

	}
	
	
}
 
 
?>


 
<?php


$tox=0;

for($ox=0;$ox<sizeof($text_value)-1;$ox++)
{

if($ex[$ox]!='STYLE' && $ex[$ox]!='TITLE')
{
	
	if(strlen($new_word[$ox])>2)
	{
	
		$tox++;
		
	
	}
	
	
}

}

$to=0;


for($i=0;$i<sizeof($text_value)-1;$i++)
{
	$j=$i+1;

if($ex[$i]!='STYLE' && $ex[$i]!='TITLE')
{
	
	if(strlen($new_word[$i])>2)
	{
		
		
		 $to++;
		 
$new_word[$i]=str_replace('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','',$new_word[$i]);


		 $parsed_sum=$parsed_sum.' '.html_entity_decode($new_word[$i]);
		 
		 $parsed_sum=str_replace('<br ','',$parsed_sum);
		 
		 $parsed_sum=str_replace('<BR ','',$parsed_sum);		 
		 
		 $parsed_sum=str_replace('<b ','',$parsed_sum);
		 
		 $parsed_sum=str_replace('<B ','',$parsed_sum);		 
		 
		 $indx=$to;
		 		 
		 $tx=$tox;
		 
		 
	}
	
}
	
}






	$ex=NULL;
	$src_no=NULL;
	$src_before=NULL;
	$src_after=NULL;
	$src_new=NULL;
	$href_no=NULL;
	$href_before=NULL;
	$href_after=NULL;
	$href_new=NULL;
	$num=NULL;
	$repair=NULL;
	$tag=NULL;
	$no=NULL;
	$text_value=NULL;
	$value_num=NULL;
	$tag_value=NULL;
	$new_word=NULL;
	$global=NULL;
	$my=NULL;
	$convt_txt1=NULL;
	$eng_node=NULL;




?> 
 