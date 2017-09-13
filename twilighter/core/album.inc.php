<?php 
/**
 * 添加相册
 * @param unknown $arr
 */
function addAlbum($arr){
	insert("web_album", $arr);
}

function editAlbum($arr,$where){
    update("web_album", $arr,$where);
}

/**
 * 根据商品id得到商品图片
 * @param int $id
 * @return array
 */
function getProImgById($id){
	$sql="select albumpath from web_album where artiid={$id} limit 1";
	$row=fetchOne($sql);
	return $row;
}

/**
 * 根据商品id得到所有图片
 * @param int $id
 * @return array
 */
function getArticleImgsById($id){
	$sql="select albumpath from web_album where pid={$id} ";
	$rows=fetchAll($sql);
	return $rows;
}
/**
 * 文字水印的效果
 * @param int $id
 * @return string
 */
function doWaterText($id){
	$rows=getArticleImgsById($id);
	foreach($rows as $row){
		$filename="../image_800/".$row['albumpath'];
		waterText($filename);
	}
	$mes="操作成功";
	return $mes;
}

/**
 *图片水印
 * @param int $id
 * @return string
 */
function doWaterPic($id){
	$rows=getProImgsById($id);
	foreach($rows as $row){
		$filename="../image_800/".$row['albumPath'];
		waterPic($filename);
	}
	$mes="操作成功";
	return $mes;
}




