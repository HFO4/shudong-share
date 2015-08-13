<?php
$re="ok.ok";
$ftype=$_POST['ftype'];
$replace=array('/','&','.',' ');
$fname=str_replace($replace,"",$_POST['fname']);
$fkey=$_POST['fkey'];
if(mb_strwidth($fname)>=40){ 
echo "p.bad.文件名不能超过40个字符";
exit();
}
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
date_default_timezone_set("Asia/Shanghai");//设置时区
error_reporting(0);//设置错误级别0
$fname_check=inject_check($fname);//检查sql注入
$ftype_check=inject_check($ftype);//检查sql注入
$fkey_check=inject_check($fkey);//检查sql注入
if($fname==""){ $jieguo="p.bad.文件名不能为空";
}else{
if ($fkey_check=="bad" || $ftype_check=="bad" || $fname_check=="bad"){ 
echo"p.bad.文件名非法";
exit();//


}else{ 
$result = mysql_query("SELECT * FROM sd_setting");//获取数据
while($row = mysql_fetch_array($result))
  { 
$zzurl= $row['zzurl'];


}
$dd=date('Y-m-d H:i:s');//获取当前时间
$ran = md5(time() . mt_rand(0,1000));//生成随机字符
$rand=preg_split('//', $ran, -1, PREG_SPLIT_NO_EMPTY);
$pkey=$rand[0].$rand[1].$rand[2].$rand[3].$rand[4];
$con = mysql_connect($sqlip,$sqlid,$sqlpass);//连接数据库
mysql_query("set names utf8");//设置编码
if($ftype=="open")
{
$sql="INSERT INTO  `$sqlname`.`sd_ss` (`sskey` ,`filekey` ,`sstime` ,`downloadnum` ,`fname`)VALUES ('$pkey', '$fkey', '$dd', '0' ,'$fname');";

  if (!$con)
  {
  $re="bad.数据库连接失败";
  }else{mysql_query("set names utf8");

if (!mysql_query($sql,$con))
  	{
 $re="bad.分享失败";
	}
		}		
$jieguo=$ftype.".".$re.".".$zzurl."f.php?k=".$pkey;
}else if($ftype=="lock") 
		{ 
$passwd=$rand[6].$rand[7].$rand[8].$rand[9];

$sql="INSERT INTO  `$sqlname`.`sd_sskey` (`sskey` ,`filekey` ,`sstime` ,`downloadnum` ,`fname` ,`passwd`)VALUES ('$pkey', '$fkey', '$dd', '0' ,'$fname' ,'$passwd');";

  if (!$con)
  {
  $re="bad.数据库连接失败";
  }else{mysql_query("set names utf8");

if (!mysql_query($sql,$con))
  	{
 $re="bad.分享失败";
	}
		}		
$jieguo=$ftype.".".$re.".".$passwd.".".$zzurl."s.php?k=".$pkey;


		}
}}
echo $jieguo;
?>