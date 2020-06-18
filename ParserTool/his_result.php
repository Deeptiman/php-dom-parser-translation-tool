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

<h1 style="font-family:calibri; font-size:20px; margin-left:-8px; margin-top:-10px; background-color:#300; color:#FFF; width:810px;  height:30px;" align="center"> History Log Result  </h1>

<form action="his_result.php" method="post" id="form1">
   
<input type="hidden" name="exit" value="" />
   
</form>

<?php

	include 'log.php';
		
if(isset($_POST['exit']))
{

	$log=0;
	
	$log_dir='C:\wamp\www\ParserTool\Log\Log.txt';  /// Changing the Log status into 0 ///
				
	$file1=fopen($log_dir,"w");
	
	$log_id='0';
	
	fwrite($file1,$log_id);	
	
	die;   /// Exits the all process ///

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
	
	
	if($log==0)  /// Log  status 0 then , No process currently executed ///
	{
?>

<p  align="center" style="color:#CCC; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; margin-top:100px;"> 

	No Results
 
</p>

<?php

	}
	else if($log==1)  /// Log vaulue 1 then , process waiting for the result ///
	{

?>
	
   <meta http-equiv="refresh" content="2"> 
    
<p  align="center" style="color:#666; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:18px; margin-top:100px;"> 

	Waiting to Complete Extraction ....

</p>
	
    
<?php

	}	
	else if($log==2)  /// If log value is 2 then Extraction Process over ///
	{

		$values=array();

		$file1='C:\wamp\www\ParserTool\Log';

		$f1 = fopen($file1.'\\'.'Recent.txt', "r");	
									
		while ($line1 = fgets($f1, 1000)) 
		{
                                    		
      		$value1=$line1;  /// Getting the recently extracted Directory names from Recent.txt file ///                                    
                                    
		}


		$file2=$value1;

		$f2 = fopen($file2.'\\'.'ExtractedList.txt', "r");	
									
		while ($line2 = fgets($f2, 1000)) 
		{
                                    		
      		$values[]=$line2; /// Getting all the extracted status for recently extracted directory ///       
                                    
		}

?>


 	<?php	$i=0; ?>
			
  <p  align="left" style="background-color:#C93; margin-left:-470px; color:#FFF; font-family:calibri; font-size:15px; width:200px; height:25px;">
 &nbsp;&nbsp; 3 . Extracting Result </p>  
 
 <input type="button" value="Exit" style="margin-left:450px; background-color:#003; color:#FFF; font-family:calibri; font-size:14px; width:48px; height:25px; margin-top:-48px;" onclick="javascript:button1();" />        
   
  <div style="margin-left:12px; margin-top:-10px;"> 
            
    <table align="center" width="800">
    
    <tr>
        
    <td style="font-size:15px; font-family:calibri;" align="left" width="22%" height="30">        
     <b>Input Source Directory  </b> </td>
	   
      
     <td align="center"> : </td> 
       
     <?php $values[$i]=str_replace('\\\\','\\',$values[$i]); ?>
       
	<td style="font-size:15px; font-family:calibri;" align="left">   <?php echo $values[$i]; ?></p></td></tr>


 <tr>
        
    <td style="font-size:15px; font-family:calibri;" align="left" width="22%" height="30">        
     <b>Output Source Directory  </b> </td>
	   
      
     <td align="center"> : </td> 
            
  <td style="font-size:15px; font-family:calibri;" align="left">D:\wamp\www\Odia\HTML Parser Tool\Extract </p></td></tr>


    
    <tr>
    
   <td style="font-size:15px; font-family:calibri;" align="left" height="30">
   <b>Total Directory Extracted  </b></td>
   
     <td align="center"> : </td>    
   
  <td style="font-size:15px; font-family:calibri;" align="left"> <?php echo $values[$i+1]; ?></td></tr>
    
  <tr>
  
   <td style="font-size:15px; font-family:calibri;" align="left" height="30">
   
   <b>Total Webpages Parsed </b> </td>
   
     <td align="center"> : </td>    
   
  <td style="font-size:15px; font-family:calibri;" align="left"> <?php echo $values[$i+2]; ?> </td>
   
   </tr>
   
    <tr>
       
       <td style="font-size:15px; font-family:calibri;" align="left" height="10">
       
       <b>Extracted Directory </b> </td>

     <td align="center"> : </td> 	   
       
       <?php $values[$i+3]=str_replace('C:\wamp\www\ParserTool','',$values[$i+3]); ?>
	   
	   <td style="font-size:15px; font-family:calibri;" align="left"><?php echo $values[$i+3]; ?></td>
    	
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
		
   
   ?>
   
    <tr>
    
    <td>
 		
   
 	<iframe src="his_uniframe.php" width="670" height="480" frameborder="0" scrolling="no" style="margin-top:10px;"></iframe>
    
<?php

	}
	
?>

</td>

</tr>

</table>
 
</div> 