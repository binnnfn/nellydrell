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
        <option value="0" <? if ($tempo=="0"){ print "selected"; } ?>>Ei</option>
        <option value="1" <? if ($tempo=="1"){ print "selected"; } ?>>1px - Must</option>
        <option value="2" <? if ($tempo=="2"){ print "selected"; } ?>>1px - Valge</option>
        <option value="3" <? if ($tempo=="3"){ print "selected"; } ?>>1px - Hall</option>
        <option value="4" <? if ($tempo=="4"){ print "selected"; } ?>>5px - Must</option>
        <option value="5" <? if ($tempo=="5"){ print "selected"; } ?>>5px - Valge</option>
        <option value="6" <? if ($tempo=="6"){ print "selected"; } ?>>5px - Hall</option>
        <option value="7" <? if ($tempo=="7"){ print "selected"; } ?>>10px - Must</option>
        <option value="8" <? if ($tempo=="8"){ print "selected"; } ?>>10px - Valge</option>	
	<option value="9" <? if ($tempo=="9"){ print "selected"; } ?>>10px - Hall</option>	
	
      </select>
      </td>
    </tr>
