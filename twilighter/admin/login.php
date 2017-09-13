<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<title>登录界面—程艳阳个人网站</title>
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
	<meta name="anthor" content="Cheng yanyang">
	<meta name="description" content="twilighter——程艳阳个人修炼网站">
	<meta name="keywords" content="twilighter,程艳阳,个人网站,学习网站,资源共享网站">
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!--[if lt IE 9]>
	<script src="../scripts/html5shiv.js"></script >
	<![endif]-->
	<script type="text/javascript" src="../scripts/global.js"></script>
	<style type="text/css">
		form p:nth-last-child(3) input{width: 20%;margin-right: 1em;}
		form p:nth-last-child(3) img{vertical-align: middle;}
	</style>
</head>
<body>
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
					<li><a href="../index.html">首页</a></li>
					<li><a href="../about_me.html">关于我</a></li>
					<li><a href="../essay.html">技术杂谈</a></li>
					<li><a href="../demo.html">实验室</a></li>
					<li><a href="../message.html">留言板</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<div id="shade-box">
		<form method="post" action="doLogin.php">
			<fieldset>
				<legend>主人，欢迎您再次归来！</legend>
				<p>
					<label for="username">昵称：</label>
					<input type="text" name="username" id="username" placeholder="请输入你的昵称" autofocus required>
				</p>
				<p>
					<label for="password">密码：</label>
					<input type="password" name="password" id="password" placeholder="请输入六位以上的密码" required>
				</p>
				<p>
					<label for="verify">验证码：</label>
					<input type="text" name="verify" id="verify" required>
					<img src="getVerify.php" alt="验证码">
				</p>
				<p>
					<input type="checkbox" id="a1" class="checked" name="autoFlag" value="1">
					<label for="autoFlag">一周内自动登陆</label>
				</p>
				<p>
					<button type="reset">重置表单</button>
					<button type="submit">登录后台</button>
				</p>
			</fieldset>
		</form>
	</div>
	<div id="content" class="container"></div>
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