
<script>
 
	function button1() 
	{

		document.forms["form11"].submit();
	
		document.forms["form1"].submit();
		
		return true;

	}
	
	function button2() 
	{

		document.forms["form21"].submit();
		
		document.forms["form2"].submit();
						
		return true;

	}
	
	function button3() 
	{

		document.forms["form31"].submit();
		
		document.forms["form3"].submit();
						
		return true;

	}
	
	function button4() 
	{

		document.forms["form41"].submit();
		
		document.forms["form4"].submit();
						
		return true;

	}	

</script>
    
      
      
   <?php
   
		
	include 'unicodelog.php';
	
	if(isset($_POST['logs']))  // Accepting the request from user to change the Log value //
	{
	
		$log12=1;
		
	}
	else
	{
		
		$log12=0;
		
	}   
   
   ?> 

<div style="margin-top:100px;">   
   
    

</div>
   
<div style="margin-top:300px;">
   
  
   
   <?php
   
    $sub_dir=array();
   
	if(isset($_POST['ex_dir']))
	{
		
			$ex_dir=$_POST['ex_dir'];
		
		if(!empty($_POST['sub_ex_dir']))
		{
		
			$sub_ex_dir=$_POST['sub_ex_dir'];
	
			$sub_dir=array();
			
			foreach($sub_ex_dir as $sub)
			{
			
					$sub_dir[]=$sub;
				
					
			}
		
		}
		
		
		if(isset($_POST['only_txt']))
		{
			
			$only_txt=$_POST['only_txt'];
		
		}
		else
		{
			
			$only_txt=NULL;
		
		}
		
	}

   ?>
   
   
   
 <?php
 
 if(sizeof($sub_dir)>0)
 {
   
?>  

  <center>
  
  <img src="images/puri.jpg" width="500" height="400" style="margin-top:-300px;" />
  
  </center>

   <p align="center" style="font-family:calibri; font-size:20px; color:#009;">
   
   <b> Choose below font options to Convert to Unicode</b>
   
   </p>
   
   <form id="form1" action="convert_unicode_later.php" method="post">
   <input type="hidden" name="exdir" value="<?php echo $ex_dir;?>"/>
	
    <?php
   
   		for($x=0;$x<sizeof($sub_dir);$x++)  // Sub-directory names //
		{
			
	?>
    
		    <input type="hidden" name="subexdir[]" value="<?php echo $sub_dir[$x]; ?>" />	
        
    <?php
	
		}
		
	?>		
    
   <input type="hidden" name="only_txt" value="<?php echo $only_txt; ?>" />
    
   <input type="hidden" name="sarala" value="Sarala" />
   </form>
   
   
    <form id="form11" action="convert_font_menu.php" method="post">   
	
    <input type="hidden" name="logs" value="1" />
    
   </form>
   
      
      
    <form id="form21" action="convert_font_menu.php" method="post">   
	
    <input type="hidden" name="logs" value="1" />
    
    </form>
  
   
      
   <form id="form2" action="convert_unicode_later.php" method="post" >
<input type="hidden" name="exdir" value="<?php echo $ex_dir;?>"/>
 <?php
   
   		for($x=0;$x<sizeof($sub_dir);$x++)  // Sub-directory names //
		{
			
	?>
    
		    <input type="hidden" name="subexdir[]" value="<?php echo $sub_dir[$x]; ?>" />	
        
    <?php
	
		}
		
	?>	

   <input type="hidden" name="only_txt" value="<?php echo $only_txt; ?>" />    
   <input type="hidden" name="akruti" value="Akruti" />
   </form>
   
   
   
    <form id="form31" action="convert_font_menu.php" method="post">   
	
    <input type="hidden" name="logs" value="1" />
    
   </form>

   
   
   <form id="form3" action="convert_unicode_later.php" method="post" >
<input type="hidden" name="exdir" value="<?php echo $ex_dir;?>"/>
 <?php
   
   		for($x=0;$x<sizeof($sub_dir);$x++)  // Sub-directory names //
		{
			
	?>
    
		    <input type="hidden" name="subexdir[]" value="<?php echo $sub_dir[$x]; ?>" />	
        
    <?php
	
		}
		
	?>	
    
   <input type="hidden" name="only_txt" value="<?php echo $only_txt; ?>" />    
   <input type="hidden" name="lsodia" value="LSOdia" />
   </form>
   
   
    <form id="form41" action="convert_font_menu.php" method="post">   
	
    <input type="hidden" name="logs" value="1" />
    
   </form>

   
   <form id="form4" action="convert_unicode_later.php" method="post" >
<input type="hidden" name="exdir" value="<?php echo $ex_dir;?>"/>
 <?php
   
   		for($x=0;$x<sizeof($sub_dir);$x++)  // Sub-directory names //
		{
			
	?>
    
		    <input type="hidden" name="subexdir[]" value="<?php echo $sub_dir[$x]; ?>" />	
        
    <?php
	
		}
		
	?>	
    
   <input type="hidden" name="only_txt" value="<?php echo $only_txt; ?>" />    
   <input type="hidden" name="save" value="Save" />
   </form>
   
 <div style="margin-left:-15px; margin-top:-80px;" align="center">   
   
   
   
 <table align="center" width="550" height="180" border="0">
 
  
 <tr>
 
 <td align="center"  height="10" width="150">
 
 
 <?php
 
 if($log12==0)  /// If log value is 0 then , No Unicode conversion started ///
 {
 

 ?>
 	
   <input type="button" name="sarala" value="Sarala" style="width:100px; background-color:#030; color:#FFF; height:25px; font-size:12px;" onclick="javascript:button1();" /> 

  <?php
  
 }
 else if($log12>0) /// If log value more than 1 then , Unicode conversion has been started and all buttons will be disabled ///
 {
	 
 ?>	 
 
<input type="button" name="sarala" value="Sarala" style="width:100px; background-color:#030; color:#FFF; height:25px; font-size:12px;" onclick="javascript:button1();" disabled="disabled" /> 

 <?php
 
 }
 
 ?>

  
 </td>
 

 
 <td align="center"  height="10" width="150">
   
 <?php
 
 if($log12==0) /// If log value is 0 then , No Unicode conversion started ///
 {
	 
 ?>
 
 	 
   
   <input type="button" name="akruti" value="Akruti" style="width:100px; background-color:#006; color:#FFF;height:25px; font-size:12px;" onclick="javascript:button2();" /> 
 
 <?php
 
 }
 
 else if($log12>0) /// If log value more than 1 then , Unicode conversion has been started and all buttons will be disabled ///
 {
	 
?>	 
	
   <input type="button" name="akruti" value="Akruti" style="width:100px; background-color:#006; color:#FFF;height:25px; font-size:12px;" onclick="javascript:button2();"  disabled="disabled"/>
    
<?php
  
 }
 
?> 
 
 </td>
 
 
 
 <td align="center"  height="10" width="150">
 
 <?php
 
 if($log12==0)  /// If log value is 0 then , No Unicode conversion started ///
 {
	  
 ?>	 
   
   <input type="button" name="lsodia" value="LSOdia" style="width:100px; background-color:#630; color:#FFF;height:25px; font-size:12px;"  onclick="javascript:button3();"/> 
   
  <?php
  
 }
 else if($log12>0)  /// If log value more than 1 then , Unicode conversion has been started and all buttons will be disabled ///
 {
	 
 ?>	 
   
 <input type="button" name="lsodia" value="LSOdia" style="width:100px; background-color:#630; color:#FFF;height:25px; font-size:12px;"  onclick="javascript:button3();" disabled="disabled"/>
   
  <?php
 }
 
 ?>
  
   </td>
   
 
  
 <td align="center" height="10" width="150">
   
  <?php
  
  if($log12==0)  /// If log value is 0 then , No Unicode convresion started ///
  {
	  
  ?>
   
   <input type="button" name="save" value="Save to Text File" style="width:100px;  background-color:#F00; color:#FFF;height:25px; font-size:12px;"  onclick="javascript:button4();"/>       
  
  <?php
  }
  else if($log12>0)  /// If log value more than 1 then , Unicode conversion has been started and all buttons will be disabled ///
  {
  ?>
  
   <input type="button" name="save" value="Save to Text File" style="width:100px;  background-color:#F00; color:#FFF;height:25px; font-size:12px;"  onclick="javascript:button4();" disabled="disabled"/>
  
  <?php
  }
  ?>
      
  </td>
  
  </tr>
    
 </table> 
  </div>
  
  </div>

<?php

 }
 else
 {
 
 ?>
 
   <p align="center" style="font-family:calibri; font-size:20px; color:#009;">
   
   <b> No Extract Directory Files Found</b>
   
   </p>
   
   </div>
  
  </div>
 
 <?php
 }
 
 ?>