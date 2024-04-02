<?
$tempo="";
include ("get_tempos.php");
 ?>

	<tr class="forms"> 
      <td><?=$formid[0]["title"]?>:</td>
      <td>
        <input type="hidden" name="<?=$formid[0]["name"]?>" value="<?=$formid[0]["value"]?>"><b><?=$formid[0]["value"]?></b>
      </td>
	</tr>

<? 
 
unset($formid);
 ?>
