<?php 
require_once '../include.php';
checklogined();
$sql="select * from article_cate order by cateid asc";
$rows=fetchAll($sql);
if(!$rows){
    alertMsg("文章没有具体分类，请先添加分类", "addCate.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>添加文章</title>
	<link href="./styles/global.css"  rel="stylesheet"  type="text/css" media="all" />
	<script charset="utf-8" src="../editor/kindeditor.js"></script>
	<script charset="utf-8" src="../editor/lang/zh-CN.js"></script>
	<script type="text/javascript" src="scripts/jquery-1.6.4.js"></script>
	<script>
	    KindEditor.ready(function(K) {
	        window.editor = K.create('#editor_id');
	    });
	    $(document).ready(function(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$filename = $path.substring($path.lastIndexOf("\\")+1);
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="#" title="删除附件">删除</a></div></div>');
        		$attachItem.find(".left").html($filename);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$("#attachList>.attachItem").find('a').live('click',function(obj,i){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	});
        });
	</script>
	<style type="text/css">
		form tr:last-child td{text-align: center;}
		form tr:last-child input:last-child{margin: 0 2em;}
	</style>
</head>
<body>
	<form method="post" action="doAction.php?act=addArticle"  enctype="multipart/form-data">
		<fieldset>
			<legend>添加文章</legend>
			<table width="100%">
				<tr>
					<td><label for="artiname">文章标题：</label></td>
					<td><input type="text" name="artiname" required></td>
				</tr>
				<tr>
					<td><label for="cateid">文章分类：</label></td>
					<td>
						<select name="cateid">
						<?php foreach ($rows as $row):?>
							<option value="<?php echo $row[cateid];?>"><?php echo $row[catename];?></option>
						<?php endforeach;?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="author">文章作者：</label></td>
					<td><input type="text" name="author" value="程艳阳"></td>
				</tr>
				<tr>
					<td><label for="artides">文章简介：</label></td>
					<td>
						<textarea name="artides" style="width:500px;height:150px;"></textarea>
					</td>
				<tr>
					<td><label for="artidetail">文章详情：</label></td>
					<td>
						<textarea id="editor_id" name="artidetail" style="width:500px;height:300px;">
						&lt;strong&gt;HTML内容&lt;/strong&gt;
					</textarea>
					</td>
				</tr>
				<tr>
					<td><label>文章图片：</label></td>
	    			<td>
	    				<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
	    				<div id="attachList" class="clear"></div>
	    			</td>
				</tr>
				<tr>
					<td><label>是否热文：</label></td>
					<td><input type="checkbox" name="ishot" value="1"></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="reset" value="重置信息"><input type="submit" value="添加文章">
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>