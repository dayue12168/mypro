<?php 

include './function.php';

$url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.Token::getToken().'&openid=oqopbxDfFhD8Pc1N4Fhdds49s95M&lang=zh_CN';

// get
$res = https_request($url);

var_dump($res);



















 ?>