<? 

 switch ($part){


case 1: ?>
<table width="100%" cellpadding="0" cellspacing="0">

<? break; case 2: ?>

<tr>
	<td align="left" valign="top" ><span class="title"><?=$sisu['title']?></span></td>
	<td align="right" valign="top"><span class="title"><?=$sisu['time']?></span></td>
</tr>
<tr>
	<td colspan="2" align="left" valign="top"  height="1"><img src="images/spacer.gif" width="600" height="2" border="0"/></td>
</tr>
<tr>
	<td colspan="2" align="left" valign="top" height="10"><img src="images/spacer.gif" width="600" height="15" border="0"/></td>
</tr>
<tr><td align="left" valign="top" colspan="2">
<span class="text"><?=$sisu['body']?></span></td>
</tr>


<? break; case 3: ?>

</table>


<? } ?>
