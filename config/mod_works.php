<? 

function  mod_conf(){



	$m = 0;
    $fields[$m][0]="title";
    $fields[$m][1]="Nimi";
    $fields[$m][2]="text";
    $fields[$m][3]=30;
    $fields[$m][4]=100;
    $fields[$m][5]=1; //lang
     
  	$m++;
    $fields[$m][0]="file";
    $fields[$m][1]="Foto fail";
    $fields[$m][2]="photo";
    $fields[$m][3]=30;
    $fields[$m][4]=100;
    $fields[$m][5]=0; //lang
    
      $m++;
    $fields[$m][0]="kaal";
    $fields[$m][1]="Kaal (jrk)";
    $fields[$m][2]="kaal";
       
    
         
  	$m++;
    $fields[$m][0]="year";
    $fields[$m][1]="Aasta";
    $fields[$m][2]="text";
    $fields[$m][3]=30;
    $fields[$m][4]=100;
    $fields[$m][5]=0; //lang
    
    
    $m++;
    $fields[$m][0]="moodud";
    $fields[$m][1]="M&otilde;&otilde;dud";
    $fields[$m][2]="text";
    $fields[$m][3]=30;
    $fields[$m][4]=100;
    $fields[$m][5]=0; //lang
      
    $m++;
    $fields[$m][0]="price";
    $fields[$m][1]="Hind kodulehel EEK";
    $fields[$m][2]="text";
    $fields[$m][3]=30;
    $fields[$m][4]=100;
    $fields[$m][5]=0; //lang  
    
    $m++;
    $fields[$m][0]="privaprice";
    $fields[$m][1]="Privaatne hind";
    $fields[$m][2]="text";
    $fields[$m][3]=30;
    $fields[$m][4]=100;
    $fields[$m][5]=0; //lang      
    
    
    
      $m++;
     
    $fields[$m][0]="raam";
    $fields[$m][1]="Raam";
    $fields[$m][2]="site_titles";
    $fields[$m][3]="frames";
    $fields[$m][4]=100;
    $fields[$m][5]=0; //lang    
    
 
    $m++;
    $fields[$m][0]="method";
    $fields[$m][1]="Motiiv";
    $fields[$m][2]="site_titles";
    $fields[$m][3]="type";
    $fields[$m][4]=100;
    $fields[$m][5]=0; //lang
    
      $m++;
     
    $fields[$m][0]="liik";
    $fields[$m][1]="Tehnika";
    $fields[$m][2]="site_titles";
    $fields[$m][3]="tehnika";
    $fields[$m][4]=100;
    $fields[$m][5]=0; //lang    
    
    $m++;
    $fields[$m][0]="materjal";
    $fields[$m][1]="Materjal";
    $fields[$m][2]="site_titles";
    $fields[$m][3]="materjal";
    $fields[$m][4]=100;
    $fields[$m][5]=0; //lang
      	 
    $m++;
    $fields[$m][0]="exhibition";
    $fields[$m][1]="Osaleb n&auml;itusel";
    $fields[$m][2]="site_titles_multiple";
    $fields[$m][3]="exhibitions";
    $fields[$m][4]=100;
    $fields[$m][5]=0; //lang	 
             
                         
 	$m++;
    $fields[$m][0]="active";
    $fields[$m][1]="Aktiivne";
    $fields[$m][2]="io";
    $fields[$m][3]=30;
    $fields[$m][4]=100;   
    $fields[$m][5]=0;	  
        
 	$m++;
    $fields[$m][0]="front";
    $fields[$m][1]="Esilehel?";
    $fields[$m][2]="io";
    $fields[$m][3]=30;
    $fields[$m][4]=100;   
    $fields[$m][5]=0;	  
        $m++;
		
	return $fields;

}

//////////////////////////////////////////////////////////////////////////

  function select(){
    
     //makeselect("id", "id", "desc",0,"title", "id","et");
     make_work_select();

  } // function select

//////////////////////////////////////////////////////////////////////////

  function db_add(){
  	
  $ex = $_POST["exhibition"];
  
  for ($r=0;$r<count($ex);$r++){
  
  	$exi .= $ex[$r]."##";
  	
  }
  
  $_POST["exhibition"] = $exi;
  
  
	addDB(mod_conf(),$additional);

  } // function db_add

//////////////////////////////////////////////////////////////////////////

  function db_change(){
  	
  	
  $ex = $_POST["exhibition"];
  
  for ($r=0;$r<count($ex);$r++){
  
  	$exi .= $ex[$r]."##";
  	
  }
  
  $_POST["exhibition"] = $exi;
  
  

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
