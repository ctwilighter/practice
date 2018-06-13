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