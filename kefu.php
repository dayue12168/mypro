<?php 

include './function.php';

$token = file_get_contents('./token_data.txt');


// http请求方式: POST
$url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$token;

$data = '{
    "touser":"oqopbxLGFJ9vGR_mPoLXshZWXhjE",
    "msgtype":"text",
    "text":
    {
         "content":"Hello 阿超"
    }
}';

$res = https_request($url,$data);
var_dump($res);










 ?>