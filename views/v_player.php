<?php
require_once("../config.php");//基础配置文件
require_once('../includes/function.php');//函数库
require_once('../includes/connect.php');
require_once('../includes/userShell.php');
$key1="";
$key1=$_GET['key'];
$h=$_GET['h'];
$w=$_GET['w'];
$key_check=inject_check($key1);
$result = mysqli_query($con,"SELECT * FROM sd_file
WHERE key1='$key1'");
while ($row = mysqli_fetch_assoc($result) ) {  
	$ming = $row['ming'];
	$zhuangtai = $row['cishuo'];
  $policyId = $row['policyid'];
  $uploadUser = $row['upuser'];
	$array = explode(".",$ming);//分割文件名
	$filetype=end($array);;//获取文件扩展名
}
if($ming=="" || $zhuangtai=="1"){ 
echo "bad request,file not found";
exit();
}
$result1 = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row1 = mysqli_fetch_assoc($result1)){ 
  $tit= $row1['main_tit'];
  $url= $row1['zzurl'];
  $tjcode= $row1['tjcode'];
}
$results = mysqli_query($con,"SELECT * FROM sd_policy where id = $policyId");
while($row = mysqli_fetch_assoc($results)){ 
  $serverUrl = $row['p_url'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>视频播放器 - <?php echo $tit ?></title> 

 </head> 
 <body>

<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../includes/ckplayer/ckplayer.js"></script>
  <style type="text/css">
 body {
 margin:0px 0px 0px 0px;
font-family: '微软雅黑';
}

</style> 

 <div id="m_player"></div>
  <script language="JavaScript">  

 var flashvars={
        f:'<?php echo $serverUrl.$ming ?>',
        c:0,
        loaded:'loadedHandler'
    };
    var video=['<?php echo $serverUrl.$ming ?>->video/<?php echo $filetype ?>'];
    CKobject.embed('../includes/ckplayer/ckplayer.swf','m_player','ckplayer_a1','<?php echo $w ?>','<?php echo $h ?>',false,flashvars,video);



</script>  
 </body>
</html>