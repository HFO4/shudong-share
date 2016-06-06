<?php
require_once("../config.php");//基础配置文件
require_once('../includes/function.php');//函数库
require_once('../includes/smarty.inc.php');//smarty模板配置
require_once('../includes/connect.php');
require_once('../includes/userShell.php');
$key = $_GET["key"];//GET到的KEY值
$key_check=inject_check($key);
$result = mysqli_query($con,"SELECT * FROM sd_file
WHERE key1='$key'");
while ($row = mysqli_fetch_assoc($result) ) {  
	$ming = htmlspecialchars($row['ming'],ENT_QUOTES,'utf-8');
	$zhuangtai = $row['cishuo'];
	$policyId = $row['policyid'];
	$uploadUser = $row['upuser'];
	$array = explode(".",$ming);//分割文件名
	$filetype=end($array);//获取文件扩展名
}
$results = mysqli_query($con,"SELECT * FROM sd_policy where id = $policyId");
while(@$row2 = mysqli_fetch_assoc($results)){ 
	$serverUrl = $row2['p_url'];
	$fileSize = $row2['p_size'];
	$fileDir = $row2['p_dir'];
	$autoName = $row2['p_autoname'];
	$nameRule = $row2['p_namerule'];
}
$result1 = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row1 = mysqli_fetch_assoc($result1)){ 
	$tit= $row1['main_tit'];
	$share=$row1['share'];
	$theme= $row1['theme'];
	$url= $row1['zzurl'];
	$domain= $row1['kjurl'];
	$tjcode= $row1['tjcode'];
}
if($ming=="" || $zhuangtai=="1" || $autoName == ""){  
	$smarty->template_dir = "./../content/themes/".$theme;
	$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';
	$jscode=$tjcode;
	$smarty->assign("share", $share); 
	$smarty->assign("tit", $tit); //应用标题
	$smarty->assign("zzurl", $url); 
	$smarty->assign("isVisitor", $isVisitor); 
	$smarty->assign("userinfo", $userInfo); 
	$smarty->assign("tit2", "无法找到文件"); //文件名
	$smarty->assign("head", $head); //应用模板头
	$smarty->assign("jscode", $jscode); //应用模板头
	$smarty->assign("message", "文件未找到或者已被删除"); 
	$smarty->display("message_bad.html");  // 输出页面
}else{
	$smarty->template_dir = "./../content/themes/".$theme;
	$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';
	$jscode=$tjcode;
	$smarty->assign("share", $share); 
	$smarty->assign("tit", $tit); 
	$smarty->assign("zzurl", $url); 
	$smarty->assign("isVisitor", $isVisitor); 
	$smarty->assign("userinfo", $userInfo); 
	$smarty->assign("filename", $ming); //文件名
	$smarty->assign("fileurl", $serverUrl.$ming); //外链URL
	$smarty->assign("head", $head); 
	$smarty->assign("filetype", $filetype); //文件扩展名
	$smarty->assign("jscode", 'Powerd by <a target="_blank" href="http://yun.aoaoao.me">树洞外链</a> '.$jscode); 
	$smarty->assign("key", $key);
	$smarty->display("else_view.html");  
	
}
?>

