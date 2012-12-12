<?php

include "private/db_connect.php";

$form_name=$_POST["form_name"];
	try {
	$stmt1 = $DB->prepare("select form_html from forms where form_name=?");
			//
			$stmt1->execute(array($form_name));	

 	 while ($row=$stmt1->fetch()) {//print_r($row);
 	 echo htmlspecialchars_decode($row["form_html"]);
  		 foreach($row as $form_html){
  		 //print_r($form_html);
  	//echo htmlspecialchars_decode($form_html);
  		 }
  		}

	   }
	   
	catch(PDOException $e)  {
		echo $e->getMessage();
		}

  
 
  			  
?>
