<?

/////////////////////////////////////////////////////////////
//   
//	mod_videogallery.php - Galeriimoodul
//
//	D'Art 2008
//
//	Timo Toots
//
//	Funktsioonid list(), show()
//
/////////////////////////////////////////////////////////////

class mod_videogallery {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_videogallery($id){
	
		$this->mod_id = $id;
		$this->mod_name = 'videogallery'.$id;
	
	} // constructor

/////////////////////////////////////////////////////////////		
	
	function show_thumbs(){
			
	global $conf, $lang, $coder_in, $coder_out;
	
	
	$maintable = $conf['prefix']."_videogallery";
	$langtable = $conf['prefix']."_videogallery_".$lang['Lang'];
	
	
	$db = new fc_SQL;
	$db->query('select main.year as year, main.link as file, main.thumb as thumb, main.height as height, main.width as width, main.type as type, main.id as id, lang.title as title from '.$maintable.' as main ,'.$langtable.' as lang  where main.id=lang.id and  main.link !="" order by main.year desc, main.kaal asc, main.id desc');

		$i=0;
			
	while ($db->next_record()){
		
		if ($db->f("year")!=$year){
			
					if ($i != 0) { print "<hr style=\"float:left;width:630px;\"/>"; }
					$this->layout(1,$db->f("year"));
					$year = $db->f("year");
		}

	$i++;
		$sisu['filename'] = $db->f("file");		
		
		
	
		$sisu['type'] = trim($db->f("type"));	
		$sisu['year'] = $db->f("year");		
		$sisu['title'] = $db->f("title");
		$sisu['thumb'] = $db->f("thumb");		
		$sisu['width'] = $db->f("width");
		$sisu['height'] = $db->f("height");
				
		$this->layout(2,$sisu);
		

	} // while	

 			  
	$this->layout(3,"");	
	
	
	} //function show	
	
/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu){ 
	
		global $lang,$main_color;
	
		require('include/mod_videogallery_lay_'.$this->mod_id.'.php');


	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class videogallery

?>
