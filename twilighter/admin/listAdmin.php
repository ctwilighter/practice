<?php
require_once '../include.php';
checklogined();
$sql="select * from web_admin";
$totalRows=getResultNum($sql);
$pageSize=5;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page)){
	$page=1;
}
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from web_admin limit {$offset},{$pageSize}";
//echo $sql;
$rows=fetchAll($sql);
if(!$rows){
	alertMsg("sorry,没有管理员,请添加!","addAdmin.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>管理员列表</title>
	<style type="text/css">
		thead th{background-color: grey;color: white;width: 10em;height: 2em;}
		tbody td{text-align: center;line-height: 1.8em;}
		tfoot td{text-align: center;background-color: #aaa;line-height: 1.8em;}
	</style>
</head>
<body>
	<input type="button" value="添加管理员" onclick="addAdmin()">
	<table>
		<thead>
			<tr>
				<th>管理员编号</th>
				<th>管理员名称</th>
				<th>管理员密码</th>
				<th>关联邮箱</th>
				<th>相关操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($rows as $row):?>
			<tr>
				<th><?php echo $row[adminid];?></th>
				<td><?php echo $row[username];?></td>
				<td><?php echo $row[password];?></td>
				<td><?php echo $row[email];?></td>
				<td><input type="button" value="修改" onclick="editAdmin(<?php echo $row['adminid'];?>)"><input type="button" value="删除" onclick="delAdmin(<?php echo $row['adminid'];?>)"></td>
			</tr>
		<?php endforeach;?>
		</tbody>
		<tfoot>
		<?php if ($rows>pageSize):?>
			<tr>
				<td colspan=5><?php echo showPage($page, $totalPage);?></td>
			</tr>
		<?php endif;?>
		</tfoot>
	</table>
</body>
<script type="text/javascript">

	function addAdmin(){
		window.location="addAdmin.php";	
	}
	function editAdmin(id){
			window.location="editAdmin.php?id="+id;
	}
	function delAdmin(id){
			if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
				window.location="doAction.php?act=delAdmin&id="+id;
			}
	}
</script>
</html>