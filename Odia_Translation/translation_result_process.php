<title> Parsing Extraction Result </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

include 'db.php';
$one=0;
$res=0;
$sort_start=array();
$sort_end=array();
$codes=array();
$new_magic_pos=array();
$new_res=array();
$old_posi=array();
$new_posi=array();
$final_text=array();
$start_range=array();
$end_range=array();
$start=array();
$end=array();

$text=$wscript_value[$k];

	
	$text=str_replace('&quot;',"'",$text);	
	$text=str_replace("1","୧",$text);
	$text=str_replace("2","୨",$text);
	$text=str_replace("3","୩",$text);
	$text=str_replace("4","୪",$text);
	$text=str_replace("5","୫",$text);
	$text=str_replace("6","୬",$text);
	$text=str_replace("7","୭",$text);
	$text=str_replace("8","୮",$text);
	$text=str_replace("9","୯",$text);
	$text=str_replace("0","୦",$text);


$query='TRUNCATE TABLE special_chars_pos';
		mysql_query($query,$db);
		
$query='TRUNCATE TABLE position';
		mysql_query($query,$db);		


	
for($i=0;$i<strlen($text);$i++)
{
	$j=$i+1;
	
	$spquery='SELECT * FROM special_chars WHERE special IN ("'.$text[$i].'")';
	$spresult=mysql_query($spquery,$db);
	if(!empty($spresult))
	{
		$sprow=mysql_fetch_array($spresult);
	}
	
	if(!empty($sprow['special']))
	{		
		$code=$j;
		
		$codes[]=$code;
		
		if($i==0)
		{
			$one++;
			$num=1;
			$new_query='INSERT INTO special_chars_pos
						(charts,old_pos,new_pos)	
							   VALUES
						("'.$text[$i].'","'.$code.'","'.$num.'")';	   
						mysql_query($new_query,$db);		
			
		}
		else
		{
			$new_query='INSERT INTO special_chars_pos
							(charts,old_pos)	
							   VALUES
						("'.$text[$i].'","'.$code.'")';	   
						mysql_query($new_query,$db);
		}
		if($code==strlen($text))
		{
			$last_num=$code;
			
		}
		
				
					$text[$i]=' ';		
					
						
				
	}
	

}

$c=0;
$d=0;

$sum=NULL;

$form=NULL;


$break=explode(" ",$text);




$query='TRUNCATE TABLE temp_key';
		mysql_query($query,$db);
		
		
for($i=0;$i<sizeof($break);$i++)
{
	
		$fpos=stripos(' '.trim($text),$break[$i]);
		
		if($fpos)
		{		
			 $new_break[]=$break[$i];
			 $start_range[]=$fpos;
			 $end_range[]=strlen($break[$i])+$fpos-1;
			
		}
		
		
		
		$lpos=strripos(' '.trim($text),$break[$i]);
		
		if($lpos!=$fpos)
		{
			 $new_break[]=$break[$i];
			 $start_range[]=$lpos;
			 $end_range[]=strlen($break[$i])+$lpos-1;
			
		}

if($form==NULL)
{
	$form=$form.$break[$i];	
}
else
{
	$form=$form.' '.$break[$i];	
	
}


}



$query='SELECT * FROM word_dic';
$result=mysql_query($query,$db);
while($row=mysql_fetch_array($result))
{

	$first=stripos(' '.trim($form),$row['word_name']);
	$second=strripos(' '.trim($form),$row['word_name']);
	
	
	if($first)
	{
		
		 $search[]=$row['word_name'];
		 $start_range[]=$first;
		 $end_range[]=strlen($row['word_name'])+$first-1;
		
	}
	
	
	if($second!=$first)
	{
		
		 $search[]=$row['word_name'];	
		 $start_range[]=$second;
		 $end_range[]=strlen($row['word_name'])+$second-1;
	
	}
   	
}

for($i=0;$i<sizeof($start_range);$i++)
{
	$start_key=$start_range[$i];
	$end_key=$end_range[$i];
	
	for($j=0;$j<sizeof($start_range);$j++)
	{
		if($start_range[$j]>=$start_key && $end_range[$j]<$end_key)
		{
			$start_range[$j]=NULL;
			$end_range[$j]=NULL;
		
		}
	}
	
}


for($i=0;$i<sizeof($start_range);$i++)
{
	if($start_range[$i]!=NULL)
	{
		
		     $start[]=$start_range[$i];			 
			 $end[]=$end_range[$i];
			
	}
}

		
for($i=0;$i<sizeof($start);$i++)
{
	
	$l=$end[$i]-$start[$i]+1;
	$j=$i+1;
	
	$query='INSERT INTO temp_key
			(key_value,value_key,len_key)
					VALUES
			("'.$start[$i].'","'.$end[$i].'","'.$l.'")';			
			mysql_query($query,$db);
	
}


$query='SELECT  * FROM temp_key ORDER BY key_value ASC';
$result=mysql_query($query,$db);
while($row=mysql_fetch_array($result))
{
	$sort_start[]=$row['key_value'];
	$sort_end[]=$row['value_key'];
}

for($i=0;$i<sizeof($sort_start);$i++)
{
			
	$j=$i+1;
	if(!empty($sort_start[$i+1]))
	{
		if(($sort_start[$i+1]-$sort_end[$i])>1)
		{
				
				 $s=$sort_end[$i]+1;
				 $e=$sort_start[$i+1]-1;
				 
			for($m=$s;$m<=$e;$m++)
			{
			
				$ends=$m;
			}
			
			
			$l=$ends-$s+1;
			
 			
		
			$query='INSERT INTO temp_key
					(key_value,value_key,len_key)
						VALUES
				("'.$s.'","'.$ends.'","'.$l.'")';			
				mysql_query($query,$db);
	
			
				
		}
	}
}

$query='TRUNCATE TABLE final_table';
		mysql_query($query,$db);

$query='SELECT * FROM temp_key ORDER BY key_value ASC';
$result=mysql_query($query,$db);
while($row=mysql_fetch_array($result))
{
	
	 
	 
	 $myquery='SELECT * FROM final_table WHERE end_pos IN ("'.$row['value_key'].'")';
	 $myresult=mysql_query($myquery,$db);
	 $myrow=mysql_fetch_array($myresult);
	
	if(empty($myrow['end_pos']))
	{
	
	$newquery='INSERT INTO final_table
				(start_pos,end_pos,length)
					VALUES
				("'.$row['key_value'].'","'.$row['value_key'].'","'.$row['len_key'].'")';
				mysql_query($newquery,$db);		
	}
	
	 
}






		


$query='SELECT * FROM final_table';
$result=mysql_query($query,$db);
while($row=mysql_fetch_array($result))
{
	$final_text[]=substr(' '.trim($text),$row['start_pos'],$row['length']);
	
}

$result_sum=NULL;

$magic_pos=0;

for($i=0;$i<sizeof($codes);$i++)
{
		
	$query='INSERT INTO position
			  (old_posi)
				VALUES
			("'.$codes[$i].'")';
			mysql_query($query,$db);

}

for($i=0;$i<sizeof($final_text);$i++)
{
	  		
	$j=$i+1;		
	
	$magic_pos=$magic_pos+strlen($final_text[$i]);
	
	if($one>0)
	{
		$new_magic_pos[]=$magic_pos+1;
		
	}
	else
	{
		$new_magic_pos[]=$magic_pos;				
	}
	

$query1='SELECT * FROM word_dic WHERE word_name IN ("'.strtolower($final_text[$i]).'")';
$result1=mysql_query($query1,$db);

$row1=mysql_fetch_array($result1);

if(!empty($row1['word_name']))
{
	$res=$res+strlen($row1['word_hex']);
	$new_res[]=$res;
	
	$result_sum=$result_sum.$row1['word_hex'];
	

	
}
else
{
	$res=$res+strlen($final_text[$i]);
	$new_res[]=$res;
	$result_sum=$result_sum.$final_text[$i];	


}

}





for($i=0;$i<sizeof($new_magic_pos);$i++)
{
	
	$query='INSERT INTO position
			  (old_posi,new_posi)
				VALUES
			("'.$new_magic_pos[$i].'","'.$new_res[$i].'")';
			mysql_query($query,$db);
	

}

$query='SELECT * FROM position ORDER BY old_posi ASC';
$result=mysql_query($query,$db);
while($row=mysql_fetch_array($result))
{
	$old_posi[]=$row['old_posi'];
	$new_posi[]=$row['new_posi'];
	
}

for($i=0;$i<sizeof($old_posi);$i++)
{
	if(empty($new_posi[$i]))
	{
		if($i==0)
		{
			$new_posi[$i]=1;
	
		}
		else
		{
			$new_posi[$i]=$new_posi[$i-1]+1;
		}
	}
}

for($i=0;$i<sizeof($old_posi);$i++)
{
	

	$query='UPDATE special_chars_pos
			SET
			new_pos="'.$new_posi[$i].'"
			WHERE
			old_pos="'.$old_posi[$i].'"';
			mysql_query($query,$db);


}


$last_text[0]=NULL;
$nw_len=strlen($result_sum)+1;

if(!empty($last_num))
{
$query='UPDATE special_chars_pos
			SET
			new_pos="'.$nw_len.'"
			WHERE
			old_pos="'.$last_num.'"';
			mysql_query($query,$db);
}

	$special_query='SELECT * FROM special_chars_pos WHERE new_pos="'.$nw_len.'"';
	$special_result=mysql_query($special_query,$db);
	$special_row=mysql_fetch_array($special_result);

	
$last_text[0]=$special_row['charts'];	

$first_text[0]=NULL;

for($i=0;$i<strlen($result_sum);$i++)
{	
	$j=$i+1;
	
	$special_query='SELECT * FROM special_chars_pos WHERE new_pos="'.$j.'"';
	$special_result=mysql_query($special_query,$db);
	$special_row=mysql_fetch_array($special_result);
	
	if($special_row['old_pos']==1)
	{
		$first_text[0]=$special_row['charts'];	
		
	}
	
	else if($special_row['new_pos']==$j)
	{	
		$result_sum[$i]=$special_row['charts'];

	}
}



$final_sum_text=$first_text[0].$result_sum.$last_text[0];
$first_text[0]=NULL;
$last_text[0]=NULL;




?>

