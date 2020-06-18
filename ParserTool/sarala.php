<meta charset='utf-8'>
<title> Sarala Converter </title>
<?php 

$txt1='¼Ð';  /// Line breaking point for Sarala font paragraph //

$txt2='¼ Ð'; /// Line breaking point for Sarala font paragraph //

$demo=$stxt;  // Assigning the Sum into a variable //

$stxt=str_replace('Þ¤','Þ',$stxt);

if($demo[strlen($demo)-2]!=utf8_decode('¼') && $demo[strlen($demo)-1]!=utf8_decode('Ð'))
{

	$input2=$stxt.utf8_decode('¼Ð'); // Adding line breaking point , if $stxt contains single line //
	
	
}
else
{
	
	$input2=$stxt;  // Assigning the Sum into a variable //
	
}

?>


<?php


$tx=explode("\n",$input2);

$s=NULL;

for($i45=0;$i45<sizeof($tx);$i45++)
{
			
	$s=$s.' '.trim($tx[$i45]);

}

?>

 <div id="exline" style="font-family:calibri; font-size:15px; margin-left:-2px; margin-top:15px;"></div>

 <div id="cleanline" style="font-family:calibri; font-size:15px; margin-left:-2px; margin-top:15px;"></div>



<?php

$margin_left='\"margin-left:10px;\"';

echo '<script language="javascript">
		document.getElementById("exline").innerHTML="'.'<b style='.$margin_left.'>Cleaning the Texts .. </b>'.'";
	  </script>';

flush();

ob_flush();


?>




<?php


 // Cleaning the Sum and removing texts from various ASCII characters //



for($j=0;$j<strlen($s);$j++)
{


if(!empty($s[$j+1]))
{

	if(!empty($s[$j+2]))
	{

		if(!empty($s[$j+1]) && ord($s[$j+1])==188)
		{
	       
		  if(!empty($s[$j]) || !empty($s[$j-1]))
		  {
		  
			if(ord($s[$j])==36)
			{
				
					if(ord($s[$j+1])==188)
					{
									
						$s[$j+1]=NULL;	
	
					}		
					else if(ord($s[$j+2])==188)
					{
				
						$s[$j+2]=NULL;	
	
					}

		
			}	
			else if(ord(!empty($s[$j-1]))==36)
			{
				
				if(ord($s[$j+1])==188)
				{
				
					$s[$j+1]=NULL;	
	
				}		
				else if(ord($s[$j+2])==188)
				{
				
					$s[$j+2]=NULL;	
	
				}

		
			}	
			else if(ord($s[$j])==38 || ord(!empty($s[$j-1]))==38)
			{
				
					$s[$j+1]=NULL;
		
			}	
			else if(ord($s[$j])==43 || ord(!empty($s[$j-1]))==43)
			{
				
					$s[$j+1]=NULL;
		
			}	
			else if(ord($s[$j])==61 || ord(!empty($s[$j-1]))==61)
			{
				
					$s[$j+1]=NULL;
		
			}	
			else if(ord($s[$j])==60 || ord(!empty($s[$j-1]))==60)
			{
				
					$s[$j+1]=NULL;
		
			}	
			else if(ord($s[$j])==42 || ord(!empty($s[$j-1]))==42)
			{
				
					$s[$j+1]=NULL;
			
			}
			
		 }
		    
			 
	    }
	
	}

 }

}

?>

<?php

$margin_left='\"margin-left:10px;\"';

echo '<script language="javascript">
		document.getElementById("exline").innerHTML="'.'<b style='.$margin_left.'>Exploding the Text to Line by Line .. </b>'.'";
	  </script>';

flush();

ob_flush();

?>


<?php


$txts=utf8_encode($s);  /// Converting the texts into UTF8-Unicode format ///

$line1=explode($txt1,$txts);

$line2=explode($txt2,$txts);


$lns=array();


for($i1=0;$i1<sizeof($line1)-1;$i1++)
{

	$lns[]=$line1[$i1];	

}



$c1=substr_count($txts,$txt1);

$c3=$c1;

?>

<?php

$margin_left='\"margin-left:10px;\"';

echo '<script language="javascript">
document.getElementById("exline").innerHTML="'.'<b style='.$margin_left.'>Total No of Line : </b>'.$c3.','.' <b> Font Name : </b> '.$fontname.'";
	  </script>';

flush();

ob_flush();

?>

<?php

$unicode_result=array();

$psum=NULL;

$result_sum=NULL;

?>


<?php


	for($i3=0;$i3<sizeof($lns);$i3++)
	{
	
	
			$on=$i3+1;
	
			$psum=utf8_decode($lns[$i3]);

			for($j3=0;$j3<strlen($psum);$j3++)
			{
		
 
 				if(!empty($psum[$j3+1]) && ord($psum[$j3+1])==188)
				{
				
					if(ord($psum[$j3])==36)
					{
				
						$psum[$j3+1]=utf8_decode('¼');
	
					}
	
	
					if(ord($psum[$j3])==43)
					{	
				
						$psum[$j3+1]=utf8_decode('¼');
		
					}
	
	
					if(ord($psum[$j3])==61)
					{
				
						$psum[$j3+1]=utf8_decode('¼');
		
					}
	
	
					if(ord($psum[$j3])==60)
					{
				
						$psum[$j3+1]=utf8_decode('¼');
		
					}
	
		
					if(ord($psum[$j3])==42)
					{
				
						$psum[$j3+1]=utf8_decode('¼');
		
					}
	
				
				}
	
		}

 
$line_size=sizeof($lns); // Total number of Lines //

include 'sarala_convert.php';

$margin_left='\"margin-left:10px;\"';

echo '<script language="javascript">
document.getElementById("cleanline").innerHTML="'.'<b style='.$margin_left.'>Convetered to Unicode , Line No : </b>'.$on.'/'.sizeof($lns).'";
	  </script>';

flush();

ob_flush();	
/*
 $psum2=explode(' ା',$psum1);
 
 for($ps=0;$ps<sizeof($psum2);$ps++)
 {
	 
	$unicode_result[]=$psum2[$ps];

 }
 
*/ 
	$unicode_result[]=$psum1; // Adding the each line into the Array converted to Unicode //

 	$psum2=NULL;
	
	$psum=NULL;

}

		
	$rdir=$dir;
	
	$rdir=str_replace('Extract','Result',$rdir); // Creating Result directory for the Extracted directory //

	if(!file_exists($rdir))
	{
		
		mkdir($rdir);
	
	}


	$subdir=$fdir[$xy];
	
	$sbdr=explode('\\',$subdir);
	
	$sb_sum=$rdir;
	
	for($sb=0;$sb<sizeof($sbdr);$sb++)
	{
	
			if(!empty($sbdr[$sb]))
			{
			
  				if(!file_exists($sb_sum.'\\'.$sbdr[$sb]))
				{
				
					mkdir($sb_sum.'\\'.$sbdr[$sb]);
				
				}
				
					
				$sb_sum=$sb_sum.'\\'.$sbdr[$sb];
		
			}
	
	}


$file1=fopen($rdir.'\\'.$fdir[$xy].'\\'.'Result.txt',"w"); // Writting the Converted Unicode Results into the Result.txt file //

for($ur=0;$ur<sizeof($unicode_result);$ur++)
{

	$unicode_result[$ur]=str_replace('ମ୍ପମ୍ପମ୍ପ','',$unicode_result[$ur]);  
	
	$unicode_result[$ur]=str_replace('ିି','ି',$unicode_result[$ur]);

	$nt=explode(' ା',$unicode_result[$ur]);
	
	for($n=0;$n<sizeof($nt);$n++)
	{

		fwrite($file1,trim($nt[$n]).PHP_EOL);

	}
	
}

$nt=NULL;

$unicode_result=NULL;

$result_sum=NULL;

$psum=NULL;

?>




