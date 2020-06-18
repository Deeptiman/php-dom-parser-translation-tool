
<?php

// Extract Folder //

  $extract='C:\wamp\www\ParserTool\\'.'Extract';		
	
  if(!is_dir($extract))
  {
		
		mkdir($extract);

  }
  
 
 //History Folder
  
  
  $history='C:\wamp\www\ParserTool\\'.'History';		
	
  if(!is_dir($history))
  {
		
		mkdir($history);

  }
  
  
 //Log Folder 
  
  $log='C:\wamp\www\ParserTool\\'.'Log';		
	
  if(!is_dir($log))
  {
		
		mkdir($log);

  }
  
// Result Folder  
  
  $result='C:\wamp\www\ParserTool\\'.'Result';		
	
  if(!is_dir($result))
  {
		
		mkdir($result);

  }
  
  
  // HowitWorks Folder  
  
  $howitworks='C:\wamp\www\ParserTool\\'.'HowitWorks';		
	
  if(!is_dir($howitworks))
  {
		
		mkdir($howitworks);

  }
  
  
  //// Log Folder Files ////
  
  
  // Dir.txt //
  
  $dirtxt='Dir.txt';
  
  
  if(!file_exists($log.'\\'.$dirtxt))
  {
  
  		$file1=fopen($log.'\\'.$dirtxt,"w");
		
		$data='';
		
		fwrite($file1,$data);
  
  }
  
  // Extract.txt //
  
  
  
  $extxt='Extract.txt';
  
  
  if(!file_exists($log.'\\'.$extxt))
  {
  
  		$file2=fopen($log.'\\'.$extxt,"w");
		
		$data='';
		
		fwrite($file2,$data);
  
  }
  
  
  
  // ExtractedList.txt //
  
  
  $exttxt='ExtractedList.txt';
  
  
  if(!file_exists($log.'\\'.$exttxt))
  {
  
  		$file3=fopen($log.'\\'.$exttxt,"w");
		
		$data='';
		
		fwrite($file3,$data);
  
  }
  
  
  
  // HisLog.txt //
  
  
  $hislogtxt='HisLog.txt';
  
  
  if(!file_exists($log.'\\'.$hislogtxt))
  {
  
  		$file4=fopen($log.'\\'.$hislogtxt,"w");
		
		$data='0';
		
		fwrite($file4,$data);
  
  }
  
  
  // Log.txt //
  
  
  
  $logtxt='Log.txt';
  
  
  if(!file_exists($log.'\\'.$logtxt))
  {
  
  		$file5=fopen($log.'\\'.$logtxt,"w");
		
		$data='';
		
		fwrite($file5,$data);
  
  }
  

	// Recent.txt//


  $rectxt='Recent.txt';
  
  
  if(!file_exists($log.'\\'.$rectxt))
  {
  
  		$file6=fopen($log.'\\'.$rectxt,"w");
		
		$data='';
		
		fwrite($file6,$data);
  
  }

	
	// UnicodeLog.txt //

  $unitxt='UnicodeLog.txt';
  
  
  if(!file_exists($log.'\\'.$unitxt))
  {
  
  		$file7=fopen($log.'\\'.$unitxt,"w");
		
		$data='';
		
		fwrite($file7,$data);
  
  }


?>