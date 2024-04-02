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

$headers  = "From: ".$values[1]." ".$values[2]."<".$values[5].">\n";
$headers .= "X-Sender: <".$values[5].">\n";
$headers .= "X-Mailer: PHP\n"; //mailer
$headers .= "X-Priority: 3\n"; //1 UrgentMessage, 3 Normal

$body = $lang["forms1_1"].": ".$values[1]."\n".
$lang["forms1_2"].": ".$values[2]."\n".
$lang["forms1_3"].": ".$values[3]."\n".
$lang["forms1_4"].": ".$values[4]."\n".
$lang["forms1_5"].": ".$values[5]."\n".
$lang["forms1_6"].": ".$values[6]."\n".
$lang["forms1_7"].": ".$values[7]."\n";

mail("timo@dart.ee", "Pressitaotlus: ".$values[3], $body, $headers);
mail("alice.pehk@filharmoonia.ee", "Pressitaotlus: ".$values[3], $body, $headers);



?>
