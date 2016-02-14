<?php
$key1="";
$key1=$_POST['key'];
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once('connect.php');
require_once("qiniu/rs.php");
date_default_timezone_set("Asia/Shanghai");//设置时区
error_reporting(0);//设置错误级别0
$keyp=inject_check($key1);//检查sql注入
if($keyp=="bad"){exit();}
$ju="SELECT * FROM sd_file where key1 ='$key1'";
$result = mysqli_query($con,$ju);//获取数据
while($row = mysqli_fetch_assoc($result)){ 
	$ming= $row['ming'];
	$policyId = $row['policyid'];
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
function deleteShare($key1,$con){
	$shengji="update sd_file set cishuo = '1' where key1 = '$key1'";
	mysqli_query($con,$shengji);
	$shanchu="delete from sd_ss where filekey = '$key1'";
	$shanchu1="delete from sd_sskey where filekey = '$key1'";
	mysqli_query($con,$shanchu);
	mysqli_query($con,$shanchu1);
}
switch ($policyType) {
	case 'qiniu':
		Qiniu_SetKeys($ak, $sk);
		$client = new Qiniu_MacHttpClient(null);
		$err = Qiniu_RS_Delete($client, $bucketName, $ming);
		if ($err !== null) {
		   echo "bad.删除失败";

		} else {
		    echo "ok.删除成功"; 
			deleteShare($key1,$con);
		}
		break;
	 case 'local':
		$deleteAction = @unlink (dirname(dirname(__FILE__))."/".$fileDir."/".$ming);
		if($deleteAction){
		    echo "ok.删除成功"; 
			deleteShare($key1,$con);
		} else {
			echo "bad.删除失败";	
		}
		break;
	case 'server':
		$deleteToken = md5($ming.'delete'.$ak);
		$postResult = curl_post($serverUrl, array('action'=>'delete', 'filedir' => $fileDir,'filename'=>$ming, 'token'=>$deleteToken));
		if($postResult == "ok"){
		    echo "ok.删除成功"; 
			deleteShare($key1,$con);
		} else {
			echo "bad.删除失败";
		}
}

?>