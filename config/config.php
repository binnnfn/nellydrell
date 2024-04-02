<?

require ("../include/globals.php");

$m=0;




$modinfo[$m]["title"]="Tekstid";
$modinfo[$m]["table"]="pages";
$modinfo[$m]["icon"]="pages";
$modinfo[$m]["adding"]=1;
$m++;

$modinfo[$m]["title"]="Pildid";
$modinfo[$m]["table"]="works";
$modinfo[$m]["icon"]="gallery";
$modinfo[$m]["adding"]=1;
$m++;

$modinfo[$m]["title"]="Näitused";
$modinfo[$m]["table"]="exhibitions";
$modinfo[$m]["icon"]="gallery";
$modinfo[$m]["adding"]=1;
$m++;

$modinfo[$m]["title"]="Motiivid";
$modinfo[$m]["table"]="type";
$modinfo[$m]["icon"]="info";
$modinfo[$m]["adding"]=1;
$m++;

$modinfo[$m]["title"]="Tehnika";
$modinfo[$m]["table"]="tehnika";
$modinfo[$m]["icon"]="info";
$modinfo[$m]["adding"]=1;
$m++;

$modinfo[$m]["title"]="Materjal";
$modinfo[$m]["table"]="materjal";
$modinfo[$m]["icon"]="info";
$modinfo[$m]["adding"]=1;
$m++;

$modinfo[$m]["title"]="Raamid";
$modinfo[$m]["table"]="frames";
$modinfo[$m]["icon"]="info";
$modinfo[$m]["adding"]=1;
$m++;

$modinfo[$m]["title"]="Kiri listi";
$modinfo[$m]["table"]="letter";
$modinfo[$m]["icon"]="forum";
$modinfo[$m]["adding"]=0;
$m++;

$modinfo[$m]["title"]="Listi tellijad";
$modinfo[$m]["table"]="list";
$modinfo[$m]["icon"]="forum";
$modinfo[$m]["adding"]=0;
$m++;


$modinfo[$m]["title"]="V&auml;ljendid";
$modinfo[$m]["table"]="lang";
$modinfo[$m]["icon"]="lang";
$modinfo[$m]["adding"]=1;
$m++;

$modinfo[$m]["title"]="Vaata lehte";
$modinfo[$m]["icon"]="site";
$modinfo[$m]["muulink"]=$conf["webbase"];
$m++;


$modinfo[$m]["title"]="Statistika";
$modinfo[$m]["icon"]="stats";
$modinfo[$m]["muulink"]="https://www.google.com/analytics/home/?et=reset&hl=en";
$m++;




?>
