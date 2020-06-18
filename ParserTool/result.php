<title> Result </title>
<center>

<style type="text/css">

div.vertical-line1{
  width: 1px; /* Line width */
  background-color:#CCC; /* Line color */
  height: 100%; 
  float: left;
  margin-left:12px;
  
  
}


div.vertical-line2{
  width: 1px; /* Line width */
  background-color:#CCC; /* Line color */
  height: 100%; 
  float: right;
  margin-right:33px;
  
  
}

</style>

<script>
 
	function button1() 
	{
				
		document.forms["form1"].submit();
			  	
		return true;
     
	}
	
</script>	


<div  style="margin-top:5px;">

<!--

	<div class="vertical-line1"></div>
  
	<div class="vertical-line2"></div>

!-->

<p align="center" style="margin-left:-20px; background-color:#900; color:#FFF; font-family:calibri; font-size:14px; width:548px; height:25px; margin-top:5px;">
  Extracting Results </p>

    <form action="result.php" method="post" id="form1">
   
	<input type="hidden" name="exit" value="" />
   
	</form>


<?php


include 'create_files.php';  /// Checking all the System directories has been created or not ///

include 'log.php';
		
if(isset($_POST['exit']))	/// Taking the exit Request from the User ///
{

	$log=0;
	
	$log_dir='C:\wamp\www\ParserTool\Log\Log.txt';	/// Changing the Log status into 0 ///
				
	$file1=fopen($log_dir,"w");
	
	$log_id='0';
	
	fwrite($file1,$log_id);	
	
	die;	/// Exits the all process ///

}  

	
	if(isset($_POST['log123']))
	{
		
		$log=1;
		
	}


	if(isset($_POST['log2']))
	{
		
		$log=0;
		
		$log_dir='C:\wamp\www\ParserTool\Log\Log.txt';
				
		$file1=fopen($log_dir,"w");
	
		$log_id='0';
	
		fwrite($file1,$log_id);
		
	}	
	
	
	if($log==0)	/// Log  status 0 then , No process currently executed ///
	{
?>

<p  align="center" style="color:#CCC; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; margin-top:100px;"> 

	No Results
 
</p>

<img src="images/pic-3.jpeg" width="300" height="182"  style="margin-left:10px;" />

<?php

	}
	else if($log==1)	/// Log vaulue 1 then , process waiting for the result ///
	{

?>
	
   <meta http-equiv="refresh" content="2"> 
    
<p  align="center" style="color:#666; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; margin-top:100px;"> 

	Waiting to Complete Extraction ....

</p>
	
    
<?php

	}	
	else if($log==2) /// If log value is 2 then Extraction Process over ///
	{


		$values=array();

		$file1='C:\wamp\www\ParserTool\Log';

		$f1 = fopen($file1.'\\'.'Recent.txt', "r");	
									
		while ($line1 = fgets($f1, 1000)) 
		{
                                    		
      		$value1=$line1;    /// Getting the recently extracted Directory names from Recent.txt file ///                                  
                                    
		}


		$file2=$value1;

		if(file_exists($file2))
		{
	
			$f2 = fopen($file2.'\\'.'ExtractedList.txt', "r");	
									
			while ($line2 = fgets($f2, 1000)) 
			{
                                    		
      			$values[]=$line2;   /// Getting all the extracted status for recently extracted directory ///                                 
                                    
			}

		}
		
?>


 	<?php	$i=0; ?>

  <table align="center" width="800" border="0">

  <p  align="left" style="background-color:#C93; margin-left:-367px; color:#FFF; font-family:calibri; font-size:15px; width:200px; height:25px;">
 &nbsp;&nbsp; 3 . Extraction Result </p>          

   
   <input type="button" value="Exit" style="margin-left:450px; background-color:#003; color:#FFF; font-family:calibri; font-size:14px; width:48px; height:25px; margin-top:-48px;" onclick="javascript:button1();" />


  <tr>

  <div style="margin-left:10px; margin-top:-10px;"> 
                
        
    <td style="font-size:15px; font-family:calibri;"  align="left" width="22%" height="30">        
     <b style="margin-left:10px;">Input Source Directory  </b> </td>
	   
      
     <td align="center"> : </td> 
       
     <?php
	 
	 	
		if(!empty($values[$i]))
		{
		
			$values[$i]=str_replace('\\\\','\\',$values[$i]); 
	 	
		?>
        
        
		
	<td style="font-size:15px; font-family:calibri;" align="left">   
	
	<?php 
	
//			echo $values[$i].' -- '.strlen($values[$i]); 
	
			$string=$values[$i];
			
		
		// Adusting the display to print the Extracted Source directory name //
			
			if(strlen($values[$i])>50)	
			{
			
				for($ix1=0;$ix1<50;$ix1++)
				{
					
					echo $string[$ix1];
				
				}
				
				echo '<br>';
				
				
				for($ix2=50;$ix2<strlen($values[$i]);$ix2++)
				{
					
					echo $string[$ix2];
				
				}
				
			}
			else
			{
				
				echo $string;
				
			}
			
			////////////////////////////////////////////////////////////////////////
	
	?>
    
    
    </p>
    
    </td>
    
    </tr>

		
 <tr>
        
    <td style="font-size:15px; font-family:calibri;" align="left" width="22%" height="30">        
     <b style="margin-left:10px;">Output Source Directory  </b> </td>
	   
      
     <td align="center"> : </td> 
            
  <td style="font-size:15px; font-family:calibri;" align="left">C:\wamp\www\ParserTool\Extract </p></td></tr>


    
    <tr>
    
   <td style="font-size:15px; font-family:calibri;" align="left" height="30">
   <b style="margin-left:10px;">Total Directory Extracted  </b></td>
   
     <td align="center"> : </td>    
   
  <td style="font-size:15px; font-family:calibri;" align="left"> <?php echo $values[$i+1]; ?></td></tr>
    
  <tr>
  
   <td style="font-size:15px; font-family:calibri;" align="left" height="30">
   
   <b style="margin-left:10px;">Total Webpages Parsed </b> </td>
   
     <td align="center"> : </td>    
   
  <td style="font-size:15px; font-family:calibri;" align="left"> <?php echo $values[$i+2]; ?> </td>
   
   </tr>
   
    <tr>
       
       <td style="font-size:15px; font-family:calibri;" align="left" height="10">
       
       <b style="margin-left:10px;">Extracted Directory </b> </td>

     <td align="center"> : </td> 	   
       
       
       <?php 
	   
	   if(!empty($values[$i+3]))
	   {
	   
	   		$values[$i+3]=str_replace('C:\wamp\www\ParserTool','',$values[$i+3]); 
	   
	   }
	   
	   ?>
	   
	   <td style="font-size:15px;font-family:calibri;" align="left"><?php echo $values[$i+3]; ?></td>
    	
    </tr> 
       
</table>    
    
 </div>   
 
 <table align="center" width="800" border="0">
 
 <tr>
 
 <td>
 
 <p style=" margin-left:10px; margin-top:10px;background-color:#636;color:#FFF;width:200px;height:25px; font-family:calibri;">
 &nbsp;&nbsp; 4 . Convert to Odia Unicode 
 </p>        
      
</td>

</tr>   
   
   <?php

		
		// Writting Currently extracted directory name into a Text file for further reference //

   		$ext_dir='C:\wamp\www\ParserTool\Log\Extract.txt';
   
   		$ext='C:\wamp\www\ParserTool\\'.$values[$i+3];
		
   		$file=fopen($ext_dir,"w");
		
		fwrite($file,$ext);
	
	
	}
		
	?>		
    
    <tr>
    
    <td>
 		
   		 
        	
            <iframe src="uniframe.php" width="550" height="280" frameborder="0" style="margin-top:-10px;"></iframe>
    
    	 
        	
    
    </td>
    
    </tr>
    
    
	<?php

	}
	

  ?>
  
  </table>
 
</div> 