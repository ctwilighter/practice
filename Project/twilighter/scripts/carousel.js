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