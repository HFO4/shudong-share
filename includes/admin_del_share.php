<?php

$sskey=$_GET['key'];
$type=$_GET['type'];

error_reporting(0);//设置错误级别0
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once("usercheck.php");
    require_once("qiniu/rs.php");
error_reporting(0);//设置错误级别0
$con = mysql_connect($sqlip,$sqlid,$sqlpass);//连接数据库
mysql_select_db($sqlname);//选取数据库


$jilu="delete from sd_".$type." where sskey = '$sskey'";
mysql_query($jilu);




echo '
<script>
alert("执行成功");
location.href=document.referrer;


</script>

';




?>