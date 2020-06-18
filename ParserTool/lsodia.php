<meta charset='utf-8'>
<title> LSOdia Converter </title>

<?php

include 'db.php';

?>


<?php

	
$otxt=trim($stxt).' '; // Assigning the Sum into a variable //

$tx=explode("\n",$otxt);

$xyz=NULL;

for($i45=0;$i45<sizeof($tx);$i45++)
{
	
	if($xyz==NULL)
	{
		
		$xyz=$xyz.trim($tx[$i45]);
	
	}
	else
	{

		$xyz=$xyz.' '.trim($tx[$i45]);
		
	}


}

$xyz=$xyz.' ';

if(!empty($xyz))
{

 
$xyz=str_replace('eA',':',$xyz);

$s=NULL;

$new=array();

$old=array();

$names=array();

$s1=NULL;


$ori1=array();

$ori2=array();

$ori3=array();

$final=NULL;


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


													//// 101 Ascii Section ////
													
													
 // 101 : େ 													

$mid1_no=array();

$mid1_txt=array();

$mid2_no=array();

$mid2_txt=array();

$mid3_no=array();

$mid3_txt=array();


for($j1=0;$j1<strlen($xyz)-1;$j1++)
{
	
	
	if(ord($xyz[$j1])==101)
	{			

	
			$e1=$j1;
		
			$e2=$j1+1;
			
			$e3=$j1+2;
		
			$e11=$xyz[$j1];
		
			$e21=$xyz[$j1+1];
		
			$e31=$xyz[$j1+2];
			
			

			$mid1_no[]=$e1;			
			
			$mid1_txt[]=$e11;
			
			
			$mid2_no[]=$e2;
			
			$mid2_txt[]=$e21;
							
							
			$mid3_no[]=$e3;
			
			$mid3_txt[]=$e31;							
	
	
	}
	
}
	
	
 for($j11=0;$j11<sizeof($mid1_no);$j11++)
 {
	 
	 	 
	
	 if(ord($mid3_txt[$j11])!=141 && ord($mid3_txt[$j11])!=180 && ord($mid3_txt[$j11])!=228 && ord($mid3_txt[$j11])!=196 && ord($mid3_txt[$j11])!=245 && ord($mid3_txt[$j11])!=230 && ord($mid3_txt[$j11])!=242 && ord($mid3_txt[$j11])!=233 && ord($mid3_txt[$j11])!=249 && ord($mid3_txt[$j11])!=240 && ord($mid3_txt[$j11])!=239 && ord($mid3_txt[$j11])!=226 && ord($mid3_txt[$j11])!=238 && ord($mid3_txt[$j11])!=222 && ord($mid3_txt[$j11])!=236 && ord($mid3_txt[$j11])!=241 && ord($mid3_txt[$j11])!=254 && $mid2_txt[$j11]!='&')
	 {
		 

		$xyz[$mid1_no[$j11]]=$mid2_txt[$j11];
		
		$xyz[$mid2_no[$j11]]=$mid1_txt[$j11];		
		
		$xyz[$mid3_no[$j11]]=$mid3_txt[$j11];

		
	
	 }
	 else if($mid2_txt[$j11]=='&')
	 {
		
			$xyz[$mid1_no[$j11]]=NULL;
		
			for($md=$mid2_no[$j11];$md<$mid2_no[$j11]+6;$md++)
			{
				
						$md_no=$mid2_no[$j11]+$md-2;

						$xyz[$mid2_no[$j11]+$md-2]=$xyz[$md];				
						
			}
		
		
			$xyz[$mid2_no[$j11]+5]=$mid1_txt[$j11];
		
	 }
	 else if(ord($mid3_txt[$j11])==141 || ord($mid3_txt[$j11])==180 || ord($mid3_txt[$j11])==228 || ord($mid3_txt[$j11])==196 || ord($mid3_txt[$j11])==245 || ord($mid3_txt[$j11])==230 || ord($mid3_txt[$j11])==242 || ord($mid3_txt[$j11])==233 || ord($mid3_txt[$j11])==249 || ord($mid3_txt[$j11])==240 || ord($mid3_txt[$j11])==239 || ord($mid3_txt[$j11])==226 || ord($mid3_txt[$j11])==238 || ord($mid3_txt[$j11])==222 || ord($mid3_txt[$j11])==236 || ord($mid3_txt[$j11])==241 || ord($mid3_txt[$j11])==254)
	 {
		
		$xyz[$mid1_no[$j11]]=$mid2_txt[$j11];
		
		$xyz[$mid2_no[$j11]]=$mid3_txt[$j11];		
		
		$xyz[$mid3_no[$j11]]=$mid1_txt[$j11];
		
		
	 }
	 
	
 }
 
 
 							///////////////////////////////////////////////////////////////////
 
 
 
											 ////  141 Ascii Section /////
 
 
 // 141 : ର୍
 

for($j2=0;$j2<strlen($xyz)-1;$j2++)
{
	

//	echo $j2.' -- '.utf8_encode($xyz[$j2]).' -- '.ord($xyz[$j2]);
	
//	echo '<br>';
	
		if(ord($xyz[$j2])==141 || ord($xyz[$j2])==229)
		{
			
			
			
			if((ord($xyz[$j2-1])==65 || ord($xyz[$j2-1])==73 || ord($xyz[$j2-1])==105) && $xyz[$j2-2]==';')
			{
				
				
				$no=$j2-7;
				
			    $new=$xyz[$j2];
				
				$xyz[$j2]=NULL;
				
				
				
				$tmp1=NULL;
				
				$tmp2=NULL;				
				
				
				for($n1=0;$n1<$j2-7;$n1++)
				{
					
					$tmp1=$tmp1.$xyz[$n1];
					
					$xyz[$n1]=NULL;
					
				}
								
				
				for($n2=$no;$n2<strlen($xyz);$n2++)
				{
				
						$tmp2=$tmp2.$xyz[$n2];
				
						$xyz[$n2]=NULL;
						
				}
				
				
								

				$xyz=$tmp1.$new.$tmp2;
								
				$tmp1=NULL;
				
				$tmp2=NULL;				
								
			
			}
			
			
			if((ord($xyz[$j2-1])==65 || ord($xyz[$j2-1])==73 || ord($xyz[$j2-1])==105) && $xyz[$j2-2]!=';')
			 {
				
						$new=$xyz[$j2];
				
						$old=$xyz[$j2-2];
			
						$xyz[$j2-2]=$new;
				
						$xyz[$j2]=$old;
					
									
			}
			
			
			
			
			if(!empty($xyz[$j2-7]))
			{

				if(ord($xyz[$j2-7])==0 && ord($xyz[$j2-1])==101)
				{
								
						$new=$xyz[$j2];
			
						$old=$xyz[$j2-7];
			
						$xyz[$j2-7]=$new;
					
						$xyz[$j2]=$old;
								
				}
				
							
			}
			
			if(!empty($xyz[$j2-2]))
			{
			
				if(ord($xyz[$j2-2])==0 && ord($xyz[$j2-1])==101)
				{

						$new=$xyz[$j2];
			
						$old=$xyz[$j2-2];
			
						$xyz[$j2-2]=$new;
				
						$xyz[$j2]=$old;
								
				}

			}

			if($xyz[$j2-1]!=';' && ord($xyz[$j2+1])!=78)
			{


				$new=$xyz[$j2];
			
				$old=$xyz[$j2-1];
			
				$xyz[$j2-1]=$new;
			
				$xyz[$j2]=$old;
	
			}
			else if($xyz[$j2-1]==';' && ord($xyz[$j2+1])!=78 && ord($xyz[$j2])!=65 && ord($xyz[$j2])!=73 && ord($xyz[$j2])!=105)
			{
								
				$no=$j2-6;
				
			    $new=$xyz[$j2];
				
				$xyz[$j2]=NULL;
								
				$tmp1=NULL;
				
				$tmp2=NULL;				
				
				
				for($n1=0;$n1<$j2-6;$n1++)
				{
					
					$tmp1=$tmp1.$xyz[$n1];
					
					$xyz[$n1]=NULL;
					
				}
				
				for($n2=$no;$n2<strlen($xyz);$n2++)
				{
				
						$tmp2=$tmp2.$xyz[$n2];
				
						$xyz[$n2]=NULL;
						
				}
							
							
				$xyz=$tmp1.$new.$tmp2;			
				
				$tmp1=NULL;
				
				$tmp2=NULL;
				
			}
	
		}
			 
	
}


										//////////////////////////////////////////////////




													///// Convert Section /////



$index=array();

$tmp_txt=$xyz;

for($j=0;$j<strlen($xyz);$j++)
{
	
	
  //   echo $j.' - '.utf8_encode($xyz[$j]).' '.ord($xyz[$j]);	
	  
  //   echo ' <br>';
		
		
	 $xy1=ord(trim($xyz[$j]));		 	 	
		  		
	 if($xyz[$j]==' ')
	 {
			$ori[]=' ';
			
	 }
	
		

		$query='SELECT * FROM lsoriya1 WHERE lascii="'.$xy1.'"';
		$result=mysql_query($query,$db);
		$row=mysql_fetch_array($result);
	
	
		if(!empty($row['leng']))
		{

			$ori[]=$row['lori'];
									
			$final=$final.$row['lori'];
			
			$index[]=$j;

		}
	
	
	 
	
	 $non_ascii_pos=strpos($xyz[$j],'&');
	 
	 
	 if($non_ascii_pos===false)
	 {
		 
		 
		 
	
				 if($tmp_txt[$j]=='#')
				 {
					 										
						for($mis23=$j;$mis23<$j+5;$mis23++)
						{
							
								$tmp_txt[$mis23]=NULL;
																						
						}
									
						
						
				 }
													

				 if(ord($tmp_txt[$j])==191 && ord($tmp_txt[$j+1])==196)
				 {
			 
						 $non_ascii_no='191A';
			 
				 }
				 else if($j>0 && ord($tmp_txt[$j-1])==191 && ord($tmp_txt[$j])==196)
				 {
			 
						 $non_ascii_no='196A';			 
			 
				 }
				 else if(ord($tmp_txt[$j])==167 && ord($tmp_txt[$j+1])==196)
				 {
			 
						 $non_ascii_no='167A';
			 
				 }
				 else if($j>0 && ord($tmp_txt[$j-1])==167 && ord($tmp_txt[$j])==196)
				 {
			 
						 $non_ascii_no='196A';			 
			 
				 }				 
				 else
				 {
					 	
							
						$non_ascii_no=ord($tmp_txt[$j]);
		 					
						
				 }
		 
								 				 
				$s2query='SELECT * FROM lsoriya2 WHERE nascii="'.$non_ascii_no.'"';
				$s2result=mysql_query($s2query,$db);
				$s2row=mysql_fetch_array($s2result);
			 
				
				 if(!empty($s2row['nori']))
				 {
			
					$ori[]=$s2row['nori'];
											
					$final=$final.$s2row['nori'];
					
					$index[]=$j;					
		  
				 }
				 
		 
	 }
	 else
	 {
		 
		
		 $str=$j+2;
		 
		 $end=$j+5;
		 
		 $non_ascii_no=NULL;
		 
		 for($non=$str;$non<$end;$non++)
		 {
		 
		 		$non_ascii_no=$non_ascii_no.$xyz[$non];
		 		
				$xyz[$non]=NULL;
		 
		 }
		 		 
		
		$s2query='SELECT * FROM lsoriya2 WHERE nascii="'.$non_ascii_no.'"';
		$s2result=mysql_query($s2query,$db);
		$s2row=mysql_fetch_array($s2result);
			
			
			 if(!empty($s2row['nori']))
			 {
			   
				$ori[]=$s2row['nori'];
						
				$final=$final.$s2row['nori'];
				
				$index[]=$j;				
		 
			 }
			
					
		
		$str=0;
		
		$end=0;
				
	 }

	
}
	


$psum=NULL;

for($t=0;$t<sizeof($ori);$t++)
{
	
	$psum=$psum.$ori[$t];
	
}

?>

<?php


echo '<script language="javascript">
		document.getElementById("exline").innerHTML="'.'<b>Exploding the Text to Line by Line .. </b>'.'";
	  </script>';

flush();

ob_flush();

?>

<?php


 $psum_pos=strpos($psum,' |');
 
 if($psum_pos===false)
 {
	 
	 $psum1=$psum.' |';
	 
 }
 else
 {

	 $psum1=$psum;
	
 }

$line=explode(' |',$psum1);

?>


<?php

	$rdir=$dir;
	
	$rdir=str_replace('Extract','Result',$rdir);  // Creating Result directory for the Extracted directory //

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

$c3=sizeof($line)-1;

echo '<script language="javascript">
		document.getElementById("exline").innerHTML="'.'<b>Total No of Line : </b>'.$c3.','.' <b> Font Name : </b> '.$fontname.'";
	  </script>';

flush();

ob_flush();

$line_size=$c3;

for($l1=0;$l1<sizeof($line)-1;$l1++)
{

$on=$l1+1;
	
echo '<script language="javascript">
		document.getElementById("cleanline").innerHTML="'.'<b>Convetered to Unicode , Line No : </b>'.$on.'/'.$c3.'";
	  </script>';

flush();

ob_flush();		
	
	fwrite($file1,trim($line[$l1]).PHP_EOL);


}

}

?>


