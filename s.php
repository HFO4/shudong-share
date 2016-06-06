<?php
require_once("config.php");//基础配置文件
require_once('includes/function.php');//函数库
require_once('includes/connect.php');
require_once('includes/smarty.inc.php');//smarty模板配置
require_once('includes/userShell.php');
error_reporting(0);//设置错误级别0
$share_key=$_GET['k'];
$share_c=inject_check($share_key);
if($share_c=="bad"){exit();}
session_start();
$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$tit= $row['main_tit'];
$theme= $row['theme'];
$des= $row['desword'];
$kw= $row['keyword'];
$tjcode= $row['tjcode'];
$share= $row['share'];
$url= $row['zzurl'];
}
if($share=="false"){ 
echo'<script>document.location="views/error.php";</script>';
exit();
}


$cha=mysqli_query($con,"SELECT * FROM sd_sskey where sskey = '$share_key'");
if(mysqli_num_rows($cha)=="0"){ 
echo'<script>document.location="views/error.php?t=您访问的文件不存在或已被删除";</script>';
exit();
}

if($_SESSION[$share_key."q"]==""){ 
$smarty->template_dir = "content/themes/".$theme;
$head='<script type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>';

$jscode=$tjcode;
$smarty->assign("tit", $tit); //应用标题
$smarty->assign("zzurl", $url); 
$smarty->assign("isVisitor", $isVisitor); 
$smarty->assign("userinfo", $userInfo); 
$smarty->assign("head", $head); //应用模板头
$smarty->assign("sskey", $share_key);
$smarty->assign("jscode", 'Powerd by <a target="_blank" href="http://aoaoao.me">树洞外链</a> '.$jscode); //应用模板头
$smarty->display("lock.html");  // 输出页面





}else if($_SESSION[$share_key."q"]=="ok"){ 


while($row1 = mysqli_fetch_assoc($cha)){ 
	$fname= htmlspecialchars($row1['fname'],ENT_QUOTES,'utf-8');
	$key1= $row1['filekey'];
	$sstime= $row1['sstime'];
	$num= $row1['downloadnum'];
}
	$array1 = explode(" ",$sstime);//分割文件名
	$cha2=mysqli_query($con,"SELECT * FROM sd_file where key1 = '$key1'");
while($row2 = mysqli_fetch_assoc($cha2))
  { 
	$ming= htmlspecialchars($row2['ming'],ENT_QUOTES,'utf-8');
	$policyId = $row2['policyid'];
	$array = explode(".",$ming);//分割文件名
	$filetype=end($array);//获取文件扩展名

}
$results = mysqli_query($con,"SELECT * FROM sd_policy where id = $policyId");
while(@$row3 = mysqli_fetch_assoc($results)){ 
	$serverUrl = $row3['p_url'];
}
$smarty->template_dir = "content/themes/".$theme;
$head='<script type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>';

$jscode=$tjcode;
$smarty->assign("uu", "s"); 
$smarty->assign("stype", "lock"); 
$smarty->assign("tit", $tit); //应用标题
$smarty->assign("zzurl", $url); 
$smarty->assign("fname", $fname); //文件名
$smarty->assign("fileurl", $serverUrl.$ming); //外链URL
$smarty->assign("ming",$ming); //外链URL
$smarty->assign("head", $head); //应用模板头
$smarty->assign("kw", $kw);
$smarty->assign("isVisitor", $isVisitor); 
$smarty->assign("userinfo", $userInfo); 
$smarty->assign("num", $num);
$smarty->assign("sskey", $share_key);
$smarty->assign("sstime", $array1[0]);
$smarty->assign("filetype", $filetype); //文件扩展名
$smarty->assign("jscode", 'Powerd by <a target="_blank" href="http://aoaoao.me">树洞外链</a> '.$jscode); //应用模板头
$smarty->display("share_pub.html");  // 输出页面

}





?>