<?php 
require_once 'include.php';
$rows=getAllArticle();
if(!$rows){
    exit("当前并没有文章，请前往后台添加");
}
$sql="select * from article,article_cate where article.cateid=article_cate.cateid and ishot=1";
$totalRows=getResultNum($sql);
$pageSize=10;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page)){
    $page=1;
}
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from article,article_cate where article.cateid=article_cate.cateid and ishot=1 order by artiid desc limit {$offset},{$pageSize}";
//echo $sql;
$hots=fetchAll($sql);
?>

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
				<h1 id="ti">Twilighter<span>-for my dream</span></h1>
				<ul id="nav-icon">
					<li></li>
					<li></li>
					<li></li>
				</ul>
				<ul id="navbar">
					<li><a href="index.php" class="current">首页</a></li>
					<li><a href="about_me.php">关于我</a></li>
					<li><a href="essay.php">技术杂谈</a></li>
					<li><a href="demo.php">实验室</a></li>
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

	<div id="banner">
		<div id="list" style="left: -100%;">
			<a href=""><img src="images/5.jpg" alt=""></a>
			<a href=""><img src="images/1.jpg" alt=""></a>
			<a href=""><img src="images/2.jpg" alt=""></a>
			<a href=""><img src="images/3.jpg" alt=""></a>
			<a href=""><img src="images/4.jpg" alt=""></a>
			<a href=""><img src="images/5.jpg" alt=""></a>
			<a href=""><img src="images/1.jpg" alt=""></a>
		</div>
		<div id="buttons">
			<span index="1" class="on"></span>
			<span index="2"></span>
			<span index="3"></span>
			<span index="4"></span>
			<span index="5"></span>
		</div>
		<a href="javascript:;" class="arrow" id="prev">&lt;</a>
		<a href="javascript:;" class="arrow" id="next">&gt;</a>
	</div>

	<div id="content" class="container">
		<article class="left">
			<h3>文章推荐<span><a href="essay.php">More&gt;&gt;</a></span></h3>
			<?php $i=1;foreach ($hots as $row):if ($i>10)break;?>
			<section>
				<h4><a href="detail.php?artiid=<?php echo $row['artiid'];?>"><?php echo $row['artiname'];?></a></h4>
				<figure>
					<img src="admin/uploads/<?php 
					   $sql="select * from web_album where id={$row['artiid']}";
					   $imgpath=fetchOne($sql);
					   echo $imgpath[albumpath];
					?>" alt="图片加载中~">
				</figure>
				<ul>
					<p><?php echo $row['artides'];?></p>
					<a href="detail.php?artiid=<?php echo $row['artiid'];?>">阅读全文>></a>
				</ul>
				<p class="dateview">
					<span><?php echo date("Y-m-d",$row['puttime']);?></span>
					<span>作者:<?php echo $row['author'];?></span>
					<span>个人博客:[<a href="clessay.php?id=<?php echo $row['cateid'];?>"><?php echo $row['catename'];?></a>]</span>
				</p>
			</section>
			<?php $i++;endforeach;?>
			<?php if ($rows>pageSize):?>
				<p style="text-align:center;"><?php echo showPage($page, $totalPage);?></p>
			<?php endif;?>
		</article>
		<aside class="right" id="sidebar">
			<div id="time-box">
				<canvas id="clock" width="250px" height="250px"></canvas>
				<p id="date"></p>
			</div>
			<div id="news">
				<h4>最新文章</h4>
				<ul>
				<?php $i=1;foreach ($rows as $row):if ($i>10)break;?>
					<li><a href="detail.php?artiid=<?php echo $row[artiid];?>"><?php echo $row[artiname];?></a></li>
				<?php $i++;endforeach;?>
				</ul>
			</div>
			<div id="demo-list">
				<h4>实验列表</h4>
				<ul>
					<li><a href="">暂无相关内容，努力中</a></li>
				</ul>
			</div>
			<div id="personal">
				<h4>联系方式<span><a href="about_me.php">更多信息&gt;&gt;</a></span></h4>
				<ul>
					<li>微博账号：<a href="">破晓-羲</a></li>
					<li>腾讯邮箱：<a href="mailto:c_twilighter@qq.com">c_twilighter@qq.com</a></li>
					<li>网易邮箱：<a href="mailto:c_twilighter@163.com">c_twilighter@163.com</a></li>
					<li>友情链接：<a href="chengyanyang.win">程艳阳的个人网站</a></li>
				</ul>
				<p>扫下方二维码加微信好友<img src="images/weixin.jpg"></p>
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
				<p>日积月累，水滴石穿。<br />只有专注于某一领域，用心去领悟其中的乐趣与精髓，才能在这一领域更近一步。</p>
			</div>
		</div>
		<address>&copy; twilighter.cn 版权所有 皖ICP备16006184号</address>
	</footer>
</body>
</html>