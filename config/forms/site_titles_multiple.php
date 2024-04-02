<?
$tempo="";
if ($id){
$tempo=$parse->f($fields[$k][0]);
$tempoint = $tempo;
}

$tempo = explode("##",$tempo);

  if (is_array($tempo) == FALSE){
  	
  	$tempor[] = $tempo;
  	
  } else {
  	
  	$tempor = $tempo;
  	
  	  }

  	  
?>
<tr class="formid"> 
      <td><? print $fields[$k][1]; ?>:</td>
      <td><select name="<? print $fields[$k][0]; ?>[]" MULTIPLE SIZE="10">

<? 


    get_table_titles($fields[$k][3],$tempor);
    


?>
          </select> 
      </td>
    </tr>
