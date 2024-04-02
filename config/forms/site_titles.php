<?
$tempo="";
if ($id){
$tempo=$parse->f($fields[$k][0]);
$tempoint = $tempo;
}

  if (is_array($tempo) == FALSE){
  	
  	$tempor[] = $tempo;
  	
  } else {
  	
  	$tempor = $tempo;
  	
  	  }

  	  
?>
<tr class="formid"> 
      <td><? print $fields[$k][1]; ?>:</td>
      <td><select name="<? print $fields[$k][0]; ?>">
      <option value=""></option>

<? 
if ($fields[$k][4]!="id" && $fields[$k][4]!="link"){
	
	$fields[$k][4] = "link";
	
}

    get_table_titles($fields[$k][3],$tempor,$fields[$k][4]);
    


?>
          </select> 
      </td>
    </tr>
