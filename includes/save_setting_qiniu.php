<?php
error_reporting(0);//设置错误级别0
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once('connect.php');
require_once("usercheck.php");
$kjm=$_POST['kjm'];
$zzurl=$_POST['zzurl'];
$ak=$_POST['ak'];
$sk=$_POST['sk'];
$kjurl="http://".$_POST['kjurl']."/";




$ju="UPDATE `sd_setting` SET `kjming` = '$kjm',`ak`='$ak',`sk` = '$sk',`kjurl` = '$kjurl',`zzurl` = '$zzurl' WHERE `id` = 0";
if (mysqli_query($con,$ju))
  {
  echo "ok|ok";
  }
else
  {
  echo "bad|" . "无法修改数据表";
  }

?>