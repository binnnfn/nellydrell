<?

/////////////////////////////////////////////////////////////
//   
//	include/config.php - Konfiguratsioonifail
//
//	D*Art 2008
//
//	Timo Toots
//
/////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////
//
// Keelevalikud
/////////////////////////////////////////////////////////////
$conf['lang'][] = 'et';
$conf['lang'][] = 'en';

$conf['lang_txt'][] = 'EESTI KEELES';
$conf['lang_txt'][] = 'IN ENGLISH';


/////////////////////////////////////////////////////////////
//
// Muu konf 
/////////////////////////////////////////////////////////////

$getpath =  getcwd();


$conf['prefix'] = 'nellydrell';
$conf['path'] = '/home/nellyweb/www.nellydrell.ee/';
$conf['mod_db'] = $conf['path'] .'../public.php';
$conf['webbase'] = 'http://www.nellydrell.ee'; // ilma lõpus oleva slashita
$conf['htdocs'] = ''; // ilma lõpus oleva slashita

$conf["admin_link"]= $conf['webbase'] . "/ohjur/"; 


?>
