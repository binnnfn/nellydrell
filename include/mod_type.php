<?

/////////////////////////////////////////////////////////////
//   
//	mod_type.php - Menüümoodul
//
//	D'Art 2003
//
//	Timo Toots
//
//	Funktsioonid list(), show()
//
/////////////////////////////////////////////////////////////

class mod_type {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_type($id){
	
		$this->mod_id = $id;
		$this->mod_name = 'type'.$id;
	
	} // constructor

/////////////////////////////////////////////////////////////
	
	
	function print_types(){
		
		global $conf, $lang,$p,$id, $selected_items;
		
		$maintable = $conf['prefix']."_type";
		$langtable = $conf['prefix']."_type_".$lang['Lang'];
		
		$db = new fc_SQL;
		$db->query("select id from ".$maintable." WHERE link='".$p."'");
		$db->next_record();
		$selected_items[] = $id;

		$db->query("select main.link as id, lang.title as title,  main.link as link from ".$maintable." as main , ".$langtable." AS lang WHERE  lang.id=main.id and lang.title !='' order by main.kaal asc");
		
		while ($db->next_record()){
			
		
			$sisu['link'] = $db->f("link");
			$sisu['title'] = $db->f("title");
		
				
				if ($db->f("id")==$id){
				
					$selected  = 1;	
					
				} // if
				
			
			
		    if ($selected){

				$this->layout("main_type_selected",$sisu);
			
				
		    } else {
		    	
		    	$this->layout("main_type",$sisu);

		    }	 
		    
		    $selected  = 0;	
	 

		} // while
		


	}
	
	
	
	
/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu){ 
	
		global $lang,$conf;
	
		require('include/mod_type_lay_'.$this->mod_id.'.php');


	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class type

?>
