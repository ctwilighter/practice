<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>控制台页面</title>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/style.default.css" type="text/css" />
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/plugins/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/custom/general.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/custom/dashboard.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/custom/tables.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo SITE_URL; ?>js/plugins/excanvas.min.js"></script><![endif]-->
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="<?php echo SITE_URL; ?>css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="<?php echo SITE_URL; ?>css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="<?php echo SITE_URL; ?>js/plugins/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">Ama.<span>Admin</span></h1>
            <span class="slogan">后台管理系统</span>
            
            <div class="search">
            	<form action="" method="post">
                	<input type="text" name="keyword" id="keyword" value="请输入" />
                    <button class="submitbutton"></button>
                </form>
            </div><!--search-->
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
        	<!--<div class="notification">
                <a class="count" href="ajax/notifications.html"><span>9</span></a>
        	</div>-->
            <div class="userinfo">
            	<img src="<?php echo ($user['img']); ?>" style="width: 20px;height: 20px;" alt="" />
                <span>管理员</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href=""><img src="<?php echo ($user['img']); ?>" style="width: 95px;height: 95px;" alt="" /></a>
                    <div class="changetheme">
                    	切换主题: <br />
                    	<a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>
                </div><!--avatar-->
                <div class="userdata">
                	<h4><?php echo ($user['username']); ?></h4>
                    <span class="email"><?php echo ($user['email']); ?></span>
                    <ul>
                    	<li><a href="__APP__/Admin/edit/id/<?php echo ($user['id']); ?>">修改管理员</a></li>
                        <li><a href="accountsettings.html">账号设置</a></li>
                        <li><a href="help.html">帮助</a></li>
                        <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    	<ul class="headermenu">
        	<li class="current"><a href="<?php echo U('Index/index');?>"><span class="icon icon-flatscreen"></span>首页</a></li>
            <li><a href="__ROOT__/index.php" target="_black"><span class="icon icon-pencil"></span>前台入口</a></li>
            <li><a href="messages.html"><span class="icon icon-message"></span>查看消息</a></li>
            <li><a href="reports.html"><span class="icon icon-chart"></span>统计报表</a></li>
        </ul>
        
       <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                	<h4>Current Date</h4>
                    <h2><?php echo date('Y/m/d',time());?></h2>
                </div><!--one_half-->
                <!-- <div class="one_half last alignright">
                	<h4>Current Time</h4>
                    <h2 id="time"><?php echo date('H:i:s',time());?></h2>
                </div> --><!--one_half last-->
            </div><!--earnings-->
        </div><!--headerwidget-->
        
    </div><!--header-->
    
    <div class="vernav2 iconmenu">
    	<ul>
        	<li><a href="#service" class="editor">服务项目</a>
                <span class="arrow"></span>
                <ul id="service">
                    <li><a href="<?php echo U('Server/add');?>" target="myiframe">添加项目</a></li>
                    <li><a href="<?php echo U('Server/index');?>" target="myiframe">项目列表</a></li>
                    <li><a href="<?php echo U('Server/add_cate');?>" target="myiframe">添加类别</a></li>
                    <li><a href="<?php echo U('Server/cate');?>" target="myiframe">服务类别</a></li>
                </ul>
            </li>
            <li><a href="#cases" class="elements">成功案例</a>
                <span class="arrow"></span>
                <ul id="cases">
                    <li><a href="<?php echo U('Cases/add');?>" target="myiframe">添加案例</a></li>
                    <li><a href="<?php echo U('Cases/index');?>" target="myiframe">案例列表</a></li>
                </ul>
            </li>
            <li><a href="#news" class="calendar">企业新闻</a>
                <span class="arrow"></span>
                <ul id="news">
                    <li><a href="<?php echo U('Article/add');?>" target="myiframe">添加新闻</a></li>
                    <li><a href="<?php echo U('Article/index');?>" target="myiframe">新闻列表</a></li>
                </ul>
            </li>
            <li><a href="#recruit" class="widgets">企业招聘</a>
                <span class="arrow"></span>
                <ul id="recruit">
                    <li><a href="<?php echo U('Recruit/add');?>" target="myiframe">添加招聘</a></li>
                    <li><a href="<?php echo U('Recruit/index');?>" target="myiframe">招聘列表</a></li>
                </ul>
            </li>
            <li><a href="#photo" class="typo">图片管理</a>
                <span class="arrow"></span>
                <ul id="photo">
                    <li><a href="<?php echo U('Image/add');?>" target="myiframe">添加图片</a></li>
                    <li><a href="<?php echo U('Image/index');?>" target="myiframe">图片列表</a></li>
                </ul>
            </li>
            <li><a href="#company" class="support">公司信息</a>
                <span class="arrow"></span>
                <ul id="company">
                    <li><a href="<?php echo U('Intro/edit');?>" target="myiframe">修改信息</a></li>
                    <li><a href="<?php echo U('Intro/index');?>" target="myiframe">信息列表</a></li>
                </ul>
            </li>
            <?php if($user['status'] == 1): ?><li><a href="#admin" class="addons">管理员管理</a>
                    <span class="arrow"></span>
                    <ul id="admin">
                        <li><a href="<?php echo U('Admin/add');?>" target="myiframe">添加管理员</a></li>
                        <li><a href="<?php echo U('Admin/index');?>" target="myiframe">管理员列表</a></li>
                    </ul>
                </li><?php endif; ?>
            


            <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
            <!-- <li><a href="elements.html" class="elements">网页元素</a></li>
            <li><a href="widgets.html" class="widgets">网页插件</a></li>
            <li><a href="calendar.html" class="calendar">日历事件</a></li>
            <li><a href="support.html" class="support">客户支持</a></li>
            <li><a href="typography.html" class="typo">文字排版</a></li>
            <li><a href="tables.html" class="tables">数据表格</a></li>
			<li><a href="buttons.html" class="buttons">按钮 &amp; 图标</a></li> -->
            <li><a href="#error" class="error">错误页面</a>
            	<span class="arrow"></span>
            	<ul id="error">
               		<li><a href="notfound.html">404错误页面</a></li>
                    <li><a href="forbidden.html">403错误页面</a></li>
                    <li><a href="internal.html">500错误页面</a></li>
                    <li><a href="offline.html">503错误页面</a></li>
                </ul>
            </li>
            <li><a href="#addons" class="addons">其他页面</a>
            	<span class="arrow"></span>
            	<ul id="addons">
               		<li><a href="newsfeed.html">新闻订阅</a></li>
                    <li><a href="profile.html">资料页面</a></li>
                    <li><a href="productlist.html">产品列表</a></li>
                    <li><a href="photo.html">图片视频分享</a></li>
                    <li><a href="gallery.html">相册</a></li>
                    <li><a href="invoice.html">购物车</a></li>
                </ul>
            </li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
        
    <iframe src="<?php echo U('Article/index');?>" name="myiframe" width="81.74%" height="700px" style="float: right;"></iframe>
    
    
</div><!--bodywrapper-->

</body>
</html>