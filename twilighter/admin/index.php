<?php
require_once '../include.php';
checklogined();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<title>后台界面—程艳阳个人网站</title>
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<!--[if lt IE 9]>
	<script src="../scripts/html5shiv.js"></script >
	<![endif]-->
</head>
<body>
	<header>
		<div class="container">
			<nav>
				<h1><span>后台控制面板</span></h1>
				<ul id="nav-icon">
					<li></li>
					<li></li>
					<li></li>
				</ul>
				<ul id="navbar">
					<li>欢迎您：
					<?php 
    					if(isset($_SESSION['adminName'])){
    						echo $_SESSION['adminName']; 
    					}elseif (isset($_COOKIE['adminName'])) {
    						echo $_COOKIE['adminName'];
    					}
					?>
					</li>
					<li><a href="../index.php" target="_blank">首页</a></li>
					<li><a href="javascript:history.go(1);">前进</a></li>
					<li><a href="javascript:history.go(-1);">后退</a></li>
					<li><a href="#">刷新</a></li>
					<li><a href="doAction.php?act=logout">注销</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<div id="content" class="container">
		<div class="list-left">
			<p>控制面板选项卡</p>
			<ul>
				<li>管理员
					<ul>
						<li><a href="addAdmin.php" target="myIframe">添加管理员</a></li>
						<li><a href="listAdmin.php" target="myIframe">管理员列表</a></li>
					</ul>
				</li>
				<li>文章管理
					<ul>
						<li><a href="addArticle.php" target="myIframe">添加文章</a></li>
						<li><a href="listArticle.php" target="myIframe">文章列表</a></li>
					</ul>
				</li>
				<li>类别管理
					<ul>
						<li><a href="addCate.php" target="myIframe">添加类别</a></li>
						<li><a href="listCate.php" target="myIframe">类别列表</a></li>
					</ul>
				</li>
				<li>用户管理
					<ul>
						<li><a href="addUser.php" target="myIframe">添加用户</a></li>
						<li><a href="listUser.php" target="myIframe">用户列表</a></li>
					</ul>
				</li>
				<li>图片管理
					<ul>
						<li><a href="addImg.php" target="myIframe">添加图片</a></li>
						<li><a href="listImg.php" target="myIframe">图片列表</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="list-right">
			<iframe src="main.php" frameborder="0" width="100%" height="720" scrolling="auto" marginheight="20px" marginwidth="20px" id="myIframe" name="myIframe"></iframe>
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
		</div>
		<address>&copy; twilighter.cn 版权所有 皖ICP备16006184号</address>
	</footer>
</body>
</html>