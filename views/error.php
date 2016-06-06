<?php
require_once("../config.php");//基础配置文件
require_once('../includes/function.php');//函数库
require_once('../includes/smarty.inc.php');//smarty模板配置
require_once('../includes/connect.php');

$smarty->template_dir = "./../content/themes/".$theme;
$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';
$t=$_GET['t'];
if($t==""){ 
$t="管理员未开启分享功能";
}

$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$tit= $row['main_tit'];
$tit1= $row['tit_2'];
$theme= $row['theme'];
$des= $row['desword'];
$kw= $row['keyword'];
$url = $row['zzurl'];
$tjcode= $row['tjcode'];
}
$jscode=$tjcode;

$smarty->template_dir = "./../content/themes/".$theme;
$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';
$smarty->assign("tit", $tit); //应用标题
$smarty->assign("zzurl", $url); 
$smarty->assign("isVisitor", $isVisitor); 
$smarty->assign("userinfo", $userInfo); 
$smarty->assign("tit2", "错误"); //文件名
$smarty->assign("head", $head); //应用模板头
$smarty->assign("jscode", $jscode); //应用模板头
$smarty->assign("message", $t); 
$smarty->display("message_bad.html");  // 输出页面
?>