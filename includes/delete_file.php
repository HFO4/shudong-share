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
$ju="SELECT * FROM sd_file where key1 ='$key1'";
$result = mysql_query($ju);//获取数据
while($row = mysql_fetch_array($result))
  { 
$ming= $row['ming'];

}

$result1 = mysql_query("SELECT * FROM sd_setting");//获取数据
while($row1 = mysql_fetch_array($result1))
  { 
$ak= $row1['ak'];
$sk= $row1['sk'];
$bucket= $row1['kjming'];

}

Qiniu_SetKeys($ak, $sk);
$client = new Qiniu_MacHttpClient(null);
$err = Qiniu_RS_Delete($client, $bucket, $ming);
if ($err !== null) {
   echo "bad.删除失败";

} else {
    echo "ok.删除成功"; 
$shengji="update sd_file set cishuo = '1' where key1 = '$key1'";
mysql_query($shengji);
$shanchu="delete from sd_ss where filekey = '$key1'";
$shanchu1="delete from sd_sskey where filekey = '$key1'";
mysql_query($shanchu);
mysql_query($shanchu1);
}
?>