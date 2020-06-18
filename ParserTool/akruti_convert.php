<meta charset='utf-8'>


<?php

	include 'db.php';

?>



<?php

$txt=$psum;

$asc=ord($psum);

$ascii=array();

$psum1=NULL;


for($i=0;$i<strlen($txt);$i++)
{
 

$iquery='SELECT * FROM akruti WHERE aascii IN ("'.ord($txt[$i]).'")';

$iresult=mysql_query($iquery,$db);

$irow=mysql_fetch_array($iresult);
		

if($irow['aascii']==ord($txt[$i]))
{
	
	$ascii[]=$irow['aascii'].' ';
	
	
}

 
 
}



$new_ascii=array();



for($j2=0;$j2<sizeof($ascii);$j2++)
{
	
if(!empty($ascii[$j2+1]))
{

	if($ascii[$j2]==249)
	{
		
		$x=$ascii[$j2+1];
		
		$ascii[$j2+1]=$ascii[$j2];
		
		$ascii[$j2]=$x;
		
		$j2++;
	}

}

}


for($j5=0;$j5<sizeof($ascii);$j5++)
{
	
	
if(!empty($ascii[$j5]) && !empty($ascii[$j5+1]))
{
			
			
	if($ascii[$j5]==249 && $ascii[$j5+1]==226)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==214)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==218)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
if(!empty($ascii[$j5+1]))
{
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==223)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==224)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==228)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==232)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==253)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==165)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	


	if($ascii[$j5]==249 && $ascii[$j5+1]==230)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	

	
/*

୍ୱ
	if($ascii[$j5]==249 && $ascii[$j5+1]==232)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}

*/
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==226)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	
	
	
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==227)
	{
		
		$x=$ascii[$j5+1];
		
		$ascii[$j5+1]=$ascii[$j5];
		
		$ascii[$j5]=$x;
		
		$j5++;
	}
	
	
	
	
	if($ascii[$j5]==249 && $ascii[$j5+1]==220)
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
	
if(!empty($ascii[$j6]) && !empty($asii[$j6+1]))
{
			
	if($ascii[$j6]==234 && $ascii[$j6+1]==253)
	{
		
		$x=$ascii[$j6+1];
		
		$ascii[$j6+1]=$ascii[$j6];
		
		$ascii[$j6]=$x;
		
		$j6++;
	}



	if($ascii[$j6]==234 && $ascii[$j6+1]==165)
	{
		
		$x=$ascii[$j6+1];
		
		$ascii[$j6+1]=$ascii[$j6];
		
		$ascii[$j6]=$x;
		
		$j6++;
		
	}


}

}

for($j61=0;$j61<sizeof($ascii);$j61++)
{
	
if(!empty($ascii[$j61]) && !empty($asii[$j61+1]))
{
			
	if($ascii[$j61]==235 && $ascii[$j61+1]==253)
	{
		
		$x=$ascii[$j61+1];
		
		$ascii[$j61+1]=$ascii[$j61];
		
		$ascii[$j61]=$x;
		
		$j61++;
	}



	if($ascii[$j61]==234 && $ascii[$j61+1]==165)
	{
		
		$x=$ascii[$j61+1];
		
		$ascii[$j61+1]=$ascii[$j61];
		
		$ascii[$j61]=$x;
		
		$j61++;
		
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

/*

.

for($j3=0;$j3<sizeof($ascii);$j3++)
{

	if($ascii[$j3]==207)
	{
		
		
		$ascii[$j3]=NULL;
	
		
	}
	
}

*/

for($j4=0;$j4<sizeof($ascii);$j4++)
{
	
	if($ascii[$j4]==240)
	{
		
		$y=$ascii[$j4-1];
		
		$ascii[$j4-1]=$ascii[$j4];
		
		$ascii[$j4]=$y;
		
		$j4++;
	}
	
}

for($j7=0;$j7<sizeof($ascii);$j7++)
{
	
	
if(!empty($ascii[$j7]) && !empty($ascii[$j7+1]))
{

	if($ascii[$j7]==240 && $ascii[$j7+1]==234)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	
	
	
	
	
	if($ascii[$j7]==240 && $ascii[$j7+1]==242)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	
	
	if($ascii[$j7]==240 && $ascii[$j7+1]==235)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	
	
	if($ascii[$j7]==240 && $ascii[$j7+1]==249)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	




	if($ascii[$j7]==240 && $ascii[$j7+1]==223)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}	
	



	if($ascii[$j7]==240 && $ascii[$j7+1]==226)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	
	
	if($ascii[$j7]==240 && $ascii[$j7+1]==227)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	
	
/*	
	if($ascii[$j7]==240 && $ascii[$j7+1]==250)
	{
		
		$y=$ascii[$j7-1];
		
		$ascii[$j7-1]=$ascii[$j7];
		
		$ascii[$j7]=$y;
		
		$j7++;
	}
	
*/

}
	
}

/*

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


*/




for($j5=0;$j5<sizeof($ascii);$j5++)
{


if(!empty($ascii[$j5-1]))
{

	
	if($ascii[$j5]==244 && $ascii[$j5-1]==91)
	{
		
		 $ascii[$j5]=242;
		 
	}
	
	
	if($ascii[$j5]==244 && $ascii[$j5-1]==76)
	{
		
		 $ascii[$j5]=242;
		 
	}
	
	
	if($ascii[$j5]==244 && $ascii[$j5-1]==42)
	{
		
		 $ascii[$j5]=242;
		 
	}
	
	
	if($ascii[$j5]==244 && $ascii[$j5-1]==93)
	{
		
		 $ascii[$j5]=242;
		 
	}
	
	/*
	if($ascii[$j5]==250 && $ascii[$j5-1]==94)
	{
		
		 $ascii[$j5]=244;
		 
	}
	
	
	
	if($ascii[$j5]==250 && $ascii[$j5-1]==137)
	{
		
		 $ascii[$j5]=244;
		 
	}
	*/
	
 }
		
}



for($j10=0;$j10<sizeof($ascii);$j10++)
{
	

if(!empty($ascii[$j10-1]))
{
	
	if($ascii[$j10]==244)
	{
		
		$y=$ascii[$j10-1];
		
		$ascii[$j10-1]=$ascii[$j10];
		
		$ascii[$j10]=$y;
		
		$j10++;
		
	}
	
}
	
}


for($j12=0;$j12<sizeof($ascii);$j12++)
{
	

if(!empty($ascii[$j12-1]))
{
	
	if($ascii[$j12]==226 && $ascii[$j12-1]==251)
	{
		
		$y=$ascii[$j12-1];
		
		$ascii[$j12-1]=$ascii[$j12];
		
		$ascii[$j12]=$y;
		
		$j12++;
	}
	
	
	if($ascii[$j12]==226 && $ascii[$j12-1]==246)
	{
		
		$y=$ascii[$j12-1];
		
		$ascii[$j12-1]=$ascii[$j12];
		
		$ascii[$j12]=$y;
		
		$j12++;
	}
	
	
  }


}





for($j13=0;$j13<sizeof($ascii);$j13++)
{
	
	
 if(!empty($ascii[$j13-1]))
 {
  
	
	if($ascii[$j13]==227 && $ascii[$j13-1]==251)
	{
		
		$y=$ascii[$j13-1];
		
		$ascii[$j13-1]=$ascii[$j13];
		
		$ascii[$j13]=$y;
		
		$j13++;
	}
	
	
	if($ascii[$j13]==227 && $ascii[$j13-1]==246)
	{
		
		$y=$ascii[$j13-1];
		
		$ascii[$j13-1]=$ascii[$j13];
		
		$ascii[$j13]=$y;
		
		$j13++;
	}
	
	
 }


}

/*

for($j14=0;$j14<sizeof($ascii);$j14++)
{
	
	
	if($ascii[$j14]==242 && $ascii[$j14-1]==75)
	{
		
		$y=$ascii[$j14-1];
		
		$ascii[$j14-1]=$ascii[$j14];
		
		$ascii[$j14]=$y;
		
		$j14++;
	}
	
	
}

*/

for($k=0;$k<sizeof($ascii);$k++)
{
		

$query='SELECT * FROM akruti WHERE aascii IN ("'.$ascii[$k].'")';

$result=mysql_query($query,$db);

$row=mysql_fetch_array($result);

$psum1=$psum1.$row['aori'];	
	
}


$psum1=str_replace("ଅା","ଆ",$psum1);

?>



