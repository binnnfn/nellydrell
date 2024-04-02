<?

/////////////////////////////////////////////////////////////
//   
//	mod_news.php - Uudistemoodul
//
//	D'Art 2003
//
//	Timo Toots
//
//	Funktsioonid list(), show()
//
/////////////////////////////////////////////////////////////

class mod_events {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_events($id){
	
		$this->mod_id = $id;
		$this->mod_name = 'events'.$id;
	
	} // constructor

/////////////////////////////////////////////////////////////

	function show_list($day,$month,$year){
	
	global $conf, $lang;
	
	$maintable = $conf['prefix']."_events";
	$langtable = $conf['prefix']."_events_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query('select main.id as id, main.price,  main.photo, main.duration, main.authors,  main.time0, main.time1, main.time2, main.time3, main.time4, main.time5, main.time6, main.time7, main.time8, main.time9, lang.title as title, lang.body as body from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id  order	by main.id desc');
	
		
		$this->layout(1,"");
	
	 		
	while ($db->next_record()){
		
		for ($i=0;$i<10;$i++){
			
			if ($db->f("time".$i) != "0000-00-00 00:00:00"){
				
				$y = substr ($db->f("time".$i),0,4);
				$m = substr ($db->f("time".$i),5,2);
				$d = substr ($db->f("time".$i),8,2);
				$h = substr ($db->f("time".$i),11,2);
				$min = substr ($db->f("time".$i),14,2);
				//$day = date("l", mktime(0, 0, 0, $m, $d, $y));
				$day = strftime("%a",mktime(0, 0, 0, $m, $d, $y));
	
		if (file_exists($conf["path"]."media/event_photo".$db->f("photo")) ==  FALSE){
		
			$sisu['photo'] = $db->f("photo");
			
		} else { 
					
			$sisu['photo'] = "tyhi.jpg";

		}
		
				
			 	$sisu['date'] = $day. " / ". $d.".".$m;
			 	$sisu['time'] = $h.":".$min;
			 	
				$sisu['ticket'] = $db->f("price");
		
				$sisu['body'] = $body;
				
				$sisu['authors'] = $db->f("authors");
				$sisu['duration'] = $db->f("duration");


				$sisu['title'] = $db->f("title");
				$sisu['id'] = $db->f("id");
		
				$this->layout(2,$sisu);
				 
			} // if
			
		} // for
	 
	} // while
	
		$this->layout(3,"");
		
	
	
	} //function list
	
/////////////////////////////////////////////////////////////		
	
	function show_one($id){
	
	global $conf, $lang;
	
	$maintable = $conf['prefix']."_events";
	$langtable = $conf['prefix']."_events_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query('select main.id as id, main.video, main.price, main.duration, main.authors, main.time0, main.time1, main.time2, main.time3, main.time4, main.time5, main.time6, main.time7, main.time8, main.time9, main.cat as cat, main.photo as photo, lang.title as title, lang.body as body from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id and main.id='.$id.' ');
	
		 		
	$db->next_record();

////////  KATEGOORIAD
	
	$this->layout("cat_head","");
	$catid = explode (" ",$db->f("cat"));
   	
   	for ($r = 1 ; $r<=10 ; $r++){
   		
   		if ($lang["Cat".$r]!=""){
   			
   			$olemas = 0;
   			
   			for ($u = 0 ; $u < count ($catid) ; $u++){
   			   	
   			   	if ($r == $catid[$u]){
   			   			
   			   		$olemas = 1;
   			   			
   			   	} // if
   			   		
   			 } // for
   			
   			 if ($olemas){	$this->layout("cat_selected",$lang["Cat".$r]); } else { $this->layout("cat_unselected",$lang["Cat".$r]); }

   		} // if cat


   	} // for
   	
	$this->layout("cat_foot","");


////////  AJAD
			
			
	for ($i=0;$i<10;$i++){
			
			if ($db->f("time".$i) != "0000-00-00 00:00:00"){
				
				$y = substr ($db->f("time".$i),0,4);
				$m = substr ($db->f("time".$i),5,2);
				$d = substr ($db->f("time".$i),8,2);
				$h = substr ($db->f("time".$i),11,2);
				$min = substr ($db->f("time".$i),14,2);
				//$day = date("l", mktime(0, 0, 0, $m, $d, $y));
				$day = strftime("%a",mktime(0, 0, 0, $m, $d, $y));

				
			 	$sisu['date'] .= $day. " / ". $d.".".$m ." / ". $h.":".$min."<br/>";

				 
			} // if
			
	} // for



////////////////
                $body = parse_tags($db->f("body"));

                
                for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for
                
				$sisu['duration'] = $db->f("duration");
				$sisu['ticket'] = $db->f("price");

				$sisu['country'] = $db->f("country");
				$sisu['authors'] = $db->f("authors");
		
				$sisu['body'] = $body;
		
		if (file_exists($conf["path"]."media/event_photo".$db->f("photo")) ==  FALSE){
		
			$sisu['photo'] = $db->f("photo");
			
		} else { 
					
			$sisu['photo'] = "tyhi.jpg";

		}
		$sisu['video'] = $db->f("video");

		$sisu['title'] = $db->f("title");
		$sisu['id'] = $db->f("id");
		
		$this->layout(4,$sisu);
	 
	
	
	} //function show	
	
////////////////////////////////////////////////////////////
	
function date_bar ($month,$year="2008"){
	
	global $conf;
	
	?>	<div id="date_bar">	
		
	<?
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
	
	 

	?><table width="738" cellpadding="0" cellspacing="0"><tr><td width="25"><a style="color:#000000;" href="<?=$conf["webbase"]?>/events/<?=$prev_year?>/<?=$prev_m?>/">&#60;&#60;</a> </td><?
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
			
			?><td align="center" width="114"><a style="color:#000000" href="<?=$conf["webbase"]?>/events/<?=$year?>/<?=$i_value?>/"><? print trim($imonth);  print "-".$iyear;?></a></td> <?
			
		} else { 
			
			?><td align="center" width="114"><a href="<?=$conf["webbase"]?>/events/<?=$year?>/<?=$i_value?>/"><? print trim($imonth);  print "-".$iyear;?></a></td> <?
			
		} // else
		
	 } // for

	?><td width="25"> <a style="color:#000000;" href="<?=$conf["webbase"]?>/events/<?=$next_year?>/<?=$next_m?>/">&#62;&#62;</a> </td></tr></table><?
	
	
	?></div><?
	
	
} // function	

/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu){ 
	
		global $lang,$conf;
	
		require('include/mod_events_lay_'.$this->mod_id.'.php');


	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class news

?>
