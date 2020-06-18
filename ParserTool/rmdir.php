<?php

$rm1=array();

$rm2=array();

$rmdir1=scandir($rmdir);

	foreach($rmdir1 as $rm)
	{
		
		if($rm!='.' && $rm!='..')
		{
			
			$rm1[]=$rm;
			
		}

	}
	
	$size=0;
	
	for($i=0;$i<sizeof($rm1);$i++)
	{
	
			
			if(is_dir($rmdir.'\\'.$rm1[$i].'\\'))
			{
				
				$rdir=scandir($rmdir.'\\'.$rm1[$i]);
				
				$size=sizeof($rdir);
			
			
			}
			else
			{
				
				$size=0;
		
			}
	
		
		if($size>2)
		{
			
				foreach($rdir as $rd)
				{
					
					
						if($rd!='.' && $rd!='..')
						{
					
							
							$rd_pos=strpos($rd,'.txt');
							
							
							if($rd_pos===false)
							{
								
								
								$rm1[]=$rm1[$i].'\\'.$rd;
								
								
							}
							else
							{
								
								$rm2[]=$rm1[$i].'\\'.$rd;	
								
							}


						}
						
				}
			
		}
}


///  Removing Extract Result Text File ///

	for($i2=0;$i2<sizeof($rm2);$i2++)
	{
		
		if(file_exists($rmdir.'\\'.$rm2[$i2]))
		{
			unlink($rmdir.'\\'.$rm2[$i2]);
		
		}
		
	}
		 

//// Removing the Folders of the Extracted Directory ///


	for($i1=sizeof($rm1)-1;$i1>=0;$i1--)
	{
		
		if(file_exists($rmdir.'\\'.$rm1[$i1]))
		{
		   
			//rmdir($rmdir.'\\'.$rm1[$i1]);
		
		}
		
	}


?>