<?php
require_once '../include.php';
checklogined();
?>
<!DOCTYPE html>
<html>
<head>
	<title>添加管理员</title>
	<style type="text/css">
		form p button{margin: 0 2em;}
	</style>
</head>
<body>
	<form method="post" action="doAction.php?act=addAdmin">
		<fieldset>
			<legend>添加管理员</legend>
			<p><label for="">管理员名称：</label><input type="text" name="username" required></p>
			<p><label for="">管理员密码：</label><input type="password" name="password" required></p>
			<p><label for="">关联的邮箱：</label><input type="email" name="email" required></p>
			<p><input type="reset" value="重置信息"><input type="submit" value="添加管理员"></p>
		</fieldset>
	</form>
</body>
</html>