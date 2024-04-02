<div id="front_bar">
<div id="news"><?=$sisu['text']?>
</div>
<div id="mailinglist">	<form method="post" action="<?=$cong["webbase"]?>/list/" id="list">

					<?=$lang["Mailinglist"]?><br/>
					<input type="text" class="forms" value="E-mail:" style="margin-top:5px;margin-left:-2px;margin-right:3px;" onfocus="if(this.value=='E-mail:')this.value='';"
						onblur="if(this.value=='')this.value='E-mail:';" name="email"/> <a href="javascript://" onclick="document.getElementById('list').submit();" style="color:#ff3803"><?=$lang["JoinMailinglist"]?></a>

				</form>


</div>
</div>