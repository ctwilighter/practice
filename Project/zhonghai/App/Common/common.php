<?php

/**
  + ----------------------------------------
 * common:包含公用文件、创建公用函数
  + ----------------------------------------
 * @File: common.php
 * @Date: 2014-5-7 created by Wull 
  + ----------------------------------------
 * @修订记录:
 * - 
  + ----------------------------------------
 */


/* 截取字符串函数 */

function strcut($string = "", $length = 0, $addstr = "") {
    $j = '';
    preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $info);
    if ($length >= count($info[0])) {
        return $string;
    } else {
        return join('', array_slice($info[0], 0, $length)) . $addstr;
    }
}

function gpc($key, $method = 'REQUEST') {
    $method = strtoupper($method);
    switch ($method) {
        case 'GET': $var = &$_GET;
            break;
        case 'POST': $var = &$_POST;
            break;
        case 'COOKIE': $var = &$_COOKIE;
            break;
        case 'REQUEST': $var = &$_REQUEST;
            break;
    }

    return isset($var[$key]) ? $var[$key] : null;
}


function getSence($catid){
    $where=" and catid = {$catid}";  
    $sence = M('news')->where("status=0 and type = 9 and is_play = 1".$where)->order('sort asc,addtime desc')->find();
//     echo  M('news')->getLastSql();exit;
    if(!$sence){
    $sences = M('news')->where("status=0 and type = 9".$where)->order('sort asc,addtime desc')->find(); 
//   echo  M('news')->getLastSql();exit;
    return $sences; 
    }else{
    return $sence;  
    }
  
}






/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @return mixed
 */
function get_ip($type = 0) {
    $type = $type ? 1 : 0;
    static $ip = NULL;
    if ($ip !== NULL)
        return $ip[$type];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $pos = array_search('unknown', $arr);
        if (false !== $pos)
            unset($arr[$pos]);
        $ip = trim($arr[0]);
    }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u", ip2long($ip));
    $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}


//获取广告
function getAds($tpl){
    if($tpl == 1){
    $ads=M('ads')->where("tpl={$tpl} and status = 0")->select();
    }else{
      $ads=M('ads')->where("tpl={$tpl}")->find();  
    }
    return $ads;
   
}


//获取分类
function getClass($type){
    $class=M('classify')->where("type={$type} and status = 0")->order('sort asc,edittime,addtime desc')->select();
    return $class;
    
}


function message($msg, $redirect = -1, $url = "") {
    if ($redirect == '-1') {
        echo '<!DOCTYPE HTML>
                    <html>
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>提示信息</title>
                    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
                    <meta content="yes" name="apple-mobile-web-app-capable" />
                    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
                    <meta name="format-detection" content="telephone=no" />
                    <meta name="format-detection" content="email=no" />
                    <link rel="stylesheet" type="text/css" href="'.__ROOT__.'/Public/home/css/css.css" />
                    <script src="'.__ROOT__.'/Public/js/jquery-1.9.1.min.js"></script>
                    <script src="'.__ROOT__.'/Public/js/sweetalert.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="'.__ROOT__.'/Public/js/sweetalert.css" />
                    </head>
                    <body>
                    <script language=javascript>
                        swal({"title":"'.$msg.'",confirmButtonText:"确认","closeOnConfirm":true},function(){history.back()});
                     </script>
                    </body>
                    </html>';
        exit;
    }
    if ($redirect == '1') {
        echo '<!DOCTYPE HTML>
                    <html>
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>提示信息</title>
                    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
                    <meta content="yes" name="apple-mobile-web-app-capable" />
                    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
                    <meta name="format-detection" content="telephone=no" />
                    <meta name="format-detection" content="email=no" />
                    <link rel="stylesheet" type="text/css" href="'.__ROOT__.'/Public/home/css/css.css" />
                    <script src="'.__ROOT__.'/Public/js/jquery-1.9.1.min.js"></script>
                    <script src="'.__ROOT__.'/Public/js/sweetalert.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="'.__ROOT__.'/Public/js/sweetalert.css" />
                    </head>
                    <body>
                    <script language=javascript>
                        swal({"title":"'.$msg.'",confirmButtonText:"确认","closeOnConfirm":true},function(){window.location.href=document.referrer});
                     </script>
                    </body>
                    </html>';
        exit;
    }
    if ($redirect == '2') {
        echo '<!DOCTYPE HTML>
                    <html>
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>提示信息</title>
                    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
                    <meta content="yes" name="apple-mobile-web-app-capable" />
                    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
                    <meta name="format-detection" content="telephone=no" />
                    <meta name="format-detection" content="email=no" />
                    <link rel="stylesheet" type="text/css" href="'.__ROOT__.'/Public/home/css/css.css" />
                    <script src="'.__ROOT__.'/Public/js/jquery-1.9.1.min.js"></script>
                    <script src="'.__ROOT__.'/Public/js/sweetalert.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="'.__ROOT__.'/Public/js/sweetalert.css" />
                    </head>
                    <body>
                    <script language=javascript>
                        swal({"title":"'.$msg.'",confirmButtonText:"确认","closeOnConfirm":true},function(){window.location.href="' . $url . '"});
                     </script>
                    </body>
                    </html>';
        exit;
    }
}
/*设置值
 * @param type $key 设置的键
 * @param type $value 设置的值
 */
function setSetting($key,$value){
    $setting=M('setting')->where("k='$key'")->find();
    if($setting){
        $setting['v']=$value;
        M('setting')->save($setting);
    }else{
        $setting['k']=$key;
        $setting['v']=$value;
        M('setting')->add($setting);
    }
}

/**
 * 获取某个系统设置的值
 * @param type $key 获取的设置标识
 * @return $value
 */
function getSetting($key) {
    $value=M('setting')->where("k='$key'")->getField("v");
    return $value;
}


?>