<?php 
session_start();        //开启session

// 调用verifyImage()输出验证码图片
verifyImage();


/*
 * 通过GD库做验证码的方法
 * type - 验证码的类型，1：数字，2：英文字符，3：数字+英文字符
 * length - 验证码的长度
 * pixel - 干扰点的数量
 * line - 干扰直线的数量
 * sess_name - 验证码字符保存在session的键名
 */
function verifyImage($type = 1,$length = 4,$pixel = 0,$line = 0,$sess_name = "verify"){
    //创建画布
    $width = 80;
    $height = 30;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);         //为一幅图像分配颜色
    $black = imagecolorallocate($image, 0, 0, 0);               //为一幅图像分配颜色
    //用填充矩形填充画布
    imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
    //产生验证码字符,调用string.func.php文件中生成随机字符串的方法
    $chars = buildRandomString($type,$length);
    //把验证码字符放入session中
    $_SESSION[$sess_name] = $chars;
    $fontfiles = array("MSYH.TTF","MSYHBD.TTF","SIMLI.TTF","SIMSUN.TTC","STXINGKA.TTF");
    // 循环一个一个字符获取，修饰后写入画布
    for($i = 0; $i < $length; $i++){
        $size = mt_rand(14, 18);    // 字体大小在14～18中随机生成
        $angle = mt_rand(-15,15);   //字体旋转角度在-15度～15之间
        $x = 5 + $i * $size;
        $y = mt_rand(20,26);
        //字体颜色
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        // fontfile - 使用的 TrueType 字体的路径
        $fontfile = "fonts/".$fontfiles[mt_rand(0, count($fontfiles)-1)];
        $text = substr($chars, $i,1);
        // imagettftext — 用 TrueType 字体向图像写入文本
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    //给画布添加黑点干扰
    if($pixel){
        for($i = 0; $i < $pixel; $i++){
            imagesetpixel($image, mt_rand(0, $width-1), mt_rand(0, $height-1), $black);
        }
    }
    //给画布添加直线干扰
    if($line){
        for($i = 0; $i < $line; $i++){
            $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
            imageline($image, mt_rand(0, $width-1), mt_rand(0, $height-1), mt_rand(0, $width-1), mt_rand(0, $height-1), $color);
        }
    }
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}

/*
 * 产生验证码字符的方法，$type->验证码类型,$length->验证码长度
 */
function buildRandomString($type = 1,$length = 4){
    if($type == 1){     //数字验证码
        //range() 函数创建并返回一个包含指定范围的元素的数组,join() 函数把数组元素组合为一个字符串
        $chars = join("", range(0,9));
    }else if($type == 2){       //字符验证码
        $chars = join("", array_merge(range("a", "z"),range("A", "Z")));
    }else if($type == 3){       //数字+字符验证码
        $chars = join("", array_merge(range("a", "z"),range("A", "Z"),range(0,9)));
    }
    // 如果设定的验证码长度大于字符串长度
    if($length > strlen($chars)){
        exit("字符串长度不够");
    }
    $chars = str_shuffle($chars);         //str_shuffle — 随机打乱一个字符串
    return substr($chars, 0,$length);           //截取指定长度
}



