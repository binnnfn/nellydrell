<?

$tempo="";
include ("get_tempos.php");

for ($x=0 ; $x < count($formid); $x++){  ?>

	<tr class="formid"> 
       <td><?=$formid[$x]["title"]?>:</td>
       <td><textarea name="<?=$formid[$x]["name"]?>" style="width:600px;height:360px"><? print ($formid[$x]["value"]); ?></textarea></td>
    </tr>

	
<?  } ?>