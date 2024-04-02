<?

/////////////////////////////////////////////////////////////
//   
//	mod_projects.php
//
//	D'Art 2007
//
//	Timo Toots
//
//	Funktsioonid list(), show()
//
/////////////////////////////////////////////////////////////

class mod_projects {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_projects($id){
	
		$this->mod_id = $id;
		$this->mod_name = 'projects'.$id;
	
	} // constructor

/////////////////////////////////////////////////////////////
	function show_title($id){
	
	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_projects";
	$langtable = $conf['prefix']."_projects_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query('select lang.title as title from '.$maintable.' as main, '.$langtable.' as lang
	where lang.id=main.id and main.lyhend="'.$id.'" and lang.active=1 order by main.time asc');
	
	$db->next_record();

	return  $db->f("title");		

	} //function show_title
	
///////////////////////////////////////////////////
		
	function show_one($id){
	
	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_projects";
	$langtable = $conf['prefix']."_projects_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query('select lang.title as title, main.year as time, lang.body as body from '.$maintable.' as main, '.$langtable.' as lang
	where lang.id=main.id and main.lyhend="'.$id.'" and lang.active=1 order by main.time asc');
	
	$this->layout(1,"");
	
			
	$db->next_record();

                $body = parse_tags($db->f("body"));
                
                for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for

			
		$sisu['time'] = $db->f("time");		
		$sisu['body'] = $body;
		$sisu['title'] = $db->f("title");
		
		$this->layout(2,$sisu);
	 
	
	
	$this->layout(3,"");	
	if ($db->num_rows()==0){
	return false;
	}
	} //function show	
	
/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu){ 
	
		global $lang;
	
		require('include/mod_projects_lay_'.$this->mod_id.'.php');


	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class news

?>
