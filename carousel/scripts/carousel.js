
//轮播图函数
function carousel(){
	var container = document.getElementById('container');
	var list = document.getElementById('list');
	var buttons = document.getElementById('buttons').getElementsByTagName('span');
	var prev = document.getElementById('prev');
	var next = document.getElementById('next');
	var index = 1;
	var animated = false;
	var timer;

	function showButton(){
		for (var i = 0; i < buttons.length; i++) {
			if (buttons[i].className == 'on') {
				buttons[i].className = '';
				break;
			}
		}
		buttons[index-1].className = 'on';
	}

	function animate(offset){
		animated = true;
		var newLeft = parseInt(list.style.left) + offset;
		var time = 300;
		var interval = 10;
		var speed = offset/(time/interval);

		function go(){
			if ((speed <0 && parseInt(list.style.left) > newLeft) || (speed >0 && parseInt(list.style.left) < newLeft)) {
				list.style.left = parseInt(list.style.left) + speed + 'px';
				setTimeout(go,interval);
			}
			else{
				animated = false;
				list.style.left = newLeft+'px';
				if (newLeft > -600) {
					list.style.left = -3000 + 'px';
				}
				if (newLeft < -3000) {
					list.style.left = -600 + 'px';
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

	next.onclick = function(){
		if (index == 5) {
			index=1;
		}else{
			index += 1;
		}
		showButton();
		if (!animated){
			animate(-600);
		}
	}
	prev.onclick = function(){
		if (index == 1) {
			index=5;
		}else{
			index -= 1;
		}
		showButton();
		if (!animated){
			animate(600);
		}
	}

	for (var i = 0; i < buttons.length; i++) {
		buttons[i].onclick = function(){
			if (this.className == 'on') {
				return;
			}
			var myIndex = parseInt(this.getAttribute('index'));
			var offset = -600 * (myIndex - index);
			index = myIndex;
			if (!animated){
				animate(offset);
			}
			showButton();
		}
	}

	container.onmouseover = stop;
	container.onmouseout = play;

	play();

}


