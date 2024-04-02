<?

/////////////////////////////////////////////////////////////
//   
//	config/config.php - Konfiguratsioonifail
//
//	D'Art 2003
//
//	Timo Toots
//
/////////////////////////////////////////////////////////////

require ("include/globals.php");


/////////////////////////////////////////////////////////////
//
// 1forms 
/////////////////////////////////////////////////////////////
$mod_name='forms1';

$conf[$mod_name]['Required'][] = '1'; 
$conf[$mod_name]['Required'][] = '2'; 
$conf[$mod_name]['Required'][] = '3'; 
$conf[$mod_name]['Required'][] = '4'; 
$conf[$mod_name]['Required'][] = '5';
$conf[$mod_name]['Required'][] = '6'; 
$conf[$mod_name]['Required'][] = '7'; 

$conf[$mod_name]['ClickForm'] = '1';
$conf[$mod_name]['NumberOfFields'] = '7'; 

/////////////////////////////////////////////////////////////
//
// 1forms 
/////////////////////////////////////////////////////////////
$mod_name='forms2';

$conf[$mod_name]['Required'][] = '1'; 
$conf[$mod_name]['Required'][] = '2'; 
$conf[$mod_name]['Required'][] = '3'; 


$conf[$mod_name]['ClickForm'] = '1';
$conf[$mod_name]['NumberOfFields'] = '3'; 

/////////////////////////////////////////////////////////////
//
// 1forms 
/////////////////////////////////////////////////////////////
$mod_name='forms3';

$conf[$mod_name]['Required'][] = '1'; 
$conf[$mod_name]['Required'][] = '3'; 
$conf[$mod_name]['Required'][] = '4'; 
$conf[$mod_name]['Required'][] = '5';
$conf[$mod_name]['Required'][] = '7'; 
$conf[$mod_name]['Required'][] = '8'; 

$conf[$mod_name]['ClickForm'] = '1';
$conf[$mod_name]['NumberOfFields'] = '10'; 


/////////////////////////////////////////////////////////////
//
// CODER 
/////////////////////////////////////////////////////////////
/*

$coder_in[]  = "[audio1]";
$coder_out[] = "<object type=\"application/x-shockwave-flash\" data=\"music.swf&#63;song_url=audio/";
$coder_in[]  = "[audio2]";
$coder_out[] = "&amp;b_colors=009FDA,009FDA,009FDA,009FDA\" width=\"17\" height=\"17\"><param name=\"movie\" value=\"css/music.swf&#63;song_url=audio/";
$coder_in[]  = "[audio3]";
$coder_out[] = "&amp;b_colors=009FDA,009FDA,009FDA,009FDA\" /><img src=\"noflash.gif\" width=\"17\" height=\"17\" alt=\"\" /></object>";
*/


				
$coder_in[]  = "[punn]";
$coder_out[] = "<img src='images/punn.gif' border='0'> ";		

$coder_in[]  = "<br>";
$coder_out[] = "<br/>";

$coder_in[]  = "<p>&nbsp;</p>";
$coder_out[] = "<br/>";


$aasta = (rand()%2)+5;
switch($aasta){
	
	case 5: $ran_max = 191; break;
	case 6: $ran_max = 79; break;
	case 7: $ran_max = 160; break;
	
}// switch

$rander = (rand()%$ran_max)+1;

$coder_in[]  = "[random]";
$coder_out[] = "<a href='http://timo.dart.ee/randoms/200".$aasta."/?id=".$rander."'><img src='http://timo.dart.ee/randoms/200".$aasta."/timo_toots_randoms0".$aasta."_".$rander.".jpg' width='650' border='0' alt=\"\"/></a><br/><br/><a href='http://timo.dart.ee/randoms/200".$aasta."/?id=".$rander."'><b>RANDOMS * 200".$aasta." * ".$rander."</b></a> ";

$coder_in[]  = "[line]";
$coder_out[] = "<hr/>";	


?>
