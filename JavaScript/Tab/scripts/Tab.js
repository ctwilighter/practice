function changeTab() {
	var titles = document.getElementById('notice-tit').getElementsByTagName('li');
	var contents = document.getElementById('notice-con').getElementsByTagName('div');

	if (titles.length != contents.length) {
		return;
	}

	for (var i = 0; i < titles.length; i++) {
		titles[i].id = i;

		titles[i].onmouseover = function(){
			for (var j = 0; j < titles.length; j++) {
				titles[j].className = '';
				contents[j].style.display = 'none';
			}
			this.className = 'select';
			contents[this.id].style.display = 'block';
		}
	}

}