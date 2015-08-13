<?php
$key1="";
$key1=$_GET['key'];
$dfile=$_GET['dfile'];
$djilu=$_GET['djilu'];
error_reporting(0);//设置错误级别0
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once("usercheck.php");
    require_once("qiniu/rs.php");
$df="ok";
$djl="ok";
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
if($dfile=="true"){
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
$df="bad";

} else {
  $df="ok";
$shengji="update sd_file set cishuo = '1' where key1 = '$key1'";
mysql_query($shengji);
$shanchu="delete from sd_ss where filekey = '$key1'";
$shanchu1="delete from sd_sskey where filekey = '$key1'";
mysql_query($shanchu);
mysql_query($shanchu1);
}}
if($djilu=="true" AND $df=="ok"){ 
$jilu="delete from sd_file where key1 = '$key1'";
mysql_query($jilu);
$shanchu="delete from sd_ss where filekey = '$key1'";
$shanchu1="delete from sd_sskey where filekey = '$key1'";
mysql_query($shanchu);
mysql_query($shanchu1);
}


if($df=="ok" AND $djl=="ok"){ 
echo '
<script>
alert("执行成功");
location.href=document.referrer;


</script>

';

}else{ 
echo '
<script>
alert("执行失败");
location.href=document.referrer;


</script>

';

}
?>