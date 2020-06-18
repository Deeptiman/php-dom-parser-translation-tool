<meta charset='utf-8'>
<title> Akruti Converter </title>
<?php 

$demo=utf8_decode($stxt); // Assigning the Sum into a variable //

if($demo[strlen($demo)-1]!=utf8_decode('ö') && $demo[strlen($demo)-1]!=utf8_decode('û'))
{

	$input2=$stxt.utf8_decode('ö'); // Adding line breaking point , if $stxt contains single line //
		
	
}
else
{
	
	$input2=$stxt; // Assigning the Sum into a variable //
	
}


$mno=NULL;

for($it=0;$it<strlen($input2)-1;$it++)
{

	
	if($input2[$it]=='#')
	{
		$x=$input2[$it];
				
		for($it1=$it+1;$it1<$it+5;$it1++)
		{
				
				$mno=$mno.$input2[$it1];
				
				$input2[$it1]=utf8_decode("µ");
						
		}
		
		
	}
	
	

	if($input2[$it]==utf8_decode('ê') && $input2[$it+1]==utf8_decode('ý'))
	{

		$input2[$it]=utf8_decode('ý');
		
		$input2[$it+1]=utf8_decode('ê');

	}


}




	$new_txt=NULL;
	
	$new_txt1=NULL;
	
	$new_txt2=NULL;
	
	$ntx=0;

	for($int=0;$int<strlen($input2);$int++)
	{
		
	
			if(utf8_encode($input2[$int])=='µ' && utf8_encode($input2[$int+3])=='µ')
			{
				
				
					$new_txt=NULL;
					
					$new_txt1=NULL;
					
					$new_txt2=NULL;
					
					for($int1=0;$int1<$int+1;$int1++)
					{
						
							$new_txt1=$new_txt1.$input2[$int1];														
				
					}
					
					
					for($int2=$int+4;$int2<strlen($input2);$int2++)
					{
						
							$new_txt2=$new_txt2.$input2[$int2];
							
					}
						
					$new_txt=$new_txt1.$new_txt2;
					
					$ntx++;	
					
			}
			 

	}
	
	 
		
$new_txt=$input2;

$tx=explode("\n",$new_txt);

$s=NULL;

for($i=0;$i<sizeof($tx);$i++)
{
	 
		$s=$s.' '.$tx[$i]; 
}

?>


 <div id="exline" style="font-family:calibri; font-size:15px; margin-left:10px; margin-top:15px;"></div>

 <div id="cleanline" style="font-family:calibri; font-size:15px; margin-left:10px; margin-top:15px;"></div>



<?php


echo '<script language="javascript">
		document.getElementById("exline").innerHTML="'.'<b>Cleaning the Texts .. </b>'.'";
	  </script>';

flush();

ob_flush();


?>


<?php


echo '<script language="javascript">
		document.getElementById("exline").innerHTML="'.'<b>Exploding the Text to Line by Line .. </b>'.'";
	  </script>';

flush();

ob_flush();


?>



<?php


	$txts=utf8_encode($s);  // Converting the Sum into UTF-8 Unicode //

	$txt1='ö';

	$txt2=' û';
	
	$line1=explode($txt1,$txts);		
			 
	$line2=explode($txt2,$txts);		
		
	 
$lns=array();


for($i1=0;$i1<sizeof($line1)-1;$i1++)
{

	$lns[]=$line1[$i1];	

}




for($i2=0;$i2<sizeof($line2)-1;$i2++)
{

	$lns[]=$line2[$i2];	

}



$c1=substr_count($txts,$txt1);

$c2=substr_count($txts,$txt2);

$c3=$c1+$c2;

?>

<?php


echo '<script language="javascript">
		document.getElementById("exline").innerHTML="'.'<b>Total No of Line : </b>'.$c3.','.' <b> Font Name : </b> '.$fontname.'";
	  </script>';

flush();

ob_flush();

?>

<?php

$psum=NULL;

$unicode_result=array();

$line_size=sizeof($lns); // Total number of line  //

for($i3=0;$i3<sizeof($lns);$i3++)
{
	
	$on=$i3+1;


 if(strlen($lns[$i3])>2)
 {
	
	$psum=utf8_decode($lns[$i3]);  

	include 'akruti_convert.php';
	
	echo '<script language="javascript">
		document.getElementById("cleanline").innerHTML="'.'<b>Convetered to Unicode , Line No : </b>'.$on.'/'.sizeof($lns).'";
	  </script>';

	flush();

	ob_flush();	
	

	$unicode_result[]=$psum1; // Adding the each line into the Array converted to Unicode //

	$mno=NULL;
	
	$psum1=NULL;

 }


?>

</font>

<?php
}

?>

<?php

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


$file1=fopen($rdir.'\\'.$fdir[$xy].'\\'.'Result.txt',"w");  // Writting the Converted Unicode Results into the Result.txt file //

for($ur=0;$ur<sizeof($unicode_result);$ur++)
{

	$unicode_result[$ur]=str_replace('ମ୍ପମ୍ପମ୍ପ','',$unicode_result[$ur]);  

	fwrite($file1,trim($unicode_result[$ur]).PHP_EOL);

}


$unicode_result=NULL;

$result_sum=NULL;

$psum=NULL;

?>


