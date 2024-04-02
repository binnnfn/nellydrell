<?
$tempo="";
if ($id){
$tempo=explode(" ", $parse->f($fields[$k][0]));
}

?>

<tr class="formid"> 
      <td><? print $fields[$k][1]; ?>:</td>
      <td>

<? 

	$dbhype = new fc_sql;
	$dbhype->query ("select main.def as def, lang.string as string from ".$conf["prefix"]."_lang as main , ".$conf["prefix"]."_lang_".$conf["lang"][0]." as lang where lang.id=main.id and main.def like 'Cat%'");
	 while ($dbhype->next_record()){
   
        $lang[$dbhype->f("def")] = str_replace("<br>", "<br/>", $dbhype->f("string"));
    }
    
  
   	
   	for ($r = 1 ; $r<=10 ; $r++){
   		
   		if ($lang["Cat".$r]!=""){
   
        print "<input type='checkbox' name='".$fields[$k][0]."[]' value='".$r."'";
       
       		for ($m=0 ; $m< count($tempo); $m++){
       			
            if ($tempo[$m]==$r){ 
  	    
	         print " checked"; 
		 
            } //if
            
       		} // for
	    
	    
        print ">";
	
      
        print $lang["Cat".$r]."";
        
   		} // if cat exists
      
   } //while

?>
           
      </td>
    </tr>
