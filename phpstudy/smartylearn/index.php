<?php
require 'smarty/init.inc.php';

$smarty->assign("aa","liqihua");
$smarty->assign("bb","lisiwei");


$arr1 = array("a","b","c");
$smarty->assign("arr1",$arr1);

$arr2 = array("caonima",'to'=>'lisiwei');
$smarty->assign("arr2",$arr2);

$arr3 = array(
	"caonima",
	'to'=>'lisiwei',
	'word'=>array('do'=>'funk','you'));
$smarty->assign("arr3",$arr3);

$num = 6;
$smarty->assign("num",$num);

$arr4 = array(
	'zhoujielun'=>array('name'=>'zhoujielun','age'=>30,'phone'=>'1111111'),
	'xijinping'=>array('name'=>'xijinping','age'=>60,'phone'=>'22222222'),
	'yuanjunying'=>array('name'=>'yuanjunying','age'=>40,'phone'=>'333333333'));
$smarty->assign("arr4",$arr4);



$smarty->display("test1.html");