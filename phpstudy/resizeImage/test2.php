<?php
$filename = "des_big.jpg";
list($src_w,$src_h,$imagetype) = getimagesize($filename);
/*
 * image_type_to_mime_type()可以从图片类型码得到图片类型，如 image/jpeg 、image/png 等等。
 */
$mime = image_type_to_mime_type($imagetype);
/*
 * 从文件或URL创建新图像的方法有imagecreatefrompng()、imagecreatefromjpeg()、imagecreatefromgif()等等，
 * 输出图像的方法有imagejpeg()、imagegif()、imagepng()等等
 * 通过把 image_type_to_mime_type()方法返回的 image/jpeg、image/png、image/gif 等字符串替换其中的 / 为 createfrom，
 * 那么就会得到  image createfrom png、image createfrom jpeg、image createfrom gif 等相应的字符串，这样就能得到相应
 * 创建图像资源的方法名，要调用方法，加上 ()即可，如：$aa="fuck";$aa(); 这样，PHP程序会自动把 $aa()转化成fuck()运行。
 */
$createFun = str_replace("/", "createfrom", $mime);
$outFun = str_replace("/", null, $mime);
/*
 * 从文件或URL创建新图像的方法，以上处理后 $createFun 可能是 imagecreatefrompng、imagecreatefromjpeg 等等
 */
$src_image = $createFun($filename);
/*
 * imagecreatetruecolor — 新建一个真彩色图像
 */
$dst_image_50 = imagecreatetruecolor(50, 50);
$dst_image_220 = imagecreatetruecolor(220,220);
$dst_image_350 = imagecreatetruecolor(350, 350);
$dst_image_800 = imagecreatetruecolor(800, 800);
/*
 * imagecopyresampled — 重采样拷贝部分图像并调整大小
 */
imagecopyresampled($dst_image_50, $src_image, 0, 0, 0, 0, 50, 50, $src_w, $src_h);
imagecopyresampled($dst_image_220, $src_image, 0, 0, 0, 0, 220, 220, $src_w, $src_h);
imagecopyresampled($dst_image_350, $src_image, 0, 0, 0, 0, 350, 350, $src_w, $src_h);
imagecopyresampled($dst_image_800, $src_image, 0, 0, 0, 0, 800, 800, $src_w, $src_h);
/*
 * 指定保存的目录，如果不存在则创建
 */
$uploads_50 = "uploads/image_50/";
$uploads_220 = "uploads/image_220/";
$uploads_350 = "uploads/image_350/";
$uploads_800 = "uploads/image_800/";
$path = array($uploads_50,$uploads_220,$uploads_350,$uploads_800);
foreach ($path as $val){
    if(!file_exists($val)){
        mkdir($val,0777,true);
    }
}
/*
 * 经过字符串处理，$outFun可能是imagegif、imagepng、imagejpeg等等，imagegif()等输出图象到浏览器或文件,如果
 * 给两个参数，则第二个参数是是文件保存的路径，会把文件保存在指定路径上
 */
$outFun($dst_image_50,$uploads_50.$filename);
$outFun($dst_image_220,$uploads_220.$filename);
$outFun($dst_image_350,$uploads_350.$filename);
$outFun($dst_image_800,$uploads_800.$filename);
/*
 * imagedestroy — 销毁一图像
 */
imagedestroy($src_image);
imagedestroy($dst_image_50);
imagedestroy($dst_image_220);
imagedestroy($dst_image_350);
imagedestroy($dst_image_800);





















