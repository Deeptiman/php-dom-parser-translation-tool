
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
   
   <?php
   
   
   /// Reading the recently extracted directory name to convert it into Unicode ///
   
    $file1='C:\wamp\www\ParserTool\Log\Extract.txt';

	$f = fopen($file1, "r");	
									
	while ($ex = fgets($f, 1000)) 
	{
                                    		
    	  $ext=trim($ex);                                    
                                    
	}
   
   	$not=explode('\\',$ext); 
	
	/// $not[sizeof($not)-1] : Extracted Input Source directory name ///
	   
   ?>
   
   <form id="form1" action="unicode_converter.php" method="post" target="unicode">
<input type="hidden" name="exdir" value="<?php echo $ext;?>"/>
<input type="hidden" name="nodir" value="<?php echo $not[sizeof($not)-1];?>"/>
   <input type="hidden" name="sarala" value="Sarala" />
   </form>
   
   
    <form id="form11" action="font_menu.php" method="post">   
	
    <input type="hidden" name="logs" value="1" />
    
   </form>
   
      
      
    <form id="form21" action="font_menu.php" method="post">   
	
    <input type="hidden" name="logs" value="1" />
    
    </form>
  
   
      
   <form id="form2" action="unicode_converter.php" method="post" target="unicode">
<input type="hidden" name="exdir" value="<?php echo $ext;?>"/>
<input type="hidden" name="nodir" value="<?php echo $not[sizeof($not)-1];?>"/>
   <input type="hidden" name="akruti" value="Akruti" />
   </form>
   
   
   
    <form id="form31" action="font_menu.php" method="post">   
	
    <input type="hidden" name="logs" value="1" />
    
   </form>

   
   
   <form id="form3" action="unicode_converter.php" method="post" target="unicode">
<input type="hidden" name="exdir" value="<?php echo $ext;?>"/>
<input type="hidden" name="nodir" value="<?php echo $not[sizeof($not)-1];?>"/>
   <input type="hidden" name="lsodia" value="LSOdia" />
   </form>
   
   
    <form id="form41" action="font_menu.php" method="post">   
	
    <input type="hidden" name="logs" value="1" />
    
   </form>

   
   <form id="form4" action="unicode_converter.php" method="post" target="unicode">
<input type="hidden" name="exdir" value="<?php echo $ext;?>"/>
<input type="hidden" name="nodir" value="<?php echo $not[sizeof($not)-1];?>"/>
   <input type="hidden" name="save" value="Save" />
   </form>
   
 <div style="margin-left:-15px; margin-top:-80px;" align="center">   
   
   
   
 <table align="center" width="550" height="180" border="0">
  
 <tr>
 
 <td align="center"  height="10" width="150">
 
 
 <?php
 
 if($log12==0)
 {
 

 ?>
 	
   <input type="button" name="sarala" value="Sarala" style="width:100px; background-color:#030; color:#FFF; height:25px; font-size:12px;" onclick="javascript:button1();" /> 

  <?php
  
 }
 else if($log12>0) /// If log value more than 1 then , Unicode conversion has been started and rest all buttons will be disabled ///
 {
	 
 ?>	 
 
<input type="button" name="sarala" value="Sarala" style="width:100px; background-color:#030; color:#FFF; height:25px; font-size:12px;" onclick="javascript:button1();" disabled="disabled" /> 

 <?php
 
 }
 
 ?>

  
 </td>
 

 
 <td align="center"  height="10" width="150">
   
 <?php
 
 if($log12==0)	/// If log value is 0 then , No Unicode conversion started ///
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
 
 if($log12==0) /// If log value is 0 then , No Unicode convesion started ///
 {
	  
 ?>	 
   
   <input type="button" name="lsodia" value="LSOdia" style="width:100px; background-color:#630; color:#FFF;height:25px; font-size:12px;"  onclick="javascript:button3();"/> 
   
  <?php
  
 }
 else if($log12>0) /// If log value more than 1 then , Unicode conversion has been started and all buttons will be disabled ///
 {
	 
 ?>	 
   
 <input type="button" name="lsodia" value="LSOdia" style="width:100px; background-color:#630; color:#FFF;height:25px; font-size:12px;"  onclick="javascript:button3();" disabled="disabled"/>
   
  <?php
 }
 
 ?>
  
   </td>
   
 
  
 <td align="center" height="10" width="150">
   
  <?php
  
  if($log12==0) /// If log value is 0 then , No Unicode convesion started ///
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