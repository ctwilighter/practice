<?php
require_once '../include.php';
checklogined();
$id=$_REQUEST['id'];
$sql="select * from article_cate where cateid='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>修改分类</title>
	<style type="text/css">
		form p button{margin: 0 2em;}
	</style>
</head>
<body>
	<form method="post" action="doAction.php?act=editCate&id=<?php echo $id;?>">
		<fieldset>
			<legend>修改分类</legend>
			<p><label for="catename">类别名称：</label><input type="text" name="catename" placeholder="<?php echo $row['catename'];?>" required ></p>
			<p><input type="reset" value="重置信息"><input type="submit" value="修改类别"></p>
		</fieldset>
	</form>
</body>
</html>