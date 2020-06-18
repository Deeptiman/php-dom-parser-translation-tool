<?php

$log12=0;

$file1='C:\wamp\www\ParserTool\Log\UnicodeLog.txt';

$f = fopen($file1, "r");	
									
while ($no = fgets($f, 1000)) 
{
                                    		
      $log12=$no;                                      
                                    
}


?>