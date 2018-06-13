# JavaScript
本目录包括学习JavaScript的心得和小Demo

## Table of contents

- [BackToTop](#backtotop)
- [Carousel](#carousel)
- [Tab](#tab)
- [Masonry_Layouts](#masonry_layouts)

## BackToTop
返回顶部效果
> 主要代码如下

HTML部分
```html
<a href="Javascript:;" id="btn"></a>
```

CSS部分
```css
#btn{
	width: 40px;
	height: 40px;
	position: fixed;
	display: none;
	left: 50%;
	margin-left: 610px;
	bottom: 30px;
	background: url(../images/top_bg.png) no-repeat left top;
}

#btn:hover{
	background: url(../images/top_bg.png) no-repeat left -40px;
}
```

Javascript部分
```javascript
function backToTop() {
  var obtn = document.getElementById('btn');
  var clientHeight = document.documentElement.clientHeight || document.body.clientHeight;
  var timer = null;
  isTop = true;

  window.onscroll = function(){
    var osTop = document.documentElement.scrollTop || document.body.scrollTop;
    if (osTop >= clientHeight) {
      obtn.style.display = 'block';
    }else{
      obtn.style.display = 'none';
    }

    if (!isTop) {
      clearInterval(timer);
    }
    isTop = false;
  }

  obtn.onclick = function(){
    timer = setInterval(function(){
      var osTop = document.documentElement.scrollTop || document.body.scrollTop;
      var ispeed = Math.floor(-osTop/8);
      isTop = true;

      document.documentElement.scrollTop = document.body.scrollTop = osTop+ispeed;
      if (osTop == 0) {
        clearInterval(timer);
      }
    },30);	
  } 
}
```

## Carousel
轮播图效果
> 主要代码如下

HTML部分
```html
<div id="container">
	<div id="list" style="left: -600px;">
		<a href="http://www.baidu.com"><img src="images/5.jpg" alt="" /></a>
		<a href="http://www.baidu.com"><img src="images/1.jpg" alt="" /></a>
		<a href="http://www.baidu.com"><img src="images/2.jpg" alt="" /></a>
		<a href="http://www.baidu.com"><img src="images/3.jpg" alt="" /></a>
		<a href="http://www.baidu.com"><img src="images/4.jpg" alt="" /></a>
		<a href="http://www.baidu.com"><img src="images/5.jpg" alt="" /></a>
		<a href="http://www.baidu.com"><img src="images/1.jpg" alt="" /></a>
	</div>
	<div id="buttons">
		<span index="1" class="on"></span>
		<span index="2"></span>
		<span index="3"></span>
		<span index="4"></span>
		<span index="5"></span>
	</div>
	<a href="javascript:;" class="arrow" id="prev">&lt</a>
	<a href="javascript:;" class="arrow" id="next">&gt</a>
</div>
```
CSS部分
```css
*{
	margin: 0;
	padding: 0;
	text-decoration: none;
}

#container{
	width: 600px;
	height: 400px;
	border: 3px solid #333;
	overflow: hidden;
	position: relative;
	margin: 10px auto;
}

#list{
	width: 4200px;
	height: 400px;
	position: absolute;
	z-index: 1;
}

#list img{
	float: left;
}

#buttons{
	position: absolute;
	height: 10px;
	width: 100px;
	z-index: 2;
	bottom: 20px;
	left: 250px;
}

#buttons span{
	cursor: pointer;
	float: left;
	border: 1px solid #fff;
	width: 10px;
	height: 10px;
	border-radius: 50%;
	background-color: #333;
	margin-left: 5px;
}

#buttons .on{
	background-color: orangered;
}

.arrow{
	cursor: pointer;
	display: none;
	line-height: 39px;
	text-align: center;
	font-size: 36px;
	font-weight: bold;
	width: 40px;
	height: 40px;
	position: absolute;
	z-index: 2;
	top: 180px;
	background-color: rgba(0,0,0,.3);
	color: #fff;
}

.arrow:hover{
	background-color: rgba(0,0,0,.7);
}

#container:hover .arrow{
	display: block;
}

#prev{
	left: 20px;
}

#next{
	right: 20px;
}
```

Javascript部分
```javascript
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
```

## Tab
选项卡
>主要代码如下

HTML部分
```html
<div id="notice" class="notice">
  <div id="notice-tit" class="notice-tit">
    <ul>
      <li class="select"><a href="#">公告</a></li>
      <li><a href="#">规则</a></li>
      <li><a href="#">论坛</a></li>
      <li><a href="#">安全</a></li>
      <li><a href="#">公益</a></li>
    </ul>
  </div>
  <div id="notice-con" class="notice-con">
    <div class="mod" style="display: block;">
      <ul>
        <li><a href="#">张勇快乐的在玩足球</a></li>
        <li><a href="#">张勇快乐的在玩足球</a></li>
        <li><a href="#">张勇快乐的在玩足球</a></li>
        <li><a href="#">张勇快乐的在玩足球</a></li>
      </ul>
    </div>
    、、、部分省略
    <div class="mod">
      <ul>
        <li><a href="#">4张勇快乐的在玩足球</a></li>
        <li><a href="#">4张勇快乐的在玩足球</a></li>
        <li><a href="#">4张勇快乐的在玩足球</a></li>
        <li><a href="#">4张勇快乐的在玩足球</a></li>
      </ul>
    </div>
  </div>
</div>
```

CSS部分
```css
*{
	margin: 0;
	padding: 0;
	list-style: none;
	font-size: 12px;
}

.notice{
	width: 298px;
	height: 98px;
	margin: 10px auto;
	border: 1px solid #eee;
	overflow: hidden;
}

.notice-tit{
	position: relative;
	height: 27px;
	background: #f7f7f7;
}

.notice-tit ul{
	position: absolute;
	width: 301px;
	left: -1px;
}

.notice-tit li{
	float: left;
	width: 58px;
	height: 26px;
	line-height: 26px;
	text-align: center;
	overflow: hidden;
	background: #fff;
	padding: 0 1px;
	border-bottom: 1px solid #eee;
	background: #f7f7f7;
}

.notice-tit li.select{
	background: #fff;
	border-bottom-color: #fff;
	border-left: 1px solid #eee;
	border-right: 1px solid #eee;
	padding: 0;
	font-weight: bolder;
}

.notice li a:link,.notice li a:visited{
	text-decoration: none;
	color: #000;
}

.notice li a:hover{
	color: #f90;
}

.notice-con .mod{
	margin: 10px 10px 10px 19px;
	display: none;
}

.notice-con .mod ul li{
	float: left;
	width: 134px;
	height: 25px;
	overflow: hidden;
}
```

Javascript部分
> 手动切换
```javascript
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
```
> 自动切换
```javascript
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
```
## Masonry_Layouts
瀑布流布局
>主要代码如下
HTML部分
```html
<div id="main">
		<div class="box">
			<div class="pic">
				<img src="images/0.jpg">
			</div>
		</div>
		<div class="box">
			<div class="pic">
				<img src="images/1.jpg">
			</div>
		</div>
		<div class="box">
			<div class="pic">
				<img src="images/2.jpg">
			</div>
		</div>
		<div class="box">
			<div class="pic">
				<img src="images/3.jpg">
			</div>
		</div>
		<div class="box">
			<div class="pic">
				<img src="images/4.jpg">
			</div>
		</div>
	</div>
```
CSS部分
```css
*{
	margin: 0;
	padding: 0;
}

#main{
	position: relative;
}

.box{
	padding: 15px 0 0 15px;
	display: inline-block;
	float: left;
}

.pic{
	padding: 10px;
	border: 1px solid #ccc;
	border-radius: 5px;
	box-shadow: 0 0 5px #ccc;
}

.pic img{
	width: 165px;
	height: auto;
}
```
Javascript部分
```javascript
window.onload = function() {
	waterfall('main','box');
	var dataInt = {'data':[{'src':'0.jpg'},{'src':'1.jpg'},{'src':'2.jpg'},{'src':'3.jpg'},{'src':'4.jpg'}]};
	window.onscroll = function() {
		console.log(checkScrollSlide());
		if (checkScrollSlide()) {
			var oParent = document.getElementById('main');
			for(var i=0;i<dataInt.data.length;i++){
				var oBox = document.createElement('div');
				oBox.className = 'box';
				oParent.appendChild(oBox);
				var oPic = document.createElement('div');
				oPic.className = 'pic';
				oBox.appendChild(oPic);
				var oImg = document.createElement('img');
				oImg.src = 'images/'+dataInt.data[i].src;
				oPic.appendChild(oImg);
			}
			waterfall('main','box');
		}
	}
}

//对瀑布流图片布局
function waterfall(parent,box){
	//将main下的所有class为box的元素取出来
	var oParent = document.getElementById(parent);
	var oBoxs = getByClass(oParent,box);
	//console.log(oBoxs.length);
	var oBoxW = oBoxs[0].offsetWidth;
	var cols = Math.floor(document.documentElement.clientWidth/oBoxW);
	console.log(cols,oBoxW,cols*oBoxW);
	oParent.style.cssText = 'width:' + oBoxW*cols +'px; margin: 0 auto;';
	var hArr = [];
	for(var i=0; i<oBoxs.length; i++) {
		if (i<cols) {
			hArr.push(oBoxs[i].offsetHeight);
		} else {
			var minH = Math.min.apply(null,hArr);
			var index = getMinIndex(hArr,minH);
			oBoxs[i].style.position = 'absolute';
			oBoxs[i].style.top = minH + 'px';
			oBoxs[i].style.left = oBoxW*index + 'px';
			hArr[index] += oBoxs[i].offsetHeight;
		}
	}
}

//取得父元素下的class数组
function getByClass(parent,clsName){
	var boxArr = new Array(),
		oElements = parent.getElementsByTagName('*');
	for (var i = 0; i < oElements.length; i++) {
		if (oElements[i].className == clsName) {
			boxArr.push(oElements[i]);
		}
	}
	return boxArr;
}

//得到数组中数据所在的索引
function getMinIndex(arr,val) {
	for(var i in arr) {
		if (arr[i] == val) {
			return i;
		}
	}
}

//检测是否应该异步加载
function checkScrollSlide() {
	var oParent = document.getElementById('main');
	var oBoxs = getByClass(oParent,'box');
	var lastBoxH = oBoxs[oBoxs.length-1].offsetTop + Math.floor(oBoxs[oBoxs.length-1].offsetHeight/2);
	var scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
	var height = document.body.clientHeight || document.documentElement.clientHeight;
	//console.log('lastBoxH:'+lastBoxH+';scrollTop:'+scrollTop+';height:'+height);
	return (scrollTop+height > lastBoxH)?true:false;
}
```
jQuery写法
```javascript
$(window).on('load',function(){
	waterfall();
	var dataInt = {'data':[{'src':'0.jpg'},{'src':'1.jpg'},{'src':'2.jpg'},{'src':'3.jpg'},{'src':'4.jpg'}]};//模拟后台返回的json数据
	$(window).on('scroll',function() {
		console.log(checkScrollSlide());
		if (checkScrollSlide()) {
			$.each(dataInt.data,function(key,value){
				var oBox = $('<div>').addClass('box').appendTo($('#main'));
				var oPic = $('<div>').addClass('pic').appendTo(oBox);
				var oImg = $('<img>').attr('src','images/'+$(value).attr('src')).appendTo(oPic);

			})
			waterfall();
		}
	})
})

function waterfall() {
	var $boxs = $('#main>div');
	var w = $boxs.eq(0).outerWidth();
	var cols = Math.floor($(window).width()/w);
	var hArr = [];
	//console.log(cols);
	$('#main').width(cols*w).css('margin','0 auto');
	$boxs.each(function(index,value) {
		if (index<cols) {
			hArr[index] = $boxs.eq(index).outerHeight();
		} else {
			var minH = Math.min.apply(null,hArr);
			var minIndex = $.inArray(minH,hArr);

			$(value).css({
				'position': 'absolute',
				'top': minH+'px',
				'left': minIndex*w+'px'
			});
			hArr[minIndex] += $boxs.eq(index).outerHeight(); 
		}
	});
}

function checkScrollSlide() {
	var $lastBox = $('#main>div').last();
	var lastBoxDis = $lastBox.offset().top + Math.floor($lastBox.outerHeight()/2);
	var scrollTop = $(window).scrollTop();
	var documentH = $(window).height();
	console.log(lastBoxDis,scrollTop,documentH);
	return (lastBoxDis < scrollTop + documentH)?true:false;
}
```