/*
¦¦¯¯¯¦ ¦¦¯¯¦ ¯¯¦¯¯ ¯¦¯ ¦¦¯¯¯¦ ¦¦_-¦¦ ¦¦¯¯¯¦ 
¦¦--¦¦ ¦¦__¦ -¦¦-- ¦¦- ¦¦--¦¦ ¦¦¦¦¦¦ -¯¯¯__ 
¦¦___¦ ¦¦--- -¦¦-- _¦_ ¦¦___¦ ¦¦--¯¦ ¦¦___¦ 
*/

var hexagon_radius = 30;
var hexagons_speed = 0.05;
var hexagon_offset = {
	x: 32,
	y: 48
};

/*
¦¦¯¯¦ ¦¦¯¯¯¦ ¦¦¯¯_ ¦¦¯¯¯ 
¦¦--- ¦¦--¦¦ ¦¦-¦¦ ¦¦¯¯¯ 
¦¦__¦ ¦¦___¦ ¦¦__¯ ¦¦___ 
*/

var canvas, ctx;

var hexagons = [];

var s3p3 = Math.sqrt(3);

function init() {
	
	canvas = document.getElementById('c');
	canvas.width = 128;
	canvas.height = 128;
	canvas.style.width = canvas.width + 'px';
	canvas.style.height = canvas.height + 'px';
	ctx = canvas.getContext('2d');
	
	addHexagon(
		hexagon_offset.x,
		hexagon_offset.y,
		{
			l: 5,
			p: 0.5,
			speed: hexagons_speed
		}
	);
	
	addHexagon(
		hexagon_offset.x,
		hexagon_offset.y + hexagon_radius * s3p3,
		{
			l: 3,
			p: 0.5,
			speed: hexagons_speed
		}
	);
	
	addHexagon(
		hexagon_offset.x + hexagon_radius * 1.5,
		hexagon_offset.y + hexagon_radius * s3p3 / 2,
		{
			l: 1,
			p: 0.5,
			speed: hexagons_speed
		}
	);
	
	ctx.fillStyle = 'rgba(0, 0, 0, 1)';
	ctx.fillRect(0, 0, canvas.width, canvas.height);
	
	loop();
	
} 

function loop() {
	requestAnimFrame(loop);
	
	ctx.globalCompositeOperation = "source-over";
	
	ctx.fillStyle = 'rgba(0, 0, 0, 0.2)';
	ctx.shadowBlur = 0;
	ctx.fillRect(0, 0, canvas.width, canvas.height);
	
	ctx.globalCompositeOperation = "lighter";
	
	ctx.shadowColor = 'red';
	ctx.shadowBlur = 10;
	ctx.strokeStyle = 'red';
	
	for(var i=0;i<hexagons.length;i++) {
		
		ctx.beginPath();
		
		drawHexagonPath(i);
		
		ctx.stroke();
		
	}
	
}

function addHexagon(x, y, opts) {
	var l = Math.floor(Math.random() * 6),
		p = Math.random();
	
	if(!opts) opts = {};
	
	hexagons.push({
		sl: opts.l || opts.l === 0 ? opts.l : l,
		p: opts.p || opts.p === 0 ? opts.p : p,
		x: x,
		y: y,
		speed: opts.speed || opts.speed === 0 ? opts.speed : ( Math.random() * hexagon_max_absolute_speed * 2 - hexagon_max_absolute_speed )
	});
}

function drawHexagonPath(hex_index) {
	
	var hex = hexagons[hex_index];
	
	
	
	ctx.moveTo(
		hex.x + Math.cos( Math.PI / 3 * hex.sl ) * hexagon_radius + Math.cos( Math.PI / 3 * (hex.sl + 2) ) * hexagon_radius * hex.p,
		hex.y + Math.sin( Math.PI / 3 * hex.sl ) * hexagon_radius +  Math.sin( Math.PI / 3 * (hex.sl + 2) ) * hexagon_radius * hex.p
	);
	
	//ctx.moveTo(hex.x, hex.y);
	
	ctx.lineTo(
		hex.x + Math.cos( Math.PI / 3 * ( hex.sl + 1 ) ) * hexagon_radius,
		hex.y + Math.sin( Math.PI / 3 * ( hex.sl + 1 ) ) * hexagon_radius
	);
	
	ctx.lineTo(
		hex.x + Math.cos( Math.PI / 3 * ( hex.sl + 2 ) ) * hexagon_radius,
		hex.y + Math.sin( Math.PI / 3 * ( hex.sl + 2 ) ) * hexagon_radius
	);
	
	ctx.lineTo(
		hex.x + Math.cos( Math.PI / 3 * ( hex.sl + 3 ) ) * hexagon_radius,
		hex.y + Math.sin( Math.PI / 3 * ( hex.sl + 3 ) ) * hexagon_radius
	);
	
	ctx.lineTo(
		hex.x + Math.cos( Math.PI / 3 * ( hex.sl + 3 ) ) * hexagon_radius + Math.cos( Math.PI / 3 * (hex.sl + 5) ) * hexagon_radius * hex.p,
		hex.y + Math.sin( Math.PI / 3 * ( hex.sl + 3 ) ) * hexagon_radius + Math.sin( Math.PI / 3 * (hex.sl + 5) ) * hexagon_radius * hex.p
	);
	
	hex.p += hex.speed;
	if(hex.p > 1 || hex.p < 0) {
		hex.p = hex.speed < 0 ? 1 : 0;
		hex.sl += hex.speed < 0 ? -1 : 1;
		hex.sl = hex.sl % 6;
		hex.sl = hex.sl < 0 ? 4 - hex.sl : hex.sl;
	}
	
	hexagons[hex_index] = hex;
	
}

window.onload = function() {
	init();
};

window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();
