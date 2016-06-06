<?php
$key1="";
$key1=$_POST['key'];
require_once("../config.php");
require_once('function.php');
require_once('connect.php');
require_once("qiniu/rs.php");
date_default_timezone_set("Asia/Shanghai");
$keyp=inject_check($key1);
if($keyp=="bad"){exit();}
$shanchu="delete from sd_ss where filekey = '$key1'";
$shanchu1="delete from sd_sskey where filekey = '$key1'";
mysqli_query($con,$shanchu);
mysqli_query($con,$shanchu1);
echo"ok.所有分享已取消";
?>