<?php
try{
$DB = new PDO('mysql:host=localhost;dbname=form_creator', '/**ENTER USERNAME*/', '/**ENTER SUPERSECRETPASSWORD*/') or die("The connection was unsuccessfull");
}
catch (Exception $e){
echo "Connection Failed:  The error message is -->". $e->getMessage();
}
?>
