<?php include "./private/db_connect.php"; ?>
<html>
<head>
<title>Torpal -- The technician documentation portal</title>
<link rel="stylesheet" type="text/css" href="./view/style.css" /> 
<link rel="stylesheet" type="text/css" href="./view/form_maker_style.css"/>
<script type="text/javascript" src="./view/jquery-1.4.2.js"></script>

</head>
<div id=menu>
<div id=form_names>
<ul>
<?php
	try {
	$formList=$DB->query("select form_name from forms");
	foreach ($formList as $formName) {
        	print "<li class=form_name_list>" . $formName[0] . "</li>";
	   	 }
	   }
	catch(PDOException $e)  {
		echo $e->getMessage();
		}
?>
</ul>
</div>
</div>
<div id=page_content_holder>

