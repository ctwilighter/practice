<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<title>Twilighter—程艳阳个人网站</title>
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
	<meta name="anthor" content="Cheng yanyang">
	<meta name="keywords" content="twilighter,程艳阳,个人网站,学习网站,资源共享网站">
	<meta name="description" content="twilighter——程艳阳的个人修炼网站，其中涉及了前端、后端、算法以及一些生活感悟等内容，见证一个程序猿的前进之路。">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--[if lt IE 9]>
	<script src="scripts/html5shiv.js"></script >
	<![endif]-->
	<script type="text/javascript" src="scripts/global.js"></script>
</head>
<body><?php include_once("baidu_js_push.php") ?>
	<header>
		<div class="container">
			<nav>
				<h1>Twilighter<span>-for my dream</span></h1>
				<ul id="nav-icon">
					<li></li>
					<li></li>
					<li></li>
				</ul>
				<ul id="navbar">
					<li><a href="index.php">首页</a></li>
					<li><a href="about_me.php">关于我</a></li>
					<li><a href="essay.php">技术杂谈</a></li>
					<li><a href="demo.php">实验室</a></li>
					<li><a href="message.php" class="current">留言板</a></li>
					<li>
						<div id="searchBox">
							<form method="post" action="sEssay.php" name="searchSite" id="searchSite">
								<input type="text" name="sText" id="s" placeholder="搜索文章">
								<button type="submit" id="go"></button>
							</form>
						</div>
					</li>
				</ul>
			</nav>
		</div>
	</header>


	<div id="content" class="container">
		<div id="location">
				当前位置：<a href="index.php">首页</a>&nbsp;&gt;&nbsp;<a href="message.php">留言板</a>&nbsp;&gt;&nbsp;交流墙
		</div>
		<article class="left">
<!-- 			<form method="post" action=""> -->
<!-- 				<fieldset> -->
<!-- 					<legend>留下你的足迹，带走一缕清香</legend> -->
<!-- 					<p> -->
<!-- 						<label for="uname">昵称：</label> -->
<!-- 						<input type="text" name="uname" id="uname" placeholder="请输入你的昵称" autofocus required> -->
<!-- 					</p> -->
<!-- 					<p> -->
<!-- 						<label for="email">关联邮箱：</label> -->
<!-- 						<input type="email" name="email" id="email" placeholder="请输入你的邮箱" required> -->
<!-- 					</p> -->
<!-- 					<p> -->
<!-- 						<label for="password">密码：</label> -->
<!-- 						<input type="password" name="password" id="password" placeholder="请输入六位以上的密码" required> -->
<!-- 					</p> -->
<!-- 					<p> -->
<!-- 						<label for="image">头像：</label> -->
<!-- 						<input type="file" name="image" id="image" required> -->
<!-- 					</p> -->
<!-- 					<p> -->
<!-- 						<label for="message">留言：</label> -->
<!-- 						<textarea name="message" id="message" placeholder="请输入你的留言" required></textarea> -->
<!-- 					</p> -->
<!-- 					<p> -->
<!-- 						<label for="time">时间：</label> -->
<!-- 						<input type="datetime-local" name="time" id="time" required> -->
<!-- 					</p> -->
<!-- 					<p></p> -->
<!-- 					<p> -->
<!-- 						<button type="reset">重置表单</button> -->
<!-- 						<button type="submit">提交表单</button> -->
<!-- 					</p> -->
<!-- 				</fieldset> -->
<!-- 			</form> -->
				<h4>感谢大家的支持，有什么意见或建议请留言。</h4>
				<!--PC和WAP自适应版-->
    			<div id="SOHUCS" sid="message" ></div> 
    			<script type="text/javascript"> 
    				(function(){ 
    				var appid = 'cysXcy6GM'; 
    				var conf = 'prod_3fb324f132b80693b769c1082c22e82a'; 
    				var width = window.innerWidth || document.documentElement.clientWidth; 
    				if (width < 960) { 
    				window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("http://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); 
    			</script>
		</article>
		<aside class="right" id="sidebar">			
			<div id="personal">
				<h4>联系方式<span><a href="about_me.php">更多信息&gt;&gt;</a></span></h4>
				<ul>
					<li>姓名：<a href="">程艳阳</a></li>
					<li>网名：<a href="">破晓 || twilighter</a></li>
					<li>微博账号：<a href="">破晓-羲</a></li>
					<li>腾讯邮箱：<a href="mailto:c_twilighter@qq.com">c_twilighter@qq.com</a></li>
					<li>网易邮箱：<a href="mailto:c_twilighter@163.com">c_twilighter@163.com</a></li>
					<li>友情链接：<a href="http://chengyanyang.win" target="_blank">程艳阳的个人网站</a></li>
				</ul>
				<p>扫描二维码加我微信好友<img src="images/weixin.jpg"></p>
			</div>
		</aside>
	</div>
	<footer>
		<div class="container">
			<div class="left">
				<h4>学习资源&gt;&gt;</h4>
				<nav>
					<ul>
						<li>
							<p><a href="http://www.imooc.com/" target="_blank">慕课网</a></p>
							<p><a href="https://www.shiyanlou.com/" target="_blank">实验楼</a></p>
							<p><a href="https://www.jisuanke.com/" target="_blank">计蒜客</a></p>
						</li>
						<li>
							<p><a href="http://www.csdn.net/" target="_blank">CSDN</a></p>
							<p><a href="https://www.nowcoder.com/" target="_blank">牛客网</a></p>
							<p><a href="http://www.ituring.com.cn/" target="_blank">图灵社区</a></p>
						</li>
						<li>
							<p><a href="http://www.jianshu.com/" target="_blank">简书</a></p>
							<p><a href="https://www.zhihu.com/" target="_blank">知乎</a></p>
							<p><a href="http://www.icourse163.org/" target="_blank">中国大学mooc</a></p>
						</li>
					</ul>
				</nav>
			</div>
			<div class="right">
				<p id="motto">日积月累，水滴石穿。<br />只有专注于某一领域，用心去领悟其中的乐趣与精髓，才能在这一领域更近一步。</p>
			</div>
		</div>
		<address>&copy; twilighter.cn 版权所有 皖ICP备16006184号</address>
	</footer>
</body>
</html>