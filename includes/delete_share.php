<?php
$key1="";
$key1=$_POST['key'];
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
    require_once("qiniu/rs.php");
date_default_timezone_set("Asia/Shanghai");//设置时区
error_reporting(0);//设置错误级别0
$keyp=inject_check($key1);//检查sql注入
if($keyp=="bad"){exit();}
$con = mysql_connect($sqlip,$sqlid,$sqlpass);//连接数据库
mysql_select_db($sqlname);//选取数据库
mysql_query("set names utf8");//设置编码


$shanchu="delete from sd_ss where filekey = '$key1'";
$shanchu1="delete from sd_sskey where filekey = '$key1'";
mysql_query($shanchu);
mysql_query($shanchu1);
echo"ok.所有分享已取消";

?>