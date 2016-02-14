<?php

$v1=$_POST['v1'];
$v2=$_POST['v2'];
$v3=$_POST['v3'];
$url=$_POST['url'];
$biaoshi=$_POST['biaoshi'];



error_reporting(0);//设置错误级别0
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once("connect.php");
require_once("usercheck.php");
$destination_folder = '../data/';
$newfname = $destination_folder . basename($url);         
$file = fopen ($url, "rb");         
if ($file) {         
$newf = fopen ($newfname, "wb");         
if ($newf)         
while(!feof($file)) {         
fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );         
}         
}         
if ($file) {         
fclose($file);         
}         
if ($newf) {         
fclose($newf);         
}         


$jieya=get_zip_originalsize("../data/".basename($url),'../');
if($jieya=="ok"){ 

echo "ok.更新完成";
}else{ 

echo "bad.无法解压更新文件";
}
?>