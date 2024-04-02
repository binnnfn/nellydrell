<?

/////////////////////////////////////////////////////////////
//   
//	mod_text.php - Texti kuvamise moodul
//
//	D'Art 2003
//
//	Timo Toots
//
//	Funktsioonid show_text($id)
//
/////////////////////////////////////////////////////////////

class mod_text {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_text($id){
	
		$this->mod_id = $id;
		$this->mod_name = 'text'.$id;
	
	} // constructor

/////////////////////////////////////////////////////////////

	function show_text($item_id){
	
	global $conf,$lang, $coder_in, $coder_out, $image_out;

	$maintable = $conf['prefix']."_pages";
	$langtable = $conf['prefix']."_pages_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query('select lang.title as title, lang.body as body, main.id as id, main.parent as parent from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id and main.link="'.$item_id.'" ');
	

	$db->next_record();
	

                $body = parse_tags($db->f("body"));
                
                for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for
                
                  
                
              //  $body = find_alas($body);
                
           if ($db->f("parent")=="not_in_menu"){
           	$sisu['menu'] = 0;
           } else {
           	$sisu['menu'] = 1;
           }
                

	$sisu['title'] = $db->f("title");
	
	$sisu['text'] = $body;

	$this->layout(1,$sisu);
	 

	} //function show_item
	
	
/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu){ 
	
		global $lang;
	
		if (!$this->mod_id)
		{
			print $sisu['text'];
		
		}else{
		
			require('include/mod_text_lay_'.$this->mod_id.'.php');

		}
		
	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class text

?>
