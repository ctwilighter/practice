

function clockImg(){
	var dom = document.getElementById('clock');
	var date = document.getElementById('date');
	var ctx = dom.getContext('2d');
	var width = ctx.canvas.width;
	var height = ctx.canvas.height;
	var r = width / 2;
	var rem = width / 200;

	function drawBackground(){
		ctx.save();
		ctx.translate(r,r);
		ctx.beginPath();
		ctx.lineWidth = 6*rem;
		ctx.arc(0,0,r-ctx.lineWidth/2,0,2*Math.PI,false);
		ctx.stroke();

		var hourNumber = [3,4,5,6,7,8,9,10,11,12,1,2];
		ctx.font = 18*rem+'px Arial';
		ctx.textAlign = 'center';
		ctx.textBaseline = 'middle';
		hourNumber.forEach(function(number,i){
			var rad = 2*Math.PI/12*i;
			var x = Math.cos(rad)*(r-30*rem);
			var y = Math.sin(rad)*(r-30*rem);
			ctx.fillText(number,x,y);
		});

		for (var i = 0; i < 60; i++) {
			var rad = 2*Math.PI/60*i;
			var x = Math.cos(rad)*(r-18*rem);
			var y = Math.sin(rad)*(r-18*rem);
			ctx.beginPath();
			if (i%5 === 0) {
				ctx.fillStyle = '#000';
				ctx.arc(x,y,2*rem,0,2*Math.PI,false);
			} else {
				ctx.fillStyle = '#ccc';
				ctx.arc(x,y,2*rem,0,2*Math.PI,false);
			}			
			ctx.fill();
		}
	}

	function drawHour(hour,minute) {
		ctx.save();
		var rad = 2*Math.PI/12*hour;
		var mrad = 2*Math.PI/12/60*minute;
		ctx.beginPath();
		ctx.rotate(rad+mrad);
		ctx.lineWidth = 6*rem;
		ctx.lineCap = 'round';
		ctx.moveTo(0,10*rem);
		ctx.lineTo(0,-r/2);
		ctx.stroke();
		ctx.restore();
	}

	function drawMinute(minute) {
		var rad = 2*Math.PI/60*minute;
		ctx.save();
		ctx.beginPath();
		ctx.rotate(rad);
		ctx.lineWidth = 3*rem;
		ctx.lineCap = 'round';
		ctx.moveTo(0,10*rem);
		ctx.lineTo(0,-r+30*rem);
		ctx.stroke();
		ctx.restore();
	}

	function drawSecond(second) {
		var rad = 2*Math.PI/60*second;
		ctx.save();
		ctx.beginPath();
		ctx.fillStyle = '#c14543';
		ctx.rotate(rad);		
		ctx.moveTo(-2*rem,20*rem);
		ctx.lineTo(2*rem,20*rem);
		ctx.lineTo(1*rem,-r+18*rem);
		ctx.lineTo(-1*rem,-r+18*rem);
		ctx.fill();
		ctx.restore();
	}

	function drawDot() {
		ctx.beginPath();
		ctx.fillStyle = '#fff';
		ctx.arc(0,0,3*rem,0,2*Math.PI,false);
		ctx.fill();
	}

	function draw() {
		ctx.clearRect(0,0,width,height);
		var now = new Date();
		var year = now.getFullYear();
		var month = now.getMonth()+1;
		var day = now.getDate();
		var hour = now.getHours();
		var minute = now.getMinutes();
		var second = now.getSeconds();
		drawBackground();
		drawHour(hour,minute);
		drawMinute(minute);
		drawSecond(second);
		drawDot();
		ctx.restore();
		date.innerHTML = year+'年'+month+'月'+day+'日';
	}
	draw();
	setInterval(draw,1000);
}

function carousel(){
	var banner=document.getElementById('banner');
	var list=document.getElementById('list');
	var buttons=document.getElementById('buttons').getElementsByTagName('span');
	var prev=document.getElementById('prev');
	var next=document.getElementById('next');
	var index = 1;
	var animated = false;
	var timer;
	
	function showButton(){
		for (var i = 0; i < buttons.length; i++) {
			if(buttons[i].className == 'on'){
				buttons[i].className = '';break;
			}
		}

		if(index < 1){
			index = 5;
		}
		if(index > 5){
			index = 1;
		}
		
		buttons[index-1].className = 'on';
	}

	function animate(offset){
		animated = true;						
		offset = offset*100;
		listLeft = list.style.left;
		listLeft = listLeft.toString();
		listLeft = parseInt(listLeft.replace('%',''));
		newLeft = listLeft+offset;

		//console.log(offset);
		//console.log(listLeft);
		//console.log(newLeft);
		//console.log(list.style.left);

		var time = 200;//位移总时间
		var interval = 10;//位移间隔时间
		var speed = offset/(time/interval);

		function go(){
			if ((speed < 0 && listLeft > newLeft) || (speed > 0 && listLeft < newLeft)) {
				listLeft = listLeft + speed;
				list.style.left = listLeft + '%';
				setTimeout(go,interval);
			}else{
				animated = false;
				list.style.left = newLeft+'%';
				if(newLeft > -100){
					list.style.left = -500+'%';
				}
				if(newLeft < -500){
					list.style.left = -100+'%';
				}
				
			}
		}
		go();
	}

	function play(){
		timer = setInterval(function(){
			next.onclick();
		},3000);
	}

	function stop(){
		clearInterval(timer);
	}

	prev.onclick=function(){
		index -= 1;
		if (animated == false) {
			animate(1);
		}
		showButton();
	}

	next.onclick=function(){
		index += 1;
		if (animated == false) {
			animate(-1);
		}
		showButton();
	}

	for (var i = 0; i < buttons.length; i++) {
		buttons[i].onclick = function(){
			if (this.className == 'on') {
				buttons[i].className = '';
			}
			var myIndex = parseInt(this.getAttribute('index'));
			var offset = -1*(myIndex - index);

			if (animated == false) {
				animate(offset);
			}
			index = myIndex;
			showButton();
		}
	}

	banner.onmouseover = stop;
	banner.onmouseout = play;
	play();
}

function response(){
	var navicon = document.getElementById('nav-icon');
	var navbar = document.getElementById('navbar');
	onoff = true;
	navicon.onclick = function(){
		if (onoff == true) {
			navbar.style.display = 'block';
			onoff = false;
		} else {
			navbar.style.display = 'none';
			onoff = true;
		}
	}
}

function searchRes(){
	var searchBox = document.getElementById('searchBox');
	var s = document.getElementById('s');
	var go = document.getElementById('go');
	flag = true;
	searchBox.onmouseover = function(){
		if (flag == true) {
			s.style.display = 'block';
			flag = false;
		}
	}
	searchBox.onmouseout = function(){
		if (flag == false) {
			s.style.display = 'none';
			flag = true;
		}
	}
}

function randLayout() {
	var demo = document.getElementById('demo-container').getElementsByTagName('li');
	var width = document.documentElement.clientwidth || document.documentElement.scrollWidth;
	for (var i = 0; i < demo.length; i++) {
		var number = Math.random()*90-45;
		demo[i].style.transform = 'rotate('+number+'deg)';
		demo[i].style.left = (width-50)/5*i+'px';
		demo[i].style.top = (number+45)*3+'px';
		demo[i].onmouseover = function(){
			this.style.transform = 'rotate(0deg) scale(1.20)';
		}
		demo[i].onmouseout = function(){
			this.style.transform = 'rotate('+(Math.random()*90-45)+'deg)';
		}
	}
}

function addLoadEvent(func){
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function(){
			oldonload();
			func();
		}
	}
}

function loadEvent() {
	response();
	searchRes();
	try{
		clockImg();
	}catch(err){}
	try{
		randLayout();
	}catch(err){}
	try{
		carousel();
	}catch(err){}
}

addLoadEvent(loadEvent);

