<?php 

// 模拟 http 请求
function https_request($url,$data = null)
{
	// curl 初始化
	$curl = curl_init();


	// curl 设置
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	
	// 判断 $data get  or post
	if ( !empty($data) ) {
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	}

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	// 执行
	$res = curl_exec($curl);
	curl_close($curl);
	return $res;

}






// 自动加载类
function __autoload($className)
{
	if ( file_exists('./Controller/'.$className.'.php') ) {
		include './Controller/'.$className.'.php';
	}
}





 ?>