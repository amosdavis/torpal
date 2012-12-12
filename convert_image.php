<?php
date_default_timezone_set('America/Chicago');
$date = date("His");
$image = dirname(__FILE__)."/writeable/" . $date;
/*echo '<br/>convert ' . dirname(__FILE__) . '/images/panel_van.png -size 500x300 -fill none -stroke red ' . $_POST["drawCoordinates"] . " " . $image . ".png<br/>";*/
shell_exec('convert ' . dirname(__FILE__) . '"/images/panel_van.png" -size 500x300 -fill none -stroke red ' . $_POST["drawCoordinates"] . " " . $image . ".png");
echo "./writeable/". $date . ".png";

?>
