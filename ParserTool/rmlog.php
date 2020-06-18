<?php

$logdir='C:\wamp\www\Odia Tools\HTML Parser Tool\Log\\';

if(file_exists($logdir.$newfld1[sizeof($newfld1)-1]))
{
	
	
	if(file_exists($logdir.$newfld1[sizeof($newfld1)-1].'\\'.'ExtractedList.txt'))
	{	
	
		unlink($logdir.$newfld1[sizeof($newfld1)-1].'\\'.'ExtractedList.txt');
		
	}
	
	
	if(file_exists($logdir.$newfld1[sizeof($newfld1)-1].'\\'.'CurrentExtract.txt'))
	{

		 unlink($logdir.$newfld1[sizeof($newfld1)-1].'\\'.'CurrentExtract.txt');
	
	}
	
	
	if(file_exists($logdir.$newfld1[sizeof($newfld1)-1].'\\'.'UnicodeStatus.txt'))
	{
		
		 unlink($logdir.$newfld1[sizeof($newfld1)-1].'\\'.'UnicodeStatus.txt');	

	}
	
	//rmdir($logdir.$newfld1[sizeof($newfld1)-1]);

}

?>