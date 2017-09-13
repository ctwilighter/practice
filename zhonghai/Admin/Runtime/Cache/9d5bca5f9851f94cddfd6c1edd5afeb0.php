<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>数据表格页面</title>
<link rel="stylesheet" href="<?php echo SITE_URL;?>css/style.default.css" type="text/css" />
<script type="text/javascript" src="<?php echo SITE_URL;?>js/plugins/jquery-1.7.min.js"></script>
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
            <h1 class="pagetitle">成功案例列表</h1>
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
							<th>案例编号</th>
							<th>案例标题</th>
							<th>对应图片</th>
                            <th>排序</th>
							<th>相关操作</th>
						</tr>
                    </thead>
                    <tfoot>
                    	<th colspan="5" class="adminPage"><?php echo ($page); ?></th>
                    </tfoot>
                    <tbody>
                        <?php if(is_array($cases)): $i = 0; $__LIST__ = $cases;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo['id']); ?></td>
								<td><?php echo ($vo['title']); ?></td>
								<td><img src="<?php echo ($vo['image']); ?>" style="height: 80px;"></td>
                                <td><input type="number" name="sort" class="sort width50 noradiusright" id="<?php echo ($vo['id']); ?>" value="<?php echo ($vo['sort']); ?>"></td>
								<td><a class="btn btn_orange btn_flag" href="__APP__/Cases/edit/id/<?php echo ($vo['id']); ?>"><span>修改</span></a>&nbsp;&nbsp;<a class="btn btn_orange btn_trash" href="__APP__/Cases/del/id/<?php echo ($vo['id']); ?>"><span>删除</span></a></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    <script type="text/javascript">
        $(function () {
            $(".sort").focus(function (){
                window.fnum = $(this).val();
            });
            $(".sort").blur(function () {
                var number = $(this).val();
                var id = $(this).attr("id");
                //alert(id);
                //var obj = $(this);
                $.ajax({
                    type:"POST",
                    url:"__APP__/Cases/editsort",
                    data:{"id":id,"number":number},
                    success:function (response){
                        if (response.sort != fnum) {
                            alert("修改成功:值为"+response.sort);
                        }
                    }
                });
            });
        });
    </script>
    
    
</div><!--bodywrapper-->

</body>
</html>