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
</style>
</head>

<body class="withvernav">
<div class="bodywrapper">

        
    <div class="centercontent tables">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">公司信息列表</h1>
            <span class="pagedesc">This is a sample description of a page</span>
            
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
                	
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
							<th>类别</th>
							<th>内容</th>
							<th>相关操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>公司名称</th>
							<td><?php echo ($intro['name']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>英文名称</th>
							<td><?php echo ($intro['ename']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>公司图标</th>
							<td><img src="<?php echo ($intro['icon']); ?>" style="height: 70px;"></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>服务热线</th>
							<td><?php echo ($intro['tel']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>公司扣扣</th>
							<td><?php echo ($intro['qq']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>公司地址</th>
							<td><?php echo ($intro['address']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>公司邮箱</th>
							<td><?php echo ($intro['email']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>公司微信</th>
							<td><img src="<?php echo ($intro['wechat']); ?>" style="height: 70px;"></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>公司邮编</th>
							<td><?php echo ($intro['zcode']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>服务理念</th>
							<td><?php echo ($intro['sidea']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>服务宗旨</th>
							<td><?php echo ($intro['stenet']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>工作准则</th>
							<td><?php echo ($intro['sstand']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr><tr>
							<th>公司简介</th>
							<td><?php echo ($intro['desc']); ?></td>
							<td><a class="btn btn_orange btn_flag" href="__APP__/Intro/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a></td>
						</tr>
					</tbody>
                    <tfoot>
                    	<th colspan="3" class="adminPage"><?php echo ($page); ?></th>
                    </tfoot>
                </table>
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>