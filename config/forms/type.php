<?
$tempo="";
if ($id){
$tempo=$parse->f($fields[$k][0]);
}
?>
<tr> 
      <td><? print $fields[$k][1]; ?>:</td>
      <td>
      <select name="<? print $fields[$k][0]; ?>">
<option value="1" <? if ($tempo=="1"){ print "selected"; } ?>>Web</option>
<option value="2" <? if ($tempo=="2"){ print "selected"; } ?>>Illustratsioon</option>
<option value="3" <? if ($tempo=="3"){ print "selected"; } ?>>Print</option>
<option value="4" <? if ($tempo=="4"){ print "selected"; } ?>>Logo</option>
<option value="5" <? if ($tempo=="5"){ print "selected"; } ?>>Foto</option>
<option value="6" <? if ($tempo=="6"){ print "selected"; } ?>>Experimental</option>
<option value="99" <? if ($tempo=="99"){ print "selected"; } ?>>None</option>
</select>
           
      </td>
    </tr>
