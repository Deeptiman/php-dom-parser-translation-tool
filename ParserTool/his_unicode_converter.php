<title> Unicode Converting Text </title>

<script>
 
	function button1() 
	{
				
		document.forms["form1"].submit();
			  	
		return true;
     
	}
	
</script>

<?php

/// User asked to Convert Rest Sub-directories into Unicode Later ///

if(isset($_POST['fname']))
{

	$num='*';
	
	$_POST['fname']=str_replace('C:\wamp\www\ParserTool','',$_POST['fname']);
	
	$_POST['fname']=str_replace('Extract','',$_POST['fname']);
	
	$_POST['fname']=str_replace('\\\\','\\',$_POST['fname']);
	
	$_POST['fname']=str_replace('\\','',$_POST['fname']);
	
	$filex='C:\wamp\www\ParserTool\Log\\'.$_POST['fname'].'\\'.'UnicodeStatus.txt';

	$f1=fopen($filex,"r");
	
	while($data = fgets($f1, 1000)) 
	{
 	
		$num=$data;   /// Reading the Unicode Conversion result for Extracted Source directory ///
		
	}
	
	
	$new_data=array();
	
	$filey='C:\wamp\www\ParserTool\Log\\'.$_POST['fname'].'\\'.'CurrentExtract.txt';

	$f2=fopen($filey,"r");  /// Reading the total Extracted Sub-directory list ///
	
	while($data = fgets($f2, 1000)) 
	{
 	
			$new_data[]=$data;  /// Adding all the Sub-directory names into an Array ///
									
	}
	 

if($num!='*')
{
		 
	
	$nm=explode('|',$num);
	

if(!empty($nm[0]))
{

	if($nm[0]!=sizeof($new_data))
	{	

		$filez=fopen($filey,"w");	/// Re-writting the CurrenStatus.txt file for the Extracted Source directory ///
		
		
		// $nm[0] : Total number of Sub-directories converted into Unicode //		
	
		for($xy=$nm[0];$xy<sizeof($new_data);$xy++)
		{	
			
				$ndata=$new_data[$xy];
			
				fwrite($filez,$ndata);
					
		}
		
	}

}

if(empty($nm[0]))
{
	
	$nm[0]=sizeof($new_data);

}

?>

<?php 
	
	if($nm[0]<sizeof($new_data))
	{
		
		$query='( Rest Folders can be extacted from <b>Convert Later Log Panel</b> )'; 
	
	}
	else
	{
		
		$query=NULL;
		
	}
	
	
?>


<p style="margin-left:-8px; background-color:#333; color:#FFF; font-family:calibri; font-size:14px; width:200px; height:25px;">
	
    &nbsp;&nbsp;Converstion Result 
 
 </p>

 <p align="left" style="margin-left:-8px; font-family:calibri; font-size:12px;">
 
 	<b>Total Directory Converted to Unicode : </b><?php echo $nm[0].' / '.sizeof($new_data); ?><i style="font-family:calibri; font-size:12px;">&nbsp;&nbsp;<?php echo $query; ?></i>
    
 
 </p>	

 <p align="left" style="margin-left:-8px; font-family:calibri; font-size:12px;">
 
 	<b> Total No of Line Converted to Unicode :&nbsp;</b><?php echo $nm[1]; ?>
 
 </p>
 	

<p style="margin-left:-8px; background-color:#C00; color:#FFF; font-family:calibri; font-size:14px; width:200px; height:25px;">

	&nbsp;&nbsp;Result Directory 

   
   <p style="font-family:calibri; font-size:12px; margin-left:-8px;"> 
   C:\wamp\www\ParserTool\Result\<?php echo $_POST['fname']; ?></p>
   
	</p>    
    
    <a style="text-decoration:none;" href="http://localhost/ParserTool/Result/<?php echo $_POST['fname']; ?>" target="_blank">
    
    <input  type="button" name="but" value="Click here to See the Results" style="margin-left:30px; background-color:#006; color:#FFF; font-family:calibri; font-size:14px; width:200px; height:25px; margin-top:-20px; margin-left:300px;" /> 
       
       </a>

<?php

}
else
{
	
?>	
	
    <p align="center" style="background-color:#360; color:#FFF; font-family:calibri; font-size:14px; width:200px; height:25px; margin-top:80px; margin-left:220px;">
	
    &nbsp;&nbsp;Converstion Interupted
 
 </p>

<center>

<b style="font-family:calibri; font-size:15px; margin-top:20px;"> No Result Directory Created </b>	
	
</center>    
    
<?php    
    
}



}
else if(isset($_POST['exdir']) && isset($_POST['nodir']))
{
	
if($_POST['nodir']!='No Extracted Directory Created' && $_POST['nodir']!='Not Created')
{

	$dir=$_POST['exdir'];

	if(isset($_POST['sarala']))
	{
		
		$fontname='Sarala';
		
		$fontdir='sarala.php';
		
	}
	
	
	if(isset($_POST['akruti']))
	{
		
		$fontname='Akruti';
		
		$fontdir='akruti.php';
		
	}
	

	if(isset($_POST['lsodia']))
	{
		
		$fontname='LSOdia';
		
		$fontdir='lsodia.php';
		
	}
	
	
	if(isset($_POST['save']))
	{
		
		$fontname='Misc.';
		
		$fontdir='misc.php';
		
	}	



	$isd=$dir;
					
	$isd=str_replace('\\','\\\\',$isd);
		
	$log_dir='C:\wamp\www\ParserTool\Log\Log.txt';
				
	$file1=fopen($log_dir,"w");
	
	$log_id='1';
	
	fwrite($file1,$log_id);
	
	?>
    
  
    <?php
								 
	
	$f1=array();
	
	$fdir=array();
	
	$fhost=array();
	
	$fname=array();
	
	$txt_name=array();
	
	$htm_name=array();
				
	$sm=NULL;


	$nums=0;

	/// Listing out the Extracted Directory names into an Array ///
 
 
	$dr1=scandir($dir);
	
	foreach($dr1 as $dr)
	{
		
		if($dr!='.' && $dr!='..')
		{
			
			if(is_dir($dir.'\\'.$dr))
			{
					
				$f1[]=$dr.'\\\\';  /// Adding Sub-directory names into the Array ///
				
				
			}
			else
			{
				
				
	/// This Section only work when , Extracted directory don't have any Sub-directory ///	
	
			
			    $dr_pos=strpos($dr,'.txt'); /// Searching for Extracted Textfile name ///
				
				if($dr_pos===false)
				{
					
				}
				else
				{
			
						for($dt=0;$dt<strlen($dr);$dt++)
						{
					
								if(is_numeric($dr[$dt]))
								{
						
						$txt_name[]=$dr;  /// Adding the Result-1.txt file name into the Array ///
						
								}
									
						}
						
				
				}
				
			}
			
			
		}
		 
	}
	
	$to=0; 

	$tot=0;
	
	$sz=1;
  
  $flog=0;
  
  if(sizeof($txt_name)>0)
  {
  	
	 natsort($txt_name);  /// Sorting the txt_name array into Natural Sorted Order ///
	 
	 $fname[]=$txt_name;  /// Adding the array into filename Array ///
	 	 
	 $dir12=$dir;
	 
	 $dir12=str_replace('C:\wamp\www\\','',$dir12);
	 
	 $fdir[]='';
	
	 $flog=1;
	 
		
  }
  
	set_time_limit(30000);	
			
			
?>

  
<?php			
			
	$size=0;		
		
    ////////////////////// This section only work when Extracted Source directory having Sub-directory ////////////////////////////		
		
		
	for($i=0;$i<sizeof($f1);$i++)
	{
		 			 
		
		$f1_pos=strpos($f1[$i],'.txt');
		
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
				
		
	/// If Extracted Source directory having One or more than one Sub-directory , then Size will be greater than 2 ///		
		
	if($size>2)
	{
		 
		 $tot++;
				 		 
		 		 
		 
		 foreach($f1dir as $fd)
		 {
		 	
			if($fd!='.' && $fd!='..')
			{
				
				
			/// Traversing through inner directories of Sub-directory ///				
				
			//	echo $dir.'\\'.$f1[$i].' -- '.$fd;
				
			//	echo '<br>';
							
				
				$sum=$f1[$i].'\\'.$fd.'\\';
									
				$f1[]=$sum;						
								
				$fd_pos2=strpos($fd,".txt");
				
				if($fd_pos2===false)
				{
							
						
					
				}
				else
				{
					
					 	
				
					if(is_dir($dir.'\\'.$f1[$i].'\\'))
					{
					
						$f3[]=$f1[$i];
								
						$f2[]=$fd;   /// Adding the inner directory names into the Array ///
							
					}
					
						
				}
				
				
				
					
				
			}
			
			
		 }

	  }
		

				if(!empty($f2))
				{
	
						$nums++;
														
						$fdir[]=$f3[0];  /// Adding the Source Sub-directory names ///
							
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
		
											$file_name[]=$f2[$zx];  /// Adding the Extracted Textfile names into the Array ///
						
									}
			
									$int=0;
				
						}
	
		
							natsort($file_name);   /// Sorting the file_name array into Natural Sorted Order ///
							
							$fname[]=$file_name;   		/// Adding the Textfile names into the Array ///
	
	
		$sm=NULL;
		
		$f3=NULL;
		
		$f2=NULL;
		
	}	

}


?>

   <?php
	   
   		/// Creating Rest Convert Later Facility to the User ///
   
   ?>
    
    
    <form action="unicode_converter.php" method="post" id="form1">
        
    <input type="hidden" name="fname" value="<?php echo $_POST['exdir'];?>" />
    
    </form>


<div id="rest"></div>


<?php

 /////////////////////////////////////////////////////////////////////////

?>

<?php

	/// This section display all the Current Status during Unicode Conversion ///
	
	
	///  extr id : Please Wait Scanning the Text File .....  and Current Working Directory :///
	
	///  pw id :  Extracting Directory No  & Text filename ///
	
	///  cur id :  Total directory converted into Unicode ///

?>


<div style="margin-top:42px; margin-left:-5px;">
 
  <div id="extr" style="font-family:calibri; font-size:15px; margin-left:10px; margin-top:15px;"></div>

  <div id="pw" style="font-family:calibri; font-size:15px; margin-left:10px; margin-top:15px;"></div>

  <div id="cur" style="font-family:calibri; font-size:15px; margin-left:10px; margin-top:15px;"></div>


<?php

	
	echo '<script language="javascript">
    document.getElementById("extr").innerHTML="'.'<b>Please Wait Scanning the Text File .....  </b>'.'";
    </script>';

				flush();
			    
				ob_flush();

		$ex_uni_dir=$_POST['exdir'];
				
		$ex_uni_dir=str_replace('C:\wamp\www\ParserTool','',$ex_uni_dir);
				
		$ex_uni_dir=str_replace('Extract','',$ex_uni_dir);
	
		$uni_dir='C:\wamp\www\ParserTool\Log\\'.$ex_uni_dir;	
		
				
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
						//////////////// Unicode Conversion Process begins /////////////////////
	
	$wt=0;
		
	$wb=0;

	$valid=0;

	$total=0;

	$line_count=0;
		
					
		for($xy=0;$xy<sizeof($fname);$xy++)
		{

			$wt++;		
				
			$ces=$fdir[$xy];   /// Source directory names ///
			
			$ces=str_replace('\\','\\\\',$ces);
			
			$ces=str_replace('\\\\','\\',$ces);
			
			$ces=str_replace('\\\\\\','\\',$ces);
			
			
  if($wt>1) /// When more than one directory converted to Unicode then , Rest Convert Later option appears for the user ///
  {
			   
			   $button='button';	
 
			   $value1='\"Rest Convert Later\"';

			   $java='\"javascript:button1();\"';
 
			   $background='\"background-color:#C30';
 
			   $color='color:#FFF';
 
 			   $font_family='font-family:calibri';
 
			   $font_size='font-size:14px';
 
			   $margin_left='margin-left:390px';
 
 			   $margin_top='margin-top:5px\"';
 
 echo '<script language="javascript">

document.getElementById("rest").innerHTML="<input type='.$button.' value='.$value1.' onclick='.$java.' style='.$background.';'.$color.';'.$font_family.';'.$font_size.';'.$margin_left.';'.$margin_top.'>";
				
	  </script>';

			   		flush();
			    
					ob_flush();
			   
		   }			
	
	 
	 if($flog==1) // When the Exracted Source directory don't have any Sub-directory , then this block executed //
	 {

		$tdir=$dir;  /// Assigning the Extracted Source directory name into a variable ///
		
		$tdir=str_replace('C:\wamp\www\ParserTool\Extract\\','\Extract\\',$tdir);
		
		$tdir=str_replace('\\','\\\\',$tdir);

		echo '<script language="javascript">
			  document.getElementById("extr").innerHTML="'.'<b>Current Working Directory :  </b>'.$tdir.' ";
		      </script>';

	 }
	 else
	 {

	 	/// Flog value will be 0 , when the Extracted Source directory having Sub-directory ///

		echo '<script language="javascript">
			   document.getElementById("extr").innerHTML="'.'<b>Current Working Directory :  </b>'.$fdir[$xy].' ";
			  </script>';

	 }
	

				flush();
			    
				ob_flush();
				
				
			if($wt==1)
			{
				
				$wt1=0;
				
			}
			else if($wt>1)
			{
				
				$wt1=$wt-1;
				
			}
			
			
				//$file12=fopen($uni_dir.'\\'.'UnicodeStatus.txt',"w");
					
				//fwrite($file12,$wt1);				
				
				//fclose($file12);				
				
			
			foreach($fname[$xy] as $fn)
			{
				
				
				$valid++;
				$indx=0;
				
				$tx=0;
				
				$wb++;

				$file1=$dir.'\\'.$fdir[$xy].'\\'.$fn;
				
				$stxt=NULL;
				
				
			if(file_exists($file1))
			{				

				$f = fopen($file1, "r");  /// Reading the Extracted text file for the corresponding Sub-directory ///	
									
				while ($txt = fgets($f, 1000)) 
				{
                      
					  $stxt=$stxt.$txt;   /// Making a sum for the extracted result ///
					  
				}
				
				fclose($f);
			
			}
			
	 echo '<script language="javascript">
		document.getElementById("pw").innerHTML="'.'<b>Extracting Directory No -  </b> : '.$wt.' , <b>TextFile Name : </b>'.$fn.' ";
		   </script>';			
				
				flush();
				    
				ob_flush();			
				
				
			/// Connecting with the Unicode Converter API to Convert the sum into Unicode ///				
				
				include $fontdir;

				$stxt=NULL;   /// After Converting into Unicode the sum becomes NULL ///
				
				
				/// Creating Extracted log directory for the Sub-directory ///				
				
				$total=$total+$line_size;    // Counting Total number of lines //
								
				$dat=$wt;
				
				$tt=$total;

			    if(file_exists($dir.'\\'.$fdir[$xy].'\\'.$fn))
				{
					
					unlink($dir.'\\'.$fdir[$xy].'\\'.$fn);
				
				}
				
				//rmdir($dir1.$ex_text_dir);
				
				//unlink($dir.'\\'.$fdir[$xy].'\\'.$fn);
				
				//rmdir($dir.'\\'.$fdir[$xy]);
				
							
			}
			
			
				$del_dir=$dir.'\\'.$fdir[$xy];
				
				include 'del_dir.php';

			/// Writting the Unicode Conversion status into a Textfile ///

			$file121=fopen($uni_dir.'\\'.'UnicodeStatus.txt',"w");
				
			fwrite($file121,$dat.'|'.$tt);							
				
			fclose($file121);
		
	
			if($wt==sizeof($fname))
			{
					
					$rmdir=$dir;
					
			/// Deleting the Extracted Source directory from Extract folder , after Converting all Sub-directories into Unicode ///					
					
					include 'ex_rmdir.php';
				
			}				
				
				
 /// Extracting Results into Textfiles ///				
		
							
	echo '<script language="javascript">
 document.getElementById("cur").innerHTML="'.'<b> Total Directory Converted to Unicode :  </b>'.$wt.'/'.sizeof($fname).'"
 document.getElementById("nm").value="'.$xy.'";
    </script>';	
	
		
		$folder_sum1=NULL;
				
		$folder_sum2=NULL;
		
		$newfolder=NULL;
		
		$newfld=NULL;
		
		$sm=NULL;
			
	}
		
		
?>

</div>


	<div align="center">
    
	<p  style="background-color:#C00; color:#FFF; margin-left:30px; font-family:calibri; font-size:14px; width:370px; height:25px; margin-top:20px;">
  &nbsp;&nbsp;All Webpages Extracted , Directory Converted to Unicode </p>

    
    </div>
    
<?php

}
else if($_POST['nodir']=='No Extracted Directory Created' || $_POST['nodir']=='Not Created')
{
	 
?>	 
	 
	
    <div align="center">
    
	<p  align="center" style="color:#333;  font-family:calibri; font-size:20px; width:300px; height:25px; margin-top:30px;">
  &nbsp;&nbsp;No Extracted Directory Created</p>

    
    </div>
    
<?php
     
 }


}
else if(!isset($_POST['exdir']) && !isset($_POST['nodir']) && !isset($_POST['fname']))
{
 
?> 
 
 
 <div align="center">
    
	<p  align="center" style="color:#333;  font-family:calibri; font-size:20px; width:300px; height:25px; margin-top:30px;">
  &nbsp;&nbsp;No Active Event </p>

    
    </div>
 
<?php

 }
 
 ?>
 