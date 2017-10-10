<?php
/**
  * wechat php test
  */

//define your token
// 接收微信发过来的  用户的消息
$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
// echo $postStr; 不可以直接打印 微信会拿走这数据
// 我们可以把数据放在另外一个地方
file_put_contents('./data.txt', $postStr);


// 开启xml保护模式
libxml_disable_entity_loader(true);
// 转换xml对象
$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
$fromUsername = $postObj->FromUserName;  // 用户id
$toUsername = $postObj->ToUserName;      // 商户id
$keyword = trim($postObj->Content);      // 用户内容
$time = time();
$eventKey = $postObj->EventKey;
// 自定义菜单事件 
// 根据不同的key 进行不同的回复
// today_music  回复 音乐消息
// good  回复一个图文 语音消息


switch ( $eventKey ) {
    case 'V1001_GOOD':
        $textTpl = '<xml>
                    <ToUserName><![CDATA['.$fromUsername.']]></ToUserName>
                    <FromUserName><![CDATA['.$toUsername.']]></FromUserName>
                    <CreateTime>'.$time.'</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[你好,s67]]></Content>
                    </xml>';
        echo $textTpl;
        break;
    
    case 'V1001_TODAY_MUSIC':
        $musicTpl = '<xml>
                    <ToUserName><![CDATA['.$fromUsername.']]></ToUserName>
                    <FromUserName><![CDATA['.$toUsername.']]></FromUserName>
                    <CreateTime>'.$time.'</CreateTime>
                    <MsgType><![CDATA[music]]></MsgType>
                    <Music>
                    <Title><![CDATA[分手快乐]]></Title>
                    <Description><![CDATA[鹿晗和关晓彤]]></Description>
                    <MusicUrl><![CDATA[http://music.baidu.com/song/1264941?fm=altg_new3]]></MusicUrl>
                    <HQMusicUrl><![CDATA[http://music.baidu.com/song/1264941?fm=altg_new3]]></HQMusicUrl>
                    <ThumbMediaId><![CDATA[_7BEfHLWVBuFTXdbL2j7G3heZEkhOmtTArxyZAomCLj-KBGR4Cu6dmsSanzxS4WK]]></ThumbMediaId>
                    </Music>
                    </xml>';
        echo $musicTpl;
        break;
    default:
         $textTpl = '<xml>
                    <ToUserName><![CDATA['.$fromUsername.']]></ToUserName>
                    <FromUserName><![CDATA['.$toUsername.']]></FromUserName>
                    <CreateTime>'.$time.'</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[你好,s67]]></Content>
                    </xml>';
        echo $textTpl;

        # code...
        break;
}


exit;









$textTpl = '<xml>
<ToUserName><![CDATA['.$fromUsername.']]></ToUserName>
<FromUserName><![CDATA['.$toUsername.']]></FromUserName>
<CreateTime>'.$time.'</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[你好,s67]]></Content>
</xml>';


$imgTpl = '<xml>
<ToUserName><![CDATA['.$fromUsername.']]></ToUserName>
<FromUserName><![CDATA['.$toUsername.']]></FromUserName>
<CreateTime>'.$time.'</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
<Image>
<MediaId><![CDATA[_7BEfHLWVBuFTXdbL2j7G3heZEkhOmtTArxyZAomCLj-KBGR4Cu6dmsSanzxS4WK]]></MediaId>
</Image>
</xml>';


$voiceTpl = '<xml>
<ToUserName><![CDATA['.$fromUsername.']]></ToUserName>
<FromUserName><![CDATA['.$toUsername.']]></FromUserName>
<CreateTime>'.$time.'</CreateTime>
<MsgType><![CDATA[voice]]></MsgType>
<Voice>
<MediaId><![CDATA[-htAvry0QQNbAzkHDi8KadpnEuoBNB5TgtoqSu0vqvl1EannLdN3aUJvrY7CYGcw]]></MediaId>
</Voice>
</xml>';

$musicTpl = '<xml>
<ToUserName><![CDATA['.$fromUsername.']]></ToUserName>
<FromUserName><![CDATA['.$toUsername.']]></FromUserName>
<CreateTime>'.$time.'</CreateTime>
<MsgType><![CDATA[music]]></MsgType>
<Music>
<Title><![CDATA[分手快乐]]></Title>
<Description><![CDATA[鹿晗和关晓彤]]></Description>
<MusicUrl><![CDATA[http://music.baidu.com/song/1264941?fm=altg_new3]]></MusicUrl>
<HQMusicUrl><![CDATA[http://music.baidu.com/song/1264941?fm=altg_new3]]></HQMusicUrl>
<ThumbMediaId><![CDATA[_7BEfHLWVBuFTXdbL2j7G3heZEkhOmtTArxyZAomCLj-KBGR4Cu6dmsSanzxS4WK]]></ThumbMediaId>
</Music>
</xml>';

$newsTpl = '<xml>
<ToUserName><![CDATA['.$fromUsername.']]></ToUserName>
<FromUserName><![CDATA['.$toUsername.']]></FromUserName>
<CreateTime>'.$time.'</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>2</ArticleCount>
<Articles>
<item>
<Title><![CDATA[鹿晗关晓彤公布恋情]]></Title> 
<Description><![CDATA[鹿茸死了一堆]]></Description>
<PicUrl><![CDATA[https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=16603519,1388418425&fm=58]]></PicUrl>
<Url><![CDATA[https://www.baidu.com/s?ie=UTF-8&wd=luhan]]></Url>
</item>
<item>
<Title><![CDATA[sina服务器崩溃]]></Title>
<Description><![CDATA[员工结婚中折返维修服务器]]></Description>
<PicUrl><![CDATA[https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=2957043501,255162184&fm=58&s=2CA2A91ACCB44C801E7194D6010000B1]]></PicUrl>
<Url><![CDATA[https://www.baidu.com/s?ie=utf-8&f=8&rsv_bp=1&tn=baidu&wd=sina%20&oq=%25E9%25B9%25BF%25E6%2599%2597&rsv_pq=afaf08380000ac53&rsv_t=cb79WBGNtPsKkRZRX5ArkB09DT5d%2FkglfGthPmdZyM%2FNVz8n3CMa8D0%2FrZE&rqlang=cn&rsv_enter=1&rsv_sug3=7&rsv_sug2=0&inputT=2072&rsv_sug4=2781]]></Url>
</item>
</Articles>
</xml>';



// 作业1 

// 判断 keyword 1
// 根据用户回复的不同内容 进行不同的内容展示

// switch ($keyword) {
//     case '文本':
//             echo $textTpl;
//         break;
    
//     default:
//         # code...
//         break;
// }




echo $newsTpl;




exit;





define("TOKEN", "s67"); // token stats

$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "Welcome to wechat world!";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "";
        	exit;
        }
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        // 接收参数
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;

        // 把参数 压如数组
		$tmpArr = array($token, $timestamp, $nonce);

        // use SORT_STRING rule
        // 字典序排序
		sort($tmpArr, SORT_STRING);

        // 切割数组
		$tmpStr = implode( $tmpArr );
        // 哈希加密
		$tmpStr = sha1( $tmpStr );
		
        // 判断   加密后参数  对比  传递来的加密签名
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>