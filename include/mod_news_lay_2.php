<? 

 switch ($part){

 case 1: 

  print "<?"; ?>xml version="1.0" encoding="utf-8"<? print "?>"; ?>
 
<rss version="2.0"  xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:content="http://purl.org/rss/1.0/modules/content/">
    
    
    
  <channel>
    <title><?=$lang["PageTitle"]?></title>
    <link><?=$conf["webbase"]?></link>
    <description><?=$lang["Description"]?></description>
    <language>en-uk</language>
    <docs>http://blogs.law.harvard.edu/tech/rss</docs>
    <generator>PHP RSS</generator>
    <managingEditor><?=$lang["WebEmail"]?></managingEditor>
    <webMaster>timo@dart.ee</webMaster>
    

<? break; case 2: ?>

	<item>
    <guid><?=$conf["webbase"]?>/news/id/<?=$sisu['id']?></guid>
    <title><?=$sisu['title']?></title>
      <link><?=$conf["webbase"]?></link>
      <description><? $boddy = strip_tags ($sisu['body']); print $boddy; ?></description>
     <content:encoded><![CDATA[<?=$boddy?>]]></content:encoded>
     <pubDate><?
         
          print date("r",strtotime($sisu['time']));  

     ?></pubDate>
    </item>



<? break; case 3: ?>

  </channel>
</rss>

<? } ?>
