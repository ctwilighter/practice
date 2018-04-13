<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
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
			<li class="current_nav"><a href="<?php echo U('Index/index');?>" class="dt">首页</a></li>
			<li>
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
<div class="banner">
	<ul class="bd">
		<li><a href="###"><img src="<?php echo IMG_URL;?>banner/01.png" alt=""></a></li>
		<li><a href="###"><img src="<?php echo IMG_URL;?>banner/01.png" alt=""></a></li>
		<li><a href="###"><img src="<?php echo IMG_URL;?>banner/01.png" alt=""></a></li>
		<li><a href="###"><img src="<?php echo IMG_URL;?>banner/01.png" alt=""></a></li>
	</ul>
<ul class="hd"></ul>
</div>
<!--end动画-->
<!--star一行-->
<div class="w_1200">
<div class="services">
	<div class="service_item item1"><img src="<?php echo IMG_URL;?>1.png">
		<div class="title">服务理念/<span class="title_eng">SERVICE CONCEPT</span></div>
		<ul>
			<li><a href="desc.html#service_idea">公司服务理念：以人为本、诚实守信、用心服务</a></li>
			<li><a href="desc.html#service_idea">服务宗旨：尽我所能履行合同,用高素质的人才...</a></li>
			<li><a href="desc.html#service_idea">服务工作准则：首先尽责制：不问责任，首先服...</a></li>
			<li><a href="desc.html#service_idea">服务热线：客户服务中心电话0773--2293029</a></li>
		</ul>
	</div>
	<div class="service_item item2"><img src="<?php echo IMG_URL;?>2.png">
		<div class="title">招聘信息/<span class="title_eng">RECRUITMENT INFORMATION</span></div>
		随着公司的进一步发展，我们需要大量优秀人才的加入！我们始终贯彻... <br>
只要您有梦想，只要您有实力，我们就能为您提供一个让梦想成真的舞台...
<!-- 		<div><div class="left">空间要素：</div>
<div class="right">空间合理化并给人们以美的感受是设计的
	基本任务，我们要勇于探索时代技术赋于
	空间的新形象，不要拘泥于过去形成的空
	间形象。
</div>
<div class="left">色彩要求：</div><div class="right">室内色彩除对视觉环境产生影响外还..</div></div> -->
		<div class="clear"></div>
		<a href="<?php echo U('Recruit/recruit');?>"><div class="more">更多</div></a>
	</div>
	<div class="service_item item3"><img src="<?php echo IMG_URL;?>3.png">
		<div class="title">家政服务/<span class="title_eng">DOMESTIC SERVICE</span></div>
		<div class="item clean">
			<div class="left">家庭保洁</div>
			<div class="right"><a href="###" class="detail">详情介绍>></a></div>
		</div>
		<div class="clear"></div>
		<div class="item fix">
			<div class="left">维修服务</div>
			<div class="right"><a href="###" class="detail">详情介绍>></a></div>
		</div>
		<div class="clear"></div>
		<div class="item housekeep">
			<div class="left">高级管家</div>
			<div class="right"><a href="###" class="detail">详情介绍>></a></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="icons">
	<div class="item"><a href="desc.html"><img src="<?php echo IMG_URL;?>about_us.png" alt=""><div>关于我们</div></a></div>
	<div class="item"><a href="<?php echo U('Recruit/recruit');?>"><img src="<?php echo IMG_URL;?>hire.png" alt=""><div>人才招聘</div></a></div>
	<div class="item"><a href="<?php echo U('Article/news');?>"><img src="<?php echo IMG_URL;?>news.png" alt=""><div>最新消息</div></a></div>
	<div class="item"><a href="<?php echo U('Server/server');?>"><img src="<?php echo IMG_URL;?>service.png" alt=""><div>特色服务</div></a></div>
	<div class="item"><a href="<?php echo U('Server/server');?>"><img src="<?php echo IMG_URL;?>management.png" alt=""><div>物业管理</div></a></div>
	<div class="item"><a href="<?php echo U('Index/contact');?>"><img src="<?php echo IMG_URL;?>contact_us.png"><div>联系我们</div></a></div>
	<div class="clear"></div>
</div>
<div class="service_project">
	<div class="title">
		<span class="line"></span><div class="word">服务项目<br><span class="word_eng">SERVICE PROJECT</span> </div></div>
		<div class="content">
			<?php if(is_array($server)): foreach($server as $key=>$data): ?><div class="item"><a href="server.html"><img src="<?php echo ($data['image']); ?>" alt=""></a><p><?php echo ($data['name']); ?></p></div><!-- <div class="blank"></div> --><?php endforeach; endif; ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="corporate_news">
		<div class="title">
			<span class="line"></span><div class="word">企业新闻<br><span class="word_eng">CORPORATE NEWS</span> </div></div>
			<div class="content">
			<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item ">
					<div class="title"><img src="<?php echo IMG_URL;?>edit.png"><?php echo ($vo['title']); ?></div>
					<a href="<?php echo U('Article/news');?>">
					<div class="content"><?php echo ($vo['desc']); ?></div></a>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!--end一行-->
<script>
	$('.pop').on('click',function(e){
		//console.log(e);
		//console.log(e.target);
		//console.log(this);
		if(e.target==this){
			//console.log("fire!");
			this.style.display = "none";
		}
	});
	var $details = $('.detail');
	$('.detail').on('click',function(){
		var index = $details.index(this);
		var title;
		switch(index){
			case 0:
				title = "家庭保洁";
				break;
			case 1:
				title = "维修服务";
				break;
			case 2:
				title = "高级管家";
				break;
		}
		$('.pop .title').text(title);
		$('.pop').show();
	})

</script>
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