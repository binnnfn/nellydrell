<?

/////////////////////////////////////////////////////////////
//   
//	mod_menu.php - Menüümoodul
//
//	D'Art 2003
//
//	Timo Toots
//
//	Funktsioonid list(), show()
//
/////////////////////////////////////////////////////////////

class mod_menu {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_menu($id){
	
		$this->mod_id = $id;
		$this->mod_name = 'menu'.$id;
	
	} // constructor

/////////////////////////////////////////////////////////////

	function get_sub_menu($id,$sub_level=1){
	
	global $conf, $lang, $selected_items;
	
	$maintable = $conf['prefix']."_pages";
	$langtable = $conf['prefix']."_pages_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query("select main.id as id, lang.title as title, main.page as page , main.link as link ,main.parent as parent from ".$maintable." as main , ".$langtable." AS lang WHERE main.parent='".$id."' AND lang.id=main.id and lang.title !='' order by main.parent desc, main.kaal asc");
	
	while ($db->next_record()){
		
		
		$sisu['link'] = $db->f("link");
		$sisu['title'] = $db->f("title");
		
		for ($i=0;$i<$sub_level;$i++){
			
			$sisu['prefix'] .= "&nbsp;&nbsp;";		
			
		}
		
		for ($i=0;$i<count ($selected_items);$i++){
				
			if ($db->f("id")==$selected_items[$i]){
				
				$selected  = 1;	
					
			} // if
				
		} // for


   		if ($selected){

			$this->layout("sub_menu_selected",$sisu);
			

				
		} else {
		    	
			$this->layout("sub_menu",$sisu);

		}	 

						$selected  = 0;	

			 		$this->get_sub_menu($db->f("id"),2);

	    $sisu['prefix'] = "";


	} // while
	
	
	} //function list
/////////////////////////////////////////////////////////////

	function get_parents($id){
	
	global $conf, $lang, $selected_items;
	
	$maintable = $conf['prefix']."_pages";
	$langtable = $conf['prefix']."_pages_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query("SELECT main.parent AS parent 
	FROM ".$maintable." as main , ".$langtable." AS lang 
	WHERE main.id='".$id."' AND lang.id=main.id AND lang.title !='' ");
	
	$db->next_record();
	
	if ($db->f("parent")!=""){
		$selected_items[] = $db->f("parent");
		$this->get_parents($db->f("parent"));
	}
	
	} //function list


	
/////////////////////////////////////////////////////////////		
	
	function print_menu($table){
		
		global $conf, $lang,$p, $selected_items;
		
		$maintable = $conf['prefix']."_".$table;
		$langtable = $conf['prefix']."_".$table."_".$lang['Lang'];
		
		$db = new fc_SQL;
		$db->query("select id from ".$maintable." WHERE link='".$p."'");
		$db->next_record();
		$selected_items[] = $db->f("id");
		//$this->get_parents($db->f("id"));
		

		$db->query("select main.id as id, lang.title as title, main.page as page , main.link as link ,main.parent as parent from ".$maintable." as main , ".$langtable." AS lang WHERE main.parent='1' AND lang.id=main.id and lang.title !='' order by main.parent desc, main.kaal asc");
		
		while ($db->next_record()){
			
		
			$sisu['link'] = $db->f("link");
			$sisu['title'] = $db->f("title");
		
			for ($i=0;$i<count ($selected_items);$i++){
				
				if ($db->f("id")==$selected_items[$i]){
				
					$selected  = 1;	
					
				} // if
				
			} // for
			
			
		    if ($selected){

				$this->layout("main_menu_selected",$sisu);
			
				//$this->get_sub_menu($db->f("id"));
				
		    } else {
		    	
		    	$this->layout("main_menu",$sisu);

		    }	 
		    
		    $selected  = 0;	
	 

		} // while
		


	}
	
	
	
/////////////////////////////////////////////////////////////	
	
	function show_all($id){


	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_menu";
	$langtable = $conf['prefix']."_menu_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query('select lang.title as title, DATE_FORMAT(main.time, "%d.%m.%y") as time, lang.body as body from '.$maintable.' as main, '.$langtable.' as lang
	where lang.id=main.id and lang.active=1 and main.id='.$id.' order by main.time desc');
	
	$this->layout(4,"");
	
			
	while ($db->next_record()){
	
                             


                $body = $db->f("body");
                
                for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for

			
		$sisu['time'] = $db->f("time");		
		$sisu['body'] = $body;
		$sisu['title'] = $db->f("title");
		
		$this->layout(5,$sisu);
	 
	}
	
	$this->layout(6,"");	
	
	
	} //function show	
	
/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu){ 
	
		global $lang,$conf;
	
		require('include/mod_menu_lay_'.$this->mod_id.'.php');


	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class menu

?>
