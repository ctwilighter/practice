if (typeof $ != "undefined"){
;$(function(){


// nav
(function(){
	var $slideNav = $("#slideNav"),
		$currentNav = $slideNav.find(".current_nav"),
		slideNavPd = parseInt($slideNav.find("li").css("paddingLeft")),
		$slideNavLine = $("#slideNavLine"),
		$el, leftPos, newWidth;
		//console.log(slideNavPd);
	if($slideNavLine.length > 0){
		$slideNavLine.css({
			"width" : $currentNav.find(".dt").innerWidth(),
			"left" : $currentNav.position().left + slideNavPd
		}).data("origLeft", $slideNavLine.position().left).data("origWidth", $slideNavLine.width());
		$slideNav.find("li:not('.gt')").hover(function(){
			$el = $(this);
			$el.find(".tnav_sec").stop(true,true).slideDown();
			leftPos = $el.position().left + slideNavPd;
			newWidth = $el.find(".dt").innerWidth();
			$slideNavLine.stop().animate({
				left: leftPos,
				width: newWidth
			});
		},function(){
			$(this).find(".tnav_sec").slideUp();
	        $slideNavLine.stop().animate({
	            left: $slideNavLine.data("origLeft"),
	            width: $slideNavLine.data("origWidth")
	        });
	    });
	};
})();
// end nav


//左导航
$('.l_nav li').click(function(){
$(this).addClass('active').siblings().removeClass('active');
});
//

// 
if ($().slide) {
$(".banner").slide({mainCell:".bd",titCell:".hd",effect:"leftLoop",autoPage: true, autoPlay: true, pnLoop:true, delayTime: 500, interTime: 5000});
// 
$(".link_scroll").slide({mainCell:".bd",autoPlay:true,effect:"leftMarquee",vis:7,interTime:50,trigger:"click"});
// 
};
// end

});



};
// end jq