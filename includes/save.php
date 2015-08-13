<?php

require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
date_default_timezone_set("Asia/Shanghai");//设置时区
error_reporting(0);//设置错误级别0
$ming=$_POST['ming'];//获取POST的数据
if($ming==""){  
echo"bad request";
exit();
}
$ip=get_real_ip();//获取本机IP，在本地搭建的环境可能只会获取到127.0.0.1
$re=inject_check($ming);//检查sql注入
if ($re=="bad"){ 
exit();
}
$dd=date('Y-m-d H:i:s');//获取当前时间
$rand = md5(time() . mt_rand(0,1000));//生成KEY
@$con = mysql_connect($sqlip,$sqlid,$sqlpass);//连接数据库
@mysql_query("set names utf8");//设置编码

@$sql="INSERT INTO  `$sqlname`.`sd_file` (`ming` ,`key1` ,`uploadip` ,`uploadtime` ,`cishuo`)VALUES ('$ming', '$rand', '$ip', '$dd', '0');";

  if (!$con)
  {
  $re="bad";
  }else{@mysql_query("set names utf8");

if (!mysql_query($sql,$con))
  {
 $re="bad";

}
}

$xinxi=explode(".",$ming);
$leixing=$xinxi[1];			  
echo $rand.",".$leixing.",".$re;//返回结果

?>