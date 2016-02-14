<?php
error_reporting(0);
header('Content-type:text/json'); 
require_once("../config.php");
require_once('function.php');
require_once("qiniu/rs.php");
require_once('connect.php');
require_once('userShell.php');
$userGroup = $userInfo['group'];
$results1 = mysqli_query($con,"SELECT * FROM sd_usergroup where id = $userGroup");
while($row1 = mysqli_fetch_assoc($results1)){ 
  $policyId = $row1['policyid'];
}
$results = mysqli_query($con,"SELECT * FROM sd_policy where id = $policyId");
while($row2 = mysqli_fetch_assoc($results)){ 
  $policyType = $row2['p_type'];
  $fileType = $row2['p_mimetype'];
  $fileSize = (int)$row2['p_size'];
  $accessKey = $row2['p_ak'];
  $secretKey = $row2['p_sk'];
  $fileDir = $row2['p_dir'];
  $autoName = $row2['p_autoname'];
  $nameRule = $row2['p_namerule'];
  $bucketName = $row2['p_bucketname'];
  $fileEnd = $row2['p_filetype'];
}
if(empty($fileType)){
  $fileType = "*";
}
switch ($policyType) {
  case 'qiniu':
    Qiniu_SetKeys($accessKey, $secretKey);
    $putPolicy = new Qiniu_RS_PutPolicy($bucketName);
    $putPolicy->MimeLimit = $fileType;
    $putPolicy->FsizeLimit = $fileSize;
    $upToken = $putPolicy->Token(null);
    $arr['uptoken'] = $upToken;
    print_r(json_encode($arr));
    break;
  case 'server':
    $arr['fileType'] = $fileType;
    $arr['fileSize'] = $fileSize;
    $arr['autoName'] = $autoName;
    $arr['nameRule'] = $nameRule;
    $arr['fileDir'] = $fileDir;
    $arr['fileEnd'] = $fileEnd;
    $upToken=base64_encode(json_encode($arr))."|".md5($accessKey.json_encode($arr));
    $arr1['uptoken'] = $upToken;
    print_r(json_encode($arr1));
    break;
  default:
    $arr['uptoken'] = "nothing";
    print_r(json_encode($arr));
    break;
}


?>