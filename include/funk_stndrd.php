<?

/////////////////////////////////////////////////////////////
//   
//	funk_stndrd.php - erinevad standardfunktsioonid
//
//	D'Art 2003
//
//	Timo Toots
//
//	funks: 
//		bake_cookie( $name , $value )
//		choose_language( $change_lang )
//
/////////////////////////////////////////////////////////////

function bake_cookie( $name , $value ){

	global $$name,$conf;

	SetCookie($name, $value ,time()+ 31536000,$conf["htdocs"]."/");

	$$name =  $value;        

} // function bake_cookie

/////////////////////////////////////////////////////////////

function language_print(){

	global $conf,$lang, $page;
	
	for ( $i = 0 ; $i < count($conf['lang']) ; $i++ ){
	
	
		if ($lang["Lang"]==$conf['lang'][$i]){
			

		} else {
			
			$url =  $_SERVER["REQUEST_URI"];
			

			print "<a href='?lng=".$conf['lang'][$i]."'>".$conf['lang_txt'][$i]."</a>";
		
		}
	
		
	} //for
   

} // function language_print








/////////////////////////////////////////

function print_menu(){

	global $conf,$lang,$p,$projects;

	$tempadmin=new fc_SQL;
  
  $i=0;
	$tempadmin->query("select  main.lyhend as page,  main.method as method,lang.title as title, lang.body as body  from ".$conf["prefix"]."_projects as main , ".$conf["prefix"]."_projects_".$lang['Lang']." as lang where lang.id=main.id and lang.active=1 order by main.time desc");
	

	while ($tempadmin->next_record()){
		
		
$projects[$i]["title"] = $tempadmin->f("title");
$projects[$i]["link"] = $conf["webbase"]."/".$tempadmin->f("page");
$projects[$i]["method"] = $tempadmin->f("method");
$i++;
/*
   
   			if ($p==$tempadmin->f("page")){
   			
	   			?><?=$tempadmin->f("title")?><br/>
	   			<?
   			
   			} else {
   			   
   
	   			?><a href="?p=<?=$tempadmin->f("page")?>"><?=$tempadmin->f("title")?></a><br/>
	   			<?
	   			
	   		}
	   		*/

   } //while



} // function print_menu


/////////////////////////////////////////////////////////////
function print_method_menu($method){

	global $conf,$lang,$p;

	$tempadmin=new fc_SQL;
  
	$tempadmin->query("select  main.lyhend as page,  main.method as method,lang.title as title, lang.body as body  from ".$conf["prefix"]."_projects as main , ".$conf["prefix"]."_projects_".$lang['Lang']." as lang where lang.id=main.id and lang.active=1 and main.method='".$method."' order by main.time desc");
	

	while ($tempadmin->next_record()){
		
	/*	
$projects[$i]["title"] = $tempadmin->f("title");
$projects[$i]["link"] = "?p=".$tempadmin->f("page");
$projects[$i]["method"] = $tempadmin->f("method");
$i++;
*/
   
   			if ($p==$tempadmin->f("page")){
   			
	   			?>* <span class="works_on"><a href="<?=$conf["webbase"]?>/<?=$tempadmin->f("page")?>/"><?=$tempadmin->f("title")?></a></span><br/>
	   			<?
   			
   			} else {
   			   
   
	   			?>* <a href="<?=$conf["webbase"]?>/<?=$tempadmin->f("page")?>/"><?=$tempadmin->f("title")?></a><br/>
	   			<?
	   			
	   		}
	   		

   } //while



} // function print_menu


/////////////////////////////////////////////////////////////


/*
/////////////////////////////////////////////////////////////

function print_menu(){

	global $conf,$lang,$page,$page_title;



	$tempadmin=new fc_SQL;
  
	$tempadmin->query("select  lang.title as title , main.link as link from ".$conf["prefix"]."_pages as main , ".$conf["prefix"]."_pages_".$lang['Lang']." as lang where lang.id=main.id and lang.active=1 order by main.kaal asc");
	$i=0;

	while ($tempadmin->next_record()){
		$i++;
   
   
   			if ($page==$tempadmin->f("link")){
   				
   				$page_title = $tempadmin->f("title");
   						
   			?><a href="<?=$conf['webbase']?>/<?=$tempadmin->f("link")?>/"><? print $tempadmin->f("title"); ?></a><br/><img src="images/spacer.gif" height="8" alt=""/><br/>
	   		<?
	   			

   			
   			} else {
   			   
   
   			   
	   			?><a href="<?=$conf['webbase']?>/<?=$tempadmin->f("link")?>/"><? print $tempadmin->f("title"); ?></a><br/><img src="images/spacer.gif" height="8" alt=""/><br/>

	   			<?
	   			
	   		}





   } //while

if ($page_title==""){
					
					$table = $conf['prefix'].'_texts_'.$lang['Lang'];
					$tempadmin->query("select title from ".$table." where id='".$page."' ");
					if ($tempadmin->next_record()){ $page_title = $tempadmin->f("title"); }	
					
	
}



} // function print_menu

*/
/////////////////////////////////////////////////////////////

function choose_language( $change_lang, $rss="" ){

	global $lang, $conf;

	$cookiename = $conf['prefix'].'_lang';
	$lang_ok=0;	


	if (!$change_lang && !$_COOKIE[$conf['prefix'].'_lang'] && substr(GetHostByAddr($_SERVER['REMOTE_ADDR']), -2, 2)=="ee"){
		
		$change_lang = "et";

	} elseif(!$change_lang && !$_COOKIE[$conf['prefix'].'_lang']) {
		
		$change_lang = "en";

	}

	
	// keelevahetuse check 
	if ($change_lang){
	 	
		$lang_check = $change_lang;
		$newcookie = 1;		
	 
	} else {
	 
		$lang_check = $_COOKIE[$cookiename];
		$newcookie = 0;		
	}
	 

	// kontrollime kas valitud keelt saab kasutada
	for ( $i = 0 ; $i < count($conf['lang']) ; $i++ ){
	
		if ($lang_check==$conf['lang'][$i]){
		
			$lang_ok=1;			
			
		} // if
		
	} //for
	
	
	// juhul kui keel ei k6lba, kasutame default keelt
	if (!$lang_ok){ 
	
		$lang_check=$conf['lang'][0]; 
		$newcookie=1;
		
	}
	
	
	// vajadusel paneme uue kypsise
	if ($newcookie && $rss!="rss"){ 
	
		bake_cookie($cookiename , $lang_check); 

	} // if


	// t6mbame sisse 6ige keelefaili
	//require_once('language/lang_'.$lang_check.'.php');
	$lang['Lang'] = $lang_check;
	
	$dbhype = new fc_sql;
	$dbhype->query ("select main.def as def, lang.string as string from ".$conf["prefix"]."_lang as main , ".$conf["prefix"]."_lang_".$lang_check." as lang where lang.id=main.id");
	 while ($dbhype->next_record()){
   
        $lang[$dbhype->f("def")] = str_replace("<br>", "<br/>", $dbhype->f("string"));
    }
	

} // function choose_language

/////////////////////////////////////////////////////////////

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}




function print_banners(){
		
	global $conf, $lang;
	
	$maintable = $conf['prefix']."_banners";
	$langtable = $conf['prefix']."_banners_".$lang['Lang'];
	$u = 0;
	$db = new fc_SQL;
	$db->query('select main.filename as filename, lang.title as title, main.link as link, main.kaal as kaal from '.$maintable.' as main, '.$langtable.' as lang where lang.id=main.id and lang.active=1 order by main.kaal desc');
	
	
	
	 		
	while ($db->next_record()){
		
			 if (strpos($db->f("filename"), ".swf") > 0) {
			 	
				///////////////////// FLASH
				$banner = "FLASHCODE";
				
			 } elseif (strpos($db->f("link"), "popup") > 0) {
			 	
			 	///////////////////// POPUP
	       
	       		$img = substr($db->f("link"),6);
	       		
$banner = "<a href=\"javascript://\"><img  onclick=\"popup('".$conf["webbase"]."/media/thumb/".$img."');\" src=\"".$conf["webbase"]."/images/".$db->f("filename")."\" alt=\"\" /></a>";
    		
    		 } else {
    		 	
///////////////////// TAVALINK

		   if (strstr($db->f("link"),"saal.ee/")){ $target="_self"; } else { $target="_blank"; }
		   if ($u==2){ $margin =  0; } else { $margin =  15; }
		   	
		   	
		?><div style="float:left;width:236px;margin-right:<?=$margin?>px;"><a href="<?=$db->f("link")?>" target="$target"><img src="<?=$conf["webbase"]."/media/photo/".$db->f("filename")?>" alt="" /></a><br/><?=$db->f("title")?></div><?

			} // else
			
			
		$u++;
		
		
		
	} // while


		
} // function



                function find_alas($body){
                
  
  					$pieces = explode("[ala]", $body);
					
					$newbody = $pieces[0];

					for ($a=1 ; $a < count($pieces) ; $a++){
					
					$name = $a - 1;
					
					$pieces[$a] = str_replace("[/ala]","</a></span>",$pieces[$a]);
					
					$newbody .= "<span class='title'><a name='hype".$name."'>".$pieces[$a];
										
					}


					$offset = 0;
					
					while (strpos($body, "[ala]", $offset+1)!=FALSE){
					
					$offset = strpos($body, "[ala]", $offset+1);
					$alalopp = strpos($body, "[/ala]", $offset+1);
					$title[] = substr ($body,$offset+5,$alalopp-$offset-5);
					
					
					} //while	
					
					for ($i=0 ; $i < count($title) ; $i++){
					
						$titles .= "<img src='images/punn.gif'><a href='#hype".$i."'>".$title[$i]."</a><br/>";
						
					} // for
					
					return $titles."<br/>".$newbody;
                
                } // function
                
                
                
                
                
//////////////////////////////////////////////////////////


function parse_tags($string){
	
 $tag_in[]  = "[popimg]"; 
 $tag_out[] = "[/popimg]";
 
 $tag_in[]  = "[poptxt1]"; 
 $tag_out[] = "[poptxt3]";
 
 $tag_in[]  = "[youtube]"; 
 $tag_out[] = "[/youtube]";
 
 $tag_in[]  = "[img]"; 
 $tag_out[] = "[/img]";
 
 $tag_in[]  = "[title]"; 
 $tag_out[] = "[/title]";
 
 $tag_in[]  = "[thumb]"; 
 $tag_out[] = "[/thumb]";
 
  $tag_in[]  = "[embed_flv]"; 
 $tag_out[] = "[/embed_flv]";
 
 
 	
$string = " ".$string;
$r = 0;	 	 	
	 	 	
for ($m=0;$m<count($tag_in);$m++){ 	
	
		$start = $tag_in[$m];
		$end = $tag_out[$m];
	
	 	 	
        	$ini = strpos($string,$start);



        while ($ini != false){
	        	
	        // stringi esimene pool	
        	$string_out = substr($string,0,$ini);
        	
        	$ini += strlen($start);   
        	$len = strpos($string,$end,$ini) - $ini;
        	$out =  substr($string,$ini,$len);
        	
			
			switch ($start){
				

////////////////////////////

        		case "[popimg]":
        		$outer = explode("%%",$out);
				$string_out .= "<a href=\"/media/photo/".(trim($outer[0]))."\" title=\"".(trim($outer[1]))."\" rel=\"lightbox[galerii]\"><img src=\"/media/thumb/".(trim($outer[0]))."\" alt=\"\"/></a>
				";
				break;    
								
////////////////////////////

        		case "[poptxt1]":
        		$outer = explode("[poptxt2]",$out);
				$string_out .= "<a href=\"media/photo/".(trim($outer[1]))."\" title=\"".(trim($outer[0]))."\" rel=\"lightbox[galerii]\"><img src=\"media/thumb/".(trim($outer[1]))."\" alt=\"\"/></a>
				";
				break;     
				
////////////////////////////
  
        		case "[title]":
				$string_out .= "<span class=\"text_title\" style=\"color:#ff3803;font-size:1.4em;margin-top:0px;\"><b>".(trim($out))."</b></span><br/>
								";

				break;    
				
////////////////////////////

        		case "[youtube]":
				$string_out .= "<div id=\"flashcontent".$r."\">Youtube video</div>
<script language=\"JavaScript\" type=\"text/javascript\">
var so = new SWFObject(\"http://www.youtube.com/v/".(trim($out))."\", \"youtube\", \"340\", \"280\", \"7\");
so.write(\"flashcontent".$r."\");
</script>
";

break;
////////////////////////////

        		case "[embed_flv]":
	        		$outer = explode("%",$out);
	        		if (trim ($outer[1])==""){ $outer[1] = 370; }
	        		if (trim ($outer[2])==""){ $outer[2] = 229; }
	        		

$r = round (rand(0,200));
$string_out .= "<div id=\"flashcontent".$r."\">Embed</div>
<script type='text/javascript'>
var s1 = new SWFObject('css/player.swf','player".$r."','".(trim($outer[1]))."','".(trim($outer[2]))."','9');
s1.addParam('allowfullscreen','true');
s1.addParam('allowscriptaccess','always');
s1.addParam('flashvars','file=".(trim($outer[0]))."');
s1.write('flashcontent".$r."');
</script>";


		
				break;  	
							
////////////////////////////
				
        		case "[img]":
				$string_out .= "<img src=\"".$conf["webbase"]."/media/photo/".(trim($out))."\" alt=\"\"/>
				";
				break;   
				
////////////////////////////
				
        		case "[thumb]":
				$string_out .= "<img src=\"".$conf["webbase"]."/media/thumb/".(trim($out))."\" alt=\"\"/>
				";
				break;   
								
////////////////////////////
				
				
				default:
				$string_out .= (trim($out));

			   	
			   
        	
        	} // switch
        	
        	// string pärast tagi
           	$string_out .= substr($string,$ini+$len+(strlen($end)));
     		
     		$string = $string_out;

			// otsi järgmine koht
			$ini = strpos($string,$start);
			$r++;	
			
        } // while
        

	 	} // for



return $string;
        
        
        
        
        
}




?>
