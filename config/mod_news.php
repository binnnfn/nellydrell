<? 

function  mod_conf(){

    $m = 0;
    $fields[$m][0]="title";
    $fields[$m][1]="Pealkiri";
    $fields[$m][2]="text";
    $fields[$m][3]=30;
    $fields[$m][4]=100;
    $fields[$m][5]=1; //lang


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
    
     makeselect("id", "id", "desc","title","title", "body","et");

  } // function select

//////////////////////////////////////////////////////////////////////////

  function db_add(){
 	  
  $additional["main_col"][] = "time";
  $additional["main_row"][] = "now()";
  
	addDB(mod_conf(),$additional);

  } // function db_add

//////////////////////////////////////////////////////////////////////////

  function db_change(){
  	
  //$additional["dont"]="title";
   changeDB(mod_conf(),$additional);

  } // function db_rename

//////////////////////////////////////////////////////////////////////////

  function db_remove(){

     removeDB(1); // lang = 1 / nolang = 0

  } // function db_remove

//////////////////////////////////////////////////////////////////////////

  function forms(){
  
   makeForms(mod_conf(),1);

  } // function forms

//////////////////////////////////////////////////////////////////////////
