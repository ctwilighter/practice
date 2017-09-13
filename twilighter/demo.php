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
					<li><a href="demo.php" class="current">实验室</a></li>
					<li><a href="message.php">留言板</a></li>
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

	

	<div id="content" class="container" style="overflow: visible;">
		<div id="location">
				当前位置：<a href="index.php">首页</a>&nbsp;&gt;&nbsp;<a href="demo.php">实验室</a>&nbsp;&gt;&nbsp;卡片墙
		</div>
		<div id="demo-container">
			<ul>
				<li class="demo">
					<div><img src="images/true.jpg"></div>
					<p><span>个人网站</span></p>
				</li>
				<li class="demo">
					<div><img src="images/true(1).jpg"></div>
					<p><span>企业商城</span></p>
				</li>
				<li class="demo">
					<div><img src="images/true(2).jpg"></div>
					<p><span>网站展示</span></p>
				</li>
				<li class="demo">
					<div><img src="images/true(3).jpg"></div>
					<p><span>个人网站</span></p>
				</li>
				<li class="demo">
					<div><img src="images/true(4).jpg"></div>
					<p><span>个人网站</span></p>
				</li>
			</ul>
		</div>
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
				<p>日积月累，水滴石穿。<br />只有专注于某一领域，用心去领悟其中的乐趣与精髓，才能在这一领域更近一步。</p>
			</div>
			<address>&copy; twilighter.cn 版权所有 皖ICP备16006184号</address>
		</div>
	</footer>
</body>
</html>