<? 

 switch ($part){

 case 1: ?>
<div class="text_title" style="height:30px;width:600px;float:left;"><?=$sisu?><br/></div>
<? break; case 2: 

if (strstr($sisu['filename'],"freecaster")){
	
	$type = "external";
	
} else {


	$type = "gallery";
	
}

		switch ( $sisu["type"] ){
			
			case "SKATE & BMX": $type_html="<span style=\"color:#FFFFFF;background:#ff0000\">BMX</span>
<span style=\"color:#FFFFFF;background:#0000ff\">SKATE</span>";	break;
			case "BMX": $type_html="<span style=\"color:#FFFFFF;background:#ff0000\">BMX</span>";	break;
			case "SKATE": $type_html="<span style=\"color:#FFFFFF;background:#0000ff\">SKATE</span>";	break;
			default: 	$type_html="<span style=\"color:#FFFFFF;background:#ff0000\">BMX</span>
<span style=\"color:#FFFFFF;background:#0000ff\">SKATE</span>";	
		}



?>

<div style="width:112px;float:left;margin:5px; height:140px;"><a rel="lightbox[<?=$type?> <?=$sisu['width']?> <?=$sisu['height']?>]" href="<?=$sisu['filename']?>" title="<? print (strip_tags ($sisu['title']) ); ?>"><img src="/gallery/video_thumb/<?=$sisu['thumb']?>" border="1" alt="" /></a><br/><span style="font-size:9px"><?=$type_html?></span><br/><? print str_replace("<br>", "<br/>", $sisu['title']); ?></div>



<? break; case 3: ?>
<br/><br/>







<? } ?>