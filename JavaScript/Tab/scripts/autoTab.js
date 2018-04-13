function changeTab() {
	var titles = document.getElementById('notice-tit').getElementsByTagName('li');
	var contents = document.getElementById('notice-con').getElementsByTagName('div');
	var index = 0;
	var timer = null;

	if (titles.length != contents.length) {
		return;
	}

	for (var i = 0; i < titles.length; i++) {
		titles[i].id = i;
		titles[i].onmouseover = function(){
			clearInterval(timer);
			changeOption(this.id);
		}

		titles[i].onmouseout = function(){
			timer = setInterval(autoPlay,2000);
		}
	}

	if (timer) {
		clearInterval(timer);
	}
	timer = setInterval(autoPlay,2000);

	function autoPlay(){
		index++;
		if (index >= titles.length) {
			index = 0;
		}
		changeOption(index);
	}

	function changeOption(curIndex){
		for (var j = 0; j < titles.length; j++) {
			titles[j].className = '';
			contents[j].style.display = 'none';
		}
		titles[curIndex].className = 'select';
		contents[curIndex].style.display = 'block';
		index = curIndex;
	}

}