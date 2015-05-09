<?php


// 放缓存
function putCache(){
	echo "come !";
	$link = mysql_connect("127.0.0.1","root","");
	mysql_select_db("shop");

	$sql = "select * from user";
	$res = mysql_query($sql);
	$records = mysql_fetch_array($res);

	$file = 'mycache.txt';
	$output = serialize($records);		//把数组序列化
		
	$fp = fopen($file,"w");				//以写的方式打开一个文件流
	fputs($fp,$output);					//写入
	fclose($fp);
	return $records;
}


// 获取缓存
function getCache1(){
	$file = "mycache.txt";
	//$records = unserialize(implode('', file($file)));			//file()把整个文件读入一个数组，implode()将一个一维数组转化成字符串，下面file_get_contents()可取代
	$records = unserialize(file_get_contents($file));
	return $records;
}


// 使用周期控制缓存
function getCache2(){
	$records = "";
	$file = 'mycache.txt';
	$expire = 86400;			//24小时：秒
	// filemtime()获取文件的修改时间，如果修改时间+周期 >　当前时间，还没过期
	if(file_exists($file) && ( filemtime($file) + $expire ) > time() ){
		$records = getCache1();
	}else{ 		//过期
		$records = putCache();
	}
	return $records;
}

//putCache();
//$records = getCache1();
$records = getCache2();


var_dump($records);