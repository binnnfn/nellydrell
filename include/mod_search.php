<?

/////////////////////////////////////////////////////////////
//   
//	mod_search.php - Otsingu moodul
//
//	D'Art 2007
//
//	Timo Toots
//
/////////////////////////////////////////////////////////////

class mod_search 
{

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_search($id)
	{
	
		$this->mod_id = $id;
		$this->mod_name = 'search'.$id;
	
	} // constructor

	
	

/////////////////////////////////////////////////////////////	

	function searchfrom ($table, $page, $query){
		
		global $conf, $lang;
		$maintable = $conf['prefix']."_".$table."_".$lang['Lang'];
		$rem = new fc_sql;
		
		$rem->query("SELECT id, title FROM ".$maintable." WHERE title LIKE '%".$query."%' OR body LIKE '% ".$query."%'");
		
		if ($rem->num_rows()){
			
			$sisu['page'] = $page;

			$sisu['sec'] = $lang['search_'.$page];
			$this->layout(1,$sisu);
		
			while ($rem->next_record()){
				
				if ($page!=""){
					
				$sisu['link'] = "?page=".$page."&id=".$rem->f("id");
				} else {
				$sisu['link'] = "?page=".$rem->f("id");				
				}
				$sisu['title'] = $rem->f("title");

				$this->layout(2,$sisu);

			} // while
				$this->layout(3,$sisu);
		
		} // if
		
	} // function
	
/////////////////////////////////////////////////////////////	

function search($q){

	global $conf, $lang;	

	if (strlen($q)>2){
	
	$this->searchfrom ("news","news",$q);
	$this->searchfrom ("artists","artists",$q);
	$this->searchfrom ("events","concerts",$q);
	$this->searchfrom ("texts","",$q);
	
	} else {
	
	$this->layout(1,"");
	$this->layout(3,"");

	}
	
}
	
/////////////////////////////////////////////////////////////	



	
	function layout($part, $sisu)
	{ 
		
		global $conf, $lang;
	
		if ($part)
		{
		
			require('layout/mod_search_lay_'.$this->mod_id.'.php');
			
		} //if


	} // function layout
	
	
/////////////////////////////////////////////////////////////	



} //class list

?>
