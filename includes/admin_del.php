<?php
$key1="";
$key1=$_GET['key'];
$dfile=$_GET['dfile'];
$djilu=$_GET['djilu'];
error_reporting(0);//设置错误级别0
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once("connect.php");
require_once("usercheck.php");
    require_once("qiniu/rs.php");
$df="ok";
$djl="ok";
date_default_timezone_set("Asia/Shanghai");//设置时区
error_reporting(0);//设置错误级别0
$keyp=inject_check($key1);//检查sql注入
if($keyp=="bad"){exit();}

$ju="SELECT * FROM sd_file where key1 ='$key1'";
$result = mysqli_query($con,$ju);//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$ming= $row['ming'];

}
if($dfile=="true"){
$result1 = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row1 = mysqli_fetch_assoc($result1))
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
mysqli_query($con,$shengji);
$shanchu="delete from sd_ss where filekey = '$key1'";
$shanchu1="delete from sd_sskey where filekey = '$key1'";
mysqli_query($con,$shanchu);
mysqli_query($con,$shanchu1);
}}
if($djilu=="true" AND $df=="ok"){ 
$jilu="delete from sd_file where key1 = '$key1'";
mysqli_query($con,$jilu);
$shanchu="delete from sd_ss where filekey = '$key1'";
$shanchu1="delete from sd_sskey where filekey = '$key1'";
mysqli_query($con,$shanchu);
mysqli_query($con,$shanchu1);
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