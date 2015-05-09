<?php

$filename = $_FILES['myFile']['name'];
$type = $_FILES['myFile']['type'];
$tmp_name = $_FILES['myFile']['tmp_name'];
$error = $_FILES['myFile']['error'];
$size = $_FILES['myFile']['size'];
/*
 * 规定允许上传的文件扩展名、大小1M
 */
$allowExt = array("gif","jpeg","jpg","png","wbmp");
$maxSize = 1024*1024;
/*
 * 验证一个图片是否是真正的图片类
 */
$imgFlag = true;
/*
 * 如果没有发生错误
 */
if($error == UPLOAD_ERR_OK){
    /*
     * 调用string.func.php 的 getExt() 获取文件扩展名
     */
    $ext = getExt($filename);
    /*
     * 判断上传的的文件类型是否合法、大小
     */
    if(!in_array($ext, $allowExt)){
        exit("非法文件类型！");
    }
    if($size > $maxSize){
        exit("文件过大！");
    }
    /*
     * 验证图片是否是真正的图片类型，防止病毒
     */
    if($imgFlag){
        $info = getimagesize($tmp_name);
        if(!$info){
            exit("不是真正的图片类型!");
        }
    }
    /*
     * 调用string.func.php 的 getUniName() 生成唯一文件名,再与 $ext 并接
     */
    $filename = getUniName().".".$ext;
    /*
     * 目标文件
     */
    $path = "uploads";
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }
    $destination = $path."/".$filename;
    
    /*
     * is_uploaded_file()判断文件是否以 HTTP POST 方式上传过来的,参数放的是临时文件名称
     */
    if(is_uploaded_file($tmp_name)){
        
        if(move_uploaded_file($tmp_name, $destination)){
            $mes = "文件上传成功！";
        }else{
            $mes = "文件移动失败！";
        }
    }else{
        $mes = "文件不是通过 HTTP POST 方式上传的";
    }
}else{      // 如果发生错误
    switch ($error){
        case 1:
            $mes = "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
            break;
        case 2:
            $mes = "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的";
            break;
        case 3:
            $mes = "文件只有部分被上传";
            break;
        case 4:
            $mes = "没有文件被上";
            break;
        case 6:
            $mes = "没有找到临时目录";
            break;
        case 7:
            $mes = "文件不可写";
            break;
    }
}
echo $mes;


/*
   UPLOAD_ERR_OK            值：0; 没有错误发生，文件上传成功。 
   UPLOAD_ERR_INI_SIZE      值：1; 上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。 
   UPLOAD_ERR_FORM_SIZE     值：2; 上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。 
   UPLOAD_ERR_PARTIAL       值：3; 文件只有部分被上传。 
   UPLOAD_ERR_NO_FILE       值：4; 没有文件被上传。 
                            值：5; 上传文件大小为0
   UPLOAD_ERR_NO_TEM_DIR    值：6; 没有找到临时目录
                            值：7; 文件不可写
 */




/*
 * 生成唯一文件名的方法
 */
function getUniName(){
    return md5(uniqid(microtime(true),true));
}
/*
 * 得到文件扩展名的方法
 */
function getExt($filename){
    $arr = explode(".", $filename);
    $ext = strtolower(end($arr));
    return $ext;
}




