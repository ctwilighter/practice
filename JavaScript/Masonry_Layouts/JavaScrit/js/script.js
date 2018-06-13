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