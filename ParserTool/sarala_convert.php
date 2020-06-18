<meta charset='utf-8'>


<?php

	include 'db.php';

?>


<?php

$txt=$psum;

$txt=str_replace('&#956;','.',$txt);

$asc=ord($txt);

$ascii=array();

$psum1=NULL;


?>




<?php

for($i=0;$i<strlen($txt);$i++)
{
 
 
 

$iquery='SELECT * FROM sarala WHERE uascii IN ("'.ord($txt[$i]).'")';

$iresult=mysql_query($iquery,$db);

$irow=mysql_fetch_array($iresult);
		

if($irow['uascii']==ord($txt[$i]))
{
	
	$ascii[]=$irow['uascii'].' ';
	
	
}

 
 
}



$new_ascii=array();



for($j2=0;$j2<sizeof($ascii);$j2++)
{
	
			
	if($ascii[$j2]==210)
	{
		
		$x=$ascii[$j2+1];
		
		$ascii[$j2+1]=$ascii[$j2];
		
		$ascii[$j2]=$x;
		
		$j2++;
	}


}


for($j5=0;$j5<sizeof($ascii);$j5++)
{
	
	if(!empty($ascii[$j5]) && !empty($ascii[$j5+1]))
	{
	
			
	if($ascii[$j5]==210 && $ascii[$j5+1]==245)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
if(!empty($ascii[$j5+1]))
{
	if($ascii[$j5]==210 && $ascii[$j5+1]==212)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	if($ascii[$j5]==210 && $ascii[$j5+1]==237)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
}
	
if(!empty($ascii[$j5+1]))
{
   
	if($ascii[$j5]==210 && $ascii[$j5+1]==232)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	if($ascii[$j5]==210 && $ascii[$j5+1]==246)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	
	if($ascii[$j5]==210 && $ascii[$j5+1]==247)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	if($ascii[$j5]==210 && $ascii[$j5+1]==239)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}

	if($ascii[$j5]==210 && $ascii[$j5+1]==253)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}

}
	
}

}





for($j6=0;$j6<sizeof($ascii);$j6++)
{
	

if(!empty($ascii[$j6]) && !empty($ascii[$j6+1]))
{
			

if(!empty($ascii[$j6+1]))
{

	if($ascii[$j6]==202 && $ascii[$j6+1]==212)
	{
				
		$x=$ascii[$j6+1];
		
		$ascii[$j6+1]=$ascii[$j6];
		
		$ascii[$j6]=$x;
		
		$j6++;
		
	}

}

}


}


/*

for($j7=0;$j7<sizeof($ascii);$j7++)
{
	
			
	if($ascii[$j7]==210 && $ascii[$j7+1]==232)
	{
		
		$x=$ascii[$j7+1];
		
		$ascii[$j7+1]=$ascii[$j7];
		
		$ascii[$j7]=$x;
		
		$j5++;
	}


}

*/


for($j3=0;$j3<sizeof($ascii);$j3++)
{

	if($ascii[$j3]==207)
	{
		
		
		$ascii[$j3]=NULL;
	
		
	}
	
}

for($j4=0;$j4<sizeof($ascii);$j4++)
{
	
	if($ascii[$j4]==224)
	{
		
		$y=$ascii[$j4-1];
		
		$ascii[$j4-1]=$ascii[$j4];
		
		$ascii[$j4]=$y;
		
		$j4++;
	}
	
}

for($j7=0;$j7<sizeof($ascii);$j7++)
{
	
	
	if($ascii[$j7]==224 && $ascii[$j7+1]==202)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	
	
	if($ascii[$j7]==224 && $ascii[$j7+1]==210)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	
	
	if($ascii[$j7]==224 && $ascii[$j7+1]==231)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}	
	
	
	
	if($ascii[$j7]==224 && $ascii[$j7+1]==232)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}	
	
	
	if($ascii[$j7]==224 && $ascii[$j7+1]==246)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	
	
	
	if($ascii[$j7]==224 && $ascii[$j7+1]==250)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	
	
	
}


for($j8=0;$j8<sizeof($ascii);$j8++)
{
	
	if($ascii[$j8]==217)
	{
		
		$y=$ascii[$j8-1];
		
		$ascii[$j8-1]=$ascii[$j8];
		
		$ascii[$j8]=$y;
		
		$j8++;
	}
	
}

for($j9=0;$j9<sizeof($ascii);$j9++)
{
	
	if($ascii[$j9]==217 && $ascii[$j9+1]==210)
	{
		
		$y=$ascii[$j9-1];
		
		$ascii[$j9-1]=$ascii[$j9];
		
		$ascii[$j9]=$y;
		
		$j9++;
	}
	
	
	
	if($ascii[$j9]==217 && $ascii[$j9+1]==250)
	{
		
		$y=$ascii[$j9-1];
		
		$ascii[$j9-1]=$ascii[$j9];
		
		$ascii[$j9]=$y;
		
		$j9++;
	}
	
	
	
	
	if($ascii[$j9]==217 && $ascii[$j9+1]==164)
	{
		
		$y=$ascii[$j9-1];
		
		$ascii[$j9-1]=$ascii[$j9];
		
		$ascii[$j9]=$y;
		
		$j9++;
	}
	
	
	
	if($ascii[$j9]==217 && $ascii[$j9+1]==232)
	{
		
		$y=$ascii[$j9-1];
		
		$ascii[$j9-1]=$ascii[$j9];
		
		$ascii[$j9]=$y;
		
		$j9++;
	}
	
	
	
	
	
	
}




for($j12=0;$j12<sizeof($ascii);$j12++)
{
	
if(!empty($ascii[$j12]))
{

	if($ascii[$j12]==246 && $ascii[$j12-1]==208)
	{
		
		$y=$ascii[$j12-1];
		
		$ascii[$j12-1]=$ascii[$j12];
		
		$ascii[$j12]=$y;
		
		$j12++;
	}

  
 if(!empty($ascii[$j12+1]))
 {
	
	if($ascii[$j12]==220 && $ascii[$j12+1]==208)
	{
		
		$y=$ascii[$j12+1];
		
		$ascii[$j12+1]=$ascii[$j12];
		
		$ascii[$j12]=$y;
		
		$j12++;
		
	}
	
 }

}

}

	

for($j15=0;$j15<sizeof($ascii);$j15++)
{
	
/*	
	if($ascii[$j15]==222 && $ascii[$j15-1]==92)
	{
		
		$y=$ascii[$j15-1];
		
		$ascii[$j15-1]=$ascii[$j15];
		
		$ascii[$j15]=$y;
		
		$j15++;
		
	}
*/

}

for($j5=0;$j5<sizeof($ascii);$j5++)
{

	
	if($ascii[$j5]==250 && $ascii[$j5-1]==99)
	{
		
		 $ascii[$j5]=249;
		 
	}
	
	
	
	if($ascii[$j5]==250 && $ascii[$j5-1]==76)
	{
		
		 $ascii[$j5]=249;
		 
	}
	
	
	if($ascii[$j5]==250 && $ascii[$j5-1]==95)
	{
		
		 $ascii[$j5]=249;
		 
	}
	
	
	
	if($ascii[$j5]==250 && $ascii[$j5-1]==96)
	{
		
		 $ascii[$j5]=249;
		 
	}
	
		
}
	
for($j10=0;$j10<sizeof($ascii);$j10++)
{
	
	if($ascii[$j10]==249)
	{
		
		$y=$ascii[$j10-1];
		
		$ascii[$j10-1]=$ascii[$j10];
		
		$ascii[$j10]=$y;
		
		$j10++;
		
	}
	
	
	
}


?>

<?php


for($k=0;$k<sizeof($ascii);$k++)
{
		

$query='SELECT * FROM sarala WHERE uascii IN ("'.$ascii[$k].'")';

$result=mysql_query($query,$db);

$row=mysql_fetch_array($result);

$psum1=$psum1.$row['ori'];	
	
}



?>

