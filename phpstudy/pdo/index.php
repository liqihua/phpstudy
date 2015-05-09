<?php

$dns = 'mysql:dbname=test;host=127.0.0.1';
$user = 'root';
$pwd = '';
try{
	$db = new PDO($dns,$user,$pwd);
	// 设置PDO的错误处理模式为抛出异常
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	// query()查询

	/*$sql1 = "select cname from category";
	$statement = $db->query($sql1);
	foreach ($statement as $row) {
		var_dump($row);
	}*/


	// exec()修改

	/*$sql2 = "update category set cname='家电办公3' where cid=6";
	$affected = $db->exec($sql2);
	var_dump($affected);*/


	// prepare()准备sql，:参数名 作占位符，bindParam()传参，execute()执行

	/*$sql = "insert into person (name,address,phone) values (:name,:address,:phone)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':address',$address);
	$stmt->bindParam(':phone',$phone);
	$name = 'liqihua'; $address = 'jiangmen'; $phone = '13580389054';
	$stmt->execute();
	$name = 'lisiwei'; $address = 'shenzhen'; $phone = '11111111111';
	$stmt->execute();*/


	// prepare()准备sql，? 作占位符，bindParam()传参，execute()执行

	/*$sql = "insert into person (name,address,phone) values (?,?,?)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(1,$name);
	$stmt->bindParam(2,$address);
	$stmt->bindParam(3,$phone);
	$name = 'liqihua'; $address = 'jiangmen'; $phone = '13580389054';
	$stmt->execute();
	$name = 'lisiwei'; $address = 'shenzhen'; $phone = '11111111111';
	$stmt->execute();*/


	// prepare()准备sql，:参数名 作占位符，execute(数组)执行，用:参数名 作占位符必须传递关联数组，并且下标要与命名参数名称一一对应
	
	/*$sql = "insert into person (name,address,phone) values (:name,:address,:phone)";
	$stmt = $db->prepare($sql);
	$arr = array(":name"=>"yuxiaolong",":address"=>"huizhou",":phone"=>"222222222222");
	$stmt->execute($arr);
	$arr = array(":name"=>"maijiachao",":address"=>"foshan",":phone"=>"333333333333");
	$stmt->execute($arr);*/


	// prepare()准备sql，? 作占位符，execute(数组)执行，用:?作占位符必须传递索引数组
	/*$sql = "insert into person (name,address,phone) values (?,?,?)";
	$stmt = $db->prepare($sql);
	$arr = array("yuxiaolong","huizhou","222222222222");
	$stmt->execute($arr);
	$arr = array("maijiachao","foshan","333333333333");
	$stmt->execute($arr);*/


	// fetch()获取数据，fetch()将结果集中当前行的记录以某种方式返回，并将结果集指针向下移一行，达到结果集末尾返回false
	
	/*$sql = "select * from person";
	$stmt = $db->query($sql);*/
	/*
		PDO::FETCH_ASSOC 		以列名为索引返回关联数组
		PDO::FETCH_NUM			以列在行中的偏移为索引的数组
		PDO::FETCH_BOTH 		默认值，包含上面两种
		PDO::FETCH_BOJ			从当前行的记录中获取其属性对应各个列名的一个对象
		PDO::FETCH_BOUND		将获取的列值赋给在bindParm()方法中指定的相应变量
		PDO::FETCH_LAZY			创建关联数组和索隐数组，以及包含列属性的一个对象，从而可以3选一
	*/
	/*while($arr = $stmt->fetch(PDO::FETCH_NUM)){
		var_dump($arr);
	}*/


	// fetchAll()获取数据，参数比fetch()多一个，PDO::FETCH_COLLUMN,从结果集中返回通过该参数提供的索引所指定列的所有值
	/*$sql = "select * from person where name = ?";
	$stmt = $db->prepare($sql);
	$arr = array("liqihua");
	$stmt->execute($arr);
	$allRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	var_dump($allRows);*/

	// 事务处理
	$db->beginTransaction();

	$sql1 = "update person set name='abc' where id = 3";
	$sql2 = "update person set namee='abc' where id = 12";
	$db->exec($sql1);
	$db->exec($sql2);

	$db->commit();



}catch(PDOException $e){
	echo 'error:'.$e->getMessage();
	$db->rollback();
}

/*echo $db->getAttribute(PDO::ATTR_AUTOCOMMIT)."<br>";
echo $db->getAttribute(PDO::ATTR_ERRMODE)."<br>";
echo $db->getAttribute(PDO::ATTR_CASE)."<br>";
echo $db->getAttribute(PDO::ATTR_CONNECTION_STATUS)."<br>";
echo $db->getAttribute(PDO::ATTR_ORACLE_NULLS)."<br>";
echo $db->getAttribute(PDO::ATTR_PERSISTENT)."<br>";
echo $db->getAttribute(PDO::ATTR_SERVER_INFO)."<br>";
echo $db->getAttribute(PDO::ATTR_SERVER_VERSION)."<br>";
echo $db->getAttribute(PDO::ATTR_CLIENT_VERSION)."<br>";*/

