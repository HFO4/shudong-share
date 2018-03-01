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
	$zurl= $row1['zzurl'];
	$domain= $row1['kjurl'];
	$tjcode= $row1['tjcode'];
}
$uid = $userInfo['uid'];
$gid = $userInfo['group'];
$pageval = '1';
if(isset($_GET['page'])){
	$pageval = $_GET['page'];
}
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
$url=$url[path];
$pagesize=10; 
if(isset($_GET['pagesize'])){
	$pagesize = (int)$_GET['pagesize'];
}
$numq=mysqli_query($con,"SELECT * FROM `sd_file` where upuser = '$uid' and cishuo = '0'");
$num = mysqli_num_rows($numq);


$page=($pageval-1)*$pagesize;
$page.=',';

if($num > $pagesize){
 if($pageval<=1)$pageval=1;
}
$pagenum=ceil($num/$pagesize);
$fileData = array();
$fileDataOne = array();
$result2 = mysqli_query($con,"SELECT * FROM `sd_file` where upuser = '$uid' and cishuo = '0' ORDER BY `id` DESC limit $page $pagesize");
while($row2 = mysqli_fetch_assoc($result2)){ 
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
$jilu ="共有 $num 条记录&nbsp;&nbsp;当前第 $pageval 页，共 $pagenum 页";
if($pageval=="1"){
    $pre =  "##";
}else{
	$pre =  $url."?page=".($pageval-1);
}
if ($pageval==$pagenum){
	$ne =  "##";
}else{
    $ne =  $url."?page=".($pageval+1);
}
$p = new PageTool($num,$pageval,$pagesize);
$smarty->template_dir = "./../content/themes/".$theme;
$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';
$jscode=$tjcode;
$smarty->assign("tit", $tit);
$smarty->assign("filenum", $userFile);  
$smarty->assign("sharenum", $userShare);  
$smarty->assign("zzurl", $zurl); 
$smarty->assign("gname", $groupName); 
$smarty->assign("isVisitor", $isVisitor); 
$smarty->assign("userinfo", $userInfo); 
$smarty->assign("head", $head); 
$smarty->assign("fy", $p->show()); 
$smarty->assign("jilu", $jilu); 
$smarty->assign("pre", $pre); 
$smarty->assign("ne", $ne); 
$smarty->assign("filedata", $fileData); 
$smarty->assign("mailhash", md5($userInfo['username'])); 
$smarty->assign("jscode", 'Powered by <a target="_blank" href="http://yun.aoaoao.me">树洞外链</a> '.$jscode); 
$smarty->display("userFiles.html");  
?>