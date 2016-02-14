<?php
$key1="";
$key1=$_GET['key'];
$fname=$_GET['ming'];
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once('connect.php');
require_once("qiniu/rs.php");
require_once('userShell.php');
date_default_timezone_set("Asia/Shanghai");//设置时区
error_reporting(0);//设置错误级别0
$keyp=inject_check($key1);//检查sql注入
$keyp1=inject_check($fname);//检查sql注入
if($keyp=="bad" || $keyp1=="bad"){exit();}
if($fname==""){
$ju="SELECT * FROM sd_file where key1 ='$key1'";
$result = mysqli_query($con,$ju);//获取数据
while($row = mysqli_fetch_assoc($result)){ 
	$ming = $row['ming'];
	$policyId = $row['policyid'];
	$uploadUser = $row['upuser'];
	$uploadTime = $row['uploadtime'];
}
}else{ 
	$ju="SELECT * FROM sd_file where ming ='$fname'";
	$result = mysqli_query($con,$ju);//获取数据
	while($row = mysqli_fetch_assoc($result)){ 
		$policyId = $row['policyid'];
		$uploadUser = $row['upuser'];
		$uploadTime = $row['uploadtime'];
	}
	$ming=$fname;
}
$results = mysqli_query($con,"SELECT * FROM sd_policy where id = $policyId");
while(@$row3 = mysqli_fetch_assoc($results)){ 
	$policyType = $row3['p_type'];
	$serverUrl = $row3['p_server'];
	$fileDir = $row3['p_dir'];
	$bucketName = $row3['p_bucketname'];
	$ak = $row3['p_ak'];
	$sk = $row3['p_sk'];
}
if(empty($uploadUser)){
	$uploadUser = "游客";
}
switch ($policyType) {
	case 'qiniu':
		Qiniu_SetKeys($ak, $sk);
		$client = new Qiniu_MacHttpClient(null);
		list($ret, $err) = Qiniu_RS_Stat($client, $bucketName, $ming);
		if ($err !== null) {
		    var_dump($err);
		} else {
			echo $ret['fsize'].".".$uploadUser."（UID）".".".$ret['mimeType'].".".$uploadTime;
		}
		break;
	case 'local':
		$fileAction = fopen(dirname(dirname(__FILE__))."/".$fileDir."/".$ming,"r");
		$fileInfo = fstat($fileAction);
		echo $fileInfo['size'].".".$uploadUser."（UID）"."."."暂不提供".".".$uploadTime;
		fclose($fileAction);
		break;	
	case 'server':
		$infoToken = md5($ming.'info'.$ak);
		$postResult = curl_post($serverUrl, array('action'=>'info', 'filedir' => $fileDir, 'filename'=>$ming, 'token'=>$infoToken));
		$fileInfoArr = explode('.', $postResult);
		echo $fileInfoArr['0'].".".$uploadUser."（UID）".".".$fileInfoArr['1'].".".$uploadTime;
		break;
}

?>