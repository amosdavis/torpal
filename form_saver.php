<?php
//$html=$_POST["html"]
include "./private/db_connect.php";
$valueArray=array();
$html="";
$template_html="";
$form_name="";
$eid="";

//print_r($_POST);
echo "\n";
$form_name=$_POST["form_name"];
$html= nl2br(htmlspecialchars($_POST["html"]));
$template_html= nl2br(htmlspecialchars($_POST["template_html"]));//addslashes()?

foreach( $_POST as $key => $value){
//echo "Name: $key, Value: $value \n";
	//foreach( $value as $i => $val){
//		print_r($i);

//var $name=$value["name"];
//var $questionindex=$value["questionindex"];
//var $answers=$value["answers"];
//var $values=$value["values"];

//print_r($val."\n");

$name=$value["name"];
$questionindex=$value["questionindex"];
$answers=$value["answers"];
$values=$value["values"];
		//echo "Name: $i, Value: $val \n";
		foreach( $answers as $it => $val1){
			//echo "subArray is Name: $it, Value: $val1 \n";
			//echo $questionindex;
			echo $html;
			try {
				$stmt2 = $DB->prepare("INSERT INTO questions (form_number,question_index,answer_index,default_value) VALUES (?,?,?,?)");
				 $lastId=$DB->LastInsertId();
				$stmt2->execute(array($lastId,$questionindex,$val1,$values[$it]));
 
 			   }
			catch(PDOException $e)
 			   {
 			   echo $e->getMessage();
  			  }
			
		//}	
			
	}
	}
	
			try {
				$stmt1 = $DB->prepare("INSERT INTO forms (form_name,form_html,template_html) VALUES (?,?,?)");
				$stmt1->execute(array($form_name,$html,$template_html));
 
 			   }
			catch(PDOException $e)
 			   {
 			   echo $e->getMessage();
  			  }
//echo "\n";


/*foreach( $_POST as $key => $value){
	//echo "Name: $key, Value: $value <br />";
	if($key!="html" && $key!="form_name" && $key!="eid" && $key!="template_html" ){
	array_push($valueArray,$value);
	}
	switch($key){
	case "html":
	$html=$key;
	break;	
	
	case "template_html":
	$template_html=$key;
	break;
	
	case "form_name":
	$form_name=$key;
	break;
	
	case "eid":
	$eid=$key;
	break;
	
	default:
	$html="none";
	$template_html="none";
	$form_name="none";
	$eid="none";
	break;
	
	}
}
$serialized_data=serialize($valueArray);
//echo $serialized_data;

try {
$stmt = $DB->prepare("INSERT INTO forms (form_name,questions,form_html,template_html,eid) VALUES (?,?,?,?,?)");
$stmt->execute(array($form_name,$serialized_data,$html,$template_html,$eid));
 
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }


*/

?>
