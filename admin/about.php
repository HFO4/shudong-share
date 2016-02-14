<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/connect.php");
require_once("../includes/usercheck.php");
$title="基础设置";
require_once("common/head.php");

$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$tit= $row['main_tit'];
$tit1= $row['tit_2'];
$theme= $row['theme'];
$des= $row['desword'];


$version= explode("|",$row['version']);
}
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">关于</h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div id="jian" class="jumbotron">
  <h1><span class="fa fa-cloud"></span> 关于 树洞外链</h1>
  <p>程序版本：<?php echo $version['0'] ?>,&nbsp;&nbsp;版本代号：<?php echo $version[1] ?>;&nbsp;&nbsp;主题支持版本：<?php echo $version[2] ?></p>
  <p>作者博客：<a href="http://aoaoao.me" target="new">树洞</a></p>
    <p>E-mail:abslant@126.com     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ:912394456</p>
  <p>技术支持QQ群：64254928</p>
  <p>感谢轻梦、萌萌哒的布丁协助反馈、调试</p>
  <p>感谢您使用 树洞外链</p>
  <p>P.S.树洞外链的作者是个苦逼高中狗，你可以<a href="http://aoaoao.me/about" target="new">点击这里</a>捐助我以支持树洞外链发展！</p>
</div>


 <div class="container" id="xin" style="display:none;">
    
 <div class="jumbotron">
  <h1><span class="fa fa-gift"></span> 检测到新版本：<?php echo $version[0] ?>&nbsp;至&nbsp;<span id="newversion">2.0.1</span></h1>
  <span id="jianjie">
  <p>通过本程序你可以随时检测新版本并一键升级。您当前的版本为：<?php echo $version['0'] ?></p>
  <p>升级前请注意备份好网站文件及数据库的数据</p>
    <p>一键升级仅适用于2.X版本间的升级</p>
    </span>
  <p><a class="btn btn-primary btn-lg"  id="gx"role="button"><span class="fa fa-rocket"></span> 一键更新</a></p>
</div>
  </div>
  
  
  
   <div class="container" id="gxing" style="display:none;">
    
 <div class="jumbotron">
  <br>
 <div align="center"> <span class="fa fa-cloud-download fa-5x"></span>
 <h2>正在更新中，请不要关闭本页面</h2>
 </div>
</div>
  </div>
  
  
     <div class="container" id="shibai" style="display:none;">
    
 <div class="jumbotron">
  <br>
 <div align="center"> <span class="fa fa-frown-o fa-5x"></span>
 <h2 >更新失败，<span id="shibai_text"></span></h2>
 </div>
</div>
  </div>
  
  
       <div class="container" id="chenggong" style="display:none;">
    
 <div class="jumbotron">
  <br>
 <div align="center"> <span class="fa fa-smile-o fa-5x"></span>
 <h2 >更新成功，尽情享用新版本吧！</h2>
 </div>
</div>
  </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


</body>

</html>
<script>
function check(){
	$("#jc").attr("disabled","true");
		$("#jc").html("检查中...");
$.getJSON("http://www.00hdl.com/api/check.php?v=<?php echo $version[1] ?>&callback=?",
   function(data){
var ge=data;
	if(ge[0]=="bad"){ 
	alert("检查失败，错误信息："+ge[1]);
		$("#jc").removeAttr("disabled"); 
		$("#jc").html("立即检查新版本");
	}else if (ge[0]=="no"){ 
	iosOverlay({
		text: "未检测到新版本",
		duration: 2e3,
		icon: "./../content/themes/default/images/check.png"
		
	});
		$("#jc").removeAttr("disabled"); 
		$("#jc").html("立即检查新版本");
	}else if(ge[0]=="ok"){ 
	$("#newversion").html(ge[1]);
		$("#jianjie").html(ge[4]);
		$("#jian").hide();
		$("#xin").show();
		$("#gx").click(function() {
				$("#xin").hide();
					$("#gxing").show();
		$.post("../includes/upgrade.php", {
			v1:ge[1],
			v2:ge[2],
			v3:ge[3],
			url:ge[5],
			sjk:ge[6],
			ju:ge[7]
			
			
			},
   function(dd){
	   
	   	var di=dd.split(".");
		if(di[0]=="bad"){
			$("#gxing").hide();
				$("#shibai").show();
			$("#shibai_text").html(di[1]);
			
			}else if(di[0]=="ok"){
				
					$("#gxing").hide();
				$("#chenggong").show();
				}
	   
	   
	   
	   
   });
		
			} );
		
	}
   });
}

</script>