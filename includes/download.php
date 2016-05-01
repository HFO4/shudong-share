<?php
$key1="";
$sskey=$_GET['sskey'];
$tp=$_GET['type'];
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once('connect.php');
    require_once("qiniu/rs.php");
date_default_timezone_set("Asia/Shanghai");//设置时区
error_reporting(0);//设置错误级别0
$keyp=inject_check($tp);//检查sql注入
$keyp1=inject_check($sskey);//检查sql注入
if($keyp=="bad" || $keyp1=="bad"){exit();}
if($tp=="open"){ 

$ku="sd_ss";
}else if($tp=="lock"){ 
$ku="sd_sskey";
}
$ju="select * from ".$ku." where sskey = '$sskey'";
$result = mysqli_query($con,$ju);//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$num= $row['downloadnum']+1;

}
$sheng="update ".$ku." set  `downloadnum` = '$num' WHERE sskey = '$sskey'";
mysqli_query($con,$sheng);

?>