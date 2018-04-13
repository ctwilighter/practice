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
function status($status, $imageShow = true) {
    switch ($status) {
        case -1 :
            $showText = '禁止';
            $showImg = '<IMG SRC="__PUBLIC__/admin/images/onError.gif" WIDTH="25" HEIGHT="25" BORDER="0" ALT="禁止" title="禁止">';
            break;
        case 0 :
            $showText = '正常';
            $showImg = '<IMG SRC="__PUBLIC__/admin/images/onCorrect.gif" WIDTH="25" HEIGHT="25" BORDER="0" ALT="正常" title="正常">';
            break;
        case 1 :
            $showText = '推荐';
            $showImg = '<IMG SRC="__PUBLIC__/admin/images/onCorrect.gif" WIDTH="25" HEIGHT="25" BORDER="0" ALT="推荐" title="推荐">';
            break;
        case 2 :
            $showText = '置顶';
            $showImg = '<IMG SRC="__PUBLIC__/admin/images/onCorrect.gif" WIDTH="25" HEIGHT="25" BORDER="0" ALT="置顶" title="置顶">';
            break;
    }
    return ($imageShow === true) ? $showImg : $showText;
}

//获取页面
function getTpl($a) {
    switch ($a) {
        case 1:
           return "首页幻灯片";
            break;
        case 2:
            return "认识新鸿";
            break;
        case 3:
           return "设计团队";
            break;
        case 4:
            return "装修案例";
            break;
        case 5:
           return "活动预览";
            break;
        case 6:
           return "合作品牌";
            break;
        case 7:
            return "建材产品";
            break;
        case 8:
            return "装修学院";
            break;
        case 9:
            return "单页头部";
            break;
    }
}



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
                    <link type="text/css" rel="stylesheet" href="' . __ROOT__ . '/Public/js/showBo.css" />
                    <script type="text/javascript" src="' . __ROOT__ . '/Public/js/showBo.js"></script>
                    </head>
                    <body>
                    <script language=javascript>
                    Showbo.Msg.kk("' . $msg . '",function(){history.back();});
                    </script>
                    </body>
                    </html>';
        exit;
    }
    if ($redirect == '1') {
        //刷新
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
                    <link type="text/css" rel="stylesheet" href="' . __ROOT__ . '/Public/js/showBo.css" />
                    <script type="text/javascript" src="' . __ROOT__ . '/Public/js/showBo.js"></script>
                    </head>
                    <body>
                    <script language=javascript>
                       Showbo.Msg.kk("' . $msg . '",function(){window.location.href=document.referrer});
                     </script>
                    </body>
                    </html>';
        exit;
    }
    if ($redirect == '2') {
        //跳转页面
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
                    <link type="text/css" rel="stylesheet" href="' . __ROOT__ . '/Public/js/showBo.css" />
                    <script type="text/javascript" src="' . __ROOT__ . '/Public/js/showBo.js"></script>
                    </head>
                    <body>
                    <script language=javascript>
                         Showbo.Msg.kk("' . $msg . '",function(){window.location.href="' . $url . '"});
                     </script>
                    </body>
                    </html>';
        exit;
    }
    if ($redirect == '3') {
// "window.location.href"、"location.href"是本页面跳转.
//"parent.location.href" 是上一层页面跳转.
//"top.location.href" 是最外层的页面跳转.
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
                    <script src="' . __ROOT__ . '/Public/js/sweet-alert.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="' . __ROOT__ . '/Public/js/sweet-alert.css" />
                    </head>
                    <body>
                    <script language=javascript>
                        Showbo.Msg.kk("' . $msg . '",function(){parent.window.location.href="' . $url . '"});
                     </script>
                    </body>
                    </html>';
        exit;
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


//获取分类
function getClass($type){
    $class=M('classify')->where("type={$type} and status = 0")->order('sort asc,edittime desc')->select();
    return $class;
    
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

/**
 * 获取某个系统设置的值
 * @param type $key 获取的设置标识
 * @return $value
 */
function getSetting($key) {
    $value = M('setting')->where("k='$key'")->getField("v");
    return $value;
}

/**
 * 更新系统设置值
 * @param type $key 设置的键
 * @param type $value 设置的值
 */
function setSetting($key, $value) {
    $setting = M('setting')->where("k='$key'")->find();
    if ($setting) {
        $set['v'] = $value;
        M('setting')->where("k='$key'")->save($set);
    } else {
        $setting['k'] = $key;
        $setting['v'] = $value;
        return M('setting')->add($setting);
    }
}

/**
 * 创建$length位随机字符
 */
function getRandom($length) {
    $time = time();
    $key = "";
    $pattern = '1234567890';
    for ($i = 0; $i < $length; $i++) {
        $key .= $pattern{mt_rand(0, 9)};
    }
    return $key . substr($time, -3);
}

?>
