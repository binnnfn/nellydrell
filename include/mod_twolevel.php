<?

/////////////////////////////////////////////////////////////
//   
//	mod_two_level.php - Kahetasandi sisumoodul
//
//	D'Art 2004
//
//	Timo Toots
//
//	Funktsioonid show_list(), show_one()
//
/////////////////////////////////////////////////////////////

class mod_twolevel {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_twolevel($id,$dbname){
	
		$this->mod_id = $id;
		$this->mod_name = 'skateparks'.$id;
		$this->mod_dbname = $dbname;
	
	} // constructor

/////////////////////////////////////////////////////////////

	function show_list(){
	
	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_".$this->mod_dbname;
	$langtable = $conf['prefix']."_".$this->mod_dbname."_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query('select main.id as id, lang.title as title, lang.body as body, lang.active as alam from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id order
	by main.time desc');
	
	$this->layout(1,"");
	
				
	while ($db->next_record()){
	
                        
                $body = $db->f("body");
                
                for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for

		$sisu['id'] = $db->f("id");
		$sisu['body'] = $body;
		$sisu['title'] = $db->f("title");

		if ($db->f("alam")==0){	

		$this->layout(7,$sisu);

	       } else {

		$this->layout(2,$sisu);

	      }
	 
	}
	
	$this->layout(3,"");	
	
	} //function list
	
/////////////////////////////////////////////////////////////		
	
	function show_one($id){
	
	global $conf, $lang, $page, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_".$this->mod_dbname;
	$langtable = $conf['prefix']."_".$this->mod_dbname."_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query('select lang.title as title, lang.body as body from '.$maintable.' as main, '.$langtable.' as lang
	where lang.id=main.id and lang.active=1 and main.id='.$id.' order by main.time desc');
	
	$this->layout(4,"");
	
			
	while ($db->next_record()){
	                      


                $body = $db->f("body");
                
                for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for

			

		$sisu['body'] = $body;
		$sisu['title'] = $db->f("title");
		
		$this->layout(5,$sisu);
	 
	}
	
	$this->layout(6,"");	
	
	
	} //function show	
	
/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu){ 
	
		global $lang,$page;
	
		require('include/mod_twolevel_lay_'.$this->mod_id.'.php');


	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class news

?>
