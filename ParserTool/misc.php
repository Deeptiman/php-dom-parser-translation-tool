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

$english=$stxt;

$final_engs=explode('.',$english);


   $rdir=$dir;
	
	$rdir=str_replace('Extract','Result',$rdir);

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
	
	


?>


<?php

echo '<script language="javascript">
		document.getElementById("exline").innerHTML="'.'<b>Total No of Line : </b>'.sizeof($final_engs).','.' <b> Font Name : </b> '.$fontname.'";
	  </script>';

flush();

ob_flush();

?>


<?php


 $file1=fopen($rdir.'\\'.$fdir[$xy].'\\'.'Result.txt',"w");
 
 for($k5=0;$k5<sizeof($final_engs);$k5++)
 {
		
		
		if(strlen($final_engs[$k5])>5)
		{

			$on=$k5+1; 
	
			$line_count++;
		 
			$Data = trim($final_engs[$k5]).PHP_EOL; 
 
			fwrite($file1, $Data);

	

		}

 }


if($on<=sizeof($final_engs) && $on!=0)
{

	echo '<script language="javascript">
 document.getElementById("cleanline").innerHTML="'.'<b>Saved to Text File , Line No : </b>'.$on.'/'.sizeof($final_engs).'";
		  </script>';

			flush();

			ob_flush();	

}

 $on=0;

 $line_size=$line_count;

 $line_count=0;
 
 $final_engs=NULL;
 
 $sb_sum=NULL;
 

?>



