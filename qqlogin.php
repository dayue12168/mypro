<?php 

include './function.php';
$code = $_GET['code'];
// Step3：通过Authorization Code获取Access Token
$token_url = 'https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=101345802&client_secret=8a25a4f7ea5b6da7ee99afb573d68422&code='.$code.'&state=s67&redirect_uri=http://www.wcb1996.cc/qqlogin.php';

$token_res = https_request($token_url);
// var_dump($token_res);
$data = explode('&', $token_res);
$data = explode('=',$data[0]);
$token = $data[1];

var_dump($token);


// Step4：使用Access Token来获取用户的OpenID

$openid_url  = 'https://graph.qq.com/oauth2.0/me?access_token='.$token;
$openid_res = https_request($openid_url);

if (strpos($openid_res, "callback") !== false)
   {
      $lpos = strpos($openid_res, "(");
      $rpos = strrpos($openid_res, ")");
      $openid_res  = substr($openid_res, $lpos + 1, $rpos - $lpos -1);
   }

$openid_res = json_decode($openid_res,true);
$openid = $openid_res['openid'];
var_dump($openid);


// Step5：使用Access Token以及OpenID来访问和修改用户数据
$userinfo_url = 'https://graph.qq.com/user/get_user_info?access_token='.$token.'&oauth_consumer_key=101345802&openid='.$openid;

$userinfo_res = https_request($userinfo_url);

echo "<br/>";
var_dump($userinfo_res);














 ?>