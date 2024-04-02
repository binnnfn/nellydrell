<? 

function  mod_conf(){




    $m=0; 
    $fields[$m][0]="folder";
    $fields[$m][1]="Kataloog";
    $fields[$m][2]="text";
    $fields[$m][3]="30";
    $fields[$m][4]="100";   
    $fields[$m][5]=0;	
 
	
	return $fields;

}

//////////////////////////////////////////////////////////////////////////

  function select(){
    
     makeselect("id", "id", "desc",0,"folder", 0,0);

  } // function select

//////////////////////////////////////////////////////////////////////////

  function db_add(){

  	$conf["path"] = "/data03/virt18714/domeenid/www.session.ee/htdocs/gallery/";
  	
  	
	 $dir = $_POST["folder"];
	 
	 print $conf["path"]."original/".$dir;
	  
	 
	 if (file_exists($conf["path"]."original/".$dir)){
	 	
	 	if (file_exists($conf["path"]."web/".$dir)==FALSE){
	 		
	 			mkdir ($conf["path"]."web/".$dir, 0777);
	 			
	 			
	 	}


	 	if (file_exists($conf["path"]."thumb/".$dir)==FALSE){
	 		
	 			mkdir ($conf["path"]."thumb/".$dir, 0777);
	 			
	 	}
	 	
	 	
	 		 
	 	if ($handle = opendir($conf["path"]."original/".$dir)) {
		

  			 while (false !== ($file = readdir($handle))) {
   
      			 if (stristr($file, '.png') ||stristr($file, '.gif') || stristr($file, '.jpg') || stristr($file, '.jpeg')) {
       
       				$newfile = $conf["path"]."original/".$dir."/".$file;
       				
       				
					$imagemag = "convert ".$newfile."  -gravity center ".$conf["path"]."web/".$dir."/".$file;
					system($imagemag);
       				
		
					$imagemag = "convert ".$newfile."  -quality 60 -geometry 112x600 -gravity center ".$conf["path"]."thumb/".$dir."/".$file;
					system($imagemag);
					
       		       	
           
				} //if
        
 			  } // while
 			  
   
		closedir($handle);

		} //if

	
	 	
	 } // if file_exists
	 
	 
//	nostyles();
  	  
//  $additional["main_col"][] = "time";
//  $additional["main_row"][] = "now()";
  
	addDB(mod_conf(),$additional);

  } // function db_add

//////////////////////////////////////////////////////////////////////////

  function db_change(){
  	
  	$conf["path"] = "/data03/virt18714/domeenid/www.session.ee/htdocs/gallery/";
  	
	 $dir = $_POST["folder"];
	 
	 print $conf["path"]."original/".$dir;
	  
	 
	 if (file_exists($conf["path"]."original/".$dir)){
	 	
	 	if (file_exists($conf["path"]."web/".$dir)==FALSE){
	 		
	 			mkdir ($conf["path"]."web/".$dir, 0777);
	 			
	 			
	 	}


	 	if (file_exists($conf["path"]."thumb/".$dir)==FALSE){
	 		
	 			mkdir ($conf["path"]."thumb/".$dir, 0777);
	 			
	 	}
	 	
	 	
	 		 
	 	if ($handle = opendir($conf["path"]."original/".$dir)) {
		

  			 while (false !== ($file = readdir($handle))) {
   
      			 if (stristr($file, '.png') ||stristr($file, '.gif') || stristr($file, '.jpg') || stristr($file, '.jpeg')) {
       
       				$newfile = $conf["path"]."original/".$dir."/".$file;
       				
       				
					$imagemag = "convert ".$newfile."   -gravity center ".$conf["path"]."web/".$dir."/".$file;
					system($imagemag);
       				
		
					$imagemag = "convert ".$newfile."  -quality 60 -geometry 112x600 -gravity center ".$conf["path"]."thumb/".$dir."/".$file;
					system($imagemag);
					
       		       	
           
				} //if
        
 			  } // while
 			  
   
		closedir($handle);

		} //if

	
	 	
	 } // if file_exists


  //$additional["dont"]="title";
   changeDB(mod_conf(),$additional);

  } // function db_rename

//////////////////////////////////////////////////////////////////////////

  function db_remove(){

     removeDB();

  } // function db_remove

//////////////////////////////////////////////////////////////////////////

  function forms(){
  
   makeForms(mod_conf(),0);

  } // function forms

//////////////////////////////////////////////////////////////////////////
