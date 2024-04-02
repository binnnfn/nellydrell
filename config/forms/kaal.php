<?
$tempo="1";
if ($id){
$tempo=$parse->f($fields[$k][0]);
}
?>
    <tr class="formid"> 
      <td><? print $fields[$k][1]; ?>:</td>
      <td>
      <select name="<? print $fields[$k][0]; ?>">   
      <?

      for ($i=1;$i<=41;$i++){
      
      ?><option value="<? print $i; ?>" <? if ($tempo==$i){ print "selected"; } ?>><? print $i; ?></option><?
      
      }       
	
	?>
      </select>
      </td>
    </tr>
