<?php

//error_reporting(0);//错误级别调至0
header('Content-type:text/json'); //浏览器头
require_once("../config.php");//基础配置文件
require_once('function.php');//函数库
require_once("qiniu/rs.php");//七牛SDK
$con1=con_sql($sqlip,$sqlid,$sqlpass);//连接数据库
mysql_select_db($sqlname);//选取数据库
$result = mysql_query("SELECT * FROM sd_setting");//获取数据
while($row = mysql_fetch_array($result))
  { 
$accessKey= $row['ak'];
$secretKey= $row['sk'];
$bucket= $row['kjming'];
$xianzhi=$row['morelimt'];
$a=$row['leixing'];
$b=(int)$row['daxiao'];

}

   

if ($xianzhi=="true"){


	 Qiniu_SetKeys($accessKey, $secretKey);
    $putPolicy = new Qiniu_RS_PutPolicy($bucket);
   $putPolicy->MimeLimit = $a;
   $putPolicy->FsizeLimit = $b;


    $upToken = $putPolicy->Token(null);
	$arr['uptoken'] = $upToken;

	print_r(json_encode($arr));
}else{ 
	 Qiniu_SetKeys($accessKey, $secretKey);
    $putPolicy = new Qiniu_RS_PutPolicy($bucket);


    $upToken = $putPolicy->Token(null);
	$arr['uptoken'] = $upToken;

	print_r(json_encode($arr));


} 

?>