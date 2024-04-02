<?
$tempo="";
if ($id){
$tempo=$parse->f($fields[$k][0]);
$tempoint = intval ($tempo);
}
?>
<tr class="formid"> 
      <td><? print $fields[$k][1]; ?>:</td>
      <td><select name="<? print $fields[$k][0]; ?>">
      
<option value="">Artikkel on pealink</option>
<option value="not_in_menu">Artikkel ei ole men&uuml;&uuml;s</option>

<? 



function get_parentless($valitud,$tempo){
global $conf;
if ($_GET["sec"]){
	
	$sec = $_GET["sec"];
	
} else {
		$sec = "pages";

}

  $tempadmin=new fc_SQL;
  
  
   $tempadmin->query("select main.id as id, lang.title as title from ".$conf["prefix"]."_".$sec." as main , ".$conf["prefix"]."_".$sec."_".$conf["lang"][0]." as lang where  main.id != '".$valitud."' and lang.id=main.id order by main.id desc");
   while ($tempadmin->next_record()){
   
        print "<option value='".$tempadmin->f("id")."'";
        
             
            if ($tempo == $tempadmin->f("id")){ 
	    
	         print " selected"; 
		 
            } //if
	    
	    
        print ">";
        
	
        print $tempadmin->f("title")."</option>
        ";
      
   } //while


} // function


    get_parentless($fields[$k][3],$tempo);
    

    


?>
          </select> 
      </td>
    </tr>
