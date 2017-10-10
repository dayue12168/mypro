<?php 

include './function.php';
// $token = file_get_contents('./token_data.txt');

$token = Token::getToken();
var_dump($token);


// post
$url = 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='.$token;

$data = '{
   "touser":[
    "oqopbxBh3RWE7HZT4xn1zULM8SWU",
    "oqopbxLAzbfPvHidc_BmVmjO4TzE"
   ],
    "msgtype": "text",
    "text": { "content": "我请你们吃屎 --管超"}
}';


$res = https_request($url, $data);

var_dump($res);














 ?>