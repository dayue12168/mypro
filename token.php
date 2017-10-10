<?php 
include './function.php';

// get
$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx199e07a40f2b94e7&secret=080b6aa95c137c95e1fb61c7eebfa0b2';

$res = https_request($url);

// 得到accessToken
$data = json_decode($res,true);

// echo $data['access_token'];

file_put_contents('./token_data.txt',$data['access_token']);



 ?>