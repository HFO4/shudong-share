<?php
require_once("config.php");//基础配置文件
if(!isset($sqlid)){
	die('<script>
window.location="install";

</script>');
}
require_once('includes/function.php');//函数库
require_once('includes/smarty.inc.php');//smarty模板配置
require_once('includes/connect.php');
require_once('includes/userShell.php');
$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result)){ 
	$tit = $row['main_tit'];
	$tit1 = $row['tit_2'];
	$theme = $row['theme'];
	$notice = $row['notice'];
	$des = $row['desword'];
	$kw = $row['keyword'];
	$tjcode = $row['tjcode'];
	$zzurl = $row['zzurl'];
}
$userGroup = $userInfo['group'];
$results1 = mysqli_query($con,"SELECT * FROM sd_usergroup where id = $userGroup");
while($row1 = mysqli_fetch_assoc($results1)){ 
	$policyId = $row1['policyid'];
}
$results = mysqli_query($con,"SELECT * FROM sd_policy where id = $policyId");
while($row2 = mysqli_fetch_assoc($results)){ 
	$policyType = $row2['p_type'];
	$fileType = $row2['p_filetype'];
	$fileSize = ceil($row2['p_size']/(1024*1024));
	$autoName = $row2['p_autoname'];
	$nameRule = $row2['p_namerule'];
	$serverUrl = $row2['p_server'];
	$bucketName = $row2['p_bucketname'];
}
if($policyType!="qiniu"){
	$fileType = 'var min="'.$fileType.'"';
	$filePart = "0";
	if($policyType == "local"){
		$upServer = $zzurl."includes/fileReceive.php";
	}else if($policyType == "server"){
		$upServer = $serverUrl;
	}else if($policyType == "oss"){
		$upServer = $serverUrl;
	}else if ($policyType == 'upyun') {
		$upServer = "https://v0.api.upyun.com/".$bucketName;
	}
}else{
	$fileType = 'var min="'.$fileType.'"';
	$upServer = "https://up.qbox.me";
	$filePart = "4";
}
$smarty->template_dir = "content/themes/".$theme;
$head ='
<meta name="description" content="'.$des.'" />
<meta name="keywords" content="'.$kw.'" />';
$staticFile = '<script type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="includes/js/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="includes/js/plupload/i18n/zh_CN.js"></script>
<script type="text/javascript" src="includes/js/qiniu.js"></script>
<script type="text/javascript" src="includes/js/main.js"></script>
<script type="text/javascript" src="includes/js/ui.js"></script>';
$jscode = $tjcode.'
<script type="text/javascript">
var autoname='.$autoName.';'.$fileType.'; var max='.$fileSize.'; var fp="'.$filePart.'"; var upserver ="'.$upServer.'";var policyType="'.$policyType.'"</script>';

$smarty->assign("isVisitor", $isVisitor); 
$smarty->assign("userinfo", $userInfo); 
$smarty->assign("des", $des);
$smarty->assign("kw", $kw);
$smarty->assign("notice", $notice);
$smarty->assign("titmain", $tit."-".$tit1); 
$smarty->assign("tit", $tit); 
$smarty->assign("zzurl", $zzurl);
$smarty->assign("head", $head); 
$smarty->assign("static", $staticFile); 
$smarty->assign("jscode", 'Powerd by <a target="_blank" href="http://aoaoao.me">树洞外链</a> '.$jscode); 
$smarty->display("index.html");  

?>
