<?php
error_reporting(0);//设置错误级别0
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once('connect.php');
require_once("usercheck.php");
$hz= $_POST['hz'];
$dx= $_POST['dx'];
$fp= $_POST['fp'];
$xz= $_POST['xz'];
$lx= $_POST['lx'];
$dx_1= $_POST['dx_1'];
$ss= $_POST['ss'];
$mm= $_POST['mm'];
$ju="UPDATE `sd_setting` SET `upload_minetype` = '$hz',`upload_size`='$dx',`upload_fpsize` = '$fp',`morelimt` = '$xz',`leixing` = '$lx',`daxiao` = '$dx_1',`share` = '$ss',`autoname` = '$mm' WHERE `id` = 0";
if (mysqli_query($con,$ju))
  {
  echo "ok|ok";
  }
else
  {
  echo "bad|" ."无法修改数据表";
  }

?>