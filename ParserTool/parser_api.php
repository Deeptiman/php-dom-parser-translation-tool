<title> Gyan Oriya </title>
 
<script>
 
	function button1() 
	{
		
		document.forms["form1"].submit();
		  	
		return true;
     
	}
	
</script>	 
 
 
<?php

$web_no=array();
 
set_time_limit(8000); 

if(isset($_FILES['abc']))  /// Taking the HTML or XML File as Input ///
{

 $dir='C:\wamp\www\ParserTool\HowitWorks';

 $file=$_FILES['abc']['name'];  /// Assigning the Filename into a variable ///

 $v=0;
 
 $file_pos1=strpos($file,'.htm');
 
 if($file_pos1===false)
 {
 
 }
 else
 {
	
	$v++;
	

 }
 
 
 $file_pos2=strpos($file,'.HTM');
 
 if($file_pos2===false)
 {
 
 }
 else
 {
	
	$v++;

 }
 
 
 $file_pos3=strpos($file,'.xml');
 
 if($file_pos3===false)
 {
 
 }
 else
 {
	
	$v++;

 }
 
 
 $file_pos4=strpos($file,'.XML');
 
 if($file_pos4===false)
 {
 
 }
 else
 {
	
	$v++;

 }
 
 
if($v>0)  // If Counter value is greater than 1 then HTML Parser Begins ///
{
	
move_uploaded_file($_FILES['abc']['tmp_name'],$dir.'/'.$_FILES['abc']['name']);

$_FILES['abc']['name']=str_replace(' ','%20',$_FILES['abc']['name']);

$url='http://localhost/ParserTool/HowitWorks/'.$_FILES['abc']['name'];
		   
$parse=parse_url($url);

$host="http://".$parse['host'];

$html_body=file_get_contents($url);

$url=$host;

$text=preg_replace("/<!--.*-->/Uis", "", $html_body); 

$html=htmlentities($text);

//echo $html;

//echo '<Br>';

/*

$html=str_replace('&laquo;','',$html);

$html=str_replace('&Acirc;','',$html);

*/

//$html=str_replace('',' ',$html);

$html=str_replace('&nbsp;',' ',$html);

$html=str_replace('&quot;','',$html);

//$html=str_replace('amp;','',$html);

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
	
	
//echo '<b> Stripping of Tags into Array </b><br>';
		
for($i=0;$i<sizeof($ex);$i++)
{	


		//echo $ex[$i];
		
		//echo '<Br>';
	
	
	
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

//echo '<b> Tag Names </b><br>';

for($i=0;$i<sizeof($tag);$i++)
{
	
	if(!empty($ex[$no[$i]]))
	{
	
		$pos=strpos($ex[$no[$i]],"&lt;");
			
		//echo $tag[$i];
		
		//echo '<br>';
		
		$tag[$i]=str_replace(substr($ex[$no[$i]],0,$pos+4),NULL,$tag[$i]);
	
	}
}

//echo '<br>';


for($i=0;$i<sizeof($repair);$i++)
{
	$ex[$num[$i]]=$repair[$i];
}


for($i=0;$i<sizeof($tag);$i++)
{
	$ex[$no[$i]]=$tag[$i];
}


?>


<?php 

// Spliting Greater Than ///

//echo '<b> Text Nodes after Tags </b><br>';

$text_value=explode("&gt;",$html);

for($i=0;$i<sizeof($text_value);$i++)
{
	
	
	if(substr(trim($text_value[$i]),0,2)!="&l")
	{
		$value_num[]=$i;
		
		//echo $i;
		
		//echo ' - ';
		
		//echo $text_value[$i];
		
		//echo ' <br> ';
		
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
				
		$sa_pos=strpos($sa_text,'&ETH;');
		
		if($sa_pos===false)
		{
			
			 $sa++;     /// The Text of the Webpages are not in Sarala font ///
			
		}
		else
		{
					 
			 $sa=0;		/// The Text of the Webpages are in Sarala font ///
			
		}


//////////////////////////////////////////////////////////////////////////////////////////////



//echo '<b> Complete Analysis </b><br>';

for($i=0;$i<sizeof($value_num)-1;$i++)
{
	
	
	if(!empty($text_value[$value_num[$i]]))
	{
	
		$text=$text_value[$value_num[$i]];
		
		//echo $text;
		
		//echo '<br>';		
	
	if($sa>0)
	{
		$n1=strpos(trim($text),'&lt;');
		
		$n2=strpos(trim($text),"&lt;");
	
	}
	else if($sa==0)
	{
		
		$n1=strpos(trim($text),'&lt;/');
		
		$n2=strpos(trim($text),"&lt;/");
		
	}
		
		if($n1===false)
		{
			
			$text=$text.'>';
			
		}
		 
		
		//echo $value_num[$i].' - '.$text_value[$value_num[$i]];
		
		//echo '<br>';
		
		
		
		if($n2===false)
		{
			
			
			$ntxt=$text_value[$value_num[$i]+1];
		
			$n3=strpos(trim($ntxt),"&lt;/");

			$ntext=substr(trim($ntxt),0,$n3);			
				
			$text_value[$value_num[$i]+1]=NULL;
								
			$tag_value[$value_num[$i]-1]=$text.' '.$ntext;			
		
			//echo 'New-Text : '.$text.' '.$ntext;
			
			//echo '<br>';
		
		}
		else
		{
										
			$newtext=substr(trim($text),0,$n2);		
		
			$tag_value[$value_num[$i]-1]=$newtext;
			
			//echo 'Matching : '.$text;
			
			//echo '<br>';
			
		}
	
	}
	
}

  
//echo '<br>';

//echo '<b>  Final Tag Values </b><br>';

for($i=0;$i<sizeof($value_num);$i++)
{
	
	if(!empty($tag_value[$value_num[$i]-1]))
	{
	
		//echo $i.' - '.$tag_value[$value_num[$i]-1];
		
		//echo '<br>';	
	
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
 
 
//echo '<Br>'; 
 
?>

<br />
 
<?php

$tag_result=array();

$value_result=array();

for($i=0;$i<sizeof($text_value)-1;$i++)
{
	$j=$i+1;

if($ex[$i]!='STYLE' && $ex[$i]!='title')
{
	
	if(strlen($new_word[$i])>2)
	{
			 
		$tag_result[]=$ex[$i];
		
		$value_result[]=$new_word[$i];
		 
	}
	
}
	
}


?>

<table style="margin-left:40px;" border="0" width="600">

<tr>

<td align="center" bgcolor="#333333" style="border: 1px solid #ccc;color:#FFF; font-family:calibri; font-size:20px;" width="50" 
height="10">

 Slno.

</td>

<td align="center" bgcolor="#333333" style="border: 1px solid #ccc;color:#FFF; font-family:calibri; font-size:20px;" width="50" 
height="10">
Tags

</td>

<td align="center" bgcolor="#333333" style="border: 1px solid #ccc;color:#FFF; font-family:calibri; font-size:20px;" width="50" 
height="10">

Tag Values

</td>

</tr>

<?php

	$tag_sum=NULL;

	for($t=0;$t<sizeof($tag_result);$t++)
	{
		
		$t1=$t+1;
		
			
		if($tag_sum==NULL)
		{
		
		$tag_sum=$tag_sum.$value_result[$t];
		
		}
		else
		{
		
		$tag_sum=$tag_sum.' '.$value_result[$t];	
		
		}

?>

		<tr>
        
        <td align="center" style="font-family:calibri; font-size:12px; border: 1px solid #ccc;"><?php echo $t1; ?></td>
        
        <td align="center" style="font-family:calibri; font-size:12px; border: 1px solid #ccc;">< <?php echo $tag_result[$t]; ?> ></td>
        
        <td align="center" style="font-family:calibri; font-size:12px; border: 1px solid #ccc;">
        
        <p><?php echo $value_result[$t]; ?></p>
        
        </td>
        
        
        </tr>
        

<?php

	}

?>

<div style="margin-top:-15px;">

   <table style="margin-left:800px;border: 1px solid #ccc; position:fixed; top:20px;" width="500" border="0">
   
   <tr>
   
       <td bgcolor="#CC0000" width="300" colspan="2">
       
       <p style=" margin-left:10px;font-family:calibri; font-size:20px; color:#FFF;">
        
        Step.1
       
       </p>
       
       </td>
   
  
   </tr>
    
    
    <tr>
    
    <td>
    
        <p style="margin-left:10px; font-family:calibri; font-size:18px; color:#333;">
        
        Input File Name : 
        
        </p>    
    
    </td>
    
    <td>
    
        <p style="margin-left:-5px; font-family:calibri; font-size:18px; color:#333;">
        
         <?php echo $_FILES['abc']['name']; ?>
        
        </p>    
    
    </td>
    
    
    
    </tr>



    <tr>
    
    <td>
    
        <p style="margin-left:10px; font-family:calibri; font-size:18px; color:#333;">
        
        Total Tags : 
        
        </p>    
    
    </td>
    
    
    <td>
    
        <p style="margin-left:-5px; font-family:calibri; font-size:18px; color:#333;">
        
        	<?php echo sizeof($tag_result); ?>
        
        </p>    
    
    </td>
    
    
    </tr>
    
    
    <tr>
    
    <td>
    
        <p style="margin-left:10px; font-family:calibri; font-size:18px; color:#333;">
        
        Total Text Nodes :
        
        </p>    
    
    </td>
    
    
    <td>
    
        <p style="margin-left:-5px; font-family:calibri; font-size:18px; color:#333;">
        
        	<?php echo sizeof($value_result); ?>
        
        </p>    
    
    </td>
    
    
    </tr>
    
    <tr>
    
    <td align="right">
    
        <p style="margin-right:25px; font-family:calibri; font-size:18px; color:#333;">
        
        Step 2 : 
        
        </p>    
    
    </td>
    
    
    <td>
    
        <p style="margin-left:-5px; font-family:calibri; font-size:18px; color:#333;">
        
        	Make a Paragraph of <b>Tag Values</b>
        
        </p>    
    
    </td>
    
    
    </tr>    
    
    
        <tr>
    
    <td align="right" colspan="2">
    
    
    <form action="step2.php" method="post" id="form1">
    
    <input type="hidden" name="step2" value="<?php echo $tag_sum; ?>" />
    
    </form>
    
<input type="button" value="Proceed To Step.2" style=" margin-right:30px; font-family:calibri; font-size:18px;background-color:#903; color:#FFF;" align="right" onclick="javascript:button1();">
        
          
        

    
    </td>
    
    
    </tr>
    
   </table>

</div>

<?php	

$v=0;

}
else if($v==0)  /// If Counter value is 0 then Input is Invalid ///
{
	
?>	
		
        <script>
		
		alert('Input is not a HTML or XML File');
		
		</script>

<?php

}

}
else
{
	
?>	
	
	<center>
            
    <h2 style="margin-top:50px; font-family:calibri; font-size:20px; color:#333;">Please upload a HTML or XML file to see how the parser works !!!</h2>
 
    </center>
    
 <?php   

}

?> 
 