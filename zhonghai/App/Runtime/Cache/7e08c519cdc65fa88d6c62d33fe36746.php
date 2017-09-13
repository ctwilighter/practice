<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>桂林中海物业公司</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL;?>css.css">
		<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<!--引用百度地图API-->
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
	</head>
	<body style="background:#fff;">
		<div class="header">
			<div class="header w_1200">
				<div class="logo"><a href="index.html"><img src="<?php echo IMG_URL;?>logo.png" alt="桂林中海物业公司"></a>
				<div class="word"><span>桂林中海物业公司</span><br>
			GUI LIN ZHONG HAI WU YE GONG SI</div>
		</div>
		<!--end标志-->
		<ul class="h_tel cf2"><li><img src="<?php echo IMG_URL;?>hotline.png"><p class="eng_b ">咨询服务热线：0773--2293029</p></li></ul>
	</div>
</div>
<!--end头文件-->
<!-- nav -->
<div class="tnav" id="slideNav">
	<div class="tnav tnav02 w_1200">
		<ul class="tnavlist">
			<li><a href="<?php echo U('Index/index');?>" class="dt">首页</a></li>
			<li>
				<a href="<?php echo U('Index/desc');?>" class="dt">公司简介</a>
			</li>
			<li>
				<a href="<?php echo U('Server/server');?>" class="dt">服务项目</a>
			</li>
			<li><a href="<?php echo U('Cases/cases');?>" class="dt">成功案例</a></li>
			<li><a href="<?php echo U('Article/news');?>" class="dt">企业新闻</a></li>
			<li><a href="<?php echo U('Recruit/recruit');?>" class="dt">企业招聘</a></li>
			<li class="current_nav"><a href="<?php echo U('Index/contact');?>" class="dt">联系我们</a></li>
		</ul>
		<i class="tavline slideline" id="slideNavLine"></i>
	</div>
</div>
<!-- end nav -->
<!--star动画-->

  <!--百度地图容器-->
  <div style="width:100%;height:550px;border:#ccc solid 0px;" id="dituContent"></div>
<div class="w_1200">
	<div class="contact">
		<div class="item qq">客服QQ：<?php echo ($intro['qq']); ?></div>
		<div class="item phone">电话：<?php echo ($intro['tel']); ?></div>
		<div class="item address">地址：<?php echo ($intro['address']); ?></div>
	</div>
</div>

<!--end动画-->
<!--star一行-->


<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        //addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(110.414057,25.307323);//定义一个中心点坐标
        map.centerAndZoom(point,13);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
                //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }

    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>
	<!--end一行-->
		<div class="footer">
		<ul class="w_1200 footer">
			<li><span class="f_share"><a href="#####"><img class="share_a" src="<?php echo ($intro['wechat']); ?>"></a></span>
			<span class="word">扫一扫<br>关注官方微信公众号</span>
		</li>
		<li><a href="<?php echo U('Index/index');?>">首页</a>    <span class="spliter">|</span>    <a href="<?php echo U('Index/desc');?>">公司简介</a>    <span class="spliter">|</span>    <a href="<?php echo U('Server/server');?>">服务项目</a>    <span class="spliter">|</span>    <a href="<?php echo U('Cases/cases');?>">成功案例</a>   <span class="spliter">|</span>    <a href="<?php echo U('Article/news');?>">企业新闻</a>    <span class="spliter">|</span>    <a href="<?php echo U('Recruit/recruit');?>">企业招聘</a>     <span class="spliter">|</span><a href="<?php echo U('Index/contact');?>">联系我们</a></li>
		<li>&nbsp;  </li>
		<li>版权所有：桂林市中海物业服务有限公司&nbsp;&nbsp;&nbsp;&nbsp;地址：<?php echo ($intro['address']); ?></li>
		<li>邮编：<?php echo ($intro['zcode']); ?>   电话：<?php echo ($intro['tel']); ?></li>
	</ul>
</div>
<!--end文件底-->
<script type="text/javascript" src="<?php echo JS_URL;?>jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>jquery.SuperSlide.2.1.2.js"></script>
<script type="text/javascript" src="<?php echo JS_URL;?>global.js"></script>
<!--返回顶部-->
<a style="display: none" href="javascript:;" class="top" title="回到顶端" id="top"></a>
<script src="<?php echo JS_URL;?>top.js"></script>
<!--end返回顶部-->
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo JS_URL;?>DD_belatedPNG.js"></script>
<script>
DD_belatedPNG.fix('img,.black,.ac_arrow,.acfter_c');
</script>
<![endif]-->
</body>
</html>