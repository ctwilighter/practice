
<?php
/**
 * 慕课网视频教学
 * 代码实例-PHP-cURL实战
 * 实例描述：登录慕课网并下载个人空间页面
 */
// $data=array('username' => '1529726299@qq.com', 
// 	'password' => 'woau0919122411',
// 	'remember'=>1);
$data='username=1400570219&passwd=0919122411&login=%B5%C7%A1%A1%C2%BC';
$curlobj = curl_init();			// 初始化
curl_setopt($curlobj, CURLOPT_URL, "http://bkjw2.guet.edu.cn/student/public/login.asp");		// 设置访问网页的URL
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, true);			// 执行之后不直接打印出来

// Cookie相关设置，这部分设置需要在所有会话开始之前设置
date_default_timezone_set('PRC'); // 使用Cookie时，必须先设置时区
curl_setopt($curlobj, CURLOPT_COOKIESESSION, TRUE); 
curl_setopt($curlobj, CURLOPT_COOKIEFILE, 'cookiefile');
curl_setopt($curlobj, CURLOPT_COOKIEJAR, 'cookiefile');
curl_setopt($curlobj, CURLOPT_COOKIE, session_name() . '=' . session_id());
curl_setopt($curlobj, CURLOPT_HEADER, 0); 
curl_setopt($curlobj, CURLOPT_FOLLOWLOCATION, 1);  // 这样能够让cURL支持页面链接跳转

curl_setopt($curlobj, CURLOPT_POST, 1);  
curl_setopt($curlobj, CURLOPT_POSTFIELDS, $data);  
curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded; charset=utf-8", 
	"Content-length: ".strlen($data)
	)); 
curl_exec($curlobj);	// 执行
$sdata=curl_getinfo($curlobj);
curl_setopt($curlobj, CURLOPT_URL, "http://bkjw2.guet.edu.cn/student/stinformation.asp");
curl_setopt($curlobj, CURLOPT_POST, 0);  
curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("Content-type: text/xml"
	)); 
$output=curl_exec($curlobj);	// 执行
curl_close($curlobj);			// 关闭cURL
echo $output;
var_dump($sdata);
?>