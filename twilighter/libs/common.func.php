<?php
/**
 * 弹出消息并跳转
 * @param string $msg
 * @param unknown $url
 */
function alertMsg($msg,$url){
    echo "<script>alert('{$msg}');</script>";
    echo "<script>window.location='{$url}';</script>";
}