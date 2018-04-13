<?php 
require_once 'include.php';
$sText=$_REQUEST['sText'];
$sql="select * from article,article_cate where article.cateid=article_cate.cateid and article.artiname like '%{$sText}%'";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page)){
    $page=1;
}
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from article,article_cate where article.cateid=article_cate.cateid and article.artiname like '%{$sText}%' order by artiid desc limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
if(!$rows){
    alertMsg("sorry,没有相关文章,请重新搜索!","index.php");
    exit;
}
function showClassPage($page,$totalPage,$where=null,$sep="&nbsp;"){
    $id=$_REQUEST['id'];
    $where=($where==null)?null:"&".$where;
    $url = $_SERVER ['PHP_SELF'];
    $index = ($page == 1) ? "首页" : "<a href='{$url}?page=1&id={$id}{$where}'>首页</a>";
    $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}&id={$id}{$where}'>尾页</a>";
    $prevPage=($page>=1)?$page-1:1;
    $nextPage=($Page>=$totalPage)?$totalPage:$page+1;
    $prev = ($page == 1) ? "上一页" : "<a href='{$url}?page={$prevPage}&id={$id}{$where}'>上一页</a>";
    $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page={$nextPage}&id={$id}{$where}'>下一页</a>";
    $str = "总共{$totalPage}页/当前是第{$page}页";
    for($i = 1; $i <= $totalPage; $i ++) {
        //当前页无连接
        if ($page == $i) {
            $p .= "[{$i}]";
        } else {
            $p .= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
        }
    }
    $pageStr=$str.$sep . $index .$sep. $prev.$sep . $p.$sep . $next.$sep . $last;
    return $pageStr;
}
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
<body>
	<?php include_once("baidu_js_push.php") ?>
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
					<li><a href="essay.php" class="current">技术杂谈</a></li>
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

	<div id="content" class="container">
		<article class="left">
			<h3>文章推荐</h3>
			<?php $i=1;foreach ($rows as $row):if ($i>10)break;?>
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
				<p style="text-align:center;"><?php echo showClassPage($page, $totalPage);?></p>
			<?php endif;?>
		</article>
		<aside class="right" id="sidebar">
			<div id="time-box">
				<canvas id="clock" width="250px" height="250px"></canvas>
				<p id="date"></p>
			</div>
			<div id="demo-list">
				<h4>实验列表</h4>
				<ul>
					<li><a href="">暂无相关内容，开发中</a></li>
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