<?php

$sskey=$_GET['key'];
$type=$_GET['type'];

error_reporting(0);//设置错误级别0
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once('connect.php');
require_once("usercheck.php");
    require_once("qiniu/rs.php");



$jilu="delete from sd_".$type." where sskey = '$sskey'";
mysqli_query($con,$jilu);




echo '
<script>
alert("执行成功");
location.href=document.referrer;


</script>

';




?>