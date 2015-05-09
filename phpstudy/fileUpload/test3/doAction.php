<?php

$uploadedInfo = uploadFile();
var_dump($uploadedInfo);


/*
 * 返回一个数组
 * 构建上传文件数组，不关表单提交过来的是多文件上传，单文件上传，还是多个单文件上传，都把表单提交过来的$_FILES
 * 处理成一个数组
 */
function buildInfo(){
    $i = 0;
    foreach ($_FILES as $v){
        $bool = is_string($v['name']);
        if($bool){      //单文件
            $files[$i] = $v;
            $i++;
        }else{      //多文件
            foreach ($v['name'] as $key => $val){
                $files[$i]['name'] = $val;
                $files[$i]['size'] = $v['size'][$key];
                $files[$i]['tmp_name'] = $v['tmp_name'][$key];
                $files[$i]['error'] = $v['error'][$key];
                $files[$i]['type'] = $v['type'][$key];
                $i++;
            }
        }
    }
    return $files;
}
/*
 *  文件上传的实现方法
 *  path - 文件保存的路径
 *  allowExt - 允许上传的文件类型
 *  maxSize - 上传文件的最大文件大小
 *  imgFlag - 判断文件是否是真的图片,bool值
 *  返回上传成功的文件名称
 */
function uploadFile($path = "uploads",$allowExt=array("gif","jpeg","png","jpg","wbmp"),$maxSize=1048576,$imgFlag=true){
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }
    // 调用上面定义的buildInfo()方法得到表单提交过来的一个或多个文件
    $files = buildInfo();
    $i = 0;
    foreach ($files as $file){
        if($file['error'] === UPLOAD_ERR_OK){
            $ext = getExt($file['name']);
            if(!in_array($ext, $allowExt)){
                exit("非法文件类型！");
            }
            if($file['size'] > $maxSize){
                exit("文件过大！");
            }
            if($imgFlag){
                $info = getimagesize($file['tmp_name']);
                if(!$info){
                    exit("不是真正的图片类型!");
                }
            }
            // is_uploaded_file — 判断文件是否是通过 HTTP POST 上传的
            if(is_uploaded_file($file['tmp_name'])){
                $filename = getUniName().".".$ext;
                $destination = $path."/".$filename;
                if(move_uploaded_file($file['tmp_name'], $destination)){
                    $file['name'] = $filename;
                    unset($file['error'],$file['tmp_name'],$file['size'],$file['type']);
                    $uploadedFiles[$i] = $file;
                    $i++;
                    $mes = "文件上传成功！";
                }else{
                    $mes = "文件移动失败！";
                }
            }else{
                $mes = "文件不是通过 HTTP POST 方式上传的";
            }
        }else{
            switch ($file['error']){
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
    }
    return $uploadedFiles;
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












