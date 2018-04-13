<?php
require_once '../include.php';
checklogined();
$sql="select * from article_cate";
$totalRows=getResultNum($sql);
$pageSize=8;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page)){
	$page=1;
}
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from article_cate order by cateid asc limit {$offset},{$pageSize}";
//echo $sql;
$rows=fetchAll($sql);
if(!$rows){
	alertMsg("sorry,没有分类,请先添加!","addCate.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>类别列表</title>
	<style type="text/css">
		thead th{background-color: grey;color: white;width: 10em;height: 2em;}
		tbody td{text-align: center;line-height: 1.8em;}
		tfoot td{text-align: center;background-color: #aaa;line-height: 1.8em;}
	</style>
</head>
<body>
	<input type="button" value="添加类别" onclick="addCate()">
	<table>
		<thead>
			<tr>
				<th>类别编号</th>
				<th>类别名称</th>
				<th>相关操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($rows as $row):?>
			<tr>
				<th><?php echo $row[cateid];?></th>
				<td><?php echo $row[catename];?></td>
				<td><input type="button" value="修改" onclick="editCate(<?php echo $row['cateid'];?>)"><input type="button" value="删除" onclick="delCate(<?php echo $row['cateid'];?>)"></td>
			</tr>
		<?php endforeach;?>
		</tbody>
		<tfoot>
		<?php if ($rows>pageSize):?>
			<tr>
				<td colspan=3><?php echo showPage($page, $totalPage);?></td>
			</tr>
		<?php endif;?>
		</tfoot>
	</table>
</body>
<script type="text/javascript">

	function addCate(){
		window.location="addCate.php";	
	}
	function editCate(id){
			window.location="editCate.php?id="+id;
	}
	function delCate(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAction.php?act=delCate&id="+id;
			}
	}
</script>
</html>