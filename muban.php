<?php 

include './function.php';
$token = file_get_contents('./token_data.txt');
// 设置所属行业
// $url = 'https://api.weixin.qq.com/cgi-bin/template/api_set_industry?access_token='.$token;


// $data = '{
//           "industry_id1":"1",
//           "industry_id2":"4"
//        }';

// // 执行
// $res = https_request($url,$data);
// var_dump($res);



// 获取设置的行业信息
// $url = 'https://api.weixin.qq.com/cgi-bin/template/get_industry?access_token='.$token;

// $res = https_request($url);
// var_dump($res);



// 获得模板ID
// $url = 'https://api.weixin.qq.com/cgi-bin/template/api_add_template?access_token='.$token;

// $data = '      {
//            "template_id_short":"TM00001"
//        }';

// $res = https_request($url,$data);
// var_dump($res);



// 获取模板列表
// $url = 'https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token='.$token;
// $res = https_request($url);
// var_dump($res);



// 删除模板

// $url = 'https://api.weixin.qq.com/cgi-bin/template/del_private_template?access_token='.$token;

// $data = ' {
//      "template_id" : "jV2pfwJYFfjRoWeg7yV3xt6hgzKkcPSqn_EnOaAkHqo"
//  }';

// $res = https_request($url,$data);
// var_dump($res);


// 发送模板消息
$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$token;
$data = '{
           "touser":"oqopbxBh3RWE7HZT4xn1zULM8SWU",
           "template_id":"h7eBoPGIUU_SWghqYbBKpXOjRNtW64hyHf_Q8_key34",
           "url":"http://music.baidu.com/song/1264941?fm=altg_new3",         
           "data":{
                   "first": {
                       "value":"恭喜你购买成功！",
                       "color":"#173177"
                   },
                   "keynote1":{
                       "value":"巧克力",
                       "color":"#173177"
                   },
                   "keynote2": {
                       "value":"39.8元",
                       "color":"#173177"
                   },
                   "keynote3": {
                       "value":"2014年9月22日",
                       "color":"#173177"
                   },
                   "remark":{
                       "value":"欢迎再次购买！",
                       "color":"#173177"
                   }
           }
       }';

$res = https_request($url,$data);
var_dump($res);






 ?>