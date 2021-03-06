<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>数据表格页面</title>
<link rel="stylesheet" href="<?php echo SITE_URL;?>css/style.default.css" type="text/css" />
<script type="text/javascript" src="<?php echo SITE_URL;?>js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>js/custom/general.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>js/custom/tables.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="<?php echo SITE_URL;?>js/plugins/css3-mediaqueries.js"></script>
<![endif]-->
<style type="text/css">
	.adminPage{text-align: center;padding: 0 auto;}
	.adminPage a,.adminPage span{display: inline-block;padding: 0 20px;}
	a{text-decoration: none;}
    .tableoptions .tabtext{width: 120px;}
</style>
</head>

<body class="withvernav">
<div class="bodywrapper">

        
    <div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">企业新闻列表</h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
            <form method="get" action="__SELF__" id="form">
                <div class="tableoptions">
                    <input type="text" class="tabtext" name="title" placeholder="输入文章标题">
                    作者：<input type="text" class="tabtext" name="author" placeholder="发布作者">
                    发布时间：<input type="text" class="tabtext" name="time">
                    <button type="submit">确认</button>&nbsp;&nbsp;<button type="reset">重置</button>
                </div>
            </form>
            
            <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
                <colgroup>
                    <col class="con0" />
                    <col class="con1" />
                    <col class="con0" />
                    <col class="con1" />
                    <col class="con0" />
                </colgroup>
                <thead>
                    <tr>
						<th>新闻编号</th>
						<th>新闻标题</th>
                        <th>发布作者</th>
						<th>发布时间</th>
						<th>新闻简介</th>
						<th>相关操作</th>
					</tr>
                </thead>
                <tfoot>
                	<th colspan="6" class="adminPage"><?php echo ($page); ?></th>
                </tfoot>
                <tbody>
                    <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($vo['id']); ?></td>
							<td><?php echo ($vo['title']); ?></td>
							<td><?php echo ($vo['author']); ?></td>
                            <td><?php if($vo['time'] == 0): ?>未定义<?php else: echo date('Y年m月d日',$vo['time']); endif; ?></td>
							<td style="width: 250px;"><?php echo ($vo['desc']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Article/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a>&nbsp;&nbsp;<a class="btn btn_orange btn_trash" href="__APP__/Article/del/id/<?php echo ($vo['id']); ?>"><span>删除</span></a></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>