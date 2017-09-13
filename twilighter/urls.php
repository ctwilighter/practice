<?php
$urls = array(
    'http://www.twilighter.cn/index.php',
    'http://www.twilighter.cn/about_me.php',
    'http://www.twilighter.cn/essay.php',
    'http://www.twilighter.cn/clessay.php',
    'http://www.twilighter.cn/detail.php',
    'http://www.twilighter.cn/message.php',

);
$api = 'http://data.zz.baidu.com/urls?site=www.twilighter.cn&token=boBEf4vLJYZnynLh';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo $result;

?>