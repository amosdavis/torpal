<?php
include "./private/db_connect.php";

	try {
	$formList=$DB->query("select form_name from forms");
	foreach ($formList as $formName) {
        	print "<li class=form_name_list>" . $formName . "</li>";
	   	 }
	   }
	catch(PDOException $e)  {
		echo $e->getMessage();
		}

?>
