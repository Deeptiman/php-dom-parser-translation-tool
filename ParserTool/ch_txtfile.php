<?php

$ch1=array();

$ch2=array();

if(is_dir(trim($ch_dir)))
{

	$ch_dir1=scandir($ch_dir);

	foreach($ch_dir1 as $ch)
	{
		
		if($ch!='.' && $ch!='..')
		{
			
			$ch1[]=$ch;
			
			
			$ch_pos=strpos($ch,'.txt');
			
			if($ch_pos===false)
			{
				
			}
			else
			{
				
				$ch2[]=$ch;
				
			}
			
		}
		
		

	}
	
	$size=0;
	
	for($i=0;$i<sizeof($ch1);$i++)
	{
	
			
			if(is_dir($ch_dir.'\\'.$ch1[$i].'\\'))
			{
				
				$rdir=scandir($ch_dir.'\\'.$ch1[$i]);
				
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
								
								
								$ch1[]=$ch1[$i].'\\'.$rd;
								
								
							}
							else
							{
								
								$ch2[]=$ch1[$i].'\\'.$rd;	
								
							}


						}
						
				}
			
		}
}




//// Removing the Folders of the Extracted Directory ///


	for($i1=sizeof($ch1)-1;$i1>=0;$i1--)
	{
		
		if(file_exists($ch_dir.'\\'.$ch1[$i1]))
		{
		   		   
		//	echo $ch_dir.'\\'.$ch1[$i1];
			
		//	echo '<br>';


		}
		
	}
	
	//echo '<br><Br>';

//	echo ' -- '.sizeof($ch2);

	for($i2=0;$i2<sizeof($ch2);$i2++)
	{
		
	//	echo ' --'.$ch2[$i2];
		
	//	echo '<br>';
				

	}

	//rmdir($ch_dir);
	
	if(sizeof($ch2)==0)
	{
				
		
		//unlink($chdir1.'\\'.'ExtractedList.txt');
		
		//rmdir($chdir1);
		
		for($i3=sizeof($ch1)-1;$i3>=0;$i3--)
		{
		
			if(file_exists($ch_dir.'\\'.$ch1[$i3]))
			{
		   		   
				   
				//   echo $ch_dir.' -- '.$ch1[$i3];
				   
				 //  echo '<br>';
				   
					rmdir($ch_dir.'\\'.$ch1[$i3]);
				
				
			}
		
		}
		
		
		rmdir($chdir2);
		
	}
	
	//echo '<br><br>';
	
}

?>