<?

/////////////////////////////////////////////////////////////
//   
//	mod_photogallery.php - Galeriimoodul
//
//	D'Art 2008
//
//	Timo Toots
//
//	Funktsioonid list(), show()
//
/////////////////////////////////////////////////////////////

class mod_photogallery {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_photogallery($id){
	
		$this->mod_id = $id;
		$this->mod_name = 'photogallery'.$id;
	
	} // constructor


/////////////////////////////////////////////////////////////		
	
	function show_thumbs($method="",$exhibition=""){
		
	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_works";
	$langtable = $conf['prefix']."_works_".$lang['Lang'];
	
	$maintable = $conf['prefix']."_works";
	$langtable = $conf['prefix']."_works_".$lang['Lang'];

	if ($exhibition!=""){

		$exp_search = " main.exhibition LIKE '%".$exhibition."%' AND";
		
	} else {
		
		$meth_search = " main.method='".$method."' AND";
		
	}
	
	$db = new fc_SQL;
	$db2 = new fc_SQL;

	$db->query('select main.year as year, main.file as file, main.liik as liik, main.materjal as materjal, main.raam as raam, main.moodud as moodud, main.price as price,  lang.title AS title from '.$maintable.' as main, '.$langtable.' as lang WHERE main.id=lang.id AND '.$meth_search.' '.$exp_search.' main.active=1 order by main.id desc');


			
	while($db->next_record()){
		
		$db2->query("SELECT lang.title as title FROM ".$conf['prefix']."_tehnika as main,  ".$conf['prefix']."_tehnika_".$lang['Lang']." AS
		lang where main.id=lang.id and main.link='".$db->f("liik")."'");
		$db2->next_record();
		$sisu['liik'] = $db2->f("title");		


		$db2->query("SELECT lang.title as title FROM ".$conf['prefix']."_materjal as main,  ".$conf['prefix']."_materjal_".$lang['Lang']." AS
		lang where main.id=lang.id and main.link='".$db->f("materjal")."'");
		$db2->next_record();
		$sisu['materjal'] = $db2->f("title");	
		
		
		$db2->query("SELECT lang.title as title FROM ".$conf['prefix']."_frames as main,  ".$conf['prefix']."_frames_".$lang['Lang']." AS
		lang where main.id=lang.id and main.link='".$db->f("raam")."'");
		$db2->next_record();
		$sisu['raam'] = $db2->f("title");	
		
			
		$sisu['year'] = $db->f("year");		
		$sisu['moodud'] = $db->f("moodud");		
		$sisu['file'] = $db->f("file");			
		$sisu['title'] = $db->f("title");
		
		$summa = $this->convert_money($db->f("price"));

		if ((int)$summa["price"]>0){
			$summa["price"] = number_format($summa["price"], 2, ',', ' ');
			$summa["price"] = str_replace (",00","",$summa["price"]);		
		}
		
		$sisu['price'] = $summa["price"]." ".$summa["valuuta"];	

		$this->layout("thumbs",$sisu);
		
	
	}
	
	if (!$db->num_rows()){ return FALSE; } else { return TRUE; }
		
	
	} //function show	
	
/////////////////////////////////////////////////////////////		
	
	function show_front(){
		
	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_works";
	$langtable = $conf['prefix']."_works_".$lang['Lang'];
	

	
	$db = new fc_SQL;
	$db2 = new fc_SQL;
	
	
	$db->query('select lang.body, lang.title  from '.$conf['prefix'].'_pages as main, '.$conf['prefix'].'_pages_'.$lang['Lang'].' as lang WHERE main.id=lang.id AND main.link="gallery"');	
	$db->next_record();
	$body = parse_tags($db->f("body"));
      for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for
	
	$sisu['about'] = $body;
	$sisu['abouttitle'] = $db->f("title");

		
	$db->query('select main.year as year, main.file as file, main.liik as liik, main.materjal as materjal, main.raam as raam, main.moodud as moodud, main.price as price,  lang.title AS title from '.$maintable.' as main, '.$langtable.' as lang WHERE main.id=lang.id AND main.active=1 AND main.file!="" AND main.file != ".jpg"  AND main.front=1 order by main.id desc');
	
if ($db->num_rows()==0){

$db->query('select main.year as year, main.file as file, main.liik as liik, main.materjal as materjal, main.raam as raam, main.moodud as moodud, main.price as price,  lang.title AS title from '.$maintable.' as main, '.$langtable.' as lang WHERE main.id=lang.id AND main.active=1 AND main.file!="" AND main.file != ".jpg"  order by main.id desc');	
	
}

 $kogum = $db->num_rows();
 $kogum = rand(1,$kogum);
	
		for ($i=0;$i<$kogum;$i++){
		
			$db->next_record();
			if (file_exists($conf["path"]."media/work_front/".$db->f("file"))==FALSE){
				$db->next_record(); 
			}
		
		}
		
		
			$db2->query("SELECT lang.title as title FROM ".$conf['prefix']."_tehnika as main,  ".$conf['prefix']."_tehnika_".$lang['Lang']." AS
		lang where main.id=lang.id and main.link='".$db->f("liik")."'");
		$db2->next_record();
		$sisu['liik'] = $db2->f("title");		


		$db2->query("SELECT lang.title as title FROM ".$conf['prefix']."_materjal as main,  ".$conf['prefix']."_materjal_".$lang['Lang']." AS
		lang where main.id=lang.id and main.link='".$db->f("materjal")."'");
		$db2->next_record();
		$sisu['materjal'] = $db2->f("title");	
		
		
		$db2->query("SELECT lang.title as title FROM ".$conf['prefix']."_frames as main,  ".$conf['prefix']."_frames_".$lang['Lang']." AS
		lang where main.id=lang.id and main.link='".$db->f("raam")."'");
		$db2->next_record();
		$sisu['raam'] = $db2->f("title");	



		
		
			
		$sisu['year'] = $db->f("year");		
		$sisu['moodud'] = $db->f("moodud");		
		$sisu['title'] = $db->f("title");
		
		$summa = $this->convert_money($db->f("price"));
				if ((int)$summa["price"]>0){
			$summa["price"] = number_format($summa["price"], 2, ',', ' ');
			$summa["price"] = str_replace (",00","",$summa["price"]);		
		}
		
		$sisu['price'] = $summa["price"]." ".$summa["valuuta"];	
		
		$sisu['file'] = $db->f("file");		
	
		$size=getimagesize($conf["path"]."media/work_web/".$db->f("file"));
		 
		if ($size[1]<$size[0]){
			$this->layout("photo_P",$sisu);
		} else {
			$this->layout("photo_P",$sisu);
		}
		
		
	
	} //function show	
	
/////////////////////////////////////////////////////////////	

function convert_money($sum){
	
	global $lang;
	
	if ($sum>0){
	
	 	switch ($lang['Lang']){
	
			case "et": 
			   $summa["price"] = $sum;
			   $summa["valuuta"] = "EEK";
			   break;
			 
			default:   
	           $summa["price"] = ceil($sum/15.67);
			   $summa["valuuta"] =  "EUR";
	}
	
	}
	
	return $summa;

	
}	

/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu){ 
	
		global $conf, $lang,$main_color;
	
		require('include/mod_photogallery_lay_'.$this->mod_id.'.php');


	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class photogallery

?>
