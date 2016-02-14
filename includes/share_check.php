<?php
session_start();
$mima="";
$mima=$_POST['mima'];
$sskey=$_POST['sskey'];
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once('connect.php');
error_reporting(0);//设置错误级别0
$keyp=inject_check($mima);//检查sql注入
$keyp1=inject_check($sskey);//检查sql注入
if($keyp=="bad" || $keyp1=="bad"){exit();}
$ju="SELECT * FROM sd_sskey where sskey ='$sskey'";
$result = mysqli_query($con,$ju);//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$mima_dui= $row['passwd'];

}
if(mysqli_num_rows($result)=="0"){ 
echo "bad.请求错误";
exit();
}


if($_SESSION[$sskey."check"]==""){ 
$_SESSION[$sskey."check"]="1";

}
if($_SESSION[$sskey."check"]=="5"){ 

echo "bad.您尝试次数过多，已被锁定";
exit();
}else{ 

if($mima==$mima_dui){ 
echo "ok.ok";
$_SESSION[$sskey."q"]="ok";
}else{ 

$_SESSION[$sskey."check"]=$_SESSION[$sskey."check"]+1;
echo "bad.密码错误";
}






}


?>