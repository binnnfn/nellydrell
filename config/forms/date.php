<?
$tempo="";
include ("get_tempos.php");
for ($x=0 ; $x < count($formid); $x++){  
	
		$formid[$x]["value"] = htmlspecialchars($formid[$x]["value"]);

	?>

	<tr class="formid"> 
      <td><?=$formid[$x]["title"]?>:</td>
      <td>
       
        
        <input type="text"  id="SelectedDate"  name="<?=$formid[$x]["name"]?>" size="<? print $fields[$k][3]; ?>" onClick="GetDate(this);" readonly maxlength="<? print $fields[$k][4]; ?>" value="<?=$formid[$x]["value"]?>">
      </td>
	</tr>

<? }
 
unset($formid);
 ?>
