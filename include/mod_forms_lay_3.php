
		<?
		

				$text = new mod_text (1);			
				$text->show_text(14);
		
		?>	
		
							<form method="post" action="?page=suveterass_order">
							

<table border="0" width="560" cellpadding="0" cellspacing="0">
	<tr>
		<td class="text" valign="top">
		
			<table border="0" cellpadding="3" cellspacing="0">
				<tr><td height="20" valign="middle" colspan="2"><hr/></td></tr>

			<? if ($sisu[0]){ ?>
									
				<tr>
				<td class="text" colspan="2"><?=$sisu[0]?></td>
				</tr>
				<tr><td height="20" valign="middle" colspan="2"><hr/></td></tr>
		
			<? } ?>	

							
			<tr>
			<td class="text"><?=$lang["forms3_1"]?>:</td>
			<td height="20" class="contact"><input type="text" name="values[1]" 
			value="<?=$sisu[1]?>" class="forms"></td>
			</tr>
						
			<tr>
			<td class="text"><?=$lang["forms3_2"]?>:</td>
			<td height="20" class="contact"><input type="text" name="values[2]"
			value="<?=$sisu[2]?>" class="forms"></td>
			</tr>
														
			<tr>
			<td class="text"><?=$lang["forms3_3"]?>:</td>
			<td height="20" class="contact"><input type="text" name="values[3]"
			value="<?=$sisu[3]?>" class="forms"></td>
			</tr>
																	
			<tr>
			<td class="text"><?=$lang["forms3_4"]?>:</td>
			<td height="20" class="contact"><input type="text" name="values[4]"
			value="<?=$sisu[4]?>" class="forms"></td>
			</tr>

				<tr>
			    <td colspan="2" width="5" style="border: 1px dotted #009FDA; border-style: none none dotted none ;"><img src="images/spacer.gif" height="5" width="5" alt=""/>
    </td>
			</tr>
					
																	
			<tr>
			<td class="text"><br/><?=$lang["forms3_5"]?>:</td>
			<td height="20" class="contact"><br/><select name="values[5]"  

style=" font: 10px 'Trebuchet MS',arial, verdana, sans-serif; 
	color: #000000;  height: 20px; background-color:#FFFFFF; 
    border: 1px dotted #009FDA;  border-style: dotted;
	padding: 2px; ">
			<? 

				require ('include/mod_twopane.php');
				
				$koput = new mod_twopane (3,"events");
				$koput->show_list($sisu[5]);	
?>
			<option <? if($sisu[5]==$lang["forms3_NoTickets"]){ print "selected"; } ?> value="<?=$lang["forms3_NoTickets"]?>"><?=$lang["forms3_NoTickets"]?></option>
		
				
			</select></td>
			</tr>
			
			<tr>
			<td class="text"><?=$lang["forms3_6"]?>:</td>
			<td height="20" class="contact"><input type="text" name="values[6]"
			value="<?=$sisu[6]?>" class="forms"></tr>			
			
			<tr>
			<td class="text"><?=$lang["forms3_7"]?>:</td>
			<td height="20" class="contact"><select name="values[7]"  

style=" font: 10px 'Trebuchet MS',arial, verdana, sans-serif; 
	color: #000000;  background-color:#FFFFFF; 
    border: 1px dotted #009FDA;  border-style: dotted;
	padding: 2px; ">
<option <? if($sisu[7]=="300.-"){ print "selected"; } ?> value="300.-">300.-</option>
<option <? if($sisu[7]=="275.-"){ print "selected"; } ?> value="275.-">275.-</option>
</select>
</tr>		
		

<tr>
			<td class="text"><br/><?=$lang["forms3_8"]?>:</td>
			<td height="20" class="contact"><br/><select multiple size="5" name="values[8][]"  

style=" font: 10px 'Trebuchet MS',arial, verdana, sans-serif; 
	color: #000000;  background-color:#FFFFFF; 
    border: 1px dotted #009FDA;  border-style: dotted;
	padding: 2px; ">
<option value="<?=$lang["forms3_menu1"]?> / 2"><?=$lang["forms3_menu1"]?> / 2</option>
<option value="<?=$lang["forms3_menu1"]?> / 4"><?=$lang["forms3_menu1"]?> / 4</option>
<option value="<?=$lang["forms3_menu2"]?> / 2"><?=$lang["forms3_menu2"]?> / 2</option>
<option value="<?=$lang["forms3_menu2"]?> / 4"><?=$lang["forms3_menu2"]?> / 4</option>
<option value="<?=$lang["forms3_menu3"]?> / 2"><?=$lang["forms3_menu3"]?> / 2</option>
<option value="<?=$lang["forms3_menu3"]?> / 4"><?=$lang["forms3_menu3"]?> / 4</option>
<option value="<?=$lang["forms3_menu4"]?> / 2"><?=$lang["forms3_menu4"]?> / 2</option>
<option value="<?=$lang["forms3_menu4"]?> / 4"><?=$lang["forms3_menu4"]?> / 4</option>
<option value="<?=$lang["forms3_menu5"]?> / 2"><?=$lang["forms3_menu5"]?> / 2</option>
<option value="<?=$lang["forms3_menu5"]?> / 4"><?=$lang["forms3_menu5"]?> / 4</option>
<option value="<?=$lang["forms3_menu6"]?>"><?=$lang["forms3_menu6"]?></option>


			</select></td>
			</tr>


			<tr>
			<td class="text"></td>
			<td class="contact"><?=$lang["forms3_MenuHere"]?>
			</td>
			</tr>	
	


			<tr>
			<td class="text"><?=$lang["forms3_9"]?>:</td>
			<td class="contact"><textarea name="values[9]"
		 	class="textbox" wrap="virtual" rows="8" cols="50"><?=$sisu[9]?></textarea>
			</td>
			</tr>	
	
			<tr>
			<td class="text"></td>
			<td height="20" class="contact"><input <? if($sisu[10]){ print "checked"; } ?>type="checkbox" name="values[10]" value="JAH"><?=$lang["forms3_10"]?></tr>		
				
			<tr class="contact">
			<td></td>
			<td  height="20"><input type="submit" name="submit" value="<?=$lang["SubmitForms"]?>" class="forms" style="height:20px;"></td>
			</tr>											
						


			<tr class="contact">
			<td class="text"></td>
			<td  height="20" class="text">* <?=$lang["forms3_confirm"]?></td>
			</tr>											
						
					
							
							
						</table>
</td></tr></table>
		
						</form>
