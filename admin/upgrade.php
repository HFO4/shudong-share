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
                    <h1 class="page-header">在线升级</h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div id="jian" class="jumbotron">
  <h1><span class="fa fa-rocket"></span> 欢迎使用在线升级程序</h1>
  <p>通过本程序你可以随时检测新版本并一键升级。您当前的版本为：<?php echo $version['0'] ?></p>
  <p>升级前请注意备份好网站文件及数据库的数据</p>
  <p><a class="btn btn-primary btn-lg"  id="jc"onclick="check();"role="button">立即检查新版本</a></p>
</div>


 <div  id="xin" style="display:none;" style="width:1000px;">
    
 <div class="jumbotron">
  <h1><span class="fa fa-gift"></span> 检测到新版本：<?php echo $version[0] ?>&nbsp;至&nbsp;<span id="newversion">2.0.1</span></h1>
  <span id="jianjie">
  <p>通过本程序你可以随时检测新版本并一键升级。您当前的版本为：<?php echo $version['0'] ?></p>
  <p>升级前请注意备份好网站文件及数据库的数据</p>
    </span>
  <p><a class="btn btn-primary btn-lg"  id="gx"role="button"><span class="fa fa-rocket"></span> 一键更新</a></p>
</div>
  </div>
  
  
  
   <div id="gxing" style="display:none;">
    
 <div class="jumbotron">
  <br>
 <div align="center"> <span class="fa fa-cloud-download fa-5x"></span>
 <h2 id="process">正在下载更新包...</h2>
 </div>
</div>
  </div>
  
  
     <div  id="shibai" style="display:none;">
    
 <div class="jumbotron">
  <br>
 <div align="center"> <span class="fa fa-frown-o fa-5x"></span>
 <h2 >更新失败，<span id="shibai_text"></span></h2>
 </div>
</div>
  </div>
  
  
       <div  id="chenggong" style="display:none;">
    
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
$.getJSON("http://aoaoao.me/api/check.php?v=<?php echo $version[1] ?>&callback=?",
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
		icon: "images/check.png"
		
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
		$.post("../includes/update.php", {
			v1:ge[1],
			v2:ge[2],
			v3:ge[3],
			url:ge[5],
			biaoshi:ge[6],
	
			
			
			},
   function(dd){
	   
	   	var di=dd.split(".");
		if(di[0]=="bad"){
			$("#gxing").hide();
				$("#shibai").show();
			$("#shibai_text").html(di[1]);
			
			}else if(di[0]=="ok"){
				
		$("#process").html("正在应用更新");


				$.post("../"+ge[6]+".php", {
	sure:"yes",
	
			
			
			},
   function(ddd){
	   
	  
	   if(ddd=="ok."){ 
$("#gxing").hide();
$("#chenggong").show();

	   }else{ 
$("#gxing").hide();
$("#shibai").show();

	   }
	   
	   
	   
	   
   });
				}
	   
	   
	   
	   
   });
		
			} );
		
	}
   });
}

</script>