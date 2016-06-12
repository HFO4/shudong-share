<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/connect.php");
require_once("../includes/usercheck.php");
$title="主题风格";
require_once("common/head.php");

$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$tit= $row['main_tit'];
$tit1= $row['tit_2'];
$theme= $row['theme'];
$des= $row['desword'];
$kw= $row['keyword'];

$tjcode= $row['tjcode'];
}
?>
<style type="text/css">
.h3 {
	font-family: "微软雅黑";
}
.thumbnail .caption {
	word-wrap: break-word;
}
</style>
<body>
          <?php
		  //	$content = file_get_contents("../content/themes/$theme/info.config");
		//  $info = explode("\r\n", $content);

		  
		  
		  ?>  

<link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">主题风格&nbsp;<a href="http://aoaoao.me/api/theme.php" target="new"class="btn btn-info"><span class="fa fa-heart"></span> 获取更多主题</a></h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            

<div class="row">
 <?php
 
$dir = "../content/themes"; //当前目录
$x="1";

list_file($dir,$theme,$x);
function list_file($dir,$theme,$x){
	$list = scandir($dir); // 得到该文件下的所有文件和文件夹
	foreach($list as $file){//遍历		
	
		$file_location=$dir."/".$file;//生成路径
		$a=explode("/",$file_location);
		$b=$a[3];
		if(is_dir($file_location) && $file!="." &&$file!=".." &&count($a)=="4"){ //判断是不是文件
		
			


if(is_int(($x-1)/4) && ($x-1) != "0"){
$bb="<br>";
}else{
	
	}
	if($b==$theme){
		$cc="disabled";
		$ccc="正在使用";
		}else{ 
			$cc="";
		$ccc="更换";
		}
		$content = file_get_contents("../content/themes/$b/info.config");
	 $info = explode("\r\n", $content);
	echo $bb.'
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail" >
      <img src="../content/themes/'.$b.'/preview.png" width="100%"alt="...">
      <div class="caption">
        <h3>'.$info[0].'</h3>
        <p style="">作者：<a href="'.$info[2].'" target="new">'.$info[1].'</a></p>
        <p><a onclick="settheme(\''.$b.'\');" class="btn btn-primary" role="button" '.$cc.'>'.$ccc.'</a> </p>
      </div>
    </div>
  </div>';

		
		
			list_file($file_location,$theme,$x++); //继续遍历
		}
		}

	}

 
 
 ?>
</div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


</body>

</html>
<script>
function settheme(id){
	
$.post("../includes/set_theme.php",{biaoshi:id},
   function(data){
	var ge=data.split("|");
	if(ge[0]=="bad"){ 
	alert("保存失败，错误信息："+ge[1]);
	}else if (ge[0]=="ok"){ 
iosOverlay({
		text: "设置成功",
		duration: 2e3,
		icon: "images/check.png"
		
	});
	 location.reload();
	}
   });
   

}

</script>
