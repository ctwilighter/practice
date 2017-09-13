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
			<li>
				<a href="<?php echo U('Index/desc');?>" class="dt">公司简介</a>
			</li>
			<li>
				<a href="<?php echo U('Server/server');?>" class="dt">服务项目</a>
			</li>
			<li><a href="<?php echo U('Cases/cases');?>" class="dt">成功案例</a></li>
			<li class="current_nav"><a href="<?php echo U('Article/news');?>" class="dt">企业新闻</a></li>
			<li><a href="<?php echo U('Recruit/recruit');?>" class="dt">企业招聘</a></li>
			<li><a href="<?php echo U('Index/contact');?>" class="dt">联系我们</a></li>
		</ul>
		<i class="tavline slideline" id="slideNavLine"></i>
	</div>
</div>
<!-- end nav -->
<!--star动画-->
<div class="banner_05">

</div>
<!--end动画-->
<!--star一行-->
<div class="w_1200 news">
	<div class="content">
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item">
				<div class="title"><img src="<?php echo IMG_URL;?>edit.png"><?php echo ($vo['title']); ?></div>
				<a href="__APP__/Article/news_detail/id/<?php echo ($vo['id']); ?>">
					<div class="content"><?php echo ($vo['desc']); ?>
						<p class="date"><?php echo date('Y年m月d日',$vo['time']);?></p>
					</div>
				</a>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="pagination"><?php echo ($page); ?></div>
		<!-- <div class="pagination"><span class="totalNum">32</span>&nbsp;条记录 &nbsp;1/4页 &nbsp; <a href="####">下一页</a> <a class="pageNum" href="####">1</a><a class="pageNum" href="####">2</a><a class="pageNum" href="####">3</a><a class="pageNum" href="####">4</a></div> -->
	</div>
	<!--end一行-->

</div>
<!--end文件底-->
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