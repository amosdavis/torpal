<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
require ("./private/pdf_converter.php");
$fm = formGetter;
$empWas = empWas;
$vgen = variableGen;
$date = date;
function formGetter($post_data){

  switch ($post_data){
  case "pass": 
      $stuff='<td name=pass class="nondesc">X</td><td name=fail class="nondesc"></td><td name=na class="nondesc"></td>';
      return $stuff;
  case "fail": 
      $stuff='<td name=pass class="nondesc"></td><td name=fail class="nondesc">X</td><td name=na class="nondesc"></td>';
      return $stuff;
  case "na": 
      $stuff='<td name=pass class="nondesc"></td><td name=fail class="nondesc"></td><td name=na class="nondesc">X</td>';
      return $stuff;
  default:
      $stuff='<td name=pass class="nondesc"></td><td name=fail class="nondesc"></td><td name=na class="nondesc"></td>';
      return $stuff;
	}
}

function empWas($post_data){
switch($post_data){
  case "commended": 
      $stuff='Commended';
      return $stuff;
  case "reinstructed": 
      $stuff='Reinstructed';
      return $stuff;
  case "coached" :
      $stuff='Coached/Encouraged';
      return $stuff;
  default:
  		return "";
	}
}

function variableGen($post_data){
print $post_data;
}

$generatedPage=<<<STRING
<html>

<head>

<style type="text/css">
head body{padding:0;margin:0;}
#*{font-size:12pt;}

table{border-collapse:collapse; width:4.2in;margin:0.2in;font-size:9pt; float:left;}


table, td, th{border:2px solid black;}

#textarea{
border:2px solid black;height:1in;margin:1% 0% 1% 5%;width:90%;font-size:10pt; padding:2px;
}

.nondesc{width:'0.5in';text-align:center;font-weight:bold; }

[name=fail]{color:red;}

</style>

</head>

<body>
<div id=container style="position:absolute;width:9.5in;height:13.5;border:10px solid blue''">
<h1 style="text-align:center;">Safety Observation Checklist</h1>

<div style="text-align:center; background:black;color:white;font-size:large;font-weight:bold;">Time Warner Cable</div>

<br/>

<div style="font-size:large;font-weight:bold;float:left;">Employee Name: {$_POST['techname']}</div>

<div style="font-size:large;font-weight:bold;float:right;margin-right:4in;">Date: {$date("m/d/Y")}</div>

<br/><br/>

<hr/>
<div style="width:100%;">
<table>

<tr>

<td name=description_of_task id=1 style="font-size:large;font-weight:bold;">Vehicle</td>


<td class="nondesc">Pass</td>

<td class="nondesc">Fail</td>

<td class="nondesc">N/A</td>

</tr>

<tr>
<td name=description_of_task style="">Seat Belt Used</td>

{$fm($_POST['seatbeltused'])}
</tr>

<tr>

<td name=description_of_task style="">Cab Neat</td>

{$fm($_POST['cabneat'])}

</tr>

<tr>

<td name=description_of_task style="">Dash Clear/Nothing Hanging from Mirror</td>

{$fm($_POST['dashclear'])}
</tr>

<tr>

<td name=description_of_task style="">Cargo Area Secured</td>

{$fm($_POST['cargoareasecured'])}

</tr>

<tr>

<td name=description_of_task style="">Fire Extinguisher</td>

{$fm($_POST['fireextinguisher'])}

</tr>

<tr>

<td name=description_of_task style="">First Aid Kit</td>

{$fm($_POST['firstaidkit'])}
</tr>

<tr>

<tr>

<td name=description_of_task style="">Ladder Secured</td>

{$fm($_POST['laddersecured'])}
</tr>


<td name=description_of_task style="">Backed In When Parked</td>

{$fm($_POST['backedinwhenparked'])}
</tr>

<tr>

<td name=description_of_task style="">Registration & Insurance Card</td>

{$fm($_POST['registration'])}
</tr>

<tr>

<td name=description_of_task style="">Laptop Closed When Traveling</td>

{$fm($_POST['laptopclosedwhentraveling'])}
</tr>

<tr>

<td name=description_of_task style="">Safety Manual and Pocket Guide</td>

{$fm($_POST['safetymanualandpocketguide'])}
</tr>

<tr>

<td name=description_of_task style="">Driving Behavior/Safe Speed</td>

{$fm($_POST['drivingbehavior'])}
</tr>

</table>

<!--*****************************************************************************-->
<table>

<tr>

<td name=description_of_task id=2 style="font-size:large;font-weight:bold;">Work Area</td>

<td class="nondesc">Pass</td>

<td class="nondesc">Fail</td>

<td class="nondesc">N/A</td>

</tr>

<tr>

<td name=description_of_task style="">Properly Parked</td>

{$fm($_POST['properlyparked'])}
</tr>

<tr>

<td name=description_of_task style="">Safety Vest Worn</td>

{$fm($_POST['safetyvestworn'])}
</tr>

<tr>

<td name=description_of_task style="">Proper Cone Placement</td>

{$fm($_POST['properconeplacement'])}
</tr>

<tr>

<td name=description_of_task style="">Work Zone Sign</td>

{$fm($_POST['workzonesign'])}
</tr>

<tr>

<td name=description_of_task style="">Flashers/Beacons</td>

{$fm($_POST['flashers'])}
</tr>

<tr>

<td name=description_of_task style="">Vehicle Secured When Unattended</td>

{$fm($_POST['vehiclesecuredwhenunattended'])}
</tr>

<tr>

<td name=description_of_task style="">Wheels Chocked(bucket)</td>

{$fm($_POST[wheelschocked])}
</tr>

<tr>

<td name=description_of_task style="">&nbsp;</td>
<td name=pass class="nondesc"></td><td name=fail class="nondesc"></td><td name=na class="nondesc"></td>

</tr>

<tr>

<td name=description_of_task style="">&nbsp;</td>
<td name=pass class="nondesc"></td><td name=fail class="nondesc"></td><td name=na class="nondesc"></td>
</tr>

<tr>

<td name=description_of_task style="">&nbsp;</td>
<td name=pass class="nondesc"></td><td name=fail class="nondesc"></td><td name=na class="nondesc"></td>
</tr>

<tr>

<td name=description_of_task style="">&nbsp;</td>
<td name=pass class="nondesc"></td><td name=fail class="nondesc"></td><td name=na class="nondesc"></td>
</tr>

<tr>

<td name=description_of_task style="">&nbsp;</td>
<td name=pass class="nondesc"></td><td name=fail class="nondesc"></td><td name=na class="nondesc"></td>
</tr>

</table>

<!--*****************************************************************************-->
<table>

<tr>

<td name=description_of_task id=3 style="font-size:large;font-weight:bold;">Ladder/Pole Climbing</td>

<td class="nondesc">Pass</td>

<td class="nondesc">Fail</td>

<td class="nondesc">N/A</td>

</tr>

<tr>

<td name=description_of_task style="">Ladder Carry</td>

{$fm($_POST['laddercarry'])}
</tr>

<tr>

<td name=description_of_task style="">Plans the Route</td>

{$fm($_POST['planstheroute'])}
</tr>

<tr>

<td name=description_of_task style="">PPE Inspected</td>

{$fm($_POST['ppeinspected'])}
</tr>

<tr>

<td name=description_of_task style="">Ladder in Good Condition</td>

{$fm($_POST['ladderingoodcondition'])}
</tr>

<tr>

<td name=description_of_task style="">Ladder Setup(4 to 1)</td>

{$fm($_POST['laddersetup'])}
</tr>

<tr>

<td name=description_of_task style="">Uses 3 Point Contact</td>

{$fm($_POST['uses'])}
</tr>

<tr>

<td name=description_of_task style="">Break-Away Hook Used</td>

{$fm($_POST['breakawayhookused'])}
</tr>

<tr>

<td name=description_of_task style="">Pole Inspected</td>

{$fm($_POST['poleinspected'])}
</tr>

<tr>

<td name=description_of_task style="">Gaff Condition</td>

{$fm($_POST['gaffcondition'])}
</tr>

<tr>

<td name=description_of_task style="">Strapped Off Properly</td>

{$fm($_POST['strappedoffproperly'])}
</tr>

<tr>

<td name=description_of_task style="">Uses Good Body Mechanics</td>

{$fm($_POST['usesgoodbodymechanics'])}
</tr>
<tr>

<td name=description_of_task style="">&nbsp;</td>
<td name=pass class="nondesc"></td><td name=fail class="nondesc"></td><td name=na class="nondesc"></td>
</tr>

</table>

<!--*****************************************************************************-->
<table>

<tr>

<td name=description_of_task id=4 style="font-size:large;font-weight:bold;">Tools/Equipment</td>

<td class="nondesc">Pass</td>

<td class="nondesc">Fail</td>

<td class="nondesc">N/A</td>

</tr>

<tr>

<td name=description_of_task style="">Safety Belt Used</td>

{$fm($_POST['safetybeltused'])}
</tr>

<tr>

<td name=description_of_task style="">Work Gloves Used</td>

{$fm($_POST['workglovesused'])}
</tr>

<tr>

<td name=description_of_task style="">Hard Hat Used</td>

{$fm($_POST['hardhatused'])}
</tr>

<tr>

<td name=description_of_task style="">Harness Used(buckets only)</td>

{$fm($_POST['harnessused'])}
</tr>

<tr>

<td name=description_of_task style="">Voltage Detector Used</td>

{$fm($_POST[voltagedetectorused])}
</tr>

<tr>

<td name=description_of_task style="">Proper Footwear</td>

{$fm($_POST['properfootwear'])}
</tr>

<tr>

<td name=description_of_task style="">Safety Glasses Used</td>

{$fm($_POST['safetyglassesused'])}
</tr>

<tr>

<td name=description_of_task style="">Tools in Safe Condition</td>

{$fm($_POST['toolsinsafecondition'])}
</tr>

<tr>

<td name=description_of_task style="">Proper Tool Usage</td>

{$fm($_POST['propertoolusage'])}
</tr>

<tr>

<td name=description_of_task style="">Proper PPE Usage</td>

{$fm($_POST['properppeused'])}
</tr>

<tr>

<td name=description_of_task style="">&nbsp;</td>
<td name=pass class="nondesc"></td><td name=fail class="nondesc"></td><td name=na class="nondesc"></td>

</tr>
<tr>

<td name=description_of_task style="">&nbsp;</td>
<td name=pass class="nondesc"></td><td name=fail class="nondesc"></td><td name=na class="nondesc"></td>
</tr>

</table>
<!--*****************************************************************************-->
</div>
<div style="position:absolute;top:8.2in;width:100%;">
<div>Were applicable safety and work rules followed?</div>
<div id="textarea">{$_POST['rulesfollowed']}</div>

<div>Overall was this task performed safely?</div>
<div id="textarea">{$_POST['taskperformed']}</div>

<div>List any improvements that can be made to make this task safer.</div>
<div id="textarea">{$_POST['tasksafer']}</div>

The Employee Was:
{$empWas($_POST['employeewas'])}

<br/><br/>
<div style="float:left;">Observer's Signature:&nbsp;&nbsp;&nbsp;

<span style="text-decoration:underline;"><span style="font-size:10pt;color:gray;font-weight:bold">Electronically signed at {$date("H:i:sa m/d/Y")} by</span><span style="font-size:12pt;color:black;font-weight:bold"> {$_POST['name']} </span></span>
</div>


<br/><br/>
<div style="text-align:center; background:black;color:white;font-size:large;font-weight:bold;">Send completed forms to the division safety manager.</div>
</div>
</div>
</body>

 

</html>
STRING;
#echo $generatedPage;

// We'll be outputting a PDF
header('Content-type: application/pdf');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="downloaded.pdf"');

// The PDF source is in original.pdf
readfile(savePage($generatedPage));

#echo $generatedPage;



?>

