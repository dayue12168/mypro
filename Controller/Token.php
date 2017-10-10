<?php 

/**
* token 类
*/
class Token
{

	public static $tokenFile = './token.txt'; // 缓存文件
	public static $tokenExpireTime = 3600; // 缓存时间

	
	// 入口方法
	public static function getToken(){
		// 判断 缓存 合法 (存在 过期)
		if ( !self::checkTokenFileExists() || self::checkTokenFileExpire() ){
			// 缓存 不合法
			$res = self::requesToken();
			// 写入缓存 更新
			self::writeToken($res);

			return $res;


		}else{
			// 缓存合法
			return self::readToken();
		}

		}


	// 请求方法
	public static function requesToken(){
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx199e07a40f2b94e7&secret=080b6aa95c137c95e1fb61c7eebfa0b2';

		$res = https_request($url);

		// 得到accessToken
		$data = json_decode($res,true);

		// $data['access_token']
		if ( !empty($data['access_token']) ) {
			return $data['access_token'];
			
		}else{
			return false;
		}

	}


	// 写入缓存
	public static function writeToken($res){
		file_put_contents(self::$tokenFile,$res);
	}


	// 读取缓存
	public static function readToken(){
		return file_get_contents(self::$tokenFile);
	}


	// 判断缓存  是否存在
	public static function checkTokenFileExists(){
		return file_exists(self::$tokenFile);
	}

	// 判断缓存 是否有效
	public static function checkTokenFileExpire(){
		// 当前时间  - 文件生成时间         有效期
		return filemtime(self::$tokenFile) + self::$tokenExpireTime < time();
	}


}









 ?>