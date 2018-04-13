<?php
require_once '../include.php';
checklogined();
$sql="select * from article";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page)){
	$page=1;
}
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from article,article_cate where article.cateid=article_cate.cateid limit {$offset},{$pageSize}";
//echo $sql;
$rows=fetchAll($sql);
if(!$rows){
	alertMsg("sorry,没有文章,请先添加!","addArticle.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>文章列表</title>
	<style type="text/css">
		thead th{background-color: grey;color: white;width: 10em;height: 2em;}
		tbody td{text-align: center;height:1.8em;white-space:nowrap;overflow:hidden; }
		tfoot td{text-align: center;background-color: #aaa;line-height: 1.8em;}
	</style>
</head>
<body>
	<h3>文章列表</h3>
	<table>
		<thead>
			<tr>
				<th>编号</th>
				<th>标题</th>
				<th>作者</th>
				<th>分类</th>
				<th>上传时间</th>
				<th>是否热文</th>
				<th>相关操作</th>
			</tr>
		</thead>
		<tbody>
		<?php $i=1;foreach ($rows as $row):?>
			<tr>
				<th><?php echo $i; ?></th>
				<td><?php echo $row['artiname'];?></td>
				<td><?php echo $row['author'];?></td>
				<td><?php echo $row['catename'];?></td>
				<td><?php echo date("Y-m-d",$row['puttime']);?></td>
				<td><?php echo $row[ishot]?"是":"否";?></td>
				<td><input type="button" value="修改" onclick="editArticle(<?php echo $row['artiid'];?>)"><input type="button" value="删除" onclick="delArticle(<?php echo $row['artiid'];?>)"></td>
			</tr>
		<?php $i++; endforeach;?>
		</tbody>
		<tfoot>
		<?php if ($rows>pageSize):?>
			<tr>
				<td colspan=7><?php echo showPage($page, $totalPage);?></td>
			</tr>
		<?php endif;?>
		</tfoot>
	</table>
</body>
<script type="text/javascript">

	function addArticle(){
		window.location="addArticle.php";	
	}
	function editArticle(id){
			window.location="editArticle.php?id="+id;
	}
	function delArticle(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAction.php?act=delArticle&id="+id;
			}
	}
</script>
</html>