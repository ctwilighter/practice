<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>数据表格页面</title>
<link rel="stylesheet" href="<?php echo SITE_URL;?>css/style.default.css" type="text/css" />
<script type="text/javascript" src="<?php echo SITE_URL;?>js/plugins/jquery-3.2.1.min.js"></script>
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
            <h1 class="pagetitle">管理员列表</h1>
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
						<th>管理员编号</th>
						<th>管理员名称</th>
						<th>管理员邮箱</th>
						<th>管理员头像</th>
						<th>最近登录时间</th>
                        <th>权限设置</th>
						<th>相关操作</th>
					</tr>
                </thead>
                <tfoot>
                	<th colspan="7" class="adminPage"><?php echo ($page); ?></th>
                </tfoot>
                <tbody>
                    <?php if(is_array($admin)): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($vo['id']); ?></td>
							<td><?php echo ($vo['username']); ?></td>
							<td><?php echo ($vo['email']); ?></td>
							<td><form id="picform" name="picform" enctype="multipart/form-data"><img src="<?php echo ($vo['img']); ?>" class="pic" pid="<?php echo ($vo['id']); ?>" style="height: 60px;"><input type="file" name="img" class="headpic" style="display: none;" /></form></td>
							<td><?php if($vo['logintime'] == 0): ?>从未登录<?php else: echo date('Y年m月d日',$vo['logintime']); endif; ?></td>
                            <td>
                                <select name="status" class="status uniformselect" sid="<?php echo ($vo['id']); ?>">
                                    <?php switch($vo['status']): case "1": ?><option value="0">普通管理员</option>
                                            <option value="1" selected>超级管理员</option><?php break;?>
                                        <?php default: ?>
                                            <option value="0">普通管理员</option>
                                            <option value="1">超级管理员</option><?php endswitch;?>
                                </select>
                            </td>
							<td>
                            <?php if($user['status'] == 1): ?><a class="btn btn_orange btn_flag" href="__APP__/Admin/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a>&nbsp;&nbsp;<a class="btn btn_orange btn_trash" href="__APP__/Admin/del/id/<?php echo ($vo['id']); ?>"><span>删除</span></a>
                            <?php else: ?>
                                没有权限<?php endif; ?>
                            </td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    <script type="text/javascript">
        $(function () {
            $('.status').change(function () {
                var id = $(this).attr("sid");
                var status = $(this).val();
                //alert(status);
                $.ajax({
                    type:"post",
                    url:"__APP__/Admin/editstatus",
                    data:{"id":id,"status":status},
                    success:function (response) {
                        alert(response.msg);
                    },
                    error:function (XMLHttpRequest,textStatus,errorThrown) {
                        alert(textStatus);
                    }
                });
            });

            $(".pic").click(function () {
                //var id = $(this).attr("pid");
                //alert(id);
                $(this).siblings("input").trigger("click");
            });

            $(".headpic").change(function(){
                var id = $(this).siblings("img").attr("pid");
                var formData = new FormData($('#picform')[0]);
                var obj = $(this).siblings("img");
                //formData.append("img",);
                formData.append("id",id);
                //alert(formData.id);
                $.ajax({
                    type:"post",
                    url:"__APP__/Admin/editPic",
                    dataType:"json",
                    data:formData,
                    cache:false,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        var url ="__ROOT__/"+data;
                        obj.attr("src",url);
                       // alert(data);
                    },
                    error:function (XMLHttpRequest,textStatus,errorThrown) {
                        alert(textStatus);
                    }
                });
            });

        });
    </script>
    
</div><!--bodywrapper-->

</body>
</html>