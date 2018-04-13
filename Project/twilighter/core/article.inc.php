<?php
require_once( dirname(dirname(__FILE__)).'\include.php' );

/**
 * 添加文章
 * @return string
 */
function addArticle(){
	$arr=$_POST;
	$arr['puttime']=time();
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$res=insert("article",$arr);
	$artiid=$res;
	if($res&&$artiid){
		foreach($uploadFiles as $uploadFile){
			$arr1['artiid']=$artiid;
			$arr1['albumpath']=$uploadFile['name'];
			addAlbum($arr1);
		}
		$mes="<p>添加成功!</p><a href='addArticle.php'>继续添加</a>|<a href='listArticle.php'>查看文章列表</a>";
	}else{
	    foreach($uploadFiles as $uploadFile){
			if(file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image_800/".$uploadFile['name']);
			}
			if(file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image_50/".$uploadFile['name']);
			}
			if(file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image_220/".$uploadFile['name']);
			}
			if(file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image_350/".$uploadFile['name']);
			}
		}
		$mes="<p>添加失败!</p><a href='addArticle.php' target='myframe'>重新添加</a>";
		
	}
	return $mes;
}

/**
 * 得到所有的文章
 * @return array
 */
function getAllArticle(){
    
    $sql="select * from article,article_cate where article.cateid=article_cate.cateid order by artiid desc";
    $rows=fetchAll($sql);
    return $rows;
}

function getOneArticle($artiid){

    $sql="select * from article,article_cate where article.cateid=article_cate.cateid and artiid={$artiid}";
    $row=fetchOne($sql);
    return $row;
}

function getClassArticle(){
    $articlass=$_REQUEST['articlass'];
    $sql="select * from article where articlass={$articlass}";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 修改文章
 * @return string
 */
function editArticle($id){
    $arr=$_POST;
	$arr['puttime']=time();
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$where="artiid={$id}";
	$res=update("article",$arr,$where);
	$artiid=$id;
	if($res&&$artiid){
		foreach($uploadFiles as $uploadFile){
			$arr1['artiid']=$artiid;
			$arr1['albumpath']=$uploadFile['name'];
			$where="artiid={$artiid}";
			editAlbum($arr1,$where);
		}
		$mes="<p>修改成功!</p><a href='addArticle.php' target='myIframe'>继续添加</a>|<a href='listArticle.php' target='myIframe'>查看文章列表</a>";
	}else{
	    if(is_array($uploadFiles)&&$uploadFiles){
    	    foreach($uploadFiles as $uploadFile){
    			if(file_exists("../image_800/".$uploadFile['name'])){
    				unlink("../image_800/".$uploadFile['name']);
    			}
    			if(file_exists("../image_50/".$uploadFile['name'])){
    				unlink("../image_50/".$uploadFile['name']);
    			}
    			if(file_exists("../image_220/".$uploadFile['name'])){
    				unlink("../image_220/".$uploadFile['name']);
    			}
    			if(file_exists("../image_350/".$uploadFile['name'])){
    				unlink("../image_350/".$uploadFile['name']);
    			}
    		}
	    }
		$mes="<p>添加失败!</p><a href='addArticle.php' target='myIframe'>重新添加</a>";
		
	}
	return $mes;
}

/**
 * 删除文章的操作
 * @param int $id
 * @return string
 */
function delArticle(){
    $id=$_REQUEST['id'];
    if (delete("article","artiid={$id}")){
        $mes="删除成功！<a href='listArticle.php'>查看文章列表</a>";
    }else {
        $mes="删除失败！<a href='listArticle.php'>请重新删除</a>";
    }
    return $mes;
}
