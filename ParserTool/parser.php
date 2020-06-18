<title> Clean </title>

<body>


<style type="text/css">

div.vertical-line1{
  width: 1px; /* Line width */
  background-color:#CCC; /* Line color */
  height: 100%; 
  float: left;
  margin-left:30px;
  
  
}


div.vertical-line2{
  width: 1px; /* Line width */
  background-color:#CCC; /* Line color */
  height: 100%; 
  float: right;
  margin-right:21px;
  
  
}

</style>

<script>
 
	function button1() 
	{
		 		
		document.forms["form1"].submit();
			  	
		return true;
     
	}
	
</script>	


<div style="margin-top:-5px;">

<!--

	<div class="vertical-line1"></div>
  
	<div class="vertical-line2"></div>

!-->

<p align="center" style="margin-left:30px; background-color:#006; color:#FFF; font-family:calibri; font-size:14px; margin-top: 10px; width:598px; height:25px;">
  Extracting Block </p>

<?php 


if(isset($_POST['log2']))
{
	
	$log_dir='C:\wamp\www\ParserTool\Log\Log.txt';
				
	$file1=fopen($log_dir,"w");
	
	$log_id='0';
	
	fwrite($file1,$log_id);

	$log=0;
	
}

if(isset($_POST['txt']))
{

$tmp_no=$_POST['tmp_no'];

$directory=$_POST['txt'];

$dir=$directory;
   
  ?>


  
	 <?php 
	  
			if(is_dir($dir))
			{

?>

<form action="parser.php" method="post" id="form1">
<input type="hidden" name="dr" value="<?php echo $dir; ?>" />
<input type="hidden" name="stop" value="" />

</form>


<p style="margin-left:30px; background-color:#333; color:#FFF; font-family:calibri; font-size:14px; width:200px; height:25px;">
  &nbsp;&nbsp;1 . Extracting the Input directory </p>
  
  <div style="margin-top:20px;">
  
	  <div id="isd" style="font-family:calibri; font-size:15px; margin-left:33px;"></div>
  
  <input type="button" value="Stop Extracting" name="stop"  style="width:100px; height:30px; background-color:#F00; color:#FFF; margin-top:-79px; margin-left:470px;" onClick="javascript:button1();"/>
  
  </div>
  
<?php
				
				
					/// Scanning the Input directory ///		
				
					$isd=$dir;
					
					$isd=str_replace('\\','\\\\',$isd);
	
	
				  	  echo '<script language="javascript">
						    document.getElementById("isd").innerHTML="'.'<b>Input Source Directory : </b>'.$isd.' ";
						    </script>';
					
						flush();

						ob_flush();
						
						$folder_sum1=$dir;

						$folder_sum1=str_replace('C:\wamp\www\\','',$folder_sum1);
		
						$newfld1=explode('\\',$folder_sum1);
				
						$fld_sum='C:\wamp\www\ParserTool\Extract';
						
						$res_sum='C:\wamp\www\ParserTool\Result';
				
						if(!file_exists($fld_sum.'\\'.$newfld1[sizeof($newfld1)-1]))
						{
		
								mkdir($fld_sum.'\\'.$newfld1[sizeof($newfld1)-1]);				
		
						}
						else
						{
				
								$rmdir=$fld_sum.'\\'.$newfld1[sizeof($newfld1)-1];
								
								$resdir=$res_sum.'\\'.$newfld1[sizeof($newfld1)-1];
																
								include 'rmdir.php';
								
								include 'rmlog.php';
					
						}
		
						$extdir=$fld_sum.'\\'.$newfld1[sizeof($newfld1)-1];						
						
						$fld_sum=NULL;
						
						$result='C:\wamp\www\ParserTool\Log\\';
	
						$result_dir=$newfld1[sizeof($newfld1)-1];


						if(!file_exists($result.$result_dir))
						{
		
								mkdir($result.$result_dir);
	
						}						
												
								$isd1=$isd.PHP_EOL;

								$tde='Not Created'.PHP_EOL;
	
								$twp='No Parsing Started'.PHP_EOL;
		
								$extdir1='Not Created'.PHP_EOL;
		
								$result_sum=$isd1.$tde.$twp.$extdir1;
	
								$file2=fopen($result.$result_dir.'\\'.'ExtractedList.txt',"w");
			
								fwrite($file2,$result_sum);						
						
											
	
						include 'parsera.php';

			}
			else if(!is_dir($dir))
			{
	
	
	/// Invalid Directory ///
	
			?>

			<p style="margin-left:33px; font-family:calibri; font-size:15px;"><b>Input Source Directory : </b><?php echo $dir; ?></p>
                
             <p style="margin-left:33px; font-family:calibri; font-size:15px;"><b> Directory Scanning Result : </b> Not a Valid Directory </p> 

			<?php
    		
			}
	

?>


<?php
   
	
}
else if(!isset($_POST['txt']) && !isset($_POST['stop']))
{

?>

	<p  align="center" style="color:#CCC; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; margin-top:100px;"> No Active Event </p>

   <img src="images/pic-2.jpg" width="300" height="182"  style="margin-left:150px;" />

<?php

}



if(isset($_POST['stop'])) /// Taking the request from the User to Stop the Extraction Process ///
{
	
	
	$folder_sum1=$_POST['dr'];

	$folder_sum1=str_replace('C:\wamp\www\\','',$folder_sum1);
		
	$newfld1=explode('\\',$folder_sum1);		

	
	$log_dir='C:\wamp\www\ParserTool\Log\Log.txt';
				
	$file1=fopen($log_dir,"w");
	
	$log_id='2'; /// Log value is 2 means all Extraction over ///
	
	fwrite($file1,$log_id);
	
	
	
	///  $newfld1[sizeof($newfld1)-1] : Source Directory Folder name ///
	
	
	/// Writting the Current Extracted directory name into Recent.txt for further reference ///
	
	$recent_dir='C:\wamp\www\ParserTool\Log\Recent.txt';
	
	$recent_data='C:\wamp\www\ParserTool\Log\\'.$newfld1[sizeof($newfld1)-1];
	
	$file12=fopen($recent_dir,"w");
	
	fwrite($file12,$recent_data);

	$details1=array();
	
	$details2=array();	
	

$file1='C:\wamp\www\ParserTool\Log\\'.$newfld1[sizeof($newfld1)-1].'\\'.'ExtractedList.txt';

if(file_exists($file1))
{

	$f = fopen($file1, "r");	
									
	while ($dt = fgets($f, 1000)) 
	{
		 
	 	$details1[]=$dt;  /// Adding all the Extracted status for the Current Input source directory into an Array ///          
		 
	}

}
 	$count=0;
	
	$file2='C:\wamp\www\ParserTool\Log\\'.'Dir.txt';

	$f2 = fopen($file2, "r");	
									
	while ($ft = fgets($f2, 1000)) 
	{
		
		 $count++;
		
		 $details2[]=$ft;  /// Reading all the Sub-Directory list for the Input Source directory ///          
					 
	}
	
		
	
	/// $details1[1] : Total number Sub-directory has been Extracted ///
	
	
	$numvalue=trim($details1[1]);
	
	if(intval($numvalue)>0) /// Intval will check the value is integer or not ///
	{
		
		$st=$numvalue;
	
	}
	else
	{
		
		$st=0;
		
	}
	
	$en=$count; // Total Number Scanned Sub-directory //

?>

<?php

if($count>0)
{

$dd1='C:\wamp\www\ParserTool\History\\';
	
$dd2='C:\wamp\www\ParserTool\Extract\\';	

$d1=$dd1.'\\'.$newfld1[sizeof($newfld1)-1].'\\'.'History.txt';
	
$d2=$dd2.'\\'.$newfld1[sizeof($newfld1)-1].'\\'.'Result-1.txt'; 


/// 'Result-1.txt' is the common Extracted Textfile name for all Sub-directories , Created in all respective Sub-folders ///


if($st<$en && !file_exists($d2))
{
	
?>

	<p align="center" style="background-color:#C00; margin-left:200px; color:#CF6; width:200px; height:30px; font-family:calibri;">

    	    	Exracting Interrupted

	</p>

<?php

}
else if(file_exists($d2))
{
	
?>	
	
	<p align="center" style="background-color:#060; margin-left:200px; color:#FF0; width:200px; height:30px; font-family:calibri;">

    	    	Already Extracted

	</p>    
    

<?php	
    
}

?>

<?php
	
   if($st==$en && !file_exists($d2))
   {
   
?>   

	<p align="center" style="background-color:#030; margin-left:200px; color:#CF6; width:200px; height:30px; font-family:calibri;">

    	    	Exraction Completed

	</p>

   
  
<?php 
   
   } 

?>


<?php



	if($st<$en && $details2[0]!='Directory Scan Not Completed' && !file_exists($d2))
	{
			
		if(!file_exists('C:\wamp\www\ParserTool\History\\'.$newfld1[sizeof($newfld1)-1]))
		{
						
			mkdir('C:\wamp\www\ParserTool\History\\'.$newfld1[sizeof($newfld1)-1]);
	
		}
		
		$his_dir='C:\wamp\www\ParserTool\History\\'.$newfld1[sizeof($newfld1)-1];

		$his_data='History.txt';	
		
		$hisfile=fopen($his_dir.'\\'.$his_data,"w");
			
		for($i=$st;$i<$en;$i++)
		{
			
			fwrite($hisfile,$details2[$i]); // Creating History directory list for Un-completed Sub-directory //
		
		}
		
		fclose($hisfile);
				
		if(file_exists($d2))
		{
				
			unlink($d1);
			
			rmdir($dd1.'\\'.$newfld1[sizeof($newfld1)-1]);
		
		}
		
		
?>		
	        
        <p style="margin-left:40px; font-size:15px; font-family:calibri;">
        
        	<b>Total Directory Extracted : </b><?php echo $st.' / '.$en; ?>
        
        </p> 
        
        <p style="margin-left:40px; font-size:15px; font-family:calibri;">
        
			<b> Folders Remains to Extract : </b><?php echo $en-$st; ?>
        
        </p>
        
        <p align="center" style="font-size:15px; font-family:calibri;">
        
        
        	<b> User can extract the remaining folders by opening the Parse Later Panel</b>
        
                
        </p>
        
    	

<?php		
		
	
	}
	else if($details2[0]!='Directory Scan Not Completed' && $st!=$en && !file_exists($d2))
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

	if($st<$en && $details2[0]!='Directory Scan Not Completed' && !file_exists($d2))
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
	
   if($st==$en && !file_exists($d2))
   {
	   
	   
	    $his_dir='C:\wamp\www\ParserTool\History\\'.$newfld1[sizeof($newfld1)-1];

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
   
   if(file_exists($d2))
   {

?>
	
    <p  align="center" style="font-family:calibri; font-size:15px;">
    
	    These folders already extracted succesfully , No need to create <b>History Log</b> for this directory
    
    </p>
    
       
<?php	   
   }
   
    
?>

<?php
		
		

	$count=0;

	exit(0);

}
else
{

?>


 <p align="center" style="background-color:#360; margin-left:200px; color:#FFF; width:200px; height:30px; font-family:calibri;">
    
	     Invalid Input
         
         
  </p>

<?php
	
}

}
?>

</div>