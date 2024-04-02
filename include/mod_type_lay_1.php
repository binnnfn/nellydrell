<? 

 switch ($part){

 case "sub_type": ?>
 
<a href="<?=$conf["webbase"]?>/gallery/<?=$sisu["link"]?>/"><?=$sisu["title"]?></a> /

<? break; case "sub_type_selected": ?>

<a href="<?=$conf["webbase"]?>/gallery/<?=$sisu["link"]?>/"><?=$sisu["title"]?></a> /


<? break; case "main_type": ?>

<a href="<?=$conf["webbase"]?>/gallery/<?=$sisu["link"]?>/"><?=$sisu["title"]?></a> 
	
<? break; case "main_type_selected": ?>

<span class="type_selected"><a href="<?=$conf["webbase"]?>/gallery/<?=$sisu["link"]?>/"><?=$sisu["title"]?></a></span>
	
<? } ?>


