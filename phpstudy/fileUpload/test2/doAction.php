<?php

// 接收表单，调用封装好的文件上传方法uploadFile()实现上传
$fileInfo = $_FILES['myFile'];
$res = uploadFile($fileInfo);
echo $res;



/*
 *   返回一个字符串提示结果
 *   fileInfo - 表单中上传<input type="file" ../>的name
 *   path文件 - 保存的路径
 *   allowExt - 允许上传的文件类型
 *   maxSize - 上传文件的最大文件大小
 *   imgFlag - 判断文件是否是真的图片,bool值
 */
function uploadFile($fileInfo,$path = "uploads",$allowExt = array("gif","jpeg","jpg","png","wbmp"),$maxSize = 1048576,$imgFlag = true){
    if($fileInfo['error'] == UPLOAD_ERR_OK){
        $ext = getExt($fileInfo['name']);
        if(!in_array($ext, $allowExt)){
            exit("非法文件类型！");
        }
        if($fileInfo['size'] > $maxSize){
            exit("文件过大！");
        }
        if($imgFlag){
            $info = getimagesize($fileInfo['tmp_name']);
            if(!$info){
                exit("不是真正的图片类型!");
            }
        }
        $filename = getUniName().".".$ext;
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $destination = $path."/".$filename;
        if(is_uploaded_file($fileInfo['tmp_name'])){
    
            if(move_uploaded_file($fileInfo['tmp_name'], $destination)){
                $mes = "文件上传成功！";
            }else{
                $mes = "文件移动失败！";
            }
        }else{
            $mes = "文件不是通过 HTTP POST 方式上传的";
        }
    }else{
        switch ($fileInfo['error']){
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
    return $mes;
}


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