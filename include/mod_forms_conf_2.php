<?

/////////////////////////////////////////////////////////////
//
//	conf_forms_1.php - forms1 config
//
//	D'Art 2003
//
//	Timo Toots
//
/////////////////////////////////////////////////////////////

/*
	1 - nimi
	2 - email
	3 - telefon
	4 - sisu
*/

$headers  = "From: ".$values[1]."<".$values[2].">\n";
$headers .= "X-Sender: <".$values[2].">\n";
$headers .= "X-Mailer: PHP\n"; //mailer
$headers .= "X-Priority: 3\n"; //1 UrgentMessage, 3 Normal
$headers .= "Return-Path: <".$values[2].">\n";

$body = $lang["forms2_1"].": ".$values[1]."\n".
$lang["forms2_2"].": ".$values[2]."\n".
$lang["forms2_3"].": ".$values[3]."\n";

if (strstr($values[2],"http://")==FALSE){
	
mail("timo@dart.ee", "Uus tagasiside", $body, $headers);
mail("fila@filharmoonia.ee", "Uus tagasiside", $body, $headers);


}




?>
