<title> History Log </title>


<style type="text/css">

div.vertical-line1{
  width: 1px; /* Line width */
  background-color:#CCC; /* Line color */
  height: 550; 
  float: left;
  margin-left:10px;
  
  
}


div.vertical-line2{
  width: 1px; /* Line width */
  background-color:#CCC; /* Line color */
  height: 550; 
  float: right;
  margin-right:-1px;
  
  
}

</style>

<style type="text/css">

.wpsc_second_level_categories { display:none; }
.wpsc_categories span { cursor: pointer; }


</style>


<script>
 
	function button1(x) 
	{
		
		document.forms["form_log"].submit();
		
		document.forms["form"+x].submit();
			  	
		return true;
     
	}
	
</script>	









<h1 style="font-family:calibri; font-size:20px; margin-left:-8px; margin-top:-10px; background-color:#06F; color:#FFF; width:565px;  height:30px;" align="center"> Extract Later Log </h1>


<?php

    include 'create_files.php'; /// Checking all the System directories has been created or not ///

	$his_count=0;
	
	$his_name=array();
	
	$his_dir='C:\wamp\www\ParserTool\History';
	
	$ext_dir='C:\wamp\www\ParserTool\Extract';
	
	$his=scandir($his_dir);  // Scanning the History directory //
		
	foreach($his as $hs)	
	{
		
		if($hs!='..' && $hs!='.')
		{
			
				 $his_count++;
				
				 $his_name[]=$hs;	// Assigning the Created History folders names into the Array //
		
//				echo $hs;
				
//				echo '<br>';
			
		}
	
	}
	
//	echo '<br><br>';


/*
	$ex=scandir($ext_dir);
	
	foreach($ex as $ext)
	{
	
		if($ext!='.' && $ext!='..')
		{
			
//			echo $ext;
			
//			echo '<br>';
	
		}
	
	}
	
*/

?>


<?php


	$his_log=0;
	
	include 'his_log.php';
	
	
	if(isset($_POST['exit']))
	{

		$log=0;
		
		$log_dir='C:\wamp\www\ParserTool\Log\Log.txt';
				
		$file1=fopen($log_dir,"w");
	
		$log_id='0';
	
		fwrite($file1,$log_id);	
	
		die;

	}  

	
	if(isset($_POST['his_log']))		/// Accepting the request from the User to create History log ///
	{
		
		$his_log=1;
		
		$file1='C:\wamp\www\ParserTool\Log\HisLog.txt';
		
		$file123=fopen($file1,"w");
		
		fwrite($file123,$his_log);
		
	}
	

?>

<form action="history_list.php" method="post" id="form_log">

<input type="hidden" name="his_log" value="1" />

</form>


<p align="right" style="font-family:calibri; font-size:14px; margin-top:-10px; color:#000;"><b>Total No of Directory : </b>

<?php 

	$exd='';

	if(sizeof($his_name)>0)
	{
		
		echo $his_count; 
	
	}
	else
	{
		
		echo '0';
		
	}

	

?>


</p>


<p align="left" style="margin-left:5px; font-size:15px; font-family:calibri;"> <b>List of Directory</b> 
<input type="button" value="Refresh to See Current Activity"  style="margin-left:245px; font-size:12px; font-family:calibri; background-color:#033; color:#FFF; position:fixed;"onClick="window.location.href = window.location.href;"></p>


	<?php
	
	
	for($i=0;$i<sizeof($his_name);$i++)
	{

	$i1=$i+1;
				
	$hname=array();
	
	// $his_name[$i] : Created History folder names //
	
	$his_txt='C:\wamp\www\ParserTool\History\\'.$his_name[$i].'\\'.'History.txt'; 
		
	if(file_exists($his_txt))
	{
				
		$f = fopen($his_txt, "r");	
									
		while ($hno = fgets($f, 1000)) 
		{
         						
				$h=explode('*',$hno);		
				
				// $h[1] : Created History Sub-directory names //
				
				if(empty($h[1]))
				{
					
					//$brk=explode('\\',$h[0]);																				
										
					$h[1]=NULL;	
										
				}
				
		
		
		$cur_dir='C:\wamp\www\ParserTool\Extract\\'.$his_name[$i].'\\'.$h[1];
								
		$v=0;
		
		if(is_dir(trim($cur_dir)))	/// Checking , Created History Sub-directory is available or not ///
		{
		
				$cur=scandir(trim($cur_dir));
				
				foreach($cur as $cu)
				{
					
					
					if($cu!='.' && $cu!='..')
					{
											
					
 							$cu_pos=strpos($cu,'.txt');
							
							if($cu_pos===false)
							{
							
								/// If no Extracted text file is created for the Sub-directory then Counter increased to one ///							
								
								$v++;		
							
							
							}
							else
							{
								
								
							}
							
						
					 }
					
				}
				
				
				if(sizeof($cur)==2) /// Sizeof($cur) is equals to 2 means no Extracted text file is created for the Sub-directory ///
				{
				
					$hname[]=$h[1];	
					
				}
		}
		else
		{
						
			$hname[]=$h[1];	/// No -Extracted Sub-directory exists then , the name added into the array ///
			
		}
	
	
	
		  	if($v>0)  /// Counter is greater than 1 then the Created History Sub-directory is added into the Array ///
			{
				
				$hname[]=$h[1];	
				
			}
				 
				
		}	
		
		
	}
		
?>


<?php


	if(!empty($h[0]) && sizeof($hname)>0)	/// Source directory and total number of Sub-directory created in the History log ///
	{
 
		$string=NULL;

	// Adjusting the display for the Source - directory in the History log //

		if(strlen($h[0])<=50)
		{
		
			$string=$h[0]; 
		
		}
		else if(strlen($h[0])>50)
		{
						
			$string=substr($h[0],0,50).' ...... ';
			
		}
		
	?>

<form action="history_parser.php" method="post" target="history" id="form<?php echo $i1; ?>">


<div class="wpsc_categorisation_group">

    <ul class="wpsc_categories wpsc_top_level_categories">
      
      
      <li style="list-style-type:none;">     
    
      	<a align="left" style="font-size:12px; font-family:calibri;" title="<?php echo $h[0]; ?>">
        
		<b><?php echo $i1.' . '.$string; ?></b>
              
      	</a>
	
	 <span style="font-family:calibri; font-size:15px;">[+]</span>
	
 
		
        <ul class="wpsc_second_level_categories">
     
	<?php
		
		
		for($h1=0;$h1<sizeof($hname);$h1++)  /// Displaying total number of Sub-directory for Coresponding Source directory ///   
		{
			
			$hname[$h1]=str_replace('\\\\\\','\\',$hname[$h1]);
			
			$hname[$h1]=str_replace('\\\\','\\',$hname[$h1]);
			
			$h11=$h1+1;
		
	?>		

				  
			<li style="font-family:calibri; font-size:12px; list-style-type:none;">
             
	<b>
					 	<?php
						
						
						$hname[$h1]=str_replace($h[0],'',$hname[$h1]);
						
						if(strlen($hname[$h1])<=2)
						{
							
							echo 'No Sub-Directory';
							
						}
						else
						{
						
							 echo $h11.' . '.$hname[$h1]; 
						
						}
						
						?>
       </b>    
                                         
    
			    </li>			


				    <input type="hidden"  name="his_name" value="<?php echo $his_name[$i]; ?>" />
               
					<input type="hidden" name="his" value="<?php echo $h[0]; ?>" />

					<input type="hidden"  name="sub_dir[]" value="<?php echo $hname[$h1]; ?>" />
                                     
                        
    <?php
		
		}
		
	?>
    
  
  </ul>
       </li>
</ul>       
    <div class="clear_category_group"></div>
</div>
   
 <?php

	}
	
?>  
   
<?php

 if($his_log==0 && sizeof($hname)>0)
 {
	 
	 
?>	 

</form>

<input type="button" name="sub" value="Extract" style="margin-left:418px; margin-top:-40px;color:#FFF; background-color:#900; width:100px;" onclick="javascript:button1(<?php echo $i1; ?>);" />



<?php

 }
 else if($his_log>0)
 {
	
?>

<input type="button" name="sub" value="Extract" style="margin-left:418px; margin-top:-40px;color:#FFF; background-color:#900; width:100px;" onclick="javascript:button1(<?php echo $i1; ?>);" />


<?php	
    
 }

	}
	
	if($his_count==0 || sizeof($hname)==0)
	{

?>
	
    	<div align="center">
    
	<p  align="center" style="color:#CCC; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; margin-top:50px;"> No History Log </p>    
    </div>



<?php

	}

?>

<script src="js/jquery.min.js"></script>

<script>


$('.wpsc_categories span').click(function(){
    var $ul = $(this).next();
    $(this).html( $ul.is(':visible') ? '[+]' : '[&ndash;]');
    $ul.slideToggle();
});

</script>
