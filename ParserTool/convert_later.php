<title> Convert Later </title>
<?php
  
 include 'create_files.php'; /// Checking all the System directories has been created or not ///
 
 $log_dir='C:\wamp\www\ParserTool\Log';
 
 $ex_dir='C:\wamp\www\ParserTool\Extract';
 
 $cur_ext=array();
 
 	
	$logd=scandir($log_dir);  /// Scanning the Log directory ///
	
	foreach($logd as $lg)
	{
 
 		if($lg!='.' && $lg!='..')
		{
			
			if(is_dir($log_dir.'\\'.$lg) && is_dir($ex_dir.'\\'.$lg))  /// Checking the Existance of the directory in both location ///
			{
				
					$sz=scandir($ex_dir.'\\'.$lg);
										
					if(sizeof($sz)>2)
					{
						
						$cur_ext[]=$lg;
					
					}
					
			}
 		
		}
		
	}
	
?>	
	

<script>
 
	function button1(x) 
	{
				
		document.forms["form_log"].submit();				
		
		document.forms["form"+x].submit();
			  	
		return true;
     
	}
	
</script>	    

<style type="text/css">

.wpsc_second_level_categories { display:none; }
.wpsc_categories span { cursor: pointer; }


</style>
    
<?php

 for($xy=0;$xy<sizeof($cur_ext);$xy++)  /// Listing out all the Source directory from Extract folder ///
 {

	
	$ch_dir=$ex_dir.'\\'.$cur_ext[$xy];
	
	$chdir1=$log_dir.'\\'.$cur_ext[$xy];
	
	$chdir2=$ex_dir.'\\'.$cur_ext[$xy];
	
//	echo $ch_dir;
	
//	echo '<br>';
	
	include 'ch_txtfile.php';  /// Updating the list from History folder and Extract folder ///
	
	if(sizeof($ch2)==0)
	{
		
		$cur_ext[$xy]=NULL;
	
	}
	
//	echo '<br><br>';

 }

?>
    
    
<h1 style="font-family:calibri; font-size:20px; margin-left:-8px; margin-top:-10px; background-color:#936; color:#FFF; width:565px;  height:30px;" align="center"> Convert Later Log </h1>    
    
 <p align="right" style="font-family:calibri; font-size:14px;"><b>Total No of Directory : </b><?php echo sizeof($cur_ext); ?></p>   
   
  <p align="left" style="font-family:calibri; font-size:14px;"><b> List of Directory </b>
  <input type="button" value="Refresh to See Current Activity"  style="margin-left:258px; font-size:12px; font-family:calibri; background-color:#C00; color:#FFF; position:fixed;"onClick="window.location.href = window.location.href;"></p>
    
<div style="font-size:12px; font-weight:bold; font-family:calibri;">

<?php

$con_log=0;

if(isset($_POST['con_log']))
{
		
	 $con_log=1;
				
}

?>

<form action="convert_later.php" method="post" id="form_log">

<input type="hidden" name="con_log" value="1" />

</form>

<?php

if(sizeof($cur_ext)>0)
{


	for($i=0;$i<sizeof($cur_ext);$i++)  /// Listing out all the Source directory from Extract folder ///
	{
		
		$i1=$i+1;
		

?>

<p align="left" style="margin-left:0px; font-family:calibri; font-size:12px;">

<?php

	   $ex_dir='\\'.'Extract'.'\\'.$cur_ext[$i];

?>

</p>

<?php		
		
if(file_exists($log_dir.'\\'.$cur_ext[$i].'\\'.'CurrentExtract.txt'))
{
	
?>


<form action="convert_font_menu.php" method="post" id="form<?php echo $i1; ?>" target="history">

<input type="hidden" name="ex_dir" value="<?php echo $ex_dir; ?>" />

<?php

if(file_exists('C:\wamp\www\ParserTool\Extract\\'.$cur_ext[$i]))
{
		
?>

<div  class="wpsc_categorisation_group">

    <ul  class="wpsc_categories wpsc_top_level_categories">
      
      <li style="list-style-type:none;">     
    
      	<a align="left" style="font-size:12px; font-family:calibri;">
		
        <b> 
        
         <?php 
		
				echo $i1.' . '.'\\'.'Extract'.'\\'.$cur_ext[$i];  /// Displaying the directory names saved in Extract folder ///
			
 		 ?>
            
        </b>
      
      	</a>
	
<span style="font-family:calibri; font-size:15px;">[+]</span>


 <ul class="wpsc_second_level_categories">
 
<?php	
	
	$check_dir='C:\wamp\www\ParserTool\Extract\\'.$cur_ext[$i];
	
	$chdir=scandir($check_dir);  // Scanning the Source directory //
	
	foreach($chdir as $ch)
	{
	
		if($ch!='.' && $ch!='..')
		{
				
				$ch_pos=strpos($ch,'.txt');
				
				if($ch_pos===false)
				{
		
	
				}
				else
				{
					
					echo $ch;  /// Displaying Sub-directory names ///
					
					echo '<Br>';
					
					$send_dir=$cur_ext[$i];
					
?>

					<input type="hidden" name="sub_ex_dir[]" value="<?php echo $send_dir; ?>" />

					<input type="hidden" name="only_txt" value="<?php echo $ch; ?>" />

<?php					
					
				}
	
		}
	
	}
	
		$fo=0;
		
		$f23 = fopen($log_dir.'\\'.$cur_ext[$i].'\\'.'CurrentExtract.txt', "r");	
									
		while ($fno = fgets($f23, 1000)) 
		{
	
			$valid_dir='C:\wamp\www\ParserTool\\'.'Extract'.'\\'.$cur_ext[$i].'\\'.$fno;
	
			if(is_dir(trim($valid_dir)))
		    {
				
				$fo++;	
	 	
				$fno=str_replace('C:\wamp\www\ParserTool\\','',$fno);
			
			?>	
        
    	    <input type="hidden" name="sub_ex_dir[]" value="<?php echo $fno; ?>" />
             
			<li style="font-family:calibri; font-size:12px; list-style-type:none;">
            
		<b>
		
        		<?php echo $fo.' . '.$fno; ?> 
        
        </b>
        
            </li>
			
        <?php    
 
	 	 }
	
  }

?>

	</form>
		
        
 </ul>
       </li>
</ul>       
    <div class="clear_category_group"></div>
</div>      

  
 <input type="button" value="Convert to Unicode" style="background-color:#C30; color:#FFF; font-family:calibri; font-size:14px; margin-left:388px; margin-top:-30px;" onclick="javascript:button1(<?php echo $i1; ?>);" />


<?php

}

}
	
	}

}
else
{

?>

	<div align="center">
    
	<p  align="center" style="color:#CCC; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; margin-top:100px;"> No Convert Log </p>    
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
