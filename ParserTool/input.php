<title> Input URL</title>
<center>
<?php


  $log=0;
  
  include 'create_files.php'; /// Checking all the System directories has been created or not ///
 	
  include 'log.php';  /// Checking Current log status for the Extraction Process ///
  
if(isset($_POST['log1']))
{
	
    include 'create_files.php'; /// Checking all the System directories has been created or not ///
   
	$log=0;
	
}


if(isset($_POST['log123']))
{
	

	$log=1;
		
}

?>

<div style="margin-top:-10px;">

<table align="center" width="700" border="0">
<tr>
<td colspan="3">

<script type="text/javascript">
 
function disableEnterKey(e)
{
 
	var key;
 
    if(window.event)
	{
      
    	key = window.event.keyCode;
      
    } 
	else
	{
      
  		key = e.which;     
		
    }
      
    if(key == 13)
	{
      
	    return false;
      
    }
	else 
	{
      
	    return true;
    
	}
      
}

</script> 


<script>
 
	function button1() 
	{
    	
		if(document.getElementsByName("txt")[0].value=='')
		{
			
			alert("Enter the Directory");
			
		}
		else
		{
				
			document.forms["form1"].submit();
			
			document.forms["form11"].submit();			
 	   
		   	document.forms["form2"].submit();
			
			setTimeout("location.reload(true);", 2000);
    	
			return true;
    
		}
		
	}
	
	function button2() 
	{
    		 
		
			document.forms["form3"].submit();
 	   
	   		document.forms["form4"].submit();
			
			document.forms["form5"].submit();
    	
			return true;
     
		
	}
	
    </script>


  	<form id="form3" action="input.php" method="post">
    <input type="hidden" value="0" name="log1">
    </form>

    <form id="form4" action="parser.php" method="post" target="abc">
    <input type="hidden" value="0" name="log2">
    </form>
    
    
    <form id="form5" action="result.php" method="post" target="xyz">
    <input type="hidden" value="0" name="log2">
    </form>




	
	<form id="form1" action="input.php" method="post">
    <input type="hidden" value="1" name="log123">
    </form>
    
    <form id="form11" action="result.php" method="post" target="xyz">
    <input type="hidden" value="1" name="log123">
    </form>
    

</td>

</tr>

<tr>

<td colspan="3">

<?php

if($log==0)
{

?>	
	<form action="parser.php" method="post" target="abc" id="form2"> 
	
    <input type="text" name="txt" value="" placeholder="Enter the directory path (contains html files)" style="width:500px; height:50px; font-size:14px;" onKeyPress="return disableEnterKey(event)" />
    <input type="hidden" value="1" name="tmp_no">
	</form>
    
<?php

}
else if($log>0) /// If log value is more than 1 then , user can't add more directory into System ///
{


?>
	<input type="text" name="txt" value="" placeholder="Extracting Started .." style="width:500px; height:50px; font-size:14px;" disabled="disabled" />	
    
<?php   
    
}

?>

</td>


<td align="right" valign="top">

 
	<?php
	
	if($log==0)
	{
				
	
	?>
    	
    	<input type="button" name="sub" value="Extract the Directory" style="width:150px; height:50px; color:#FFF; font-size:14px; background-color:#03C;" onclick="javascript:button1();" />
	   
    
	<?php	
	}
	else if($log>0) /// If log value is more than 1 then , user can't add more directory into System ///
	{
		
	?>	
    	
<input type="button" name="sub" value="Extracting" style="width:150px; height:50px; color:#FFF; font-size:14px; background-color:#03C;" disabled="disabled"  />	
	
    <?php    
	}
	?>



</form>

</td>

 <td align="left" valign="top">

<?php

if($log==0)
{
	
?>
    <input type="button" onclick="javascript:button2();" value="Don't Extract the Directory" style="width:190px; height:50px; margin-left:30px; color:#FFF; font-size:14px; background-color:#F00; margin-left:10px;" >


<?php

}
else /// If log value is more than 1 then , user Stop current extraction process and Add New Directory into the System  ///
{

?>

    <input type="button" onclick="javascript:button2();" value="Add New Directory" style="width:190px; height:50px; margin-left:30px; color:#FFF; font-size:14px; background-color:#F00; margin-left:10px;" >


<?php

}

?>
    
    
 
 </td>



</tr>

</table>

</div>