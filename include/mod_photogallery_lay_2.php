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


<? } ?>