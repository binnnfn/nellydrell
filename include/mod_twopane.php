<?

/////////////////////////////////////////////////////////////
//   
//	mod_twopane.php
//
//	D'Art 2007
//
//	Timo Toots
//
//	Funktsioonid list(), show()
//
/////////////////////////////////////////////////////////////

class mod_twopane {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_twopane($id, $table){
	
		$this->mod_id = $id;
		$this->mod_name = 'twopane'.$id;
		$this->mod_table = $table;

	} // constructor

/////////////////////////////////////////////////////////////

	function show_list($id){
	
	global $conf, $lang, $first_id;
	
	$maintable = $conf['prefix']."_".$this->mod_table;
	$langtable = $conf['prefix']."_".$this->mod_table."_".$lang['Lang'];
	
	$db = new fc_SQL;
	
	if ($this->mod_table=="artists"){
		
		
		$db->query('select lang.title as title, lang.body as body, main.groupy as groupy, main.id as id from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id and lang.active=1 order
		by main.groupy asc,lang.title asc ');
	
	} else {
	
		$db->query('select lang.title as title, DATE_FORMAT(main.time, "%d.%m %H.%i") as time, main.time_suf as time_suf, lang.body as body, main.id as id from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id and lang.active=1 order
		by main.time asc');	
	
	
	}
	
	$this->layout(1,"");
	

			
	while ($db->next_record()){
	
		if ($i==0 && !$id){ $first_id = $db->f("id"); $id = $db->f("id"); $i=1;}
	
		if ($db->f("id")==$id){
        $sisu['selected'] = 1;
        } else {
        $sisu['selected'] = 0;      
        }
       $sisu['groupy'] = "";
       if  ($db->f("groupy") != $groupy){
       	
       		$sisu['groupy'] = "<br/>";
       		$groupy = 9;
       	
       }	
       $groupy = $db->f("groupy");

	
		$sisu['id'] = $db->f("id");		
		
	
		
		
		$sisu['body'] = $body;
		$sisu['title'] = trim($db->f("title"));
		$sisu['time'] = $db->f("time").$db->f("time_suf");
		
		
		$this->layout(2,$sisu);
	 
	}
	
	$this->layout(3,"");	
	
	} //function list
	
/////////////////////////////////////////////////////////////		
	
	function show_one($id){
	
	global $conf, $lang, $coder_in, $coder_out;
	
	$this->mod_table;
	
	$maintable = $conf['prefix']."_".$this->mod_table;
	$langtable = $conf['prefix']."_".$this->mod_table."_".$lang['Lang'];
	
	$db = new fc_SQL;
	
	if ($this->mod_table=="artists"){
	
	$db->query('select lang.title as title, lang.body as body from '.$maintable.' as main, '.$langtable.' as lang
	where lang.id=main.id and lang.active=1 and main.id='.$id.' order by lang.title desc');
	
	} else {
	
		$db->query('select main.pm_id as pm_id, main.pl_id as pl_id, lang.title as title, DATE_FORMAT(main.time, "%d.%m %H.%i") as time, main.time_suf as time_suf, lang.body as body from '.$maintable.' as main, '.$langtable.' as lang
	where lang.id=main.id and lang.active=1 and main.id='.$id.' order by main.time desc');
	
	}
	
		$db->next_record();
		
		
	$crosser = new fc_sql;

	if ($this->mod_table=="events"){
			  
    	$crosstable = $conf['prefix']."_artists_".$lang["Lang"];
		$crosser->query('select lang.title as title, main.id as id from '.$conf['prefix'].'_'.'artists as main, '.$crosstable.' as lang where lang.id=main.id and lang.active=1');	
		while ($crosser->next_record()){
		
			  $coder_in[]  = $crosser->f("title");
              $coder_out[] = "<a href=?page=artists&id=".$crosser->f("id").">".$crosser->f("title")."</a>";
                
				
		} //while
	

	} elseif ($this->mod_table=="artists"){
	
	   $crosstable = $conf['prefix']."_events_".$lang["Lang"];
		$crosser->query('select lang.title as title, DATE_FORMAT(main.time, "%d.%m %H.%i") as time, main.id as id from '.$conf['prefix'].'_events as main, '.$crosstable.' as lang where lang.body like "%'.$db->f("title").'%" and lang.id=main.id and lang.active=1');	
		while ($crosser->next_record()){
		
              $sisu['kontserdid'] .= $crosser->f("time")." <a href=?page=concerts&id=".$crosser->f("id").">".$crosser->f("title")."</a><br/>";
                
				
		} //while

	
	}
	
	
	

	
	
	


 			  $body = $db->f("body");


			


                for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for
                
                             
                
              //  $body2 = strip_tags($body,"<b><strong><a><br>");
                
              //  $body = $body ."<br><br>". $body2;


	// kontserdite nimekiri
	if ($this->mod_table=="artists"){
	
	
		
	
	}
			if ($db->f("pl_id")!="" && $db->f("pl_id")!=0){
			switch ($lang['Lang']){
				case "et": $langu = "EST"; break;
				case "en": $langu = "ENG"; break;
				case "ru": $langu = "RUS"; break;
				case "fi": $langu = "ENG"; break;
			}
				
		$body .= "<br/><a href=\"http://shop.piletilevi.ee/cgi-bin/wspd_cgi.sh/WService=plevi/proc/inter_step3.p?kontsert_vali=".$db->f("pl_id")."&lang=".$langu."&show=8188\" target=\"_blank\">".$lang["buy_pl"]."</a>";		
		}
		if ($lang['Lang']=="et"){
		if ($db->f("pm_id")!="" && $db->f("pm_id")!=0){
		$body .= "<br/><a href=\"https://www.piletimaailm.com/performances/".$db->f("pm_id")."/clients/new?\" target=\"_blank\">".$lang["buy_pm"]."</a>";		
		}
		}

					
		$sisu['time'] = $db->f("time").$db->f("time_suf");		
		$sisu['body'] = $body;
		$sisu['title'] = $db->f("title");
		
		$this->layout(4,$sisu);
	 

	
	$this->layout(5,"");	
	
	
	} //function show	
	
/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu){ 
	
		global $lang, $page;
	
		require('include/mod_twopane_lay_'.$this->mod_id.'.php');


	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class news

?>
