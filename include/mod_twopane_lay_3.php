<? 

 switch ($part){

case 2: 

	if ($sisu['id']!=5){

 ?>

<option value="<?=$sisu['title']?> / <?=$sisu['time']?>" <? if ($sisu["selected"]==1){ print "selected"; } ?>><?=$sisu['title']?> / <?=$sisu['time']?></option>


<? } } ?>