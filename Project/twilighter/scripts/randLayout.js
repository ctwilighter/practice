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
window.onload = function () {
	function bbc() {
		function taa() {
		randLayout();
	}
	taa();
	}
	bbc();
}