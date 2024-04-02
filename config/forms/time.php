<?
$tempo="";
include ("get_tempos.php");

if($id){


}

for ($x=0 ; $x < count($formid); $x++){ 
	
		$formid[$x]["value"] = htmlspecialchars($formid[$x]["value"]);

$time =	explode("/",$formid[$x]["value"]);

		


 ?>

	<tr class="formid"> 
      <td><?=$formid[$x]["title"]?>:</td>
      <td>
        <input type="text" name="<?=$formid[$x]["name"]?>_D" size="2" maxlength="2" value="<?=$time[1]?>"> .
        <input type="text" name="<?=$formid[$x]["name"]?>_M" size="2" maxlength="2" value="<?=$time[0]?>"> .
        <input type="text" name="<?=$formid[$x]["name"]?>_Y" size="4" maxlength="4" value="<?=$time[2]?>">

      </td>
	</tr>

<? }
 
unset($formid);
 ?>
