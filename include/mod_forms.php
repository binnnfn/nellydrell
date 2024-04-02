<?

/////////////////////////////////////////////////////////////
//   
//	mod_forms.php - Formide tegemise moodul
//
//	D'Art 2003
//
//	Timo Toots
//
//	Funktsioonid check_values($values) submit_values($values) show_forms($values) act_with_data($values)
//
/////////////////////////////////////////////////////////////

class mod_forms 
{

	var $mod_id, $mod_name;

/////////////////////////////////////////////////////////////

	function mod_forms($id)
	{
	
		$this->mod_id = $id;
		$this->mod_name = 'forms'.$id;
	
	} // constructor

/////////////////////////////////////////////////////////////

	function show_forms($values)
	{
	
		global $conf, $lang;
	
		// kui on tegemist klikkformidega kirjutame pealkirjad sisusse
		if ($conf[$this->mod_name]['ClickForm'])
		{
	
			for ($j = 1 ; $j < $conf[$this->mod_name]['NumberOfFields']+1 ; $j++)
			{
		
		
				if ($values[$j])
				{
				
					$sisu[$j] = $values[$j];
					
				} else
				{
				
					$sisu[$j] = $lang[$this->mod_name]['Title'][$j];
				
				}

						
		
			}
		
			$sisu[0] = $values[0];
		
			
		} else //kui on tavalised formid, mis on alguses seest tyhjad, kirjutame k6ik info sisusse
		{
	
			$sisu = $values;
	
			
		} //else
	
		$this->layout(1,$sisu);
	
	
	} //function show_forms
	
/////////////////////////////////////////////////////////////		
	
	function check_values($values)
	{
	
		global $conf, $lang;
		$values[0] = "";

		//kontrollime erroreid ( vajalikud andmed on olemas)
		for ($i = 0; $i < count($values); $i++)
		{
	
			for ($j = 0; $j < count($conf[$this->mod_name]['Required']); $j++)
			{
			
				if($conf[$this->mod_name]['Required'][$j]==$i)
				{
			
					//kui on tyhi v2li v6i pealkirjaga t2idetud v2li
					if (!$values[$i])
					{
				
						$error .= " | ".$lang[$this->mod_name."_".$i];
						
												
					} else
					{
					
						if ($values[$i]==$lang[$this->mod_name."_".$i])
						{
						
							$error .= " | ".$lang[$this->mod_name."_".$i];

						}
					
					
					}
	
				} //if
		
			} //for
	
		} //for
		
		if ($error)
		{
			$values[0] = "<b>".$lang["EmptyForms"].":</b> ".$error;
			
		}
	
			
		// kui tuli m6ni error n2itame forme veel
		if ($values[0])
		{
		
			$this->show_forms($values);
		
		} 
		else 
		{
		
			$this->submit_values($values);
			
		}
	
	
	} //function check_values	
/////////////////////////////////////////////////////////////		
	
	function submit_values($values)
	{
	
		global $conf, $lang;
		
		$this->act_with_data($values);
	
		for ($i = 0; $i < count($values); $i++)
		{
			
			$values[$i] = 0;
		
		}//for
	
		$values[0] = $lang["MessageSent"];
		
		
		$this->show_forms($values);
		
	
			
	} //function submit_values	
	
/////////////////////////////////////////////////////////////	
	
	function layout($part, $sisu)
	{ 
		
		global $conf, $lang;
	
		if ($part)
		{
		
			require('include/mod_forms_lay_'.$this->mod_id.'.php');
			
		} //if


	} // function layout
	
/////////////////////////////////////////////////////////////	
	
	function act_with_data($values)
	{ 
		
		global $conf, $lang;
	
			require('config/conf_forms_'.$this->mod_id.'.php');
			

	} // function act_with_data
	
/////////////////////////////////////////////////////////////	



} //class forms

?>
