<?
$tempo="";
if ($id){
$tempo=$parse->f($fields[$k][0]);
}
?>
<tr> 
      <td><? print $fields[$k][1]; ?>:</td>
      <td>
        <input type="file" name="<? print $fields[$k][0]; ?>"><? if ($id){ print " <font face=arial size=1>Valides faili, kustutab vana!</font>"; } ?>
      </td>
    </tr>
