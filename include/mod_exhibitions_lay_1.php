<? 

 switch ($part){

 case "start": ?>
 <div style="width:400px;float:left;border-right:1px solid #4d4342; padding:10px;padding-top:0px;padding-right:40px; padding-left:0px;">

<span style="text-transform:uppercase;"><?=$lang["GalleryExhibitons"]?></span><br/>
<hr class="hr_punane"/>

<? break; case "row": ?>
<br/>
<span class="text_title"><a href="<?=$conf["webbase"]?>/exhibition/<?=$sisu['id']?>/">"<?=$sisu['title']?>"</a></span><br/>
<?=$sisu['time']?> <br/><br/>

<? break; case "online": ?>

 </div><div style="width:395px;float:right;padding:10px;padding-left:40px;padding-top:0px;">
<span style="text-transform:uppercase;"><?=$lang["OnlineExhibitions"]?></span><br/>
<hr class="hr_punane"/>
<? break; case "year": ?>

<br/><span style="color:#c62c06;"><?=$sisu?></span><br/>

<? break; case "end": ?>
</div>

<? break; case "sisuosa": ?>
<br/><br/>
<center>
<span style=" font-style:italic; "><?
if ($sisu['online']==1) { ?><?=$lang["OnlineExhibitionString"]?><? } ?></span><br/>
<span class="exhibition_title">"<?=$sisu['title']?>"</span><br/>
<span style=" font-style:italic; "><?=$sisu['time']?><br/><?=$sisu['place']?></span><br/>

</center>
<br/><br/>
<div id="exhibit_body" style=" font-style:italic; "><?=$sisu['body']?></div>
<br/><br/>

<? break; case "front": ?>

<div id="front_bar">
<div id="news">
<?=$sisu['time']?>
<br/>
<span class="text_title" style="color:#ff3803;font-size:1.4em;margin-top:0px;"><a href="/exhibition/<?=$sisu['id']?>/">"<? print trim($sisu['title']); ?>"</a></span>
<br/>
<?=$sisu['place']?><br/>	<br />		
<?=$sisu['body']?>
<a href="/exhibition/<?=$sisu['id']?>/"><img src="<?=$conf["webbase"]?>/media/work_thumb/<?=$sisu['mainphoto']?>" border="0" alt="" width="194"/></a>
</div>
</div>

<? break; case "mailinglist": ?>

<div id="mailinglist">	<form method="post" action="<?=$cong["webbase"]?>/list/" id="list">

					<?=$lang["Mailinglist"]?><br/>
					<input type="text" class="forms" value="E-mail:" style="margin-top:5px;margin-left:-2px;margin-right:3px;" onfocus="if(this.value=='E-mail:')this.value='';"
						onblur="if(this.value=='')this.value='E-mail:';" name="email"/> <a href="javascript://" onclick="document.getElementById('list').submit();" style="color:#ff3803"><?=$lang["JoinMailinglist"]?></a>

				</form>


</div>



<? } ?>


