<? 

 switch ($part){

 case 1: ?>
 
<script language="Javascript">

 	function show_div(divid){
 	
		if (document.getElementById(divid).style.display == ""){
			status = "none";
		}
		else {
			status = "";
		}
		document.getElementById(divid).style.display = status;
		
	} // function show_div

</script>


		
		<center>
<table border="0" width="584" cellpadding="0" cellspacing="14">

	<tr>
		<td class="text" valign="top">
		
		<table border="0" width="556" cellpadding="0" cellspacing="0">

		<tr><td class="text" valign="top" colspan="2">
		
		    <b><a href="javascript://" onclick="show_div('formid')"><?=$sisu['addtitle']?></a>
		    <? 	if ($sisu['id']){ ?><a href="?page=forum"><?=$lang["BackToTopics"]?></a><? } ?>		    
		    </b>
			<br>
			<div id="formid" style="display:none;">
			<br>
			<form method="post" action="?page=forum">
			<? 	if ($sisu['id']){ ?><input type="hidden" name="id" value="<?=$sisu['id']?>"><? } ?>

			<table border="0" cellpadding="3" cellspacing="0">
			<? 	if (!$sisu['id']){ ?>				
			<tr>
			<td class="text"><?=$lang["forms2_1"]?>:</td>
			<td height="20" class="contact"><input type="text" name="values[1]" 
			value="<?=$sisu[1]?>" class="forms"></td>
			</tr>
		    <? } ?>		
			<tr>
			<td class="text"><?=$lang["forms2_2"]?>:</td>
			<td height="20" class="contact"><input type="text" name="values[2]"
			value="<?=$sisu[2]?>" class="forms"></td>
			</tr>
			
			<tr>
			<td class="text"><?=$lang["forms2_3"]?>:</td>
			<td height="20" class="contact"><input type="text" name="values[3]"
			value="<?=$sisu[2]?>" class="forms"></td>
			</tr>	
			
			<tr>
			<td class="text"><?=$lang["forms2_4"]?>:</td>
			<td class="forum"><textarea name="values[4]" class="textboxforum" wrap="virtual" 
			   rows="8" cols="50"><?=$sisu[7]?></textarea>
			</td>
			</tr>
							
			
			<tr class="contact">
			<td class="text"></td>
			<td  height="20"><input type="submit" name="submit" value="<?=$lang["SubmitForum"]?>" class="forms"></td>
			</tr>											
						
			</table>
			</form>
			</div>
			
        </td></tr>
		
					


<? break; case 2: ?>

<tr><td colspan="2"><img src="images/linefull.gif" border="0" width="556" height="10"></td></tr>
<tr><td class="text" align="left" valign="top"><a href="?page=forum&id=<?=$sisu['id']?>"><?=$sisu['title']?></a> (<?=$sisu['replys']?>)</td><td class="text" align="right"><?=$sisu['name']?></td></tr>


<? break; case 3: ?>

</table>
</td></tr></table>

<? break; case 4: ?>

<tr><td colspan="2"><img src="images/linefull.gif" border="0" width="556" height="10"></td></tr>
<tr><td colspan="2" class="text" align="left" valign="top"><b><?=$sisu['title']?></b><br><?=$sisu['time']?> : <a href="mailto:<?=$sisu['email']?>"><?=$sisu['name']?></a></td></tr>
<tr><td colspan="2" class="text"><?=$sisu['body']?></td></tr>


<? break; case 5: ?>

</table>
</td></tr></table>

<? } ?>
