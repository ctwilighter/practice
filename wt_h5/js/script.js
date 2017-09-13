window.onload = function(){
	var music = document.getElementById("music_id");
	var body = document.getElementsByTagName("body")[0];
	var page2 = document.getElementById("page2");
	var page3 = document.getElementById("page3");
	var audio = document.getElementsByTagName("audio")[0];
	var title = document.getElementsByClassName("title");


	//点击图片控制音乐停止或继续
	/*music.onclick = function(){
		if (audio.paused) {
			audio.play();
			this.setAttribute("class","play");
			// this.style.animationPlayState = "running";
			// this.style.webkitAnimationPlayState = "running";
		} else {
			audio.pause();
			this.setAttribute("class","");
			// this.style.animationPlayState = "paused";
			// this.style.webkitAnimationPlayState = "paused";
		}
	}*/
	audio.play();
	music.addEventListener("touchstart",function(event){
		if (audio.paused) {
			audio.play();
			//this.setAttribute("class","play");
			this.style.animationPlayState = "running";
			this.style.webkitAnimationPlayState = "running";
		} else {
			audio.pause();
			//this.setAttribute("class","");
			this.style.animationPlayState = "paused";
			this.style.webkitAnimationPlayState = "paused";
		}
	},false);

	page2.addEventListener("touchmove",function(){
		page2.setAttribute("class","page fadeout");
		title.setAttribute("class","title fadeIn");
	},false);
};