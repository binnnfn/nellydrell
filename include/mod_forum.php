<?

/////////////////////////////////////////////////////////////
//   
//	mod_forum.php - Foorumi moodul
//
//	D'Art 2005
//
//	Timo Toots
//
//	Funktsioonid check_values($values) submit_values($values) show_forms($values) act_with_data($values)
//
/////////////////////////////////////////////////////////////

class mod_forum 
{

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_forum($id)
	{
	
		$this->mod_id = $id;
		$this->mod_name = 'forum'.$id;
	
	} // constructor

/////////////////////////////////////////////////////////////

	function show_topics(){
	
	global $conf, $lang;
	
	$maintable = $conf['prefix']."_forum";
	
	$db = new fc_SQL;
	$kirje = new fc_SQL;
	$db->query('select title,name, body, id from '.$maintable.'  where parent=0 and active=1 order by time desc');
	
	
	$sisu['addtitle'] = $lang["AddTopic"];	
	$this->layout(1,$sisu);
	            
			
	while ($db->next_record()){
	

	    $kirje->query('select id from '.$maintable.' where parent='.$db->f("id").' and active=1');

	
		$sisu['id'] = $db->f("id");	
		$sisu['name'] = $db->f("name");	
		$sisu['replys'] = $kirje->num_rows();	
		$sisu['title'] = $db->f("title");
		
		
		$this->layout(2,$sisu);
	 
	}
	
	$this->layout(3,"");	
	
	} //function list
	
/////////////////////////////////////////////////////////////		
	
	function show_posts($id){
	
	global $conf, $lang;
	
	$maintable = $conf['prefix']."_forum";
	
	$db = new fc_SQL;
	$db->query('select title, body, email, name, DATE_FORMAT(time, "%d.%m.%y") as time, id from '.$maintable.'  where (parent='.$id.' or id='.$id.') and active=1 order by parent asc, time desc');
	
	

    $sisu['addtitle'] = $lang["ReplyToTopic"];	
	$sisu['id'] = $id;
	$this->layout(1,$sisu);
	            
			
	while ($db->next_record()){
	

		$sisu['name'] = $db->f("name");	
		$sisu['email'] = $db->f("email");			
		$sisu['body'] = $db->f("body");	
				$sisu['time'] = $db->f("time");	

		$sisu['title'] = $db->f("title");
		
		
		$this->layout(4,$sisu);
	 
	}
	
	$this->layout(5,"");	
	
	} //function list
	
	

	
/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu)
	{ 
		
		global $conf, $lang;
	
		if ($part)
		{
		
			require('layout/lay_forum_'.$this->mod_id.'.php');
			
		} //if


	} // function layout
	

	
/////////////////////////////////////////////////////////////	



} //class forms

?>
