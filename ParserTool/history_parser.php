<h1 style="font-family:calibri; font-size:20px; margin-left:-8px; margin-top:-10px; background-color:#030; color:#FFF; width:810px;  height:30px;" align="center"> Extracting History Log </h1>


<?php

if(isset($_POST['stop']))   /// Taking the request from the User to Stop the Extraction Process ///
{
	
 
	$result='C:\wamp\www\ParserTool\Log\\';
	
	$result_dir=$_POST['his_name'];
	
	$folder_sum1=$_POST['dr'];

	$folder_sum1=str_replace('C:\wamp\www\\','',$folder_sum1);
		
	$newfld1=explode('\\',$folder_sum1);		

	
	$log_dir='C:\wamp\www\ParserTool\Log\Log.txt';
				
	$file1=fopen($log_dir,"w");
	
	$log_id='2';    /// Log value is 2 means all Extraction over ///

	fwrite($file1,$log_id);
	
	
	$his_count=0; /// Changing the HisLog status into 0 ///
	
	$file1='C:\wamp\www\ParserTool\Log\HisLog.txt';
		
	$file123=fopen($file1,"w");
		
	fwrite($file123,$his_count);	
	
	
/// Writting the Current Extracted directory name into Recent.txt for further reference ///	
	
	$recent_dir='C:\wamp\www\ParserTool\Log\Recent.txt';
	
	$recent_data='C:\wamp\www\ParserTool\Log\\'.$result_dir;
	
	$file12=fopen($recent_dir,"w");
	
	fwrite($file12,$recent_data);

	$details1=array();
	
	$details2=array();	
	
		
    $file1='C:\wamp\www\ParserTool\Log\\'.$result_dir.'\\'.'ExtractedList.txt';

	$f = fopen($file1, "r");	
									
	while ($dt = fgets($f, 1000)) 
	{
		 
	 	$details1[]=$dt;    /// Adding all the Extracted status for the Current Input source directory into an Array ///        
		 
	}

 	$count=0;
	
	$file2='C:\wamp\www\ParserTool\Log\\'.'Dir.txt';

	$f2 = fopen($file2, "r");	
									
	while ($ft = fgets($f2, 1000)) 
	{
		
		 $count++;
		
		 $details2[]=$ft;    /// Reading all the Sub-Directory list for the Input Source directory ///         
					 
	}
	
	
/// $details1[1] : Total number Sub-directory has been Extracted ///	
	
	$numvalue=trim($details1[1]);
	
	if(intval($numvalue)>0)   /// Intval will check the value is integer or not ///
	{
		$st=$numvalue;
	
	}
	else
	{
		
		$st=0;
		
	}
	
	$en=$count;  // Total Number Scanned Sub-directory //

?>

<?php

if($st<$en)
{
	
?>

	<p style="font-family:calibri; font-size:15px; margin-left:168px; margin-top:10px; background-color:#930; color:#FFF; width:410px;  height:30px;" align="center">
    	    	Exracting Interrupted

	</p>

<?php

}

?>

<?php
	
   if($st==$en)
   {
   
?>   

	<p style="font-family:calibri; font-size:15px; margin-left:168px; margin-top:10px; background-color:#030; color:#FFF; width:410px;  height:30px;" align="center">
    
    	    	Exraction Completed

	</p>

   
  
<?php 
   
   } 

?>


<?php


	if($st<$en && $details2[0]!='Directory Scan Not Completed')
	{
	
		if(!file_exists('C:\wamp\www\ParserTool\History\\'.$result_dir))
		{
						
			mkdir('C:\wamp\www\ParserTool\History\\'.$result_dir);
	
		}
		
		$his_dir='C:\wamp\www\ParserTool\History\\'.$result_dir;

		$his_data='History.txt';	
		
		$hisfile=fopen($his_dir.'\\'.$his_data,"w");
			
		for($i=$st;$i<$en;$i++)
		{
			
			fwrite($hisfile,$details2[$i]);  // Creating History directory list for Un-completed Sub-directory //
		
		}
		
		fclose($hisfile);
?>		
	        
        <p style="margin-left:40px; font-size:15px; font-family:calibri;">
        
        	<b>Total Directory Extracted : </b><?php echo $st.' / '.$en; ?>
        
        </p> 
        
        <p style="margin-left:40px; font-size:15px; font-family:calibri;">
        
			<b> Folders Remains to Extract : </b><?php echo $en-$st; ?>
        
        </p>
        
        <p align="center" style="font-size:15px; font-family:calibri;">
        
        
        	<b> User can extract the remaining folders by opening the History Panel</b>
        
                
        </p>
        
    	

<?php		
		
	
	}
	else if($details2[0]!='Directory Scan Not Completed' && $st!=$en)
	{
		
		$ini=0;
	
	?>
		 
          <p style="margin-left:40px; font-size:15px; font-family:calibri;">
        
        	<b>Total Directory Extracted : </b><?php echo $ini.' / '.$en; ?>
        
        </p> 
        
        <p style="margin-left:40px; font-size:15px; font-family:calibri;">
        
			<b> Folders Remains to Extract : </b><?php echo $en; ?>
        
        </p>
        
        <p align="center" style="font-size:15px; font-family:calibri;">
        
        
        	<b> User can extract the remaining folders by opening the History Panel</b>
        
                
        </p>
         
	
    <?php
    
	}
	else if($details2[0]=='Directory Scan Not Completed')
	{
		
	?>	
		
	
    <p style="font-size:15px; font-family:calibri; margin-left:50px; margin-top:40px;">
        
        	<b> Directory Scanning Not Completed .....</b>
                
    </p>
    	
	<?php
    	
	}
	
	?>

<?php

	if($st<$en && $details2[0]!='Directory Scan Not Completed')
	{        
     
?>

	<p style="margin-left:40px; font-family:calibri; font-size:15px;">
    
    <b>History Log</b>
    
    </p>
    
	<div style="margin-left:40px; font-family:calibri; font-size:15px;">
	
<?php	 

	$c=1;
	 
		for($i=$st;$i<$en;$i++)
		{
			
			$i1=$c++;
			
			$details2[$i]=str_replace('\\\\\\','\\',$details2[$i]);
			
			$details2[$i]=str_replace('\\\\','\\',$details2[$i]);
			
			$details2[$i]=str_replace('*','\\',$details2[$i]);
			
			echo $i1.' . '.$details2[$i];
			
			echo '<br>';
			
			
		}
				    	
	}
		
?>

	</div>
    
<?php
	
   if($st==$en)
   {


		$his_dir='C:\wamp\www\ParserTool\History\\'.$result_dir;

		$his_data='History.txt';	
	   		
		if(file_exists($his_dir.'\\'.$his_data))
		{
		
			unlink($his_dir.'\\'.$his_data);
   			
			rmdir($his_dir);
			
		}
?>

	<p  align="center" style="font-family:calibri; font-size:15px;">
    
	    All Folders has been extracted succesfully , No need to create <b>History Log</b> for this directory
    
    </p>
 

<?php

   }
    
		
	$count=0;

	exit(0);
	
}
else if(isset($_POST['his']))  /// Accepting the Source directory name to extract the Text ///
{


	$result='C:\wamp\www\ParserTool\Log\\';  
	
	$result_dir=$_POST['his_name'];
	
	$tmp_no=1;
	
	
	$log_dir='C:\wamp\www\ParserTool\Log\Log.txt'; /// Changing the log status into 1 ///
				
	$file1=fopen($log_dir,"w");
	
	$log_id='1';
	
	fwrite($file1,$log_id);
	
	
/// Initial Dir.txt status will be 'Directory Scan Not Completed' ///	
	
	$extract_dir='D:/wamp/www/Odia Tools/HTML Parser Tool/Log';
			
	$extract_fname='Dir.txt';

	$file1=fopen($extract_dir.'/'.$extract_fname,"w");
	
	$dir_scan='Directory Scan Not Completed';
	
	fwrite($file1,$dir_scan);
	
	
	$extdir='C:\wamp\www\ParserTool\Extract\\'.$result_dir; 
		
 	if(!file_exists($extdir))
 	{
			
 		mkdir($extdir);	 // Creating Extracted Directory for Input Source Directory //
			
 	}
	
	
	if(!file_exists($result.$result_dir))
	{
		
		mkdir($result.$result_dir);  // Creating Log directory for Input Source Directory //
	
	}
	
	?>
      
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


	$nums=0;
	
	$dir=$_POST['his'];
	
	$isd=$dir;
	
	$isd=str_replace('\\','\\\\',$isd);	
		
	$sb_dir=$_POST['sub_dir'];	
	
	foreach($sb_dir as $sr)
	{
		
		$f1[]=trim($sr);	// Assigning the Sub-directory names into the Array //
		
	}
	
	$to=0; 

	$tot=0;
	
	$sz=1;
  
  		
	set_time_limit(3000);	
			
			
?>

<script>
 
	function button1() 
	{
		 		
		document.forms["form1"].submit();
			  	
		return true;
     
	}
	
</script>	

<table width="800" border="0" style="margin-top:0px;">


<tr>

<td>

<p style="background-color:#333; color:#FFF; font-family:calibri; font-size:14px; width:200px; height:25px;">
  &nbsp;&nbsp;1 . Extracting the Input directory </p>



</td>

</tr>

<tr>

<td align="left" valign="top">

<div id="isd" style=" font-family:calibri; font-size:14px;"><b>Input Source Directory : </b><?php echo $dir; ?></div>

<div id="directory" style="font-family:calibri; font-size:14px;  margin-top:10px;"></div>

<div id="sdf" style="font-family:calibri; font-size:14px;  margin-top:15px;"></div>
  
</td>

</tr>

<tr>

<td height="15">

</td>

</tr>


<tr>

<td>

<div id="wes" style="background-color:#300; color:#FFF; font-family:calibri; font-size:14px; width:200px; height:25px;"></div> 

</td>

</tr>

<tr>

<td align="left" valign="top">

  <div id="cur" style="font-family:calibri; font-size:14px;"></div>

  <div id="extr" style="font-family:calibri; font-size:14px;margin-top:15px;"></div>

  <div id="pw1" style="font-family:calibri; font-size:14px;margin-top:15px;"></div>
  
  <div id="pw2" style="font-family:calibri; font-size:14px;margin-top:15px;"></div>
  
  <div id="pw3" style="font-family:calibri; font-size:14px;margin-top:15px;"></div>

</td>

</tr>

</table>

<form action="history_parser.php" method="post" id="form1">
<input type="hidden" name="dr" value="<?php echo $dir; ?>" />
<input type="hidden" name="his_name" value="<?php echo $result_dir; ?>" />
<input type="hidden" name="stop" value="" />

</form>



<input type="button" value="Stop Extracting" name="stop"  style="width:100px; height:30px; background-color:#F00; color:#FFF; margin-top:-305px; position:fixed; margin-left:470px;" onclick="javascript:button1();"/>




<?php			
			
	$size=0;		
	
  //// Searching for total Sub-directories from the Input Source directory ////		
		
	for($i=0;$i<sizeof($f1);$i++)
	{
		 			 
				
		$f1_pos=strpos($f1[$i],'.htm');
		
		if($f1_pos===false)
		{
			
		 			
			if(is_dir($dir.'\\'.trim($f1[$i])))
			{
					
				 $f1dir=scandir($dir.'\\'.trim($f1[$i]));
				
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
			
		 			
			if(is_dir($dir.'\\'.trim($f1[$i])))
			{
					
				 $f1dir=scandir($dir.'\\'.trim($f1[$i]));
				
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
		 
		 
   /// Finding the Total no Sub-directory found and Sub-directory names ///		 

		echo '<script language="javascript">
			  document.getElementById("directory").innerHTML="'.'<b>Directory - '.$tot.' </b> : '.$sbd.' ";
		    </script>';
		
		// echo $dir.'\\'.$f1[$i];
				
		// echo '<br>';
		 
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
							
						/// Lowercasing each html files by rename the files ///						
					
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
						
						/// Lowercasing each html files by rename the files ///						
					
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
						
						/// Lowercasing each html files by rename the files ///						
					
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
		
											$file_name[]=$f2[$zx];  /// Adding to the Filenames for HTML Parsing ///
						
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


  

<?php
	
	
			/// Finalizing total Sub-directory having Webpages ///
	
			  echo '<script language="javascript">
				    document.getElementById("sdf").innerHTML="'.'Total <b>'.sizeof($fname).'</b> Sub-directory having Webpages'.' ";
				    </script>';
	
?>




<?php

if($tmp_no==1)
{
	
		$extract_dir='D:/wamp/www/Odia Tools/HTML Parser Tool/Log';
			
		$extract_fname='Dir.txt';

		$file1=fopen($extract_dir.'/'.$extract_fname,"w");

		for($y=0;$y<sizeof($fdir);$y++)
		{

			$extract_sum=$dir.'*'.$fdir[$y].PHP_EOL;   //// Listing out Sub-directory names in Dir.txt file  ////
	
			fwrite($file1,$extract_sum);

		}

}
	

?>

<div style="margin-top:24px;">

<?php

/// HTML Paring Begins ///

echo '<script language="javascript">
     document.getElementById("wes").innerHTML="'.'&nbsp;2 . HTML Parsing begins ....  '.'"
     </script>';


?>



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

		$fileap=fopen($recent_result.'\\'.'CurrentExtract.txt',"a");

		$store[0]=0;

		for($xy=0;$xy<sizeof($fname);$xy++)
		{
				
	
			$host_pos=strpos($fhost[$xy],'http://localhost/');
	
			if($host_pos===false)
			{
		
			?>		
	
				<div>
    
				<p  style="margin-left:30px; font-family:calibri; font-size:14px; width:500px; height:25px; margin-top:10px;">
  &nbsp;&nbsp;<b>Extractor Directory has to located in C:\wamp\www  <br /><br /> &nbsp;&nbsp;Parsing Result : No Extractor Host Found									                </b></p>
  
    
			    </div>    	

			<?php

					break;
				
	}
	else
	{	
	
			$ces=$fdir[$xy];
			
			$ces=str_replace('\\','\\\\',$ces);
						 
	 
			echo '<script language="javascript">
			 	 document.getElementById("extr").innerHTML="'.'<b>Current Extracting Directory :  </b>'.$ces.' ";
			    </script>';

				flush();
			    
				ob_flush();

			$wt++;	

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
				
				$parser_url=$fhost[$xy].'/'.$fn2;	/// Creating Host URL for Parsing ///								

				include 'parserb.php';  /// HTML Parser API ///
			
				$wb++;
				
				 echo '<script language="javascript">
					document.getElementById("pw1").innerHTML="'.'<b>Extracting Directory No - '.$wt.' </b>'.'";
				    </script>';

				flush();
				    
				ob_flush();
				
				
		echo '<script language="javascript">
			  document.getElementById("pw2").innerHTML="'.'<b>Parsing Webpages : </b>'.$fn2.'";
			 </script>';

				flush();
				    
				ob_flush();
				
				
		echo '<script language="javascript">
				document.getElementById("pw3").innerHTML="'.'<b>Parsed Webpages</b> '.$tw2.'/'.$tw1.'";
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
			
  				if(!file_exists($folder_sum2.'\\'.$newfld2[$nf2]))
				{
				
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
	
	
	
	if($wt==sizeof($fname))
	{
		
		$his_dir='C:\wamp\www\ParserTool\History\\'.$result_dir;

		$his_data='History.txt';	
	   		
		if(file_exists($his_dir.'\\'.$his_data))
		{
		
			unlink($his_dir.'\\'.$his_data);
   			
			rmdir($his_dir);
			
		}
		
		
		
				
		
	}
	
	
	
	if(!empty($fdir[$wt-1]))
	{
		
		$fdir[$wt-1]=str_replace('\\\\\\','\\',$fdir[$wt-1]);
		
		$fdir[$wt-1]=str_replace('\\\\','\\',$fdir[$wt-1]);
		
		$name=$fdir[$wt-1].PHP_EOL;
				
		fwrite($fileap,$name);
	
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


<a href="his_result.php" target="history" style="text-decoration:none;">

<input type="button" name="but" value="Convert To Unicode" style="background-color:#003; color:#FFF; margin-left:200px; font-family:calibri; font-size:14px; width:200px; height:25px; margin-top:50px;" />

</a>



<?php		
		
	$log_dir='C:\wamp\www\ParserTool\Log\Log.txt';
				
	$file1=fopen($log_dir,"w");
	
	$log_id='2';   /// Log value is 2 means all Extraction over ///
	
	fwrite($file1,$log_id);
	
?>


<?php


 if($valid>0)
 {

		$his_count=0;
	
		$file1='C:\wamp\www\ParserTool\Log\HisLog.txt';
		
		$file123=fopen($file1,"w");
		
		fwrite($file123,$his_count);

?>


	<div align="center">
    
	<p  style="background-color:#C00; color:#FFF; margin-left:-100px; font-family:calibri; font-size:14px; width:300px; height:25px; margin-top:40px;">
  &nbsp;&nbsp;All Webpages Extracted Succesfully </p>

    
    </div>
    
<?php

 }
 else
 {
 
?> 
 
 
 <div align="center">
    
	<p  style="background-color:#060; color:#FFF; margin-left:-100px; font-family:calibri; font-size:14px; width:300px; height:25px; margin-top:50px;">
  &nbsp;&nbsp;No Result Found </p>

    
    </div>
 
<?php

 }
 
}
 
?>
 
