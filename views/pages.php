<?php
require_once("../config.php");
require_once('../includes/function.php');
require_once('../includes/smarty.inc.php');
require_once('../includes/connect.php');
require_once('../includes/userShell.php');
$id = $_GET["id"];
$key_check=inject_check($id);
$result1 = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row1 = mysqli_fetch_assoc($result1)){ 
	$tit= $row1['main_tit'];
	$share=$row1['share'];
	$theme= $row1['theme'];
	$url1= $row1['zzurl'];
	$domain= $row1['kjurl'];
	$tjcode= $row1['tjcode'];
}
$err[0] = false;
$err[1] = ""; 
if(file_exists("../content/themes/".$theme."/pages/config.json")){
	$configFile = fopen("../content/themes/".$theme."/pages/config.json", "r");
	$configContent  = fread($configFile,filesize("../content/themes/".$theme."/pages/config.json"));
	fclose($configFile);
	$pages = json_decode($configContent,true);
	$idCheck[0] = false;
	foreach($pages as $key => $value) {
		if($value["id"] == $id){
			$idCheck[0] = false;
			$idCheck[1] = $value["file"];
			require_once("../content/themes/".$theme."/pages/".$idCheck[1].".php");
			exit();
		}else{
			$err[0] = true;
			$err[1] = "当前页面未注册";
		}
	}
}else{
	$err[0] = true;
	$err[1] = "无法读取模板自定义有页面配置文件";
}
if($err[0]){  
	$smarty->template_dir = "./../content/themes/".$theme;
	$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';
	$smarty->assign("isVisitor", $isVisitor); 
	$smarty->assign("userinfo", $userInfo); 	
	$jscode=$tjcode;
	$smarty->assign("tit", $tit); //应用标题
	$smarty->assign("zzurl", $url1); 
	$smarty->assign("tit2", "错误"); //文件名
	$smarty->assign("head", $head); //应用模板头
	$smarty->assign("jscode", $jscode); //应用模板头
	$smarty->assign("message", $err[1]); 
	$smarty->display("message_bad.html");  // 输出页面
}else{
}
?>