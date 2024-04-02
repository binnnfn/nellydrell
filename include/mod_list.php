<?

/////////////////////////////////////////////////////////////
//   
//	mod_list.php - Mailinglisti moodul
//
//	D'Art 2007
//
//	Timo Toots
//
/////////////////////////////////////////////////////////////

class mod_list 
{

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_list($id)
	{
	
		$this->mod_id = $id;
		$this->mod_name = 'list'.$id;
	
	} // constructor

	
/////////////////////////////////////////////////////////////		
	
	function add_to_list($email)
	{
	
		global $conf, $lang;
		
		$email = strip_tags($email);
		$maintable = $conf['list_table'];
		
		if (strstr($email,"@") && strstr($email,".")){
			
			
			
			$adder = new fc_sql;
			$adder->query("select * from ".$maintable." where email='".$email."'");
			if (!$adder->next_record()){
			$adder->query("insert into ".$maintable." VALUES ('','".$email."',now())");
			}
			$this->layout(1,$email);
		
		}
		
	
			
	} //function add_to_list	
	
/////////////////////////////////////////////////////////////	

function remove_from_list($hash){

	global $conf, $lang;	
	$maintable = $conf['prefix']."_list";

	$rem = new fc_sql;
	$rem->query("select * from ".$maintable);
	while ($rem->next_record()){

		$email_hash = md5($rem->f("email")."_".$rem->f("id"));

		if ($email_hash == $hash){
			
			$id = $rem->f("id");
			$email = $rem->f("email");
			break;
			
		} //if

	} //while

	if ($id && $email){

		$rem->query("delete from ".$maintable." where id=$id");
		return $email." kustutatud.";

	} else {

		return "Sellist e-mail'i ei leitud.";

	}


} //function remove_from_list

/////////////////////////////////////////////////////////////	



	
	function layout($part, $sisu)
	{ 
		
		global $conf, $lang;
	
		if ($part)
		{
		
			require('include/mod_list_lay_'.$this->mod_id.'.php');
			
		} //if


	} // function layout
	
	
/////////////////////////////////////////////////////////////	



} //class list

?>
