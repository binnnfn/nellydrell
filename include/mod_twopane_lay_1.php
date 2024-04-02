<? 

 switch ($part){

 case 1: ?>

<table width="560" height="432" cellpadding="0" cellspacing="0">
<tr><td align="left" valign="top" width="220">
<? break; case 2: ?>
<span class="title"><?=$sisu['time']?><br><a href="?page=<?=$page?>&amp;id=<?=$sisu['id']?>"><?=$sisu['title']?></a><br/></span>

<? if ($sisu["selected"]==1){  ?><table border="0" width="220" cellpadding="0" cellspacing="0"><tr><td height="5" style="border: 1px dotted #E98300; border-style: dotted none  none none;"><img src="images/spacer.gif" height="8" width="220"/></td><tr></table><? } else {?>
<table border="0" cellpadding="0" cellspacing="0" width="220"><tr><td height="5" style="border: 1px solid #FFFFFF; border-style: none none dotted none;"><img src="images/spacer.gif" height="8" width="220"/></td></tr></table><? } ?>
<? break; case 3: ?>
</td>
<td width="5" height="432"><img src="images/spacer.gif" height="432" width="5"/></td>
<td width="5" style="border: 1px dotted #E98300; border-style: none none none dotted;"><img src="images/spacer.gif" height="5" width="5"/></td>
<td align="left" valign="top">

<? break; case 4: ?>

<span class="title"><?=$sisu['time']?><br/><?=$sisu['title']?></span><br/>
<span class="text"><?=$sisu['body']?></span><br/><br/>
<span class="lisalink"><?=$lang["Vaata"]?></a></span>


<? break; case 5: ?>
</td>
</tr>
</table>


<? } ?>