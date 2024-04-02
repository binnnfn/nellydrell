<?

function date_bar ($month,$year="2008"){
	
	if ($month==1){ 
		
		$prev_m = "12"; 
		$next_m = "02";  
		$prev_year = $year - 1; 
		$next_year = $year + 1;
		
	} elseif ($month == 12){ 
		
		$prev_m = "11"; 
		$next_m = "01";  
		$prev_year = $year - 1; 
		$next_year = $year + 1; 
		
	} else { 
		
		$prev_m = $month-1; 
		$next_m = $month+1; 
		if ($prev_m < 10){ $prev_m = "0".$prev_m; }
		if ($next_m < 10){ $next_m = "0".$next_m; }
	
		$prev_year = $year; 
		$next_year = $year;
		
	}
	
	 

	?><table width="738" cellpadding="0" cellspacing="0"><tr><td width="25"><a style="color:#000000;" href="/saal.ee/events/<?=$prev_year?>/<?=$prev_m?>/">&#60;&#60;</a> </td><?
	if ((int)$month<=6){
		
		// esimene pool aastast
		$start = 0;
		
	} else {
		
		// teine pool aastast
		$start = 6;
		
	}
	
	$iyear = substr($year,2,2);

	
	for ($i = 1 ; $i <= 6; $i++){
		
		$r = $start + $i;
		
		$imonth = strftime("%b",mktime(0, 0, 0, $r  , 1, 1980));
		
	
		if ($r < 10){ $i_value = "0".$r; } else { $i_value = $r; }
	
		if ($r == ((int)$month)){ 
			
			?><td align="center" width="114"><a style="color:#000000" href="/saal.ee/events/<?=$year?>/<?=$i_value?>/"><? print trim($imonth);  print "-".$iyear;?></a></td> <?
			
		} else { 
			
			?><td align="center" width="114"><a href="/saal.ee/events/<?=$year?>/<?=$i_value?>/"><? print trim($imonth);  print "-".$iyear;?></a></td> <?
			
		} // else
		
	 } // for

	?><td width="25"> <a style="color:#000000;" href="/saal.ee/events/<?=$next_year?>/<?=$next_m?>/">&#62;&#62;</a> </td></tr></table><?
	
	
	
	
	
} // function

?>