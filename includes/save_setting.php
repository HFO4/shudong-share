<?php

$tit=$_POST['tit'];
$tit_2=$_POST['tit_2'];
$des=$_POST['des'];
$kw=$_POST['kw'];
$notice=addslashes($_POST['notice']);
$tjcode=addslashes($_POST['tjcode']);

error_reporting(0);//设置错误级别0
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once("usercheck.php");


$ju="UPDATE `sd_setting` SET `main_tit` = '$tit',`notice` = '$notice',`tit_2`='$tit_2',`keyword` = '$kw',`desword` = '$des',`tjcode` = '$tjcode' WHERE `id` = 0";
if (mysql_query($ju))
  {
  echo "ok|ok";
  }
else
  {
  echo "bad|" . mysql_error();
  }

?>