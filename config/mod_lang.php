<? 

function  mod_conf(){

	

    $fields[0][0]="def";
    $fields[0][1]="Definitsioon";
    $fields[0][2]="text";
    $fields[1][3]="60";
    $fields[1][4]="100";   
 
    $fields[1][0]="string";
    $fields[1][1]="V&auml;ljend";
    $fields[1][2]="text";
    $fields[1][3]="60";
    $fields[1][4]="500";   
    $fields[1][5]=1;	
    
    
	
	return $fields;

}

//////////////////////////////////////////////////////////////////////////

  function select(){
    
     makeselect("id", "id", "desc", FALSE ,"string", FALSE ,"et");

  } // function select

//////////////////////////////////////////////////////////////////////////

  function db_add(){
  
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
