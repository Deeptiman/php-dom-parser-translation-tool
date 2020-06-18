<title> Step 3 </title>

<meta charset='utf-8'/>

<?php

	$string=NULL;

	if(isset($_POST['step3']))
	{
			
		$string=$_POST['step3'];

	}

 $c=0;

 $lines=array();
 

if($string!=NULL)
{
	
	foreach($string as $str)
	{
		
		$c++;
		
		if(strlen($str)>10)
		{
		
			$lines[]=trim($str);
		
		}
		
//		echo trim($str).' -- '.strlen(trim($str));
		
//		echo '<br>';
		
	}

?>


	<table style="margin-left:30px;border: 1px solid #ccc;" border="1" width="700">
    
    <tr>
    
    <td align="left" colspan="3" style="margin-left:5px;">
    
    <p style="background-color:#C00; color:#FFF; font-family:calibri; font-size:20px;">
    
    	&nbsp;&nbsp;Paragraph breaks into lines
    
    </p>
    
    </td>
    
    </tr>
    
    <?php
	
	$c1=0;
	
		for($i=0;$i<sizeof($lines);$i++)
		{
	
			
			if(strlen($lines[$i])>0)
			{
	
				$c1++;
				
	?>

			<tr>
            
            <td style="border: 1px solid #ccc;" width="40">
            
            	<p style="margin-left:3px; font-size:15px; color:#333;"> <?php echo $c1; ?> </p>
            
            </td>
            
            
            
         <td style="border: 1px solid #ccc;">
         <p style="margin-left:3px; font-size:15px; color:#333;"><?php echo $lines[$i]; ?></p></td>
            
            </tr>	
    
    <?php
    	
			}
		
		}
		
	?>
	
    </table>
    
 <?php
 
}
else
{

	$lines=NULL;

?>
	
    <table  align="center" width="400" border="0">

    
<tr>
<td align="center" style="border: 1px solid #fff;">

<a href="parser_api.php" target="xyz" style="text-decoration:none;">
   <input type="button" value="Back to Home" style=" margin-right:30px; font-family:calibri; font-size:18px;background-color:#C30; color:#FFF;" align="right" onclick="javascript:button1();">
   
   </a>
   
 </td>
 
 </tr>  
      
   </table>

<?php	
	
}

?>

    
     <div style="margin-top:10px;">
 
 
   <table style="margin-left:800px;border: 1px solid #ccc; top:20px; position:fixed;"  width="400" border="0">
   
   <tr>
   
   <td bgcolor="#0033CC" align="left"> 
   
   <p style="background-color:#03C; color:#FFF; font-family:calibri; font-size:20px;">&nbsp;&nbsp;Result </p>
   
   </td>
   
   
   </tr>
   
   <tr>
   
   <td align="center" style="border: 1px solid #ccc;">
   
    <h2 style="font-family:calibri; font-size:60px; height:30px;"><?php echo sizeof($lines); ?></h2>
   
   </td>
   
   </tr>
   
   <tr>
   
   <td align="center">
   
   <p style="font-family:calibri; font-size:22px; background-color:#CF6;">No of Lines</p>
   
   </td>
   
   </tr>

<tr>
<td align="right" style="border: 1px solid #fff;margin-left:855px; margin-top:50px;">

<a href="parser_api.php" target="xyz" style="text-decoration:none;">
   <input type="button" value="Back to Home" style=" margin-right:30px; font-family:calibri; font-size:18px;background-color:#C30; color:#FFF;" align="right" onclick="javascript:button1();">
   
   </a>
   
 </td>
 
 </tr>  
      
   </table>
   
   
