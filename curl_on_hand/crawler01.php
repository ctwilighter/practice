<?php
$curl=curl_init('http://www.baidu.com');
curl_exec($curl);
$data = curl_getinfo($curl);
var_dump($data);
curl_close($curl);
?>