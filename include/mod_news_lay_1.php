<? 

 switch ($part){

 case 1: ?>



<? break; case 2: ?>

<span class="text_title"><?=$sisu['title']?></span><br/>
[<?=$sisu['time']?>]<br/>
<?=$sisu['body']?>

<hr/>


<? break; case 3: ?>


  <?
//start
for ($r = 0 ; $r < $sisu['kokku'] ; $r++){

$lk = $r+1;

  if (($r*10)==$sisu['start']){ print "<b>".$lk."</b> "; } else {

   ?><a href="<?=$conf['webbase']?>/news/<? print ($r*10); ?>/"><? print $lk; ?></a> <?

  } // else

} // for

?>

<? } ?>


