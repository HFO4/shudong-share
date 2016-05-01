<?php
require_once("../config.php");//基础配置文件
require_once('../includes/function.php');//函数库
require_once('../includes/connect.php');
require_once('../includes/userShell.php');
$key1="";
$key1=$_GET['key'];
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
  <title>音频播放器 - <?php echo $tit ?></title> 
         <link rel="stylesheet" href="../includes/APlayer/APlayer.min.css">
 </head> 
 <body>

<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>
<script src="../includes/APlayer/APlayer.min.js"></script>
  <style type="text/css">
 body {
 margin:0px 0px 0px 0px;
font-family: '微软雅黑';

}

</style> 
  <div id="m_player">
  <div id="aplayer" class="aplayer"></div>
</div>
  <script language="JavaScript">  
    var ap1 = new APlayer({
        element: document.getElementById('aplayer'),
        narrow: false,
        autoplay: true,
        showlrc: false,
        mutex: true,
        theme: '#b2dae6',
        music: {
            title: '<?php echo $ming ?>',
            author: '',
            url: '<?php echo $serverUrl.$ming ?>',
            
        }
    });

    ap1.init();

</script>  
 </body>
</html>