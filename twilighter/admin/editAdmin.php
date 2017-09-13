<?php
require_once '../include.php';
checklogined();
$id=$_REQUEST['id'];
$sql="select * from web_admin where adminid='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>修改管理员</title>
	<style type="text/css">
		form p button{margin: 0 2em;}
	</style>
</head>
<body>
	<form method="post" action="doAction.php?act=editAdmin&id=<?php echo $id;?>">
		<fieldset>
			<legend>修改管理员</legend>
			<p><label for="">管理员名称：</label><input type="text" name="username" placeholder="<?php echo $row['username'];?>" required ></p>
			<p><label for="">管理员密码：</label><input type="password" name="password" value="<?php echo $row['password'];?>" required></p>
			<p><label for="">关联的邮箱：</label><input type="email" name="email" placeholder="<?php echo $row['email'];?>" required></p>
			<p><input type="reset" value="重置信息"><input type="submit" value="修改管理员"></p>
		</fieldset>
	</form>
</body>
</html>