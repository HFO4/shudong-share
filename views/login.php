<?php
require_once("../config.php");//基础配置文件
require_once('../includes/function.php');//函数库
require_once('../includes/smarty.inc.php');//smarty模板配置
require_once('../includes/connect.php');
require_once('../includes/userShell.php');
if($isVisitor=="true"){}else{
	echo '<script>window.location.href="userIndex.php";</script>';
	exit();
}
$result1 = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row1 = mysqli_fetch_assoc($result1)){ 
	$tit= $row1['main_tit'];
	$theme= $row1['theme'];
	$url= $row1['zzurl'];
	$domain= $row1['kjurl'];
	$tjcode= $row1['tjcode'];
}
$smarty->template_dir = "./../content/themes/".$theme;
$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';
$jscode=$tjcode;
$smarty->assign("tit", $tit); 
$smarty->assign("zzurl", $url); 
$smarty->assign("isVisitor", $isVisitor); 
$smarty->assign("userinfo", $userInfo); 
$smarty->assign("head", $head); 
$smarty->assign("jscode", 'Powerd by <a target="_blank" href="http://aoaoao.me">树洞外链</a> '.$jscode); 
$smarty->display("login.html");  
?>