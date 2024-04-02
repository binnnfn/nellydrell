<? 

 switch ($part){

 case "thumbs": ?>
 
<? if ($sisu['year']){ $title = "<br/>".$sisu['year']; } ?>
<? if ($sisu['liik']){  $title .= "<br/>".$sisu['liik']; } ?>
<? if ($sisu['materjal']){  $title .= "<br/>".$sisu['materjal']; } ?>
<? if ($sisu['moodud']){  $title .= "<br/>".$sisu['moodud']; } ?>
<? if ($sisu['raam']){  $title .= "<br/>".$sisu['raam']; } ?>
<? if (trim($sisu['price'])){  $title .= "<br/>".$sisu['price']; } ?>

<?
$title_tooltip = str_replace ("<br/>",", ", $title);
$title_tooltip = substr($title_tooltip,1);
?>

<div style="position:relative;width:280px;float:left;margin:5px; margin-left:0px; margin-bottom:25px; height:280px; background:#261b1b;">
<table width="280" height="280">
<tr><td align="center" valign="middle"><a rel="lightbox[galerii]" href="<?=$conf["webbase"]?>/media/work_web/<?=$sisu['file']?>" title="	 <span style='color:#FF3803'>&#34;<?=$sisu["title"]?>&#34;</span> <?=$title_tooltip?>"><img src="<?=$conf["webbase"]?>/media/work_thumb/<?=$sisu['file']?>" border="0" alt="" /></a>
</td></tr></table>
</div>

<div style="position:relative;width:128px;float:left;margin:5px; margin-left:5px; margin-right:15px; height:280px;color:#e8e8e8">
<div style="position:absolute;bottom:0;left:0; width:128px; display: table-cell; vertical-align: bottom; font-style:italic;"><b>"<?=$sisu['title']?>"</b>
<hr class="hr_punane" style="margin-bottom:-10px"/>
<?=$title?>
</div>
</div>

<? break; case "photo_L": ?>


<div style="width:450px;float:left; margin:0px; margin-left:12px;  ">

<div style="float:left;width:450px;margin-bottom:10px;"><img src="<?=$conf["webbase"]?>/media/work_front/<?=$sisu['file']?>" border="0" width="450" title="<?=$sisu['title']?>" alt="" />
</div>

<div style="float:right;  font-style:italic;text-align:right;"><b>"<?=$sisu['title']?>"</b>
<hr class="hr_punane" />
<? if ($sisu['year']){ print  $sisu['year'].""; } ?>
<? if ($sisu['method']){ print  " / ".$sisu['method'].""; } ?>
<? if ($sisu['materjal']){ print  " / ".$sisu['materjal']; } ?>
<? if ($sisu['moodud']){ print " / ". $sisu['moodud']; } ?>
<? if ($sisu['raam']){ print " / ". $sisu['raam'].""; } ?>
<? if (trim($sisu['price'])!=""){ print " / ".$sisu['price'].""; } ?>
</div>
<div id="about"><span class="text_title" style="color:#FF3803"><?=$lang["AboutText"]?></span><br/><br/><?=$sisu["about"]?></div>
</div>

<? break; case "photo_P": ?>
<div style="float:left; margin:0px; margin-left:32px;">
<table width="100%" border="0" cellpadding="0" cellspacing==0">
<tr><td width="350"><img src="<?=$conf["webbase"]?>/media/work_front/<?=$sisu['file']?>" border="0" width="350" title="<?=$sisu['title']?>" alt="" /></td>
<td valign="bottom"><div style="margin-left:10px;float:left; font-style:italic;"><b>"<?=$sisu['title']?>"</b>
<hr class="hr_punane" style="margin-bottom:-10px"/>
<? if ($sisu['year']){ print "<br/>".$sisu['year']; } ?>
<? if ($sisu['liik']){ print "<br/>".$sisu['liik']; } ?>
<? if ($sisu['materjal']){ print "<br/>".$sisu['materjal']; } ?>
<? if ($sisu['moodud']){ print "<br/>".$sisu['moodud']; } ?>
<? if ($sisu['raam']){ print "<br/>".$sisu['raam']; } ?>
<? if ($sisu['price']){ print "<br/>".$sisu['price']; } ?>
</div>
</td>
</table>
<div id="about"><span class="text_title" style="color:#FFFFFF"><br/><?=$lang["AboutText"]?></span><br/><hr class="hr_punane"/><br/><?=$sisu["about"]?></div>

</div>



<? } ?>