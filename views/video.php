<?php
error_reporting(0);//设置错误级别0
require_once("../config.php");//基础配置文件
require_once('../includes/function.php');//函数库
require_once('../includes/smarty.inc.php');//smarty模板配置
$con1=con_sql($sqlip,$sqlid,$sqlpass);//连接数据库
mysql_select_db($sqlname);//选取数据库
$key = $_GET["key"];//GET到的KEY值
$key_check=inject_check($key);
$result = mysql_query("SELECT * FROM sd_file
WHERE key1='$key'");
while ($row = mysql_fetch_array($result) ) {  
	$ming = $row['ming'];
		$zhuangtai = $row['cishuo'];
	$array = explode(".",$ming);//分割文件名
	$filetype=$array[1];//获取文件扩展名
	}
$result1 = mysql_query("SELECT * FROM sd_setting");//获取数据
while($row1 = mysql_fetch_array($result1))
  { 
$tit= $row1['main_tit'];
$share=$row1['share'];
$theme= $row1['theme'];
$url= $row1['zzurl'];
$domain= $row1['kjurl'];
$tjcode= $row1['tjcode'];
}
if($ming=="" || $zhuangtai=="1"){  
$smarty->template_dir = "./../content/themes/".$theme;
$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';

$jscode=$tjcode;


$smarty->assign("tit", $tit); //应用标题
$smarty->assign("zzurl", $url); 
$smarty->assign("tit2", "无法找到文件"); //文件名
$smarty->assign("head", $head); //应用模板头
$smarty->assign("jscode", $jscode); //应用模板头
$smarty->assign("message", "文件未找到或者已被删除"); 
$smarty->display("message_bad.html");  // 输出页面


}else{
$smarty->template_dir = "./../content/themes/".$theme;
$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';

$jscode=$tjcode;


$smarty->assign("tit", $tit); //应用标题
$smarty->assign("zzurl", $url); 
$smarty->assign("share", $share); 
$smarty->assign("filename", $ming); //文件名
$smarty->assign("fileurl", $domain.$ming); //外链URL
$smarty->assign("head", $head); //应用模板头
$smarty->assign("filetype", $filetype); //文件扩展名
$smarty->assign("jscode", $jscode); //应用模板头
$smarty->assign("key", $key); //外链URL
$smarty->display("video_view.html");  // 输出页面




}
?>

