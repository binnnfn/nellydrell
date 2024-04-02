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

for ($ru = 0 ; $ru < count($values[8]) ; $ru++){

	$menyyd .= $values[8][$ru]." + ";

}

function add_to_lisst ($email){

global $conf;

$maintable = $conf['prefix']."_list";
		
if (strstr($email,"@") && strstr($email,".")){
			
			
			
			$adder = new fc_sql;
			$adder->query("select * from ".$maintable." where email='".$email."'");
			if (!$adder->next_record()){
			$adder->query("insert into ".$maintable." VALUES ('','".$email."',now())");
			}
		
		}
} // function

if ($values[10]){

	add_to_lisst ($values[3]);

}

$headers  = "From: ".$values[1]." <".$values[3].">\n";
$headers .= "X-Sender: <".$values[3].">\n";
$headers .= "X-Mailer: PHP\n"; //mailer
$headers .= "X-Priority: 3\n"; //1 UrgentMessage, 3 Normal

$body = $lang["forms1_1"].": ".$values[1]."\n".
$lang["forms3_2"].": ".$values[2]."\n".
$lang["forms3_3"].": ".$values[3]."\n".
$lang["forms3_4"].": ".$values[4]."\n".
$lang["forms3_5"].": ".$values[5]."\n".
$lang["forms3_6"].": ".$values[6]."\n".
$lang["forms3_7"].": ".$values[7]."\n".
$lang["forms3_8"].": ".$menyyd."\n".
$lang["forms3_9"].": ".$values[9]."\n
Soovin rohkem infot: ".$values[10]."\n";

mail("timo@dart.ee", "Suveterass: ".$values[6]." * ".$values[5], $body, $headers);
mail("eva.luigas@filharmoonia.ee", "Suveterass: ".$values[6]." * ".$values[5], $body, $headers);



?>
