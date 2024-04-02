
		<?
		

				$text = new mod_text (1);			
				$text->show_text(9);
		
		?>	
		
							<form method="post" action="?page=feedback">
							
<table border="0" width="560" cellpadding="0" cellspacing="0">
	<tr>
		<td class="text" valign="top">
		
			<table border="0" cellpadding="3" cellspacing="0">
			<? if ($sisu[0]){ ?>
				
				<tr><td height="20" valign="middle" colspan="2"><hr/></td></tr>						
				<tr>
				<td class="text" colspan="2"><?=$sisu[0]?></td>
				</tr>
				<tr><td height="20" valign="middle" colspan="2"><hr/></td></tr>
	
			<? } ?>	
			
							
			<tr>
			<td class="text"><?=$lang["forms2_1"]?>:</td>
			<td height="20" class="contact"><input type="text" name="values[1]" 
			value="<?=$sisu[1]?>" class="forms"></td>
			</tr>
						
			<tr>
			<td class="text"><?=$lang["forms2_2"]?>:</td>
			<td height="20" class="contact"><input type="text" name="values[2]"
			value="<?=$sisu[2]?>" class="forms"></td>
			</tr>

			<tr>
							<td class="text"><?=$lang["forms2_3"]?>:</td>
							<td class="contact"><textarea name="values[3]"
								  class="textbox" wrap="virtual" rows="8" cols="50"><?=$sisu[3]?></textarea>
							</td>
							</tr>
							
			
							<tr class="contact">
							<td></td>
								<td  height="20"><input type="submit" name="submit" value="<?=$lang["SubmitForms"]?>" class="forms" style="height:20px;"></td>
							</tr>											
						
						
							
							
						</table>
</td></tr></table>
		
						</form>
