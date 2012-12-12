<?php
function savePage($input){
$htmlname = "./writeable/" . date("His") . ".html";
$pdfname = "./writeable/" . date("His") . ".pdf";
$newHtmlFile = fopen($htmlname, 'w');
fwrite($newHtmlFile, $input);
fclose($newHtmlFile);
shell_exec('wkhtmltopdf-i386 --quiet ' . $htmlname . ' ' . $pdfname);
unlink($htmlname);
return $pdfname;
}


?>
