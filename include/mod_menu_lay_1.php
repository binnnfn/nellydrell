<? 

 switch ($part){

 case "sub_menu": ?>
 
<a href="/<?=$sisu["link"]?>/"><?=$sisu["title"]?></a> /

<? break; case "sub_menu_selected": ?>

<a href="/<?=$sisu["link"]?>/"><?=$sisu["title"]?></a> /


<? break; case "main_menu": ?>

<a href="/<?=$sisu["link"]?>/"><?=$sisu["title"]?></a> /
	
<? break; case "main_menu_selected": ?>

<span class="menu_selected"><a href="/<?=$sisu["link"]?>/"><?=$sisu["title"]?></a></span> /
	
<? } ?>


