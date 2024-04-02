<? 

 switch ($part){

 case 1: ?>

  
<? break; case 2: ?>

<div id="event_list"><a href="<?=$conf["webbase"]?>/event/<?=$sisu['id']?>/"><img style="float:left;margin-right:10px;" src="media/event_thumb/<?=$sisu['photo']?>" width="75" height="50" border="0" alt=""/></a>
<span class="hall"><?=$lang["Date"]?>:</span> <?=$sisu['date']?><br/>
<span class="hall"><?=$lang["Time"]?>: </span><?=$sisu['time']?><br/>
<span class="hall"><?=$lang["Event"]?>: </span><a href="<?=$conf["webbase"]?>/event/<?=$sisu['id']?>/"><?=$sisu['title']?></a><br/>
<span class="hall"><?=$lang["Ticket"]?>:</span> <?=$sisu['ticket']?> -> <?=$lang["Buy"]?><br/><br/>  
</div>

<? break; case "cat_head": ?>

<div style="float:right;text-align:right;width:110px;height:125px;padding-bottom:20px;">

<? break; case "cat_selected": ?>

<span style="line-height:16px;"><?=$sisu?></span><br/>

<? break; case "cat_unselected": ?>

<span style="background:#000000;line-height:16px;"><?=$sisu?></span><br/>

<? break; case "cat_foot": ?>

</div>
 


<? break; case 4: ?>

<div style="width:495px;height:330px;float:left;padding-right:15px;padding-bottom:15px;"><img src="media/event_photo/<?=$sisu['photo']?>" width="495" height="330" alt=""/></div>
<div style="float:left;width:110px;height:125px;padding-bottom:20px;"><?=$sisu['date']?><br/></div>
<div style="width:227px;height:240px;float:right;border-top:1px solid #000000; padding-top:15px;">
<span class="hall"><?=$lang["Duration"]?>:</span> <?=$sisu['duration']?><br/>
<span class="hall"><?=$lang["Ticket"]?>:</span> <?=$sisu['ticket']?> -> <?=$lang["Buy"]?>
<? if ($sisu['video']) { ?>
<br/><br/>  <a href="<?=$sisu['video']?>" rel="lightbox[social 480 380]"><img src="images/video.gif" title="Video" alt="Video"></a>
<? } ?>
</div>

<div style="width:738px;">
<span style="font-size:24px;line-height:35px;"><b><?=$sisu['authors']?></span></b><br/>
<span style="font-size:24px;line-height:27px;"><?=$sisu['title']?></span><br/>
<hr/>
<span class="text"><?=$sisu['body']?></span>
</div>
<? } ?>

