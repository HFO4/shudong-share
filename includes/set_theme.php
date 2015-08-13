<?php

$biaoshi=$_POST['biaoshi'];


error_reporting(0);//设置错误级别0
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once("usercheck.php");


$ju="UPDATE `sd_setting` SET `theme` = '$biaoshi' WHERE `id` = 0";
if (mysql_query($ju))
  {
  echo "ok|ok";
  }
else
  {
  echo "bad|" . mysql_error();
  }

?>