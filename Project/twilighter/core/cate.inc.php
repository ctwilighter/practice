<?php
require_once( dirname(dirname(__FILE__)).'\include.php' );
/**
 * 添加分类的操作
 * @return string
 */
function addCate(){
    $arr=$_POST;
    if (insert("article_cate", $arr)){
        $mes="分类添加成功！<a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
    }else{
        $mes="分类添加失败！<a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
    }
    return $mes;
}

/**
 * 根据ID得到指定信息
 * @param int $id
 */
function getCateById($id){
    $sql="select id,cName from article_cate where id={$id}";
    return fetchOne($sql);
}

/**
 * 修改分类的操作
 * @param string $where
 * @return string
 */
function editCate($where){
    $arr=$_POST;
    if (update("article_cate", $arr,$where)){
        $mes="分类修改成功！<a href='listCate.php'>查看分类</a>";
    }else{
        $mes="分类修改失败！<a href='listCate.php'>重新修改</a>";
    }
    return $mes;
}

/**
 * 删除分类
 * @param string $where
 * @return string
 */
function delCate($where){
    if(delete("article_cate","cateid={$where}")){
        $mes="分类删除成功！<a href='listCate.php'>查看分类</a>|<a href='addCate.php'>添加分类</a>";
    }else{
        $mes="分类删除失败！<a href='listCate.php'>请重新操作！</a>";
    }
    return $mes;
}