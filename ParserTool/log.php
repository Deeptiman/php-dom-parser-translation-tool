<?php

$log=0;

$file1='C:\wamp\www\ParserTool\Log\Log.txt';

$f = fopen($file1, "r");	
									
while ($no = fgets($f, 1000)) 
{
                                    		
      $log=$no;                                      
                                    
}


?>