<html>
<head>
<style type="text/css">
head body{padding:0;margin:0;width:100%;height:100%;}
#container{position:absolute;left:10px;top:0px;width:100%;}
table{
display:table; 
border-collapse:collapse;
}
.row{
width:600px;
border:1px solid black;
}

span{
display:table-row;
}

.title, .grouptitle {width:300px;}
.title, .grouptitle, .pass, .fail, .na, .other{
display:table-cell;
}

.grouptitle{
font-weight:bold;
}

input{margin-left:20px;}
</style>
</head>
<body>
<div id=container>
<form method="post" action="safety_observation.php">
Employee's Name: <input type="text" name="techname" />
<table id="table">
<span class=row><span class=grouptitle>Vehicle</span><span class=other>Pass--Fail--N/A</span></span><br/>
<span class=row><span class=title>Seat Belt Used: </span><span class=pass><input type="radio" label="Pass" checked="" name="seatbeltused" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="seatbeltused" value="fail" /></span><span class=na><input type="radio" label="N/A" name="seatbeltused" value="na" /></span></span> <br/>
<span class=row><span class=title>Cab Neat: </span><span class=pass><input type="radio" label="Pass" checked="" name="cabneat" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="cabneat" value="fail" /></span><span class=na><input type="radio" label="N/A" name="cabneat" value="na" /></span></span> <br/>
<span class=row><span class=title>Dash Clear/Nothing Hanging from Mirror :</span><span class=pass><input type="radio" label="Pass" checked="" name="dashclear" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="dashclear" value="fail" /></span><span class=na><input type="radio" label="N/A" name="dashclear" value="na" /></span></span> <br/>
<span class=row><span class=title>Cargo Area Secured :</span><span class=pass><input type="radio" label="Pass" checked="" name="cargoareasecured" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="cargoareasecured" value="fail" /></span><span class=na><input type="radio" label="N/A" name="cargoareasecured" value="na" /></span></span> <br/>
<span class=row><span class=title>Fire Extinguisher :</span><span class=pass><input type="radio" label="Pass" checked="" name="fireextinguisher" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="fireextinguisher" value="fail" /></span><span class=na><input type="radio" label="N/A" name="fireextinguisher" value="na" /></span></span> <br/>
<span class=row><span class=title>First Aid Kit :</span><span class=pass><input type="radio" label="Pass" checked="" name="firstaidkit" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="firstaidkit" value="fail" /></span><span class=na><input type="radio" label="N/A" name="firstaidkit" value="na" /></span></span> <br/>
<span class=row><span class=title>Ladder Secured: </span><span class=pass><input type="radio" label="Pass" checked="" name="laddersecured" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="laddersecured" value="fail" /></span><span class=na><input type="radio" label="N/A" name="laddersecured" value="na" /></span></span><br/> 
<span class=row><span class=title>Backed In When Parked :</span><span class=pass><input type="radio" label="Pass" checked="" name="backedinwhenparked" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="backedinwhenparked" value="fail" /></span><span class=na><input type="radio" label="N/A" name="backedinwhenparked" value="na" /></span></span> <br/>
<span class=row> <span class=title>Registration & Insurance Card :</span><span class=pass><input type="radio" label="Pass" checked="" name="registration" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="registration" value="fail" /></span><span class=na><input type="radio" label="N/A" name="registration" value="na" /></span></span><br/> 
<span class=row><span class=title>Laptop Closed When Traveling :</span><span class=pass><input type="radio" label="Pass" checked="" name="laptopclosedwhentraveling" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="laptopclosedwhentraveling" value="fail" /></span><span class=na><input type="radio" label="N/A" name="laptopclosedwhentraveling" value="na" /></span></span> <br/>
<span class=row><span class=title>Safety Manual and Pocket Guide :</span><span class=pass><input type="radio" label="Pass" checked="" name="safetymanualandpocketguide" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="safetymanualandpocketguide" value="fail" /></span><span class=na><input type="radio" label="N/A" name="safetymanualandpocketguide" value="na" /></span></span><br/> 
<span class=row><span class=title>Driving Behavior/Safe Speed :</span><span class=pass><input type="radio" label="Pass" checked="" name="drivingbehavior" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="drivingbehavior" value="fail" /></span><span class=na><input type="radio" label="N/A" name="drivingbehavior" value="na" /></span></span> <br/>


<span class=row><span class=grouptitle>Work Area</span></span><br/>
<span class=row><span class=title>Properly Parked:</span><span class=pass><input type="radio" label="Pass" checked="" name="properlyparked" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="properlyparked" value="fail" /></span><span class=na><input type="radio" label="N/A" name="properlyparked" value="na" /></span></span> <br/>
<span class=row><span class=title>Safety Vest Worn:</span><span class=pass><input type="radio" label="Pass" checked="" name="safetyvestworn" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="safetyvestworn" value="fail" /></span><span class=na><input type="radio" label="N/A" name="safetyvestworn" value="na" /></span></span><br/> 
<span class=row><span class=title>Proper Cone Placement:</span><span class=pass><input type="radio" label="Pass" checked="" name="properconeplacement" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="properconeplacement" value="fail" /></span><span class=na><input type="radio" label="N/A" name="properconeplacement" value="na" /></span></span> <br/>
<span class=row><span class=title>Secured Work Zone Sign:</span><span class=pass><input type="radio" label="Pass" checked="" name="workzonesign" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="workzonesign" value="fail" /></span><span class=na><input type="radio" label="N/A" name="workzonesign" value="na" /></span></span> <br/>
<span class=row><span class=title>Flashers/Beacons:</span><span class=pass><input type="radio" label="Pass" checked="" name="flashers" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="flashers" value="fail" /></span><span class=na><input type="radio" label="N/A" name="flashers" value="na" /></span></span> <br/>
<span class=row><span class=title>Vehicle Secured When Unattended:</span><span class=pass><input type="radio" label="Pass" checked="" name="vehiclesecuredwhenunattended" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="vehiclesecuredwhenunattended" value="fail" /></span><span class=na><input type="radio" label="N/A" name="vehiclesecuredwhenunattended" value="na" /></span></span> <br/>
<span class=row><span class=title>Wheels Chocked(bucket):</span><span class=pass><input type="radio" label="Pass" checked="" name="wheelschocked" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="wheelschocked" value="fail" /></span><span class=na><input type="radio" label="N/A" name="wheelschocked" value="na" /></span></span> <br/>


<span class=row><span class=grouptitle>Ladder/Pole Climbing</span></span><br/>
<span class=row><span class=title>Ladder Carry:</span><span class=pass><input type="radio" label="Pass" checked="" name="laddercarry" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="laddercarry" value="fail" /></span><span class=na><input type="radio" label="N/A" name="laddercarry" value="na" /></span></span> <br/>
<span class=row><span class=title>Plans the Route:</span><span class=pass><input type="radio" label="Pass" checked="" name="planstheroute" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="planstheroute" value="fail" /></span><span class=na><input type="radio" label="N/A" name="planstheroute" value="na" /></span></span> <br/>
<span class=row><span class=title>PPE Inspected:</span><span class=pass><input type="radio" label="Pass" checked="" name="ppeinspected" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="ppeinspected" value="fail" /></span><span class=na><input type="radio" label="N/A" name="ppeinspected" value="na" /></span></span> <br/>
<span class=row><span class=title>Ladder in Good Condition:</span><span class=pass><input type="radio" label="Pass" checked="" name="ladderingoodcondition" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="ladderingoodcondition" value="fail" /></span><span class=na><input type="radio" label="N/A" name="ladderingoodcondition" value="na" /></span></span> <br/>
<span class=row><span class=title>Ladder Setup(4 to 1):</span><span class=pass><input type="radio" label="Pass" checked="" name="laddersetup" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="laddersetup" value="fail" /></span><span class=na><input type="radio" label="N/A" name="laddersetup" value="na" /></span></span> <br/>
<span class=row><span class=title>Uses 3 Point Contact:</span><span class=pass><input type="radio" label="Pass" checked="" name="uses" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="uses" value="fail" /></span><span class=na><input type="radio" label="N/A" name="uses" value="na" /></span></span> <br/>
<span class=row><span class=title>Break-Away Hook Used:</span><span class=pass><input type="radio" label="Pass" checked="" name="breakawayhookused" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="breakawayhookused" value="fail" /></span><span class=na><input type="radio" label="N/A" name="breakawayhookused" value="na" /></span></span> <br/>
<span class=row><span class=title>Pole Inspected:</span><span class=pass><input type="radio" label="Pass" checked="" name="poleinspected" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="poleinspected" value="fail" /></span><span class=na><input type="radio" label="N/A" name="poleinspected" value="na" /></span></span> <br/>
<span class=row><span class=title>Gaff Condition:</span><span class=pass><input type="radio" label="Pass" checked="" name="gaffcondition" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="gaffcondition" value="fail" /></span><span class=na><input type="radio" label="N/A" name="gaffcondition" value="na" /></span></span> <br/>
<span class=row><span class=title>Strapped Off Properly:</span><span class=pass><input type="radio" label="Pass" checked="" name="strappedoffproperly" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="strappedoffproperly" value="fail" /></span><span class=na><input type="radio" label="N/A" name="strappedoffproperly" value="na" /></span></span> <br/>
<span class=row><span class=title>Uses Good Body Mechanics:</span><span class=pass><input type="radio" label="Pass" checked="" name="usesgoodbodymechanics" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="usesgoodbodymechanics" value="fail" /></span><span class=na><input type="radio" label="N/A" name="usesgoodbodymechanics" value="na" /></span></span> <br/>


<span class=row><span class=grouptitle>Tools/Equipment</span></span><br/>
<span class=row><span class=title>Safety Belt Used:</span><span class=pass><input type="radio" label="Pass" checked="" name="safetybeltused" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="safetybeltused" value="fail" /></span><span class=na><input type="radio" label="N/A" name="safetybeltused" value="na" /></span></span> <br/>
<span class=row><span class=title>Work Gloves Used:</span><span class=pass><input type="radio" label="Pass" checked="" name="workglovesused" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="workglovesused" value="fail" /></span><span class=na><input type="radio" label="N/A" name="workglovesused" value="na" /></span></span> <br/>
<span class=row><span class=title>Hard Hat Used:</span><span class=pass><input type="radio" label="Pass" checked="" name="hardhatused" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="hardhatused" value="fail" /></span><span class=na><input type="radio" label="N/A" name="hardhatused" value="na" /></span></span> <br/>
<span class=row><span class=title>Harness Used(buckets only):</span><span class=pass><input type="radio" label="Pass" checked="" name="harnessused" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="harnessused" value="fail" /></span><span class=na><input type="radio" label="N/A" name="harnessused" value="na" /></span></span> <br/>
<span class=row><span class=title>Voltage Detector Used:</span><span class=pass><input type="radio" label="Pass" checked="" name="voltagedetectorused" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="voltagedetectorused" value="fail" /></span><span class=na><input type="radio" label="N/A" name="voltagedetectorused" value="na" /></span></span> <br/>
<span class=row><span class=title>Proper Footwear:</span><span class=pass><input type="radio" label="Pass" checked="" name="properfootwear" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="properfootwear" value="fail" /></span><span class=na><input type="radio" label="N/A" name="properfootwear" value="na" /></span></span> <br/>
<span class=row><span class=title>Safety Glasses Used:</span><span class=pass><input type="radio" label="Pass" checked="" name="safetyglassesused" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="safetyglassesused" value="fail" /></span><span class=na><input type="radio" label="N/A" name="safetyglassesused" value="na" /></span></span> <br/>
<span class=row><span class=title>Tools in Safe Condition:</span><span class=pass><input type="radio" label="Pass" checked="" name="toolsinsafecondition" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="toolsinsafecondition" value="fail" /></span><span class=na><input type="radio" label="N/A" name="toolsinsafecondition" value="na" /></span></span> <br/>
<span class=row><span class=title>Proper Tool Usage:</span><span class=pass><input type="radio" label="Pass" checked="" name="propertoolusage" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="propertoolusage" value="fail" /></span><span class=na><input type="radio" label="N/A" name="propertoolusage" value="na" /></span></span> <br/>
<span class=row><span class=title>Proper PPE Usage:</span><span class=pass><input type="radio" label="Pass" checked="" name="properppeused" value="pass" /> </span><span class=fail><input type="radio" label="Fail" name="properppeused" value="fail" /></span><span class=na><input type="radio" label="N/A" name="properppeused" value="na" /></span></span> <br/>


<span class=row><span class=title>Were applicable safety and work rules followed?<br/><textarea name="rulesfollowed" rows="5" cols="100"></textarea></span></span><br/>

<span class=row><span class=title>Overall, was this task performed safely?<br/><textarea name="taskperformed" rows="5" cols="100"></textarea></span></span><br/>

<span class=row><span class=title>List any improvements that can be made to make this task safer.<br/><textarea name="tasksafer" rows="5" cols="100"></textarea></span></span><br/>

<span class=row><span class=title>The Employee Was:</span></span><br/>

<span class=row><span class=title>Commended<input type="radio" name="employeewas" value="commended" /></span></span><br/>
<span class=row><span class=title>Reinstructed<input type="radio" name="employeewas" value="reinstructed" /></span></span><br/>
<span class=row><span class=title>Coached/Encouraged<input type="radio" name="employeewas" value="coached" /></span></span><br/>
Electronic Signature: <input type="text" name="name" />
<button type=submit>Submit</button>

</tr>
</table>
</form>
</div>

</body>

</html>
