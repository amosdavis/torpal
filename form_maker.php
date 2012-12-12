<html>
<head>
<script type="text/javascript" src="./view/jquery-1.4.2.js"></script>
<!--[if IE]><script type="text/javascript" src="./view/excanvas.js"></script><![endif]-->
<script type="text/javascript" src="./view/canvas_creator.js"></script>
<link rel="stylesheet" type="text/css" href="./view/form_maker_style.css"/>
<title>Form Maker</title>
</head>
<body>
<div id=dpi ><span id=letter>M</span></div>
<div id=page>
	<span id=generated_form></span>	<!--CHANGED FROM FORM TO SPAN -->
</div>
<div id=toolbar>
<form id=form>
<span class=input_types>
<span class=input type=1>	Single Line 	<span class=add type=1><img src="./images/add.png" alt="add"/>	</span>	</span><br/><br/>
<span class=input type=2>	Multi-Line 	<span class=add type=2><img src="./images/add.png" alt="add"/>	</span>	</span><br/><br/>
<span class=input type=3>	Table (Pass/Fail/NA/Etc.) 	<span class=add type=3><img src="./images/add.png" alt="add"/>	</span>	</span><br/><br/>
<span class=input type=4>	Text 		<span class=add type=4><img src="./images/add.png" alt="add"/></span>	</span><br/><br/>
<span class=input type=5>	Drawable Area 		<span class=add type=5><img src="./images/add.png" alt="add"/></span>	</span><br/><br/>
</span>
</form>
<form id=create_form>
<span id=form_name>Form Name:<input type=text name=form_name></input></span>
<button type=submit value=submit>Submit</button>
</form>

<div id=mousedata></div>
</div>

<script type="text/javascript">
var x=0;
var select = "";
var $x_coord = 0;
var $y_coord = 0;
var $cellcount=4;//starting cell count--need to make this on a per object basis
//********************************************************************
//Get DPI of Monitor for calculating distances
var $pixelFontWidth=$("#letter").width();
var $pixelFontHeight=$("#letter").height();
$("#dpi").css({"position":"absolute","width":"1in","height":"1in"});
var $dpi = $("#dpi").width();
//alert("Font width: " + $pixelFontWidth + " Font height: " + $pixelFontHeight + " DPI: " + $dpi);
$("#dpi").remove(); 
//********************************************************************
//controls adding of input types
$(".add").click(function(){
//alert("check");
var mouseState = 0; //mouseState determines if the mouse button is pressed or not and thus controls the drawing.
var type = $(this).attr("type");
select = "<select><option value='default'>Choose A Category</option><option value='info'>Information Only</option> <option value='name'>Row Name</option><option value='option'>Select Option</option></select>"
		switch (type){
			case "1":
			var html="<span class='draggable' name=" + type + "><input id=" + x + " class='textinput' type=text></input></span>";
			$("#generated_form").append(html);
			x++;
			break;

			case "2":
			var html="<span class='draggable' name=" + type + "><textarea class='textareainput' rows=5 cols=50 id=" + x + "></textarea></span>";
			$("#generated_form").append(html);
			x++;
			break;	

			case "3":
			var html="<span class='draggable' name=" + type + "><table id=ID_" + x + "><tr class=tablerow><td class=tablecell><form class=tableinput>" + select + "</form></td><td class=tablecell><form class=tableinput>" + select + "</form></td><td class=tablecell><form class=tableinput>" + select + "</form></td><td class=tablecell><form class=tableinput>" + select + "</form></td></tr><tr class=tablerow><td class=tablecell><span class=tableinput><input style='width:100%' type=text></input></span></td><td class=tablecell><span class=tableinput><input style='width:100%' type=text></input></span></td><td class=tablecell><span class=tableinput><input style='width:100%' type=text></input></span></td><td class=tablecell><span class=tableinput><input style='width:100%' type=text></input></span></td></tr></table></span>";
			$("#generated_form").append(html);
			x++;
			break;	

			case "4":
			var html="<span class='draggable' name=" + type + "><form class=textGetter><textarea id=" + x + " class='textonly'></textarea><button type=submit>Submit</button></form></span>";
			$("#generated_form").append(html);
			x++;
			break;

			case "5":
//need image variable // also I think I need a different id per canvas...
			var html="<span id=container class=draggable name=" + type + " style='border:1px solid black'><img id=van style='display:none;' src='./images/panel_van.png'/><canvas class=drawingBoard width=500 height=300></canvas></span>";
			$("#generated_form").append(html);
			loadCanvas();
			x++;
			break;
			
			default: alert("No Input Was Recognized.");
		}
});


//********************************************************************
//Controls moving of inputs in editing area
$("#move").live('mouseover',(function(){
	
$(this).mousedown(function(){
//alert('hello');
mouseState=1;
var $object=$(this).parent(".draggable");
var x=0;
var offset="";
var left="";
var top="";

	$("#page").mousemove(function(e){
		if(x==0){
		offset=$object.offset();
		left=e.pageX-offset.left
		top=e.pageY-offset.top;
		x++;
}
		if(mouseState==1){
		$x_coord=e.pageX-left;
		$y_coord=e.pageY-top;
		$("#mousedata").html($x_coord + " " + $y_coord);
    		$object.css( { "position":"absolute" ,"left":  $x_coord + "px", "top": $y_coord + "px", "color":"red" } );
		}
	});

//********************************************************************
	/*This mouseup handler could have been outside the context of the mousedown handler.  However, I could not figure out how to pass the object outside the scope of the mousedown handler*/
	$("#page").mouseup(function(e){
	$('#page').unbind('mousemove');
	$mouseState = 0;
	$object.css( { "color":"black" } );
	});
});
}));
//********************************************************************
/*Removes mousedown handler in the event of mouseout*/
$(".draggable").live('mouseleave',(function(){
$(this).css({"z-index":"0", "background":"white"});
$("#page").unbind('mousemove');
}));
//********************************************************************
/*Controls display of delete and resize icons
Example of how to string event handlers onto an object.*/
$(".draggable").live('mouseenter',(function(){
$draggable=$(this);
//global resize and delete handle
$draggable.append("<span id=delete>delete</span><span id=resize>resize</span><span id=move>move</span>");


/*/table cell specific resize and delete handle
.rowdelete and .rowadd specifically add rows or delete rows between the selected rows*/
if ($draggable.find("table").size()!=0){
$draggable.find("td:first-child").append("<span class=rowmod><img class=rowdelete src='./images/smalldelete.png'></img><img class=rowadd src='./images/smalladd.png'></img></span>");

$draggable.find("tr:first-child td").append("<span class=colmod></img><img class=coldelete src='./images/smalldelete.png'></img><img class=coladd src='./images/smalladd.png'></img></span>");
}
/*This adds an input area to each column/row.  If you are having problems with 2 input areas being added to a td then check the code below*/
//Changed $(this).find(".tableinput") to $(this).find("span") to prevent adding extra spans to td's
$draggable.find("td").each(function(){
if ($draggable.find("span").size()==0 && $draggable.find("select").size()==0 && $draggable.find(".rowname").size()==0 && $draggable.find(".tableinfo").size()==0){
$draggable.append("<span class=tableinput><input style='width:100%' type=text></input></span>")
}
});

	if ($(this).find("#captiongetter").size()==0 && $(this).find(".captiontext").size()==0 && $(this).attr("name")!="4"){
		$(this).append("<form id=captiongetter><input id=caption type=text></input><input name=top_or_left type=radio value=Top checked>Top</input><input name=top_or_left type=radio value=Left>Left</input></form>");
		$(this).find("#captiongetter").css({"top":"-" + $(this).find("#captiongetter").height() + "px"});
		}
	//else if ($(this).attr("name")=="4")
/*Manages the captions*/
$("#captiongetter").submit(function(){
$draggable.append("<span class=captiontext>" + $("#caption").val() + "</span>");
/*alert($("#captiongetter input[type='radio']:checked").val());*/
if ($("#captiongetter input[type='radio']:checked").val()=="Top"){
$draggable.find(".captiontext").css({"top":"-" + $draggable.find(".captiontext").height() + "px"});
}
else {
$draggable.find(".captiontext").css({"left":"-" + $draggable.find(".captiontext").width() + "px"});
}
//removes handles from .draggable
removeHandlers($(this));
return false;
});


/*Manages the columnname inputs*/
$(".columnname").live('submit',(function(){
//alert($(this).attr("class"));
$(this).replaceWith("<span class=text>" + $(this).find("input").val() + "</span>");

//removes handles from .draggable
removeHandlers($(this));
return false;
}));

/*Manages the rowname inputs*/
$(".rowname").live('submit',(function(){
//alert($(this).attr("class"));
$(this).replaceWith("<span class=text>" + $(this).find("input").val() + "</span>");

//removes handles from .draggable
removeHandlers($(this));
return false;
}));

/*Manages the columnname inputs*/
$(".tableinfo").live('submit',(function(){
//alert($(this).attr("class"));
$(this).replaceWith("<span class=text>" + $(this).find("input").val() + "</span>");

//removes handles from .draggable
removeHandlers($(this));
return false;
}));


/*Manages type 4 (textarea) inputs*/
$(".textGetter").live('submit',(function(){
$draggable.html("<span class=textGetter>" + $(this).find(".textonly").val().replace(/\n/gi,"<br/>") + "</span>"); 
$draggable.find(".text").css({"left":"-" + $draggable.find(".captiontext").width() + "px"});
//removes handles from .draggable
removeHandlers($(this));
return false;
}));

/*//Manages type 3 (table) column names inputs
$(".columnname").submit(function(){
$draggable.append("<span class=textGetter>" + $(this).find(".textonly").val().replace(/\n/gi,"<br/>") + "</span>"); 
$draggable.find(".text").css({"left":"-" + $draggable.find(".captiontext").width() + "px"});
//removes handles from .draggable
removeHandlers($(this));
return false;
});*/


/*Manages type 3 (table) column input type selection(e.g. Information Only, Row Name, or Select Option*/
$(".tableinput select").click(function(){
var $td=$(this).parents("td");
//I'm not sure why $td.index needs a +1 in order to get the index correct?
var $nthchild = "#" + $(this).parents("table").attr("id") + " td:nth-child(" + ($td.index()+1) + ")";
switch ($(this).val()){

case "default":
break;

case "info":
//$(this).replaceWith("hello");
$($nthchild).attr("name","info");
$($nthchild).html("<form class=tableinfo><input style='width:100%' type=text></input></form>");
$td.html("<form class=columnname><input style='width:100%' type=text></input></form>");

break;

case "name":
$($nthchild).attr("name","name");
$($nthchild).html("<form class=rowname><input style='width:100%' type=text></input></form>");
$td.html("<form class=columnname><input style='width:100%' type=text></input></form>");
break;

case "option":	
$($nthchild).attr("name","option");
var $nthchild = "#" + $(this).parents("table").attr("id") + " td:nth-child(" + ($td.index()+1) + ")";
$($nthchild).find(".tableinput").html("<input style='width:100%' type=radio></input>");
$td.html("<form class=columnname><input style='width:100%' type=text></input></form>");

break;

default: ;
	
}

//removes handles from .draggable
removeHandlers(0);
return false;
});


$(this).css({"z-index":"26", "background":"lightgrey"});
})).live('mouseleave',(function(){
removeHandlers(0);
	}));

$(".captiontext").live('click',(function(){
$(this).append("<form id=captiongetter><input id=caption type=text></input></form>");
$(this).remove
}));

//************************************************************
$("#delete").live('click', (function(){
var $parent=$(this).parent("span");/*This catches the parent span and assigns it to $parent before it is removed by the above mouseleave handler.  If this variable is taken out, the delete button will not work in IE.*/
 var $check = confirm("Are you sure you want to delete this element?");
if ($check==true){
$parent.remove();
}
}));

//********************************************************************
//This resizes the item selected
//switch statement handles resizing specific types of input
$("#resize").live('mousedown', (function(){
var $type = $(this).parent("span").attr("name");
mouseState=1;
var resizer=0;
var $startingSize;
switch($type){

case "1"://Text Input
	$(this).parent("span").css({"background":"white"});
	var $object = $(this).parent("span")
		$("#page").mousemove(function(e){
			if(resizer==0){
			$x_coord = e.pageX;
			$y_coord = e.pageY;
			$startingSize = $object.width();
			$textBoxStartingSize = $object.find("input").attr("size");
			resizer++;
			}
$("#mousedata").html(e.pageX-$x_coord);
			$object.css({"width":$startingSize + e.pageX-$x_coord});
			$object.find(".textinput").css({"width":"100%"});
	});


	mouseState=0;
	break;
	
case "2"://Textarea
	$(this).parent("span").css({"background":"white"});
	var $object = $(this).parent("span")
		$("#page").mousemove(function(e){
			if(resizer==0){
			$x_coord = e.pageX;
			$y_coord = e.pageY;
			$startingWidth = $object.width();
			$startingHeight = $object.height();
			resizer++;
			}
$("#mousedata").html(e.pageX-$x_coord);
			$object.css({"width":$startingWidth + e.pageX-$x_coord, "height":$startingHeight + e.pageY-$y_coord});
			$object.find("textarea").css({"width":$startingWidth + e.pageX-$x_coord, "height":$startingHeight + e.pageY-$y_coord});
	});


	mouseState=0;
	break;
	
case "3"://Table
	$(this).parent("span").css({"background":"white"});
	var $object = $(this).parent("span");
		$("#page").mousemove(function(e){
			if(resizer==0){
			$x_coord = e.pageX;
			$y_coord = e.pageY;
			$startingWidth = $object.find("td").width();
			$startingHeight = $object.find("tr").height();
			resizer++;
			}
$("#mousedata").html(e.pageX-$x_coord);
			$object.find("td").css({"width":$startingWidth + (e.pageX-$x_coord)/$object.find("tr:first").find("td").size(), "height":$startingHeight + ((e.pageY-$y_coord)/$object.find("table:first").find("tr").size())});
	});


	mouseState=0;
	break;

case "4"://Text 
	$(this).parent("span").css({"background":"white"});
	var $object = $(this).parent("span")
		$("#page").mousemove(function(e){
			if(resizer==0){
			$x_coord = e.pageX;
			$y_coord = e.pageY;
			$startingSize = $object.width();
			$textBoxStartingSize = $object.find("input").attr("size");
			resizer++;
			}
$("#mousedata").html(e.pageX-$x_coord);
			$object.css({"width":$startingSize + e.pageX-$x_coord});
			$object.find(".textonly").css({"width":"100%"});
	});


	mouseState=0;
	break;


case "5"://Text Input
	$(this).parent("span").css({"background":"white"});
	var $object = $(this).parent("span")
		$("#page").mousemove(function(e){
			if(resizer==0){
			$x_coord = e.pageX;
			$y_coord = e.pageY;
			$startingWidth = $object.width();
			$startingHeight = $object.height();
			resizer++;
			}
$("#mousedata").html(e.pageX-$x_coord);
			$object.css({"width":$startingWidth + e.pageX-$x_coord, "height":$startingHeight + e.pageY-$y_coord});
			/*$object.find(".drawingBoard").css({"width":$startingWidth + e.pageX-$x_coord, "height":$startingHeight + e.pageY-$y_coord});*/
			$object.find(".drawingBoard").attr("width", $startingWidth + e.pageX-$x_coord);
			$object.find(".drawingBoard").attr("height", $startingHeight + e.pageY-$y_coord);
		});

	mouseState=0;
	break;

	default: alert('no item is selected');
}


//*********************************************************

})).live('mouseup', (function(){
$("#page").unbind('mousemove');
}));


$("#mousedata").click(function(){
alert($("#page").html());
});

//Adds Cols
$(".coladd").live('click', (function(){
//$tdname=$(this).parents("td").attr("name");
$td=$(this).parents("td");
$tr=$(this).parent("tr");
//alert($td.index());
$nthchild = "#" + $(this).parents("table").attr("id") + " td:nth-child(" + ($td.index()+1) + ")";
			$($nthchild).after("<td class=tablecell><span class=tableinput><input style='width:100%' type=text></input></span></td>");
$td.next().html("<form class=tableinput>" + select + "</form>");
}));

$(".coldelete").live('click', (function(){
$td=$(this).parents("td");
$nthchild = "#" + $(this).parents("table").attr("id") + " td:nth-child(" + ($td.index()+1) + ")";
			$($nthchild).remove();
}));
//Adds Rows
$(".rowadd").live('click',(function(){
$table=$(this).parents("table");
var $html="";
var $name = new Array()
//Gets names of column to assign to new td
	$table.find("tr:first").find("td").each(function(i){
	$name[i] = $(this).attr("name");
//alert($(this).attr("name") + " " + $(this).attr("type"));
	});
//This section assigns the correct name to the table cell
for(var $x=0;$x<$table.find("tr:first").find("td").size();$x++){
var $attrtype="";
var $nthchild = "#" + $(this).parents("table").attr("id") + " td:nth-child(" + ($x+1) + ")";
if ($($nthchild).attr("name")=="option"){
$attrtype="<input style='width:100%' type=radio></input>";
$html+="<td class=tablecell name=" + $name[$x] + "><span class=tableinput>"+ $attrtype +"</span></td>";
}
else if ($($nthchild).attr("name")=="info"){
$attrtype="<input style='width:100%' type=text></input>";
$html+="<td class=tablecell name=" + $name[$x] + "><form class=tableinfo>"+ $attrtype +"</form></td>";
}
else if ($($nthchild).attr("name")=="name"){
$attrtype="<input style='width:100%' type=text></input>";
$html+="<td class=tablecell name=" + $name[$x] + "><form class=rowname>"+ $attrtype +"</form></td>";
}
else {
$attrtype="<input style='width:100%' type=text></input>";
$html+="<td class=tablecell name=" + $name[$x] + "><span class=tableinput>"+ $attrtype +"</span></td>";
}

}

$(this).closest("tr").after("<tr class=tablerow>" + $html + "</tr>");
}));

$(".rowdelete").live('click',(function(){

$(this).parents("tr").remove();
}));

//handles resizing of specific table cells
	
$("td").live('mousedown',(function(){
//alert('hello');
mouseState=1;
var resizer = 0;
var $object=$(this);
var $index=$(this).index();
var $currentTableId = $(this).parents("table").attr("id");
var $currentTable = $(this).parents("table");
var x=0;
var offset="";
var left="";
var top="";
var $tableWidth=0;

	$("#page").mousemove(function(e){
		if(resizer==0){
	//alert('hello');
			$x_coord = e.pageX;
			$y_coord = e.pageY;
			$startingWidth = $object.width();
			$startingHeight = $object.height();
			//$tableStartingWidth = $currentTable.width();
			//$tableStartingHeight = $currentTable.height();
			resizer=1;
			}
	$nthchild = "#" + $currentTableId + " td:nth-child(" + ($index+1) + ")";
	$currentrow = $object.closest("tr").find("td");
	
	$($nthchild).css({"width": $startingWidth + e.pageX-$x_coord});
	$($currentrow).css({"height":$startingHeight + e.pageY-$y_coord});
	//$currentTable.css({"width": $tableStartingWidth + e.pageX-$x_coord, "height":$tableStartingHeight + e.pageY-$y_coord});
	});

//*********
	/*This mouseup handler could have been outside the context of the mousedown handler.  However, I could not figure out how to pass the object outside the scope of the mousedown handler*/
	$("#page").mouseup(function(e){
	$('#page').unbind('mousemove');
	$mouseState = 0;
	$object.css( { "color":"black" } );
	});
}));

function removeHandlers(reference_to_This){
	//alert("mouse left");
	$("#resize").remove();
	$("#delete").remove();
	$("#move").remove();
	$(".rowmod").remove();
	$(".colmod").remove();
	if (reference_to_This!=0){
	reference_to_This.remove();}
	//$(".tableinput").remove();
	//$(".resize").remove();
	if($("#captiongetter").size()!=0){$("#captiongetter").remove();}
	//$("#promptcontainer").remove();
	$(this).css({"z-index":"0", "background":"none"});
}
/*//Test td element's name and class attributes by clicking
$("td").live('click',(function(){
if (typeof $(this).find("form").attr("class")=="undefined"){
var $attr=$(this).find("span").attr("class");
}
else{var $attr=$(this).find("form").attr("class");}
//alert($(this).parents("tr").find("td[name=name] .text").html());
alert("Name: " + $(this).attr("name") + " Class: " + $attr );
}));*/

//This will be the final submit button for the form
$("#create_form").submit(function(){

var $x=0
var $dataString="";
var $radioName="";
var $questionIndex=0;
var $answerIndex=0;
var $answerIndexCounter=0;//This is used to loop over all of the  td names inside the .each statement
var $answerIndexArray=Array();//This is used to loop over all of the  td names inside the .each statement
var $valuesArray=Array();



//Checks for uncompleted forms & .draggables without captions
if ($("#page form").size()!=0){
$("#page form").css({"border":"2px solid red"});

$("#page form").each(function(){
$(this).find("input").attr("value",$(this).attr("class"));
});

alert("Please complete the form design by filling in the highlighted form elements!\nYou may replace the text in the highlighted areas with the appropriate names.")
return false;
}
else {
//assign names to all radio buttons in the table[s] and gets name/value pairs
//name=questionindex and the value=column
$trSize=$("#page tr").size();

$("#page tr").each(function(){
$tr=$(this);
$trInputs=$tr.find("input[type=radio]");
if($trInputs.size()==0){$trSize-=1}
else if($trInputs.size()!=0){
$trInputs.each(function(){
	$td=$(this).parents("td");
	$tdi=$(this).parents("td").index();
	var $name = $(this).parents("tr").find("td[name=name] .text").html();
	var $radioButtonCount=$(this).parents("tr").find("input[type=radio]").size();
	var $nthchild = "#" + $(this).parents("table").attr("id") + " td:nth-child(" + ($td.index()+1) + ")";

	$(this).attr("name",$name);
	$(this).attr("questionindex","Q"+$questionIndex);
	$(this).attr("answerindex","A"+$answerIndex);
	$(this).attr("value",$($nthchild).first().find(".text").html());
	if($radioName!=$name){
		$radioName=$name;
		for (x=0; x<$radioButtonCount;x++){
		$answerIndexArray.push($answerIndexCounter);
		$answerIndexCounter++;
		
		var $rowValues = "#" + $(this).parents("table").attr("id") + " td:nth-child(" + ($tdi+=1) + ")";
		$valuesArray.push($($rowValues).first().find(".text").html());
		}
		//alert( $answerIndexArray.join(+ "&" + $questionIndex + "[][]=") +"&");
		$dataString += $questionIndex + "[name]=" + $name + "&" + $questionIndex + "[values][]=" + $valuesArray.join("&" + $questionIndex + "[values][]=") + "&" + $questionIndex + "[questionindex]=" + "Q" + $questionIndex + "&" + $questionIndex + "[answers][]=A" + $answerIndexArray.join("&" + $questionIndex + "[answers][]=A") +"&";
		
		$answerIndexArray=Array();

	};	//This gives every input a unique value. Useful primarily for transferrring answers back to a physical location on the page
	//alert($(this).attr("name"));
	$answerIndex++;
			});
		}
		$questionIndex++; //This indexes every question.  Each question has it's own questionIndex
});

//assign names to all text inputs and gets name/value pairs
$("#page input[type=text]").each(function(){
//alert("text input");
var $name = $(this).parents(".draggable").find(".captiontext").html()
	$(this).attr("name",$name);
	$(this).attr("questionindex","Q"+$questionIndex);
	$(this).attr("answerindex","A"+$answerIndex);
	$dataString += $questionIndex + "[name]=" + $name + "&" +$questionIndex + "[values][]=" + $(this).attr("value") + "&" + $questionIndex + "[questionindex]=" + "Q" + $questionIndex + "&" +$questionIndex + "[answers][]=" + $answerIndex +"&";
	$questionIndex++; //This indexes every question.  Each question has it's own questionIndex
	$answerIndex++;	//This gives every input a unique value. Useful primarily for transferrring answers back to a physical location on the page	
	});

//assign names to all textareas and gets name/value pairs
$("#page textarea").each(function(){
//alert("textarea");
var $name = $(this).parents(".draggable").find(".captiontext").html()
	$(this).attr("name",$name);
	$(this).attr("questionindex","Q"+$questionIndex);
	$(this).attr("answerindex","A"+$answerIndex);	
	$dataString += $questionIndex + "[name]=" + $name + "&" +$questionIndex + "[values][]=" + $(this).attr("value") + "&" + $questionIndex + "[questionindex]=" + "Q" + $questionIndex + "&" + $questionIndex + "[answers][]=" + $answerIndex +"&";
	$questionIndex++; //This indexes every question.  Each question has it's own questionIndex
	$answerIndex++;	//This gives every input a unique value. Useful primarily for transferrring answers back to a physical location on the page
});
	
//Creates a form template with named questionindexs
/*$("#page input[type=radio]").each(function(){
$td=$(this).parents("td");
var $name = $(this).parents("tr").find("td[name=name] .text").html();
var $nthchild = "#" + $(this).parents("table").attr("id") + " td:nth-child(" + ($td.index()+1) + ")";

	//$(this).attr("name",$name);
	//var $questionIndexAttr=$(this).attr("questionindex");
	//$(this).attr("value",$($nthchild).first().find(".text").html());
	if($questionIndexAttr!=$questionIndexAttr){
	//alert($name)
	$radioName=$name;
	$dataString += $questionIndex + "='" + $name + "'&";
	$questionIndex++;//need this in or out of if?  Need to consolidate same-row radio buttons to one questionindex 
	}

	//alert($(this).attr("name"));

});*/

var $template_html=$("#page").html();
$("#generated_form").replaceWith('<form id=generated_form>' + $("#generated_form").html() + '</form>');//replaces the generated form span with an actual form element.  This is necessary to allow the user to submit the generated form without a lot of javascript handling.
var $htmlform=$("#page").html();

$dataString+="html=" + $htmlform + "&";

$("[answerindex]").each(function(){
//alert($(this).attr("answerindex"));
$(this).replaceWith("place_holder_" + $(this).attr("answerindex"));

});

$dataString+="template_html=" + $template_html+"&";
		
$dataString+="form_name=" + $(this).find("[name=form_name]").val();


//alert($template_html);

//alert($dataString);
//This regular expression check for a "," at the end of the string and removes it.
//alert($dataString.replace(/,$/gi,""));


//$("#final_form").append($html);
//$("#final_form").append("<button type=submit>submit</button>");
//$("#page").html($html);
//alert($html);

//Post completed form data to the server.  This includes the actual html form, and the names/values for every final form element
$.ajax({
  type: 'POST',
  url: "form_saver.php",
  async: false,
  data: $dataString,
  dataType: "html",
  contentType: "application/x-www-form-urlencoded",
  
  success: function(data){alert("Posting data succeeded!: " + data)
  }});
}
return false;
});

</script>
</body>
</html>
