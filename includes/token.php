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
  $serverUrl = $row2['p_server'];
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
 function gmt_iso8601($time) {
        $dtStr = date("c", $time);
        $mydatetime = new DateTime($dtStr);
        $expiration = $mydatetime->format(DateTime::ISO8601);
        $pos = strpos($expiration, '+');
        $expiration = substr($expiration, 0, $pos);
        return $expiration."Z";
}
function policyCreate($opts,$bucketName) {
        $options = array();
        $options['bucket'] = $bucketName;
        $options['expiration'] = time() + 600;

        $options = array_merge($options, $opts);

        $policy = base64_encode(json_encode($options));
        return $policy;
}
function signCreate($policy,$accessKey) {
        $sign = md5($policy.'&'.$accessKey);
        return $sign;
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
  case 'oss':
    $id= $accessKey;
    $key= $secretKey;
    $host = $serverUrl;

    $now = time();
    $expire = 300; //设置该policy超时时间是10s. 即这个policy过了这个有效时间，将不能访问
    $end = $now + $expire;
    $expiration = gmt_iso8601($end);
    $dir = '';
    $condition = array(0=>'content-length-range', 1=>0, 2=>$fileSize);
    $conditions[] = $condition; 
    //表示用户上传的数据,必须是以$dir开始, 不然上传会失败,这一步不是必须项,只是为了安全起见,防止用户通过policy上传到别人的目录
    $start = array(0=>'starts-with', 1=>'$key', 2=>$dir);
    $conditions[] = $start; 
    $arr = array('expiration'=>$expiration,'conditions'=>$conditions);
    $policy = json_encode($arr);
    $base64_policy = base64_encode($policy);
    $string_to_sign = $base64_policy;
    $signature = base64_encode(hash_hmac('sha1', $string_to_sign, $key, true));
    $response = array();
    $response['policy'] = $base64_policy;
    $response['signature'] = $signature;
    $response['AccessKeyId'] = $id;
    echo json_encode($response);
    break;
  case 'upyun':
    $opts = array();
    if($autoName == "true"){
      $arrayName = array('{date}' => date('YmjGis'),'{rand4}' => rand(1000,9999),'{rand8}' => rand(10000000,99999999) ,'{time}' => time());
      $fileNmae = strtr($nameRule,$arrayName)."{.suffix}";
    }else{
      $fileNmae = "{filename}{.suffix}";
    }
    $opts['save-key'] = "/".$fileNmae;
    $opts['allow-file-type'] = $fileEnd;
    $opts['content-length-range'] = $fileSize;
    $opts['ext-param'] = '1';
    $response = array();
    $response['policy'] = policyCreate($opts, $bucketName);
    $response['signature'] = signCreate($response['policy'], $accessKey);
    echo json_encode($response);
    break;
  default:
    $arr['uptoken'] = "nothing";
    print_r(json_encode($arr));
    break;
}


?>