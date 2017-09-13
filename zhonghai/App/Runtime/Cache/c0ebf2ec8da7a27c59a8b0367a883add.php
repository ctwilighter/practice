<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>桂林中海物业公司</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>css.css">
		<script type="text/javascript" src="<?php echo JS_URL; ?>jquery-1.8.2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('ul.tnavlist > li').click(function (e) {
				// $('ul.tnavlist > li').removeClass('current_nav');
				// $(this).addClass('current_nav');
				$(this).addClass('current_nav').siblings().removeClass('current_nav');
			});
		</script>
	</head> 
	<body style="background:#fff;">
		<div class="header">
			<div class="header w_1200">
				<div class="logo"><a href="<?php echo U('Index/index');?>"><img src="<?php echo ($intro['icon']); ?>" alt="桂林中海物业公司"></a>
				<div class="word"><span><?php echo ($intro[name]); ?></span><br>
			<?php echo ($intro[ename]); ?></div>
		</div>
		<!--end标志-->
		<ul class="h_tel cf2"><li><img src="<?php echo IMG_URL;?>hotline.png"><p class="eng_b ">咨询服务热线：<?php echo ($intro[tel]); ?></p></li></ul>
	</div>
</div>
<!--end头文件-->
<!-- nav -->
<div class="tnav" id="slideNav">
	<div class="tnav tnav02 w_1200">
		<ul class="tnavlist">
			<li><a href="<?php echo U('Index/index');?>" class="dt">首页</a></li>
			<li  class="current_nav">
				<a href="<?php echo U('Index/desc');?>" class="dt">公司简介</a>
			</li>
			<li>
				<a href="<?php echo U('Server/server');?>" class="dt">服务项目</a>
			</li>
			<li><a href="<?php echo U('Cases/cases');?>" class="dt">成功案例</a></li>
			<li><a href="<?php echo U('Article/news');?>" class="dt">企业新闻</a></li>
			<li><a href="<?php echo U('Recruit/recruit');?>" class="dt">企业招聘</a></li>
			<li><a href="<?php echo U('Index/contact');?>" class="dt">联系我们</a></li>
		</ul>
		<i class="tavline slideline" id="slideNavLine"></i>
	</div>
</div>
<!-- end nav -->
<!--star动画-->
<div class="banner_02 ">
<div class="title">公司简介<div></div></div>
<div class="nav"><a href="index.html">首页</a>/<span>公司简介</span></div>
</div>
<!--end动画-->
<!--star一行-->
<div class="w_1200">
<div class="title">桂林中海物业公司简介</div>
<div class="content">
<div class="subtitle">一、公司简介</div>
     <div class="block">桂林市中海物业服务有限公司成立于2009年，是从事物业服务、室内外装饰、家政服务、清洁服务的具有独立法人资格三级资质的物业管理企业，注
册资金300万元。公司经营范围为从事自有物业、企事业单位包括楼宇及小区综合管理、房屋租赁修缮、室内外装饰、中介服务、维修及绿化等。管理人员
均为本市最早从事物业管理工作和深圳高档楼盘从业经验高级管理人才组成，皆持有建设部颁发的物业企业经理岗位证书。管理人员：大专以上学历的比例
不低于80%，有2名中级以上职称的工程师，所有管理人员均持有各类上岗证，持证率达100%。操作人员： 90%有高中、本科毕业以上学历，年龄不超过
40岁、部队转业军人或经历职业技术学校培训具备一定的军训基本功的，身高170cm以上，专业操作人员具有操作证、资格证。桂林市中海物业服务有限
公司坚持走社会化、专业化、企业化、经营型的物业管理之路,在本市物业管理领域中获得“优秀小区”和管理众多不同类型物业的企业。2009年10月起陆
续接管：</div>
      <div class="block">灵川福园小区、福园东区、一品嘉苑、九龙花园</div>
      <div class="block">桂林市区七星景区动物园、恒达玻璃钢厂、百坚汽车附件公司、长城花园、桂林七星区综合执法局、高新区信息产业园、铁山工业园、朝阳乡政府、机
电工程学校、罗马花园等，君临山水别墅区等公司管理的物业面积约300多万平方米，员工200余人。</div>
      <div class="block">公司以“尽我所能履行合同”为宗旨，确定了科学规范、竭诚高效、安全文明、持续发展、依法管理的质量方针，制定了一整套严格的管理制度和操作
规程，通过科学的管理和优质的服务，努力营造安全、文明、整洁、舒适、充满亲情的社区氛围，公司已形成了以人为本、和谐共存，“真诚、善意、完美”
的独特文化理念，取得了社会效益、经济效益、环境效益的和谐统一。</div>
<div class="subtitle">二、物业管理策划与顾问案例</div>
1、临桂吉安龙城物业管理策划与实施<br>
2、新疆广汇集团桂林“湖光山色”项目物业管理策划与实施<br>
3、新疆广汇集团桂林“桂林郡”项目物业管理策划与实施
<div class="subtitle" id="service_idea">三、服务理念</div>
<div class="subtitle">公司服务理念</div>
以人为本、诚实守信、用心服务
<div class="subtitle">服务宗旨</div>
尽我所能履行合同<br>
用高素质的人才、高效率、高标准的工作换取高回报
<div class="subtitle">服务工作准则</div>
首先尽责制：不问责任，首先服务<br>
首问负责制：谁 受 理，谁 落 实<br>
跟踪负责制：谁服务，谁跟踪<br>
<span class="subtitle">服务热线：</span>客户服务中心电话24小时开通0773--2293029
</div>

	</div>
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