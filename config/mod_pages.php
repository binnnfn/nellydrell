<? 

function  mod_conf(){

	$m = 0;
    

    $fields[$m][0]="title";
    $fields[$m][1]="Pealkiri";
    $fields[$m][2]="text";
    $fields[$m][3]=30;
    $fields[$m][4]=100;
    $fields[$m][5]=1;	
     
    $m++;
    $fields[$m][0]="link";
    $fields[$m][1]="Lingi l&otilde;pp";
    $fields[$m][2]="text"; 
    $fields[$m][3]=50;
    $fields[$m][4]=100;
     
      
    $m++;
    $fields[$m][0]="parent";
    $fields[$m][1]="Men&uuml;&uuml;s?";
    $fields[$m][2]="io"; 
    //$fields[$m][3]= $_GET["id"]; 
    
      
    $m++;
    $fields[$m][0]="kaal";
    $fields[$m][1]="J&auml;rjekorra nr";
    $fields[$m][2]="kaal";
    $fields[$m][3]=30;
    $fields[$m][4]=100;

      
    $m++;
    $fields[$m][0]="body";
    $fields[$m][1]="Sisu";
    $fields[$m][2]="textarea";
    $fields[$m][3]="30";
    $fields[$m][4]="100";   
    $fields[$m][5]=1;	
    
 
	
	return $fields;

}

//////////////////////////////////////////////////////////////////////////

  function select(){
    
     makeselect("id", "id", "asc",0,"title", "body","et");

  } // function select

//////////////////////////////////////////////////////////////////////////

  function db_add(){
  
//  $additional["main_col"][] = "time";
//  $additional["main_row"][] = "now()";
	addDB(mod_conf(),$additional);

  } // function db_add

//////////////////////////////////////////////////////////////////////////

  function db_change(){

  //$additional["dont"]="title";
   changeDB(mod_conf(),$additional);

  } // function db_rename

//////////////////////////////////////////////////////////////////////////

  function db_remove(){

     removeDB();

  } // function db_remove

//////////////////////////////////////////////////////////////////////////

  function forms(){
  
   makeForms(mod_conf(),1);

  } // function forms

//////////////////////////////////////////////////////////////////////////
