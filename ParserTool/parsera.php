<?php

if(isset($_POST['stop']))
{
	
	
	
	
}
else
{

	$log_dir='C:/wamp/www/ParserTool/Log/Log.txt';	/// Changing the log status into 1 ///
				
	$file1=fopen($log_dir,"w");
	
	$log_id='1';
	
	fwrite($file1,$log_id);
	

  /// Initial Dir.txt status will be 'Directory Scan Not Completed' ///
	
	$extract_dir='C:/wamp/www/ParserTool/Log';
			
	$extract_fname='Dir.txt'; 

	$file1=fopen($extract_dir.'/'.$extract_fname,"w");
	
	$dir_scan='Directory Scan Not Completed';
	
	fwrite($file1,$dir_scan);
	
	
	?>
    
    <div id="pws" style="font-family:calibri; font-size:15px; margin-left:33px; margin-top:20px;"></div>
  
    <?php
		
		
		
			  echo '<script language="javascript">
				    document.getElementById("pws").innerHTML="'.'<b>Please wait scanning the directory .... </b>'.' ";
				    </script>';
					
			     flush();
			
			  ob_flush();
			
			 
	
	$f1=array();
	
	$fdir=array();
	
	$fhost=array();
	
	$fname=array();
	
	$htm_name=array();
				
	$sm=NULL;
	
	$htc=0;

	$nums=0;
	
 
  /// Extracting the Sub-folders from Input Source Directory ///
	
	$dr1=scandir($dir);
	
	foreach($dr1 as $dr)
	{
		
		if($dr!='.' && $dr!='..')
		{
			 			
			if(is_dir($dir.'\\'.$dr))
			{
					
				$f1[]=$dr.'\\\\';       /// Assigning the Sub-directory names into the Array /// 
								
			}
			else
			{
				
				$dr_pos1=strpos($dr,'.htm');
				
				if($dr_pos1===false)
				{
					
					
				}
				else
				{
					
		
		/// Creating separate Array , If the Source directory don't have sub-directory and only having HTML contains ///

					$htm=0;
								
					$htc++;
					
						for($dt=0;$dt<strlen($dr);$dt++)
						{
					
								if(is_numeric($dr[$dt]))  /// HTML Files having alphanumeric names ///
								{
						
 								$htm++;
									
 								
								}
								
					
						}
						
						
					if($htm>0)
					{
					
							$htm_name[]=$dr; /// Assigning the Filenames into an Array ///
 									
							
					}
				
				}
				
				
				
				$dr_pos2=strpos($dr,'.xml');
				
				if($dr_pos2===false)
				{
					
					
				}
				else
				{
					

		/// Creating separate Array , If the Source directory don't have sub-directory and only having XML contains ///
		
		
					$htm=0;
								
					$htc++;
					
						for($dt=0;$dt<strlen($dr);$dt++)
						{
					
								if(is_numeric($dr[$dt]))       /// XML Files having alphanumeric names ///
								{
						
 								$htm++;
									
 								
								}
								
					
						}
						
						
					if($htm>0)
					{
					
							$htm_name[]=$dr;       /// Assigning the Filenames into an Array ///
 									
							
					}
				
				}
				
				
				
			}
 										
		}
		 
	}
	
	$to=0; 

	$tot=0;
	
	$sz=1;
  
  
  
  if(sizeof($htm_name)>0)
  {
  	
	 natsort($htm_name);        /// Sorting the Filenames in Natural Sorting Order ///
	 
	 $fname[]=$htm_name;
	 
	 $txt1=$dir;
	 
	 $txt1=str_replace('C:\wamp\www\\','http://localhost/',$txt1);   
 								
	 $txt1=str_replace('\\','/',$txt1); 								 								
 								
	 $fhost[]=$txt1;  /// Creating  Host URL for the Sub-directory ///
	 
	 $dir12=$dir;
	 
	 $dir12=str_replace('C:\wamp\www\\','',$dir12);
	 
	 $fdir[]='';
	 
	 $fdir_log=1;
	 
  }
  
  $nat=0;
  
  if($htc>0 && sizeof($htm_name)==0)
  {
  
  		$nat++;
  
  }



if(sizeof($f1)>0)
{
	
 			  echo '<script language="javascript">
				    document.getElementById("pws").innerHTML="'.'<b>Sub directory found.... </b>'.' ";
				    </script>';
			
			flush();
			
			ob_flush();
	
}


 set_time_limit(3000);	
			
			
?>

<div id="directory" style="font-family:calibri; font-size:15px; margin-left:33px; margin-top:20px;"></div>
  

<?php			
			
	$size=0;		
	
  //// Searching for total Sub-directories from the Input Source directory ////	
		
	for($i=0;$i<sizeof($f1);$i++)
	{
		 			 
		
		$f1_pos=strpos($f1[$i],'.htm');
		
		if($f1_pos===false)
		{			
		 	
			if(is_dir($dir.'\\'.$f1[$i].'\\'))
			{
					
				 $f1dir=scandir($dir.'\\'.$f1[$i]);	
				
				 $size=sizeof($f1dir);	
	
	 
			}
	
		}
		else
		{
		
			$size=0;    
		
		}
		
		
		
		$f2_pos=strpos($f1[$i],'.xml');
		
		if($f2_pos===false)
		{
			
		 	
			if(is_dir($dir.'\\'.$f1[$i].'\\'))
			{
					
				 $f1dir=scandir($dir.'\\'.$f1[$i]);
				
				 $size=sizeof($f1dir);	
	
	 
			}
	
		}
		else
		{
		
			$size=0;
		
		}
		
		
		
	if($size>2)
	{
		
		 
		 $tot++;
		 
		 $sbd=$f1[$i];
		 
		 $sbd=str_replace('\\','\\\\',$sbd);
		 
		 $sbd=str_replace('\\\\','\\',$sbd);		 
		
		// echo $dir.'\\'.$f1[$i];
				
		// echo '<br>';
		

   /// Finding the Total no of Sub-directory found and Sub-directory names ///

		echo '<script language="javascript">
   			  document.getElementById("directory").innerHTML="'.'<b>Directory - '.$tot.' </b> : '.$sbd.' ";
		      </script>';
				 
		 flush();
		 
		 ob_flush();
		 		 
		 
		 foreach($f1dir as $fd)
		 {
		 	
			if($fd!='.' && $fd!='..')
			{
				
				
				
				//	echo $dir.'\\'.$f1[$i].' -- '.$fd;
					
				//	echo '<br>';
							
				$text=$fd;
			
				$image_src=$dir.$f1[$i].'\\';				
			
				if(strpos($text,'.jpeg')==true)
				{					 							
				}
				else if(strpos($text,'.JPEG')==true)
				{					
				}				
				else if(strpos($text,'.jpg')==true)
				{					
				}
				else if(strpos($text,'.JPG')==true)
				{ 										
				}
				else if(strpos($text,'.gif')==true)
				{				
				}
				else if(strpos($text,'.GIF')==true)
				{				
				}
				else if(strpos($text,'.png')==true)
				{					
				}
				else if(strpos($text,'.PNG')==true)
				{					
				}				
				else
				{
				
					$sum=$f1[$i].'\\'.$fd.'\\';
 											
					$f1[]=$sum;						
				
				}
 										
	
	
	
	
					
			

				$fd_pos1=strpos($fd,".htm");
				
				if($fd_pos1===false)
				{
					
					

				}
				else
				{
					 
									
					if(is_dir($dir.'\\'.$f1[$i].'\\'))
					{
					
						$f3[]=$f1[$i];
 										
						$f2[]=strtolower($fd);
						
					/// Lowercasing each html files by rename the files ///						
					
						rename($dir.'\\'.$f1[$i].'\\'.$fd,$dir.'\\'.$f1[$i].'\\'.strtolower($fd));
						
					}
					
				}
				
				
				$fd_pos2=strpos($fd,".HTM");
				
				if($fd_pos2===false)
				{
							
						
					
				}
				else
				{
					
					 	
				
					if(is_dir($dir.'\\'.$f1[$i].'\\'))
					{
					
						$f3[]=$f1[$i];
 										
						$f2[]=strtolower($fd);
						
					/// Lowercasing each HTML files by rename the files ///						
					
						rename($dir.'\\'.$f1[$i].'\\'.$fd,$dir.'\\'.$f1[$i].'\\'.strtolower($fd));					
						
					}
					
 								
				}
				
				
				$fd_pos3=strpos($fd,".xml");
				
				if($fd_pos3===false)
				{
							
						
					
				}
				else
				{
					
					 	
				
					if(is_dir($dir.'\\'.$f1[$i].'\\'))
					{
					
						$f3[]=$f1[$i];
 										
						$f2[]=strtolower($fd);
					
					/// Lowercasing each XML files by rename the files ///
					
						rename($dir.'\\'.$f1[$i].'\\'.$fd,$dir.'\\'.$f1[$i].'\\'.strtolower($fd));					
						
					}
					
 								
				}
				
				
				
				$fd_pos4=strpos($fd,".XML");
				
				if($fd_pos4===false)
				{
							
						
					
				}
				else
				{
					
					 	
				
					if(is_dir($dir.'\\'.$f1[$i].'\\'))
					{
					
						$f3[]=$f1[$i];
 										
						$f2[]=strtolower($fd);
					
					/// Lowercasing each XML files by rename the files ///
					
						rename($dir.'\\'.$f1[$i].'\\'.$fd,$dir.'\\'.$f1[$i].'\\'.strtolower($fd));					
						
					}
					
 								
				}
				
				
								
					
				
			}
			
			
		 }

	  }
		

						if(!empty($f2))
						{
		
 								$nums++;
 								
 								$txt1=$dir.'\\';
 								
 								$txt2=$f3[0];
 								
 								$txt1=str_replace('C:\wamp\www\\','http://localhost/',$txt1);
 								
 								$txt1=str_replace('\\','/',$txt1);
 								
 								$txt2=str_replace('\\','/',$txt2);
 								
 								$nos=$nums+1;
 								
 								$host=$txt1.$txt2;
 								
 								$fhost[]=$host;  /// Adding Host URL for the HTML and XML files to the array ///
 														
 								$fdir[]=$f3[0];
 								
 								$int1=0;
	
 								$int=0;
	
 								$file_name=array();

 								for($zx=0;$zx<sizeof($f2);$zx++)
 								{
				 
 										$key=$f2[$zx];
			
 										for($zx1=0;$zx1<strlen($key);$zx1++)
 										{
				 
				
 												if(is_numeric($key[$zx1]))
 												{
						
 														$int++;
						
 												}
			
 										}
			
			
 											if($int>0)
 											{
		
 											   $file_name[]=$f2[$zx]; /// Adding to the Filenames for HTML Parsing ///
 											
 											}
											
			
 											$int=0;
			
				
 								}
	
		
							natsort($file_name);  /// Sorting the Filenames by Natural Sorting Order ///
							
							$fname[]=$file_name;
	
	
		$sm=NULL;
		
		$f3=NULL;
		
		$f2=NULL;
		
	}	

	}



		$wt=0;
		
		$wb=0;

?>

<div id="sdf" style="font-family:calibri; font-size:15px; margin-left:33px; margin-top:15px;"></div>
  

<?php

    /// Finalizing total Sub-directory having Webpages ///
	
			  echo '<script language="javascript">
				    document.getElementById("sdf").innerHTML="'.'Total <b>'.sizeof($fname).'</b> Sub-directory having Webpages'.' ";
				    </script>';
	
?>



<?php

if($tmp_no==1)
{
	
		$extract_dir='C:/wamp/www/ParserTool/Log';
			
		$extract_fname='Dir.txt';

		$file1=fopen($extract_dir.'/'.$extract_fname,"w");

		for($y=0;$y<sizeof($fdir);$y++)
		{

			$extract_sum=$dir.'*'.$fdir[$y].PHP_EOL;  	//// Listing out Sub-directory names in Dir.txt file  ////
	
			fwrite($file1,$extract_sum);
						

		}

}
	

?>

<div style="margin-top:24px;">

 <div id="wes" style="margin-left:30px; background-color:#300; color:#FFF; font-family:calibri; font-size:14px; width:200px; height:25px;">
 
 </div>


<?php

 /// HTML Paring Begins ///

echo '<script language="javascript">
     document.getElementById("wes").innerHTML="'.'&nbsp;2 . HTML Parsing begins ....  '.'"
    </script>';


?>




  
  <div id="cur" style="font-family:calibri; font-size:15px; margin-left:33px; margin-top:15px;"></div>

  <div id="extr" style="font-family:calibri; font-size:15px; margin-left:33px; margin-top:15px;"></div>

  <div id="pw" style="font-family:calibri; font-size:15px; margin-left:33px; margin-top:15px;"></div>


<?php

	$valid=0;
	
	$parsed_sum=NULL;
	
	$td=0;
	
	$tw1=0;
	
	$tw2=0;
	
	$store=array();
		
			
	unlink('C:\wamp\www\ParserTool\Log\Recent.txt');
	

  // Writting the Extracted Source directory name into a text file for further reference //
	
	$file3=fopen('C:\wamp\www\ParserTool\Log\Recent.txt',"w");
	
	$recent_result=$result.$result_dir;
	
	fwrite($file3,$recent_result);

	//unlink('C:\wamp\www\ParserTool\Log\\'.$result_dir.'\\'.'ExtractedList.txt');

		$file12=fopen($recent_result.'\\'.'CurrentExtract.txt',"w");
	

		$store[0]=0;
		
	//	echo 'Sizeof Fname: '.sizeof($fname).' ';
		
	//	echo '<br>';
		
	//	print_r($fname);
		
	//	echo '<br>';



				
 //// Parsing Begins ////				
				
				
		
 for($xy=0;$xy<sizeof($fname);$xy++)
 {
				
	$host_pos=strpos($fhost[$xy],'http://localhost/');
	
	if($host_pos===false)
	{
		
?>		
	
<div>
    
	<p  style="margin-left:30px; font-family:calibri; font-size:14px; width:500px; height:25px; margin-top:10px;">
  &nbsp;&nbsp;<b>Extractor Directory has to located in C:\wamp\www  <br /><br /> &nbsp;&nbsp;Parsing Result : No Extractor Host Found</b></p>
  
    
    </div>    	
        
        	 

<?php

		break;
		
		
	}
	else
	{
		
				
			$ces=$fdir[$xy];
			
			$ces=str_replace('\\','\\\\',$ces);
			
			$ces=str_replace('\\\\','\\',$ces);
			
			$ces=str_replace('\\\\\\','\\',$ces);
	
	 
			echo '<script language="javascript">
			 	  document.getElementById("extr").innerHTML="'.'<b>Current Extracting Directory :  </b>'.$fdir[$xy].' ";
			     </script>';

				flush();
			    
				ob_flush();

			$wt++;	
			
			$tw1=0;

			foreach($fname[$xy] as $fn1)
			{
								
				    $tw1++;
					
			}
			
			
			
			foreach($fname[$xy] as $fn2)
			{
				
				$tw2++;
				
				$valid++;
				
				$indx=0;
				
				$tx=0;
				
				$parser_url=$fhost[$xy].'/'.$fn2;	 /// Creating Host URL for Parsing ///								

				include 'parserb.php';  /// HTML Parser API ///
			
				$wb++;
				
				 echo '<script language="javascript">
		document.getElementById("pw").innerHTML="'.'<b>Extracting Directory No - '.$wt.' </b> , <b>Parsing Webpages : </b>'.$fn2.' , <b>Parsed Webpages</b> '.$tw2.'/'.$tw1.'";
				    </script>';

				flush();
				    
				ob_flush();
				
				
				/// ExtractedList.txt : Creating Extraction Status for Current Input Source Directory /// 				
				
						if($tw1==$tw2)
						{
	
								$isd1=$isd.PHP_EOL;

								$tde=$wt.PHP_EOL;
	
								$twp=$wb.PHP_EOL;
		
								$extdir1=$extdir.PHP_EOL;
		
								$result_sum=$isd1.$tde.$twp.$extdir1;
	
								$file2=fopen($result.$result_dir.'\\'.'ExtractedList.txt',"w");
			
								fwrite($file2,$result_sum);
	
						}
						else if($tw1!=$tw2 && $wt==1)
						{
								
								$wt2=$wt-1;
							
								$tw3=$tw1-$tw2;
								
								$isd1=$isd.PHP_EOL;

								$tde='Not Completed'.PHP_EOL;
	
								$twp=$tw2.' / '.$tw1.PHP_EOL;
		
								$extdir1='No Extracted Directory Created'.PHP_EOL;
		
								$result_sum=$isd1.$tde.$twp.$extdir1;
	
								$file2=fopen($result.$result_dir.'\\'.'ExtractedList.txt',"w");
			
								fwrite($file2,$result_sum);							


								$file3=fopen('C:\wamp\www\ParserTool\Log\UnicodeLog.txt',"w");
			
								$logno=1;
								
								fwrite($file3,$logno);

						}						 
						else if($tw1==$tw2 && $wt==1)
						{
	
								$isd1=$isd.PHP_EOL;

								$tde=$wt.PHP_EOL;
	
								$twp=$wb.PHP_EOL;
		
								$extdir1=$extdir.PHP_EOL;
		
								$result_sum=$isd1.$tde.$twp.$extdir1;
	
								$file2=fopen($result.$result_dir.'\\'.'ExtractedList.txt',"w");
			
								fwrite($file2,$result_sum);

						}
							
			}
			
			$store=NULL;
			
			$store[]=$wb;
				
			
			
	///  Creating  History File ///
	
	
 $hisfile='C:\wamp\www\ParserTool\History';

 if(file_exists($hisfile.'\\'.$newfld1[sizeof($newfld1)-1].'\\'.'History.txt'))
 {
	
	$hsf=fopen($hisfile.'\\'.$newfld1[sizeof($newfld1)-1].'\\'.'History.txt',"w");
			   
	for($xy1=$wt;$xy1<sizeof($fdir);$xy1++)
	{
	
		fwrite($hsf,$fdir[$xy1].PHP_EOL);
	
	}
	
	fclose($hsf);
	
 
	if($wt==sizeof($fdir))
	{
		
		unlink($hisfile.'\\'.$newfld1[sizeof($newfld1)-1].'\\'.'History.txt');
		
		rmdir($hisfile.'\\'.$newfld1[sizeof($newfld1)-1]);
		
	}

}


/*
	
	$d1=$hisfile.'\\'.$newfld1[sizeof($newfld1)-1].'\\'.'History.txt';
	
	$d2=$hisfile.'\\'.$newfld1[sizeof($newfld1)-1].'\\'.'Result-1.txt';
	
	if(is_dir($d2))
	{
	
		unlink($hisfile.'\\'.$newfld1[sizeof($newfld1)-1].'\\'.'History.txt');
		
		rmdir($hisfile.'\\'.$newfld1[sizeof($newfld1)-1]);	
		
	}
	
*/	



	 /// Creating Directory &  Results Textfiles ///				
		
									
		$newfolder=$fdir[$xy];
					
		$newfilename='Result-'.$wt.'.txt';
		
		$extract_result=$parsed_sum;
		
		$folder=$extdir.'\\'.$newfolder;	
				
		$folder_sum2=$extdir;
		
		$newfld2=explode('\\',$newfolder);
				
		for($nf2=0;$nf2<sizeof($newfld2);$nf2++)
		{
    					
			if(!empty($newfld2[$nf2]))
			{
			
		
				//	echo $nf2.' -- '.$newfld2[$nf2];
				
	    	   //	echo '<br>';
			
  				if(!file_exists($folder_sum2.'\\'.$newfld2[$nf2]))
				{
					
					// 	echo $folder_sum2.'\\'.$newfld2[$nf2];
					
				   //	echo '<br>';
				
					mkdir($folder_sum2.'\\'.$newfld2[$nf2]);
				
				}
									
				$folder_sum2=$folder_sum2.'\\'.$newfld2[$nf2];
		
			}
			
		}

	
	
	/// Extarcted Result //
	
	
	if($valid>0 && $tw1==$tw2)
	{
				
		$extract_dir=$extdir.'\\'.$newfolder.'\\'.$newfilename;		
		
		$file1=fopen($extract_dir,"w");
 								
		fwrite($file1,$extract_result);
		
	
	}
	
	
	if(!empty($fdir[$wt-1]))
	{
		
		$fdir[$wt-1]=str_replace('\\\\\\','\\',$fdir[$wt-1]);
		
		$fdir[$wt-1]=str_replace('\\\\','\\',$fdir[$wt-1]);
		
		$name=$fdir[$wt-1].PHP_EOL;
				
		fwrite($file12,$name);
	
	}
	else if($fdir_log==1)
	{
		
			fwrite($file12,$result_dir);
		
	}
	
	
	echo '<script language="javascript">
		  document.getElementById("cur").innerHTML="'.'<b> Total Directory Extracted :  </b>'.$wt.'/'.sizeof($fname).'"
		  document.getElementById("nm").value="'.$xy.'";
	     </script>';	
	
	
		$tw1=0;
			
		$tw2=0;
			
		$parsed_sum=NULL;		
		
		$folder_sum1=NULL;
				
		$folder_sum2=NULL;
		
		$newfolder=NULL;
		
		$newfld=NULL;
		
		$sm=NULL;
			
		
		}
		
 }
		
	
		
?>

</div>

<?php		
		
	$log_dir='C:\wamp\www\ParserTool\Log\Log.txt';
				
	$file1=fopen($log_dir,"w");
	
	$log_id='2'; /// Log value is 2 means all Extraction over ///
	
	fwrite($file1,$log_id);
	
?>


<?php


 if($valid>0)
 {

	

?>


	<div align="center">
    
	<p  style="background-color:#C00; color:#FFF; margin-left:-100px; font-family:calibri; font-size:14px; width:300px; height:25px; margin-top:80px;">
  &nbsp;&nbsp;All Webpages Extracted Succesfully </p>

    
    </div>
    
<?php

 }
 else if($nat>0)
 {

?>


 <div align="center">
    
	<p  style="background-color:#C00; color:#FFF; margin-left:-100px; font-family:calibri; font-size:14px; width:300px; height:25px; margin-top:50px;">
  &nbsp;&nbsp;Files are not in Natural Sorted Order </p>

    
    </div>


<?php

 }
 else
 {
 
?> 
 
 
 <div align="center">
    
	<p  style="background-color:#900; color:#FFF; margin-left:-100px; font-family:calibri; font-size:14px; width:300px; height:25px; margin-top:50px;">
  &nbsp;&nbsp;No Result Found </p>

    
    </div>
 
<?php

 }
 
}
 
?>
 
