<?php


	$his_count=0;
	
	$file1='C:\wamp\www\ParserTool\History\\';
	
	
	$his_dir=scandir($file1);
	
	foreach($his_dir as $his)
	{
	
		if($his!='.' && $his!='..')
		{
		
			$his_count++;
		
		}
		
	}


	if($his_count==0)
	{

		$file1='C:\wamp\www\ParserTool\Log\HisLog.txt';
		
		$file123=fopen($file1,"w");
		
		fwrite($file123,$his_count);		
 	
	}
	else
	{
		
?>		
	
    	
<?php

	}
	


?>



<?php
	
	$log=0;
	
	$file1='C:\wamp\www\ParserTool\Log\HisLog.txt';
	

	$f = fopen($file1, "r");	
									
	while ($no = fgets($f, 1000)) 
	{
                                    		
    	  $log=$no;                                      
                                    
	}
	
	$his_log=$log;

?>











