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
$fileData = array();
$fileDataOne = array();
$result2 = mysqli_query($con,"SELECT * FROM `sd_sskey` where cuser = '$uid' ORDER BY `id` DESC");
while($row2 = mysqli_fetch_assoc($result2)){ 
	$fkey = $row2['filekey'];
	$result3 = mysqli_query($con,"SELECT * FROM `sd_file` where key1 = '$fkey' ");
	while ($row3 = mysqli_fetch_assoc($result3)) {
		$row2['ming'] = $row3['ming'];
		$ftype = explode(".", $row3['ming']);
		$row2['ftype'] = end($ftype);
	}
	$fileDataOne = $row2;
	$fileData[] = $fileDataOne;
}
foreach($fileData as $key=>$val) {
	if (is_array($val)) { 
		foreach($val as $key1=>$val) {
			$fileData[$key][$key1] = htmlspecialchars($val,ENT_QUOTES,'utf-8');
		}
	}
}

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
$smarty->assign("filedata", $fileData); 
$smarty->assign("mailhash", md5($userInfo['username'])); 
$smarty->assign("jscode", 'Powerd by <a target="_blank" href="http://yun.aoaoao.me">树洞外链</a> '.$jscode); 
$smarty->display("userSharesS.html");  
?>