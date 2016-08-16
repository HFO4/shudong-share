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
  <p>作者博客：<a href="http://aoaoao.me" target="new">树洞</a>;
    &nbsp;&nbsp;E-mail:abslant@126.com;   &nbsp;&nbsp;QQ:912394456&nbsp;&nbsp;
  技术支持QQ群：493870295</p>
  <p>GitHub项目主页：<a href="https://github.com/HFO4/shudong-share"target="_blank">shudong-share</a> (求个Star_(:зゝ∠)_)</p>

  <p>感谢您使用 树洞外链</p>
  <p>P.S.树洞外链的作者是个苦逼高中狗，你可以<a href="http://aoaoao.me/about" target="new">点击这里</a>捐助我以支持树洞外链发展！</p>
  <p><strong>使用协议：</strong>
1.你可以在保留版权链接的情况下以非商业目的使用树洞外链；<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
2.你可以自由修改本程序，但禁止以商业目的出售、专卖原程序、二次修改程序；<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
3.对于不遵守以上协议的，树洞外链开发者有权停止对其的服务支持并追究法律责任。
  </p>
</div>


        </div>
        <!-- /#page-wrapper -->


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
