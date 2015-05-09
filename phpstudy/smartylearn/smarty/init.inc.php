<?php
define("ROOT", str_replace("\\", "/", dirname(__FILE__)));

require "lib-smarty/Smarty.class.php";
$smarty = new Smarty();
$smarty->setTemplateDir(ROOT.'/templates/');	//模板目录
$smarty->setCompileDir(ROOT.'/templates_c/');	//模板编译目录
$smarty->setCacheDir(ROOT.'/cache/');		//缓存目录
$smarty->caching = true;

//var_dump($smarty);



?>