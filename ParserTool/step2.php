<title> Step 2</title>

<meta charset='utf-8' />


<script>
 
	function button1() 
	{
			
		document.forms["form2"].submit();
			  	
		return true;
     
	}
	
</script>	 
 

<?php

	if(isset($_POST['step2']))
	{
		
		$string=$_POST['step2'];		

	}


	$breaking_txt=NULL;
	
	$breaking_point=array();

	$txt1='¼Ð';
	
	$txt2='.';
	
	$break_pos1=strpos($string,$txt1);
	
	if($break_pos1===false)
	{
		
		
	}
	else
	{
		
		$tx1='¼Ð';
	
		$breaking_point=explode($tx1,$string);
		
		$breaking_txt='¼Ð';
	}
	
	
	$break_pos2=strpos($string,$txt2);
	
	if($break_pos2===false)
	{
		
		
	}
	else
	{
		
		$tx2='.';
	
		$breaking_point=explode($tx2,$string);
		
		$breaking_txt='.';		
		
	}	
	
	
	 
	 if($break_pos1>0 && $break_pos2>0)
	 {
	 
	 		$breaking_point=NULL;
			
	 		$breaking_txt='¼Ð';
	
			$breaking_point=explode($breaking_txt,$string);
			
	 }
	 
	 if($break_pos1<=0 && $break_pos2<=0)
	 {
	 
	 		$breaking_point=NULL;
			
	 		$breaking_txt='.';
	
			$breaking_point=explode($breaking_txt,$string);
			
	 }
	 
	
?>


<table align="left" style="margin-left:50px; font-size:16px;border:1px solid #ccc; margin-top:10px;" width="500">

<tr>

<td bgcolor="#003399">

 <p style="margin-left:10px;font-size:20px; font-family:calibri; color:#FFF;">
 
	Tag Values in Paragraph
 
 </p>

</td>

</tr>

<tr>

<td>
 
  <p style="margin-left:10px; font-size:15px;"> <?php echo $string; ?> </p>

</td>

</tr>

</table>


 <div style="margin-top:10px;">
 
 
 <table style="margin-left:600px;border: 1px solid #ccc; top:20px; position:fixed;"  bgcolor="#FFFF66" width="600" border="0">
   
   <tr>
   
       <td bgcolor="#330066" width="300" colspan="2">
       
       <p style=" margin-left:10px;font-family:calibri; font-size:20px; color:#FFF;">
        
        Step.2
       
       </p>
       
       </td>
   
  
   </tr>
   
   
   <tr>
   
   <td width="180" align="left">
   
      <p  style="margin-left:10px; font-family:calibri; font-size:18px; color:#333;">
      
      	Breaking Point  
      
      </p>
    
    
   </td>
   
      <td align="left">
   
      <p  style="margin-left:5px; font-family:calibri; font-size:18px;">
      
      	 <b> : <?php echo $breaking_txt; ?> </b>
      
      </p>
    
    
   </td>
   
   </tr>
   
   
   <tr>
   
   <td width="180" align="left">
   
      <p  style="margin-left:10px; font-family:calibri; font-size:18px;color:#333;">
      
      	Total Number Lines  
      
      </p>
    
    
   </td>
   
      <td align="left">
   
      <p  style="margin-left:5px; font-family:calibri; font-size:18px;">
      
      :
      	 <?php
		 
		 	if(sizeof($breaking_point)>0)
			{
				echo sizeof($breaking_point); 
		 	
			}
			else
			{
				
				echo '0';
				
			}
		 
		 ?>
      
      </p>
    
    
   </td>
   
   </tr>
   
   
  
   <tr>
   
      <td align="left">
   
      <p  style="margin-left:10px;font-family:calibri; font-size:18px;color:#333;">
      
      	 Step 3 
      
      </p>
    
    
   </td>
   
         <td align="left">
   
      <p  style="margin-left:5px; font-family:calibri; font-size:18px;">
      
      	: Break the <b>Tag Value Paragraph</b> into Lines.
      
      </p>
    
    
   </td>
   
   </tr>
   
     <tr>
    
    <td align="right" colspan="2">
    
    <form action="step3.php" method="post" id="form2">
    
    <?php
	
		for($x=0;$x<sizeof($breaking_point);$x++)
		{
	
	?>
			
            <input type="hidden" name="step3[]" value="<?php echo trim($breaking_point[$x]); ?>" />		
        
    <?php    
		
		}
		
	?>
    
    </form>
       
    
<input type="button" value="Proceed To Step.3" style=" margin-right:30px; font-family:calibri; font-size:18px;background-color:#030; color:#FFF;" align="right" onclick="javascript:button1();">
        
          
        

    
    </td>
    
    
    </tr>
    
    </table>
   
     
 </div>
