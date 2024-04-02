<?
$tempo="";
include ("get_tempos.php");
for ($x=0 ; $x < count($formid); $x++){  ?>

	<tr class="formid"> 
      <td><?=$formid[$x]["title"]?>:</td>
      <td>
	   <select name="<?=$formid[$x]["name"]?>">
	   <option value="1" <? if ($formid[$x]["value"]=="1"){ print "selected"; } ?>>Jah</option>
	   <option value="0" <? if ($formid[$x]["value"]=="0"){ print "selected"; } ?>>Ei</option>
	   </select>
	 </td>
	</tr>

<? }
 
unset($formid);

 ?>
