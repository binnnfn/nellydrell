<?
$tempo="0";
if ($id){
$tempo=$parse->f($fields[$k][0]);
}
?>
    <tr> 
      <td><? print $fields[$k][1]; ?>:</td>
      <td>
      <select name="<? print $fields[$k][0]; ?>">
        <? if (!$id){ ?><option value="0" <? if ($tempo=="0"){ print "selected"; } ?>>Automatiik</option><? } ?>
        <option value="1" <? if ($tempo=="1"){ print "selected"; } ?>>Portrait</option>
        <option value="2" <? if ($tempo=="2"){ print "selected"; } ?>>Landscape</option>
      </select>
      </td>
    </tr>
