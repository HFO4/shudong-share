<?php
require_once("../config.php");//基础配置文件
require_once('../includes/function.php');//函数库
require_once('../includes/smarty.inc.php');//smarty模板配置
require_once('../includes/connect.php');
require_once('../includes/userShell.php');
session_start();
if($isVisitor == "true"){
	echo '<script>window.location.href="login.php";</script>';
	exit();
}else{}
$result1 = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row1 = mysqli_fetch_assoc($result1)){ 
	$tit= $row1['main_tit'];
	$theme= $row1['theme'];
	$url= $row1['zzurl'];
	$domain= $row1['kjurl'];
	$tjcode= $row1['tjcode'];
}
$uid = $userInfo['uid'];
$gid = $userInfo['group'];
$result5 = mysqli_query($con,"SELECT * FROM sd_usergroup where id ='$gid'");//获取数据
while($row3 = mysqli_fetch_assoc($result5)){ 
	$groupName= $row3['gname'];
}

$result2 = mysqli_query($con,"SELECT * FROM `sd_file` where upuser = '$uid'and cishuo = '0'");
$userFile=mysqli_num_rows($result2);
$result3 = mysqli_query($con,"SELECT * FROM `sd_ss` where cuser = '$uid'");
$userShare1 = mysqli_num_rows($result3);
$result4 = mysqli_query($con,"SELECT * FROM `sd_sskey` where cuser = '$uid'");
$userShare = mysqli_num_rows($result4) + $userShare1;
$smarty->template_dir = "./../content/themes/".$theme;
$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';
$jscode=$tjcode;
$smarty->assign("tit", $tit);
$smarty->assign("filenum", $userFile);  
$smarty->assign("sharenum", $userShare);  
$smarty->assign("zzurl", $url); 
$smarty->assign("gname", $groupName); 
$smarty->assign("isVisitor", $isVisitor); 
$smarty->assign("userinfo", $userInfo); 
$smarty->assign("head", $head); 
$smarty->assign("mailhash", md5($userInfo['username'])); 
$smarty->assign("jscode", 'Powerd by <a target="_blank" href="http://yun.aoaoao.me">树洞外链</a> '.$jscode); 
$smarty->display("userIndex.html");  
?>