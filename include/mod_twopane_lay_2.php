<? 

 switch ($part){

 case 1: ?>

<table width="560" height="432" cellpadding="0" cellspacing="0">
<tr><td align="left" valign="top" width="220">
<? break; case 2: ?>


<? if ($sisu["selected"]==1){  ?>
<span class="title"><?=$sisu['groupy']?><?=$sisu['title']?><br/></span>
<table border="0" width="220" cellpadding="0" cellspacing="0">
<tr><td height="1" style="border: 1px dotted #E98300; border-style: dotted none  none none;"><img src="images/spacer.gif" height="1" width="220"/></td></tr></table>
<? } else {?>
<span class="title"><?=$sisu['groupy']?><a href="?page=<?=$page?>&amp;id=<?=$sisu['id']?>"><?=$sisu['title']?></a><br/></span>
<table border="0" cellpadding="0" cellspacing="0" width="220"><tr><td height="1" style="border: 1px solid #FFFFFF; border-style: none none dotted none;"><img src="images/spacer.gif" height="1" width="220"/></td><tr></table><? } ?>
<? break; case 3: ?>
</td>
<td width="5" height="432"><img src="images/spacer.gif" height="432" width="5"/></td>
<td width="1" style="border: 1px dotted #E98300; border-style: none none none dotted;"><img src="images/spacer.gif" height="1" width="5"/></td>
<td align="left" valign="top">

<? break; case 4: ?>

<span class="title"><?=$sisu['title']?></span><br/><br/>
<span class="text"><?=$sisu['body']?></span><br/><br/>
<span class="lisalink"><?=$lang["Vaata"]?></a></span>
<? if ($sisu['kontserdid']) { ?><span class="lisalink"><b><?=$lang["Kontserdid"]?></b>:<br/><?=$sisu['kontserdid']?></a></span><? } ?>


<? break; case 5: ?>
</td>
</tr>
</table>


<? } ?>