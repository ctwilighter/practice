<?php 
require_once '../include.php';
checklogined();
$id=$_REQUEST['id'];
$sql="select * from article where artiid='{$id}'";
$row=fetchOne($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>修改文章</title>
	<script charset="utf-8" src="../editor/kindeditor.js"></script>
	<script charset="utf-8" src="../editor/lang/zh-CN.js"></script>
	<script>
	    KindEditor.ready(function(K) {
	        window.editor = K.create('#editor_id');
	    });
	</script>
</head>
<body>
	<form method="post" action="doAction.php?act=editArticle&id=<?php echo $id;?>">
		<fieldset>
			<legend>修改文章</legend>
			<p><label for="artiname">文章标题：</label><input type="text" name="artiname" value="<?php echo $row[artiname];?>" required></p>
			<p><label for="articlass">文章分类：</label>
				<select name="articlass">
					<option value="算法">算法</option>
					<option value="前端">前端</option>
					<option value="后端">后端</option>
					<option value="架构">架构</option>
					<option value="liunx">Linux</option>
					<option value="业余">业余</option>
				</select>
			</p>
			<p><label for="artides">文章简介：</label><input type="text" name="artides" value="<?php echo $row[artides];?>"></p>
			<p>
				<label for="artidetail">文章详情：</label>
				<textarea id="editor_id" name="artidetail" style="width:700px;height:300px;">
					<?php echo $row[artidetail];?>
				</textarea>
			</p>
			<p><input type="reset" value="重置信息"><input type="submit" value="修改文章"></p>
		</fieldset>
	</form>
</body>
</html>