<?php
require_once("config.php");//基础配置文件
require_once('includes/function.php');//函数库
require_once('includes/smarty.inc.php');//smarty模板配置
error_reporting(0);//设置错误级别0
$share_key=$_GET['k'];
$share_c=inject_check($share_key);
if($share_c=="bad"){exit();}






session_start();





$con1=con_sql($sqlip,$sqlid,$sqlpass);//连接数据库
mysql_select_db($sqlname);//选取数据库
$result = mysql_query("SELECT * FROM sd_setting");//获取数据
while($row = mysql_fetch_array($result))
  { 
$tit= $row['main_tit'];
$theme= $row['theme'];
$des= $row['desword'];
$kw= $row['keyword'];
$tjcode= $row['tjcode'];
$share= $row['share'];
$url= $row['zzurl'];
$domain= $row['kjurl'];
}
if($share=="false"){ 
echo'<script>document.location="views/error.php";</script>';
exit();
}


$cha=mysql_query("SELECT * FROM sd_sskey where sskey = '$share_key'");
if(mysql_num_rows($cha)=="0"){ 
echo'<script>document.location="views/error.php?t=您访问的文件不存在或已被删除";</script>';
exit();
}

if($_SESSION[$share_key]==""){ 
$smarty->template_dir = "content/themes/".$theme;
$head='<script type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>';

$jscode=$tjcode;
$smarty->assign("tit", $tit); //应用标题
$smarty->assign("zzurl", $url); 
$smarty->assign("head", $head); //应用模板头
$smarty->assign("sskey", $share_key);
$smarty->assign("jscode", $jscode); //应用模板头
$smarty->display("lock.html");  // 输出页面





}else if($_SESSION[$share_key]=="ok"){ 


while($row1 = mysql_fetch_array($cha))
  { 
$fname= $row1['fname'];
$key1= $row1['filekey'];
$sstime= $row1['sstime'];
$num= $row1['downloadnum'];

}
	$array1 = explode(" ",$sstime);//分割文件名
	$cha2=mysql_query("SELECT * FROM sd_file where key1 = '$key1'");
while($row2 = mysql_fetch_array($cha2))
  { 
$ming= $row2['ming'];
	$array = explode(".",$ming);//分割文件名
	$filetype=$array[1];//获取文件扩展名

}
$smarty->template_dir = "content/themes/".$theme;
$head='<script type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>';

$jscode=$tjcode;
$smarty->assign("uu", "s"); 
$smarty->assign("stype", "lock"); 
$smarty->assign("tit", $tit); //应用标题
$smarty->assign("zzurl", $url); 
$smarty->assign("fname", $fname); //文件名
$smarty->assign("fileurl", $domain.$ming); //外链URL
$smarty->assign("ming",$ming); //外链URL
$smarty->assign("head", $head); //应用模板头
$smarty->assign("kw", $kw);
$smarty->assign("num", $num);
$smarty->assign("sskey", $share_key);
$smarty->assign("sstime", $array1[0]);
$smarty->assign("filetype", $filetype); //文件扩展名
$smarty->assign("jscode", $jscode); //应用模板头
$smarty->display("share_pub.html");  // 输出页面

}





?>