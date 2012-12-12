var $holder = new Array();

function loadCanvas(){
//alert(G_vmlCanvasManager);
if (typeof G_vmlCanvasManager != "undefined") { // ie IE
var canvas = document.createElement('canvas');
var container = document.getElementById("container");
canvas.setAttribute("class", "drawingBoard");
canvas.setAttribute("width","500");
canvas.setAttribute("height","300");
G_vmlCanvasManager.initElement(canvas);
var $context = canvas.getContext('2d');
container.appendChild(canvas);
}
else {var $context = $('.drawingBoard').get(0).getContext("2d");}
//*******************************************


var $mouseState = 0; //mouseState determines if the mouse button is pressed or not and thus controls the drawing.
var $vanImage = new Image();
//*************
//var $holder = new Array();
var coordinates = "-draw \"path 'M ";//this is the start of the imagemagick command
var lineCounter = 0;
var imageCommandCheck = 0; //checks if the appropriate imagemagick command has been entered
//*************
$vanImage.src = "./images/panel_van.png";
   $context.fillStyle = "rgb(0,0,0)";
  // $context.fillRect (10, 10, 55, 50);
   //$context.drawImage($vanImage, 0, 0, 500, 300)
 $context.drawImage($vanImage, 0, 0, 500, 300)
   $('#container').mousedown(function(e){
	//alert("hello");
   $mouseState = 1;
   $context.beginPath();
  	var $x_coord = e.pageX-$(this).offset().left;
  	var $y_coord = e.pageY-$(this).offset().top;
    $context.moveTo($x_coord, $y_coord);
   
   
  	 		$('#container').bind('mousemove', (function(e){
				
  	 		if ($mouseState==1){
  	 		  var $x_coord = e.pageX-$(this).offset().left;
  				var $y_coord =  e.pageY-$(this).offset().top;
  					if (imageCommandCheck==0){
  						coordinates = coordinates + $x_coord + "," + $y_coord;
  						imageCommandCheck=1;
  					}
  					else{
  						//coordinates = coordinates + " L " + $x_coord + "," + $y_coord;
  					}

  		    /*alert ($x_coord + " " + $y_coord);*/
  		    $context.lineTo($x_coord, $y_coord);
  		    $context.strokeStyle="red";
  		    $context.stroke();
  		    $('#mouseData').html(e.pageX + " " + e.pageY);
  		    }
  		 })); 
   });
   
    $('#container').mouseup(function(e){
    //$('#jqueryContent').val("");
    coordinates = coordinates + "'\""; // This statement puts the closing quotation marks on the end of the imagemagick command string
    $holder[lineCounter] = coordinates;
    lineCounter++;//increments the number to the next array slot
    coordinates = "-draw \"path 'M "; // resets coordinates to start a new imagemagick command
    imageCommandCheck=0;//decrements the imagemagick command check so that a new line can be started
   	$mouseState = 0;
   	$x_coord=0;
   	$y_coord=0;
   	$context.closePath();
   	//$canvas.toDataURL();
   	//alert($('.drawingBoard').children("div").html());
    });        
}
/*
    $('#submit').live('click', (function(){
		var drawString = "";
   	for (var x in $holder){
   	drawString = drawString + $holder[x] + " ";
	
   	}

		$.ajax({
            type: "POST",
            url: "convert_image.php",
	    data: {"drawCoordinates": drawString},
            async: true, // This is not an AJAX request if it is set to false
            cache: false,
            timeout:30000, // Timeout after 30 seconds
            success: function(data){ 
		$("#container").replaceWith("<img src="+data+"></img>");
		$('#mouseData').append(data);
		}
	    
        });
return false;
}));*/
