<? 

function  mod_conf(){


}

//////////////////////////////////////////////////////////////////////////

  function select(){
    
?>
<script language = "JavaScript"> 
<!-- 
function preview (_f){

	_f.target = 'preview';
	_f.test.value = '1';
	aken = window.open('','preview','resizable=1,scrollbars=1,width=500,height=500');
	_f.submit();	
	
} 

function send (_f){

	_f.target = '_self';
	_f.test.value = '0';	
	_f.submit();
	
}

// --> 
</script> 
<tr> 
      <td>Pealkiri:</td>
      <td>
        <input type="text" name="title" size="50" maxlength="100">
      </td>

	</tr>
    <tr> 
      <td>Sisu:</td>
      <td>      
<textarea style="font-family: verdana; font-size: 10; background-color: #ffffff;
color: #000000; width: 400; height: 170; border: 1px solid rgb(9,5,2)"name="body" rows="8" cols="50" wrap="VIRTUAL"></textarea>
     </td>
    </tr>	

<tr>
	<td>  
	<input type="button" name="saada" value="OK" onClick="send(this.form)">
	<input type="hidden" name="db" value="1">
	<input type="hidden" name="test" value="1">
	<input type="hidden" name="op" value="add">	
	</td>
	<td>
	<input type="button" name="previewer" value="Eelvaade" onClick="preview(this.form);" >
	</td>
</tr>

<?
  

  } // function select

//////////////////////////////////////////////////////////////////////////

  function db_add(){
  
  	global $conf;
  	
   	$headers  = "From: Nelly Drell<info@nellydrell.ee>\n";
	$headers .= "X-Sender: <info@nellydrell.ee>\n";
	$headers .= "X-Priority: 3\n"; //1 UrgentMessage, 3 Normal
	$headers .= "Return-Path: <info@nellydrell.ee>\n";
	
	$body = $_POST['body'];
	$test = $_POST['test'];
	$title = $_POST['title'];
	
	$r=0;
	$list = new fc_sql;
	
	if ($test){
	
	$list->query("select email, id from ".$conf["prefix"]."_list where email='timo@dart.ee'");
		
	} else {
	
	$list->query("select distinct email, id from ".$conf["prefix"]."_list order by id");
	
	}
	
	while ($list->next_record()){
	
		print $list->f("email")."<br>";
		$hasher = md5($list->f("email")."_".$list->f("id"));
		
		$remove_sig =  "\n\n To remove from the mailing list visit:\n ".$conf["webbase"]."/list/".$hasher."/";
	
		$r++;	
		mail($list->f("email") , $title ,$body.$remove_sig, $headers);
		
	}
	
	print "Saatsid ".$r." kirja!";

  } // function db_add


//////////////////////////////////////////////////////////////////////////

  function forms(){
  

  } // function forms

//////////////////////////////////////////////////////////////////////////
