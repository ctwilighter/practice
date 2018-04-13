<?php
require_once '../include.php';
checklogined();
?>

<!DOCTYPE html>
<html>
<head>
	<title>添加分类</title>
	<style type="text/css">
		form p button{margin: 0 2em;}
	</style>
</head>
<body>
	<form method="post" action="doAction.php?act=addCate">
		<fieldset>
			<legend>添加分类</legend>
			<p><label for="">类别名称：</label><input type="text" name="catename" required></p>
			<p><input type="reset" value="重置信息"><input type="submit" value="添加分类"></p>
		</fieldset>
	</form>
</body>
</html>