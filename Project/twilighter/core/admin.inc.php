<?php
require_once( dirname(dirname(__FILE__)).'\include.php' );
/**
 * 检查管理员是否存在
 * @param unknown $sql
 */
function checkAdmin($sql){
    return fetchOne($sql);
}

/**
 * 检查是否有管理员登陆
 * 
 */
function checklogined(){
    if ($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
        alertMsg("请先登录", "login.php");
    }
}

/**
 * 添加管理员
 * @return string
 */
function addAdmin(){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    if(insert("web_admin", $arr)){
        $mes="添加成功！<br /><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员</a>";
    }else {
        $mes="添加失败！<br /><a href='addAdmin.php'>重新添加</a>";
    }
    return $mes;
}

/**
 * 得到所有的管理员
 * @return array
 */
function getAllAdmin(){
    
    $sql="select adminid,username,password,email from web_admin";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 * 修改管理员
 * @return string
 */
function editAdmin(){
    $arr=$_POST;
    $id=$_REQUEST['id'];
    $arr['password']=md5($_POST['password']);
    if (update("web_admin", $arr,"adminid={$id}")){
        $mes="编辑成功！<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes="编辑失败！<a href='listAdmin.php'>请重新修改</a>";
    }
    return $mes;
}

/**
 * 删除管理员的操作
 * @param int $id
 * @return string
 */
function delAdmin(){
    $id=$_REQUEST['id'];
    if (delete("web_admin","adminid={$id}")){
        $mes="删除成功！<a href='listAdmin.php'>查看管理员列表</a>";
    }else {
        $mes="删除失败！<a href='listAdmin.php'>请重新删除</a>";
    }
    return $mes;
}

/**
 * 注销管理员
 */
function logout(){
    $_SESSION=array();
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(),time()-1);
    }
    if (isset($_COOKIE['adminId'])){
        setcookie("adminId","",time()-1);
    }
    if (isset($_COOKIE['adminName'])){
        setcookie("adminName","",time()-1);
    }
    session_destroy();
    header("location:login.php");
}

/**
 * 添加用户的操作
 * @param int $id
 * @return string
 */
function addUser(){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    $arr['regTime']=time();
    $uploadFile=uploadFile("../uploads");
    if($uploadFile&&is_array($uploadFile)){
        $arr['face']=$uploadFile[0]['name'];
    }else{
        return "添加失败<a href='addUser.php'>重新添加</a>";
    }
    if(insert("web_user", $arr)){
        $mes="添加成功!<br/><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看列表</a>";
    }else{
        $filename="../uploads/".$uploadFile[0]['name'];
        if(file_exists($filename)){
            unlink($filename);
        }
        $mes="添加失败!<br/><a href='arrUser.php'>重新添加</a>|<a href='listUser.php'>查看列表</a>";
    }
    return $mes;
}
/**
 * 删除用户的操作
 * @param int $id
 * @return string
 */
function delUser($id){
    $sql="select face from web_user where id=".$id;
    $row=fetchOne($sql);
    $face=$row['face'];
    if(file_exists("../uploads/".$face)){
        unlink("../uploads/".$face);
    }
    if(delete("web_user","id={$id}")){
        $mes="删除成功!<br/><a href='listUser.php'>查看用户列表</a>";
    }else{
        $mes="删除失败!<br/><a href='listUser.php'>请重新删除</a>";
    }
    return $mes;
}
/**
 * 编辑用户的操作
 * @param int $id
 * @return string
 */
function editUser($id){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    if(update("web_user", $arr,"id={$id}")){
        $mes="编辑成功!<br/><a href='listUser.php'>查看用户列表</a>";
    }else{
        $mes="编辑失败!<br/><a href='listUser.php'>请重新修改</a>";
    }
    return $mes;
}