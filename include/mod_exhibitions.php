<?

/////////////////////////////////////////////////////////////
//   
//	mod_exhibitions.php - Näitustemoodul
//
//	D'Art 2009
//
//	Timo Toots
//
//	Funktsioonid list(), show()
//
/////////////////////////////////////////////////////////////

class mod_exhibitions {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_exhibitions($id){
	
		$this->mod_id = $id;
		$this->mod_name = 'exhibitions'.$id;
	
	} // constructor

/////////////////////////////////////////////////////////////

	function show_list($start=0){
	
	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_exhibitions";
	$langtable = $conf['prefix']."_exhibitions_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db2 = new fc_SQL;
	
	$db->query('select lang.title as title, main.time as time, main.online as online, main.time_end as time_end, main.link as id from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id and lang.title!="" AND main.active=1 order by  SUBSTRING(main.time,7)  desc ');
	
	
	
	         
    while ($db->next_record()){
    	

    	
    	// KAS ON ONLINE NÄITUS
    	
    	if ($db->f("online")==1){        	

		$sisu_online['time'][] = (trim(strftime("%d.%B %G",strtotime($db->f("time"))))) . " - " .  (trim(strftime("%d.%B %G",strtotime($db->f("time_end")))));

		$sisu_online['year'][] = trim(strftime("%G",strtotime($db->f("time"))));
		$sisu_online['id'][] = $db->f("id");		
		$sisu_online['title'][] = $db->f("title");
		
        } else {
        	
        $sisu_offline['time'][] = (trim(strftime("%d.%B %G",strtotime($db->f("time"))))) . " - " .  (trim(strftime("%d.%B %G",strtotime($db->f("time_end")))));

		$sisu_offline['id'][] = $db->f("id");		
		$sisu_offline['title'][] = $db->f("title");
		$sisu_offline['year'][] = trim(strftime("%G",strtotime($db->f("time"))));
        }

		
	} // while
	
		$this->layout("start","");
		
		for ($i=0;$i<count($sisu_offline['time']);$i++){
			
		if ($sisu_offline['year'][$i]!=$year){
			
			$this->layout("year",$sisu_offline['year'][$i]);
			
		}

		$year = $sisu_offline['year'][$i];
		
		$sisu['online']	= 1;
		$sisu['time'] =  $sisu_offline['time'][$i];	
		$sisu['id'] = $sisu_offline['id'][$i];		
		$sisu['title'] = $sisu_offline['title'][$i];
		
		$this->layout("row",$sisu);

		}

		$year="";

		$this->layout("online","");

		for ($i=0;$i<count($sisu_online['time']);$i++){
			
		if ($sisu_online['year'][$i]!=$year){
			
			$this->layout("year",$sisu_online['year'][$i]);
			
		}

		$year = $sisu_offline['year'][$i];
			
		$sisu['online']	= 1;
		$sisu['time'] =  $sisu_online['time'][$i];	
		$sisu['id'] = $sisu_online['id'][$i];		
		$sisu['title'] = $sisu_online['title'][$i];
		
		$this->layout("row",$sisu);

		}	
	

	
	$this->layout("end",$sisu);	
	
	} //function list
	
/////////////////////////////////////////////////////////////		
	
	function show_one($id){
	
	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_exhibitions";
	$langtable = $conf['prefix']."_exhibitions_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db2 = new fc_SQL;
 
	$db->query('select  main.online as online,lang.title as title, main.time as time, lang.place as place, main.time_end as time_end, lang.body as body,main.link as id from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id and main.active=1 and main.link="'.$id.'" order by main.time desc');
	
	$db->next_record();
	

    	if ($db->f("online")==1){        	
        	
			$sisu['online'] = 1; 
			
		} else {
			$sisu['online'] = 0;
			
		 }
                        
                        
                $body = parse_tags($db->f("body"));
                
				
				if (strstr($body, '<hr />')){
					
				$body = strstr($body, '<hr />');
				$coder_in[] = "<hr />";
 				$coder_out[] = "";
               
                for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for
                
				} 

		$sisu['time'] = (trim(strftime("%d.%B %G",strtotime($db->f("time"))))) . " - " .  (trim(strftime("%d.%B %G",strtotime($db->f("time_end")))));
		$sisu['body'] = $body;
		$sisu['title'] = $db->f("title");
		$sisu['place'] = $db->f("place");
		
		$this->layout("sisuosa",$sisu);

		if ($sisu['online'] == 2)
		{
		?><div id="myGallery" class="spacegallery"><?
		
			$news = new mod_photogallery(3);
			$news->show_thumbs("",$id);
		
		?></div><?
		}
		
	} //function show	
	
	
/////////////////////////////////////////////////////////////		
	
	function show_front(){
	
	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_exhibitions";
	$langtable = $conf['prefix']."_exhibitions_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db2 = new fc_SQL;

	$db->query('select lang.title as title, main.mainphoto as mainphoto, lang.place as place , main.time as time,main.time_end as time_end, lang.body as body,main.link as id from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id and  main.front=1 order by main.time desc');
	
	while($db->next_record()){
	
	if ($db->f("online")==1){        	
        	
			$sisu['online'] = 1; 
			
		} else {
			
			$sisu['online'] = 0;
			
		 }
                        
                $body = parse_tags($db->f("body"));
              
                
$mainphoto = $db->f("mainphoto");
		
$maintable = $conf['prefix']."_works";
$langtable = $conf['prefix']."_works_".$lang['Lang'];
	
$db2->query('select main.year as year, main.file as file, main.liik as liik, main.materjal as materjal, main.raam as raam, main.moodud as moodud, main.price as price,  lang.title AS title from '.$maintable.' as main, '.$langtable.' as lang WHERE main.id=lang.id AND main.id="'.$mainphoto.'" AND main.file!="" AND main.file != ".jpg"  order by main.id desc');	

$db2->next_record();
 $sisu['mainphoto'] = $db2->f("file");
		


$haystack = $body;
$needle = '<hr />';
$body = substr($haystack, 0, strpos($haystack, $needle)); // $result = php

                
                for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for

		$sisu['time'] = (trim(strftime("%d.%m ",strtotime($db->f("time"))))) . " - " .  (trim(strftime("%d.%m %G",strtotime($db->f("time_end")))));
		$sisu['body'] = $body;
		$sisu['title'] = $db->f("title");
		$sisu['id'] = $db->f("id");
		$sisu['place'] = $db->f("place");
		
	$this->layout("front",$sisu);

	}
		$this->layout("mailinglist",$sisu);

	
	} //function show	
		
/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu){ 
	
		global $lang,$conf;
	
		require('include/mod_exhibitions_lay_'.$this->mod_id.'.php');


	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class exhibitions

?>
