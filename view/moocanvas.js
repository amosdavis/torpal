//MooCanvas, My Object Oriented Canvas Element. Copyright (c) 2008 Olmo Maldonado, <http://ibolmo.com/>, MIT Style License.
/*
Script: Canvas.js
	Contains the Canvas class.

Dependencies:
	MooTools, <http://mootools.net/>
		Element, and its dependencies

Author:
	Olmo Maldonado, <http://ibolmo.com/>

Credits:
	Lightly based from Ralph Sommerer's work: <http://blogs.msdn.com/sompost/archive/2006/02/22/536967.aspx>
	Moderately based from excanvas: <http://excanvas.sourceforge.net/>
	Great thanks to Inviz, <http://inviz.ru/>, for his optimizing help.

License:
	MIT License, <http://en.wikipedia.org/wiki/MIT_License>
*/

/*
Class: Canvas
	Creates the element <canvas> and extends the element with getContext if not defined.

Syntax:
	>var myCanvas = new Canvas([el,][ props]);

Arguments:
	el    - (element, optional) An unextended canvas Element to extend if necessary.
	props - (object, optional) All the particular properties for an Element. 

Returns:
	(element) A new Canvas Element extended with getContext if necessary.

Example:
	[javascript]
		var cv = new Canvas();
		var ctx = cv.getContext('2d');
		$(document.body).adopt(cv);
	[/javascript]
*/

if (Browser.Engine.trident){
	document.createStyleSheet().cssText = 
		'canvas {text-align:left;display:inline-block;}' +
		'canvas div, canvas div * {position:absolute;overflow:hidden}' +
		'canvas div * {width:10px;height:10px;}' +
		'v\\:*, o\\:*{behavior:url(#default#VML)}';
}

Element.Constructors.canvas = function(props){
	return new Canvas(props);
};
	
// Todo, replace when functions can be inherited
$.Element = $.element;
$.element = function(el, nocash){
    if ((/^canvas$/i).test(el.tagName) && !el.getContext) {
    	var clone = new Canvas({ id: el.id, width: el.width, height: el.height });
    	if (el.parentNode) el.parentNode.replaceChild(clone, el);
    	el = clone;
    } else {
    	el = $.Element(el, nocash);
    }
    return el;
};

var Canvas = new Native({
    
    name: 'Canvas',

	initialize: function(){
		var params = Array.link(arguments, {properties: Object.type, element: Element.type });
		var props = $extend({width: 300, height: 150}, params.properties);
		var el = (params.element || $.Element(document.createElement('canvas'))).set(props);
		if (el.getContext) return el;
		el.attachEvent('onpropertychange', Canvas.changeproperty);
		el.attachEvent('onresize', Canvas.resize);
		el.getContext = function(){
			return this.context = this.context || new CanvasRenderingContext2D(el);
		};
		return el.setStyles({
			width: props.width,
			height: props.height
		});
	}

});

Canvas.changeproperty = function(e){
	var property = e.propertyName;
	if (property == 'width' || property == 'height'){
		e = e.srcElement;
		e.style[property] = e[property];
		e.getContext().clearRect();
	}
};

Canvas.resize = function(e){
	e = e.srcElement;
	var efC = e.firstChild;
	if (efC){
		efC.style.width = e.width;
		efC.style.height = e.height;
	}
};

/*
Private Class: CanvasRenderingContext2D
	Context2D class with all the Context methods specified by the WHATWG, <http://www.whatwg.org/specs/web-apps/current-work/#the-canvas>

Arguments:
	el - (element) An Element requesting the context2d.
*/
var CanvasRenderingContext2D = new Class({

	initialize: function(el){
		this.element = new Element('div').setStyles({
			width: el.clientWidth,
			height: el.clientHeight
		}).inject(el);

		this.m = [
			[1, 0, 0],
			[0, 1, 0],
			[0, 0, 1]
		];
		this.l = 0;
		this.rot = 0;
		this.state = [];
		this.path = [];

		// from excanvas, subpixel rendering.
		this.Z = 10;
		this.Z2 = this.Z / 2;
		this.miterLimit = this.Z * 1;
	},
    
	arcScaleX: 1,
	arcScaleY: 1,
	currentX: 0,
	currentY: 0,
	lineWidth: 1,
	strokeStyle: '#000',
	fillStyle: '#fff',
	globalAlpha: 1,
	globalCompositeOperation: 'source-over',
	lineCap: 'butt',
	lineJoin: 'miter',
	shadowBlur: 0,
	shadowColor: '#000',
	shadowOffsetX: 0,
	shadowOffsetY: 0,

	getCoords: function(x,y){
		var m = this.m, Z = this.Z, Z2 = this.Z2;
		return {
			x: Z * (x * m[0][0] + y * m[1][0] + m[2][0]) - Z2,
			y: Z * (x * m[0][1] + y * m[1][1] + m[2][1]) - Z2,
			toString: function(){ return this.x.round() + ',' + this.y.round() }
		};
	}

});

/*
Script: Image.js

Dependencies:
	Canvas.js

Author:
	Olmo Maldonado, <http://ibolmo.com/>

Credits:
	Lightly based from Ralph Sommerer's work: <http://blogs.msdn.com/sompost/archive/2006/02/22/536967.aspx>
	Moderately based from excanvas: <http://excanvas.sourceforge.net/>
	Great thanks to Inviz, <http://inviz.ru/>, for his optimizing help.

License:
	MIT License, <http://en.wikipedia.org/wiki/MIT_License>
*/

CanvasRenderingContext2D.implement({
	/*
	Property: drawImage
		This method is overloaded with three variants: drawImage(image, dx, dy),
		drawImage(image, dx, dy, dw, dh), and drawImage(image, sx, sy, sw, sh,
		dx, dy, dw, dh). (Actually it is overloaded with six; each of those three
		can take either an HTMLImageElement or an HTMLCanvasElement for the image
		argument.) If not specified, the dw and dh arguments default to the values
		of sw and sh, interpreted such that one CSS pixel in the image is treated
		as one unit in the canvas coordinate space. If the sx, sy, sw, and sh
		arguments are omitted, they default to 0, 0, the image's intrinsic width
		in image pixels, and the image's intrinsic height in image pixels,
		respectively.

		If the image is of the wrong type, the implementation must raise a
		TYPE_MISMATCH_ERR exception. If one of the sy, sw, sw, and sh arguments
		is outside the size of the image, or if one of the dw and dh arguments
		is negative, the implementation must raise an INDEX_SIZE_ERR  exception.

		The specified region of the image specified by the source rectangle
		(sx, sy, sw, sh) must be painted on the region of the canvas specified
		by the destination rectangle (dx, dy, dw, dh).

		Images are painted without affecting the current path, and are subject to
		transformations, shadow effects, global alpha, clipping paths, and global
		composition operators.
	*/
	drawImage: function (image){
		var args = arguments, length = args.length, off = (length == 9) ? 4 : 0;

		var irS = image.runtimeStyle, w0 = irS.width, h0 = irS.height;
		irS.width = 'auto';
		irS.height = 'auto';

		var w = image.width, h = image.height;
		irS.width = w0;
		irS.height = h0;

		var sx = 0, sy = 0, 
			sw = w, sh = h,
			dx = args[++off], dy = args[++off],
			dw = args[++off] || w, dh = args[++off] || h;

		if (length == 9){
			sx = args[1]; sy = args[2];
			sw = args[3]; sh = args[4];
		}

		var syh = sy / h, sxw = sx / w,
			m = this.m,
			Z = this.Z,
			d = $H(this.getCoords(dx, dy)).map(function(val){ return (val / Z).round(); });
		var props = (!m[0][1] && m[0][0] == 1) ?
			'top:' + d.y + ';left:' + d.x : [
			'filter:progid:DXImageTransform.Microsoft.Matrix(',
				'M11=', m[0][0], 'M12=', m[1][0],
				'M21=', m[0][1], 'M22=', m[1][1],
				'Dx=', d.x, 'Dy=', d.y, 
			')'
		].join(' ');
				
		this.element.insertAdjacentHTML('beforeEnd', [
			'<v:group style="', props, '" coordsize="', Z * 10, ',', Z * 10, '">',[
				'<v:image',
					'src=', image.src, 'style=width:' + Z * dw + ';height:' + Z * dh,
					'croptop=', syh,
					'cropright=', 1 - sxw - sw/w,
					'cropbottom=', 1 - syh - sh/h,
					'cropleft=', sxw,
				'/>'].join(' '),
			'</v:group>'
		].join(' '));
	},

	drawImageFromRect: Function.empty,

	/*
	Property: getImageData
		Method must return an ImageData object representing the underlying
		pixel data for the area of the canvas denoted by the rectangle which
		has one corner at the (sx, sy) coordinate, and that has width sw and
		height sh. Pixels outside the canvas must be returned as transparent
		black.
	*/
	getImageData: Function.empty,

	/*
	Property: putImageData
		Method must take the given ImageData structure, and draw it at the
		specified location dx,dy in the canvas coordinate space, mapping each
		pixel represented by the ImageData structure into one device pixel.
	*/
	putImageData: Function.empty

});