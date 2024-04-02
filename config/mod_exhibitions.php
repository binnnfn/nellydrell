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
    $fields[$m][0]="place";
    $fields[$m][1]="Toimumise koht";
    $fields[$m][2]="text"; 
    $fields[$m][3]=50;
    $fields[$m][4]=100;
    $fields[$m][5]=1;	
    
        
    $m++;
    $fields[$m][0]="link";
    $fields[$m][1]="Lingi l&otilde;pp";
    $fields[$m][2]="text"; 
    $fields[$m][3]=50;
    $fields[$m][4]=100;
  
  
   
    $m++;    
    $fields[$m][0]="mainphoto";
    $fields[$m][1]="Pilt esilehel ja suurelt";
    $fields[$m][2]="site_titles";
    $fields[$m][3]="works";
    $fields[$m][4]="id";
    $fields[$m][5]=0; //lang    

  
    $m++;
    $fields[$m][0]="active";
    $fields[$m][1]="Aktiivne";
    $fields[$m][2]="io"; 
     
    $m++;
    $fields[$m][0]="online";
    $fields[$m][1]="Online n&auml;itus?";
    $fields[$m][2]="io"; 
       
    $m++;
    $fields[$m][0]="front";
    $fields[$m][1]="Esilehel";
    $fields[$m][2]="io"; 
     
     $m++;
    $fields[$m][0]="time";
    $fields[$m][1]="Aeg algus PP.KK.AAAA";
    $fields[$m][2]="time";
    $fields[$m][3]=30;
    $fields[$m][4]=100;

      $m++;
    $fields[$m][0]="time_end";
    $fields[$m][1]="Aeg l&otilde;pp PP.KK.AAAA";
    $fields[$m][2]="time";
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

if( (strlen($_POST["time_D"]))==1 ){ $_POST["time_D"] = "0".$_POST["time_D"]; }
if( (strlen($_POST["time_M"]))==1 ){ $_POST["time_M"] = "0".$_POST["time_M"]; }

 $_POST["time"] = $_POST["time_D"]."/".$_POST["time_M"]."/". $_POST["time_Y"];
 $_POST["time_end"] = $_POST["time_end_D"]."/".$_POST["time_end_M"]."/". $_POST["time_end_Y"];




	addDB(mod_conf(),$additional);

  } // function db_add

//////////////////////////////////////////////////////////////////////////

  function db_change(){
  	
  	
if( (strlen($_POST["time_D"]))==1 ){ $_POST["time_D"] = "0".$_POST["time_D"]; }
if( (strlen($_POST["time_M"]))==1 ){ $_POST["time_M"] = "0".$_POST["time_M"]; }
  	
 $_POST["time"] = $_POST["time_M"]."/".$_POST["time_D"]."/". $_POST["time_Y"];
 $_POST["time_end"] = $_POST["time_end_M"]."/".$_POST["time_end_D"]."/". $_POST["time_end_Y"];


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
