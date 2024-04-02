<?

/////////////////////////////////////////////////////////////
//   
//	mod_news.php - Uudistemoodul
//
//	D'Art 2003
//
//	Timo Toots
//
//	Funktsioonid list(), show()
//
/////////////////////////////////////////////////////////////

class mod_news {

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_news($id){
	
		$this->mod_id = $id;
		$this->mod_name = 'news'.$id;
	
	} // constructor

/////////////////////////////////////////////////////////////

	function show_list($start=0){
	
	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_news";
	$langtable = $conf['prefix']."_news_".$lang['Lang'];
	
	$db = new fc_SQL;
	$db->query('select lang.title as title, DATE_FORMAT(main.time, "%d.%m.%y") as time, 	DATE_FORMAT(main.time, "%a, %d %b %Y %T %Z") as rss_time, lang.body as body, main.id as id from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id and lang.title!="" order
	by  main.time desc ');
	
	$this->layout(1,"");
	         
          
			$mitmes = 0;
			
			if ($start!=0){

				for ($k=0 ; $k<$start ; $k++){
			
			  		$db->next_record();
			  
				}//for

			}//if
			
			





	
	for ($u=0; $u<10 ; $u++){
	
           if ($db->next_record()){
        
     

                $body = parse_tags($db->f("body"));
                
                for ($m = 0 ; $m < count($coder_in) ; $m++){
                
                        $body = str_replace($coder_in[$m],$coder_out[$m],$body);
                
                } //for

                
                
               
                
		$numrows = $db->num_rows();	
		$kokku = substr ($numrows,0,(strlen($numrows))-1);
		$sisu['kokku'] = $db->num_rows();


	
		$sisu['time'] = $db->f("time");
		
		$sisu['id'] = $db->f("id");		
		$sisu['mitmes'] = $mitmes;		

		$sisu['body'] = $body;
		$sisu['title'] = $db->f("title");
		
		$mitmes++;
		
		$this->layout(2,$sisu);
	 
	}
	}
	
	$sisu['kokku'] = $kokku;		
	$sisu['start'] = $start;
	
	$this->layout(3,$sisu);	
	
	} //function list
	
/////////////////////////////////////////////////////////////		
	
	function show_one($id){
	
	global $conf, $lang, $coder_in, $coder_out;
	
	$maintable = $conf['prefix']."_news";
	$langtable = $conf['prefix']."_news_".$lang['Lang'];
	
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
	
		require('include/mod_news_lay_'.$this->mod_id.'.php');


	} // function layout
	
/////////////////////////////////////////////////////////////	

} //class news

?>
