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


<div style="position:relative;width:400px;float:left;margin:0px; margin-right:30px;">
<div style="position:relative;width:280px;float:left;margin:0px; height:280px; border: 0px solid #797778;border-bottom:0px solid #797778;">
<table width="280" height="280">
<tr><td align="left" valign="bottom"><a rel="lightbox[galerii]" href="<?=$conf["webbase"]?>/media/work_web/<?=$sisu['file']?>" title="	 <span style='color:#FF3803'>&#34;<?=$sisu["title"]?>&#34;</span> <?=$title_tooltip?>"><img src="<?=$conf["webbase"]?>/media/work_thumb/<?=$sisu['file']?>" border="0" alt="" /></a>
</td></tr></table>
</div>
<div style="margin-top:15px; float:left;width:280px;color:#FFFFFF;font-style:italic;"><b style="color:#FF3803">"<?=$sisu['title']?>"</b><br/>

<? if ($sisu['method']){ print $sisu['method'].""; } ?>
<? if ($sisu['year']){ print $sisu['year']."<br/>"; } ?>
<? if ($sisu['materjal']){ print $sisu['materjal']; } ?>
<? if ($sisu['moodud']){ print " / ". $sisu['moodud']; } ?>
<? if ($sisu['raam']){ print " / ". $sisu['raam'].""; } ?>
<? if ($sisu['price']){ print "<br/><b>".$sisu['price']."</b>"; } ?>
<br/><br/><br/></div>
</div>


<? } ?>