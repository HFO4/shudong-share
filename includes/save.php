<?php
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once('connect.php');
require_once('userShell.php');
date_default_timezone_set("Asia/Shanghai");//设置时区
//error_reporting(0);//设置错误级别0
$ming=$_POST['ming'];//获取POST的数据
if($ming==""){  
	echo"bad request";
	exit();
}
$uploadUser=$userInfo["uid"];
$policyId=$userInfo["uid"];
$userGroup = $userInfo['group'];
$results1 = mysqli_query($con,"SELECT * FROM sd_usergroup where id = $userGroup");
while($row1 = mysqli_fetch_assoc($results1)){ 
	$policyId = $row1['policyid'];
}
$ip=get_real_ip();
$dd=date('Y-m-d H:i:s');
$rand = md5(time() . mt_rand(0,1000));
$stmt = $con->prepare("INSERT INTO  `$sqlname`.`sd_file` (`ming` ,`key1` ,`uploadip` ,`uploadtime` ,`cishuo` ,`upuser` ,`policyid`)VALUES (?, '$rand', '$ip', '$dd', '0' , '$uploadUser', '$policyId');");

$stmt->bind_param('s', $ming);
$stmt->execute();
if (!$con){
  $re="bad";
}else{}
$xinxi=explode(".",$ming);
$leixing=end($xinxi);			  
echo $rand.",".$leixing.",".$re;//返回结果

?>