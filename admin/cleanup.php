<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/connect.php");
require_once("../includes/usercheck.php");
$title="清理优化";
require_once("common/head.php");

$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$tit= $row['main_tit'];
$tit1= $row['tit_2'];
$theme= $row['theme'];
$des= $row['desword'];
$kw= $row['keyword'];
$notice= $row['notice'];
$tjcode= $row['tjcode'];
$zzurl= $row['zzurl'];
}
?>
<body>
<style type="text/css">
.ex{

    background-color: #f2f2f2;
    padding: 30px;
    border-top: 2px solid #eaeaec;
    -webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.1);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.1);
}
.ex-left{
    position: relative;
    display: inline;
    margin-left:20%; 
}
</style>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">清理优化</h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
             <div class="col-lg-6">
            <div class="ex">
              <div class="col-lg-6">
                    <button class="btn btn-success btn-lg" id="cleantemp" onclick="cleantemp();">清理模板缓存</button>
                    </div>
                <div class="col-lg-6">当你修改了模板而未生效时、前端视图错乱时，可以尝试清理模板缓存。</div>
                <br><br><br>
            </div>
            </div>

                 <div class="col-lg-6">
            <div class="ex">
              <div class="col-lg-6">
                    <button class="btn btn-success btn-lg" id="cleanfile" onClick="cleanfile()">清理无效文件记录</button>
                    </div>
                <div class="col-lg-6">默认情况下文件被删除后,文件上传记录仍会被保留在数据库中,你可以在此删除这些记录。</div>
                <br><br><br>
            </div>
            </div>
          
                 <div class="col-lg-6">
  <br>
            <div class="ex">
              <div class="col-lg-6">
                    <button class="btn btn-success btn-lg" id="cleansql" onClick="cleansql()">清理数据表</button>
                    </div>
                <div class="col-lg-6">清理数据表的冗余数据。</div>
                <br><br>
            </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


</body>

</html>
<script>
function cleantemp(){
  $("#cleantemp").attr("disabled","true");
 $("#cleantemp").html("请稍后...");
$.post("../includes/adminAction.php", {action:'cleantemp'},
   function(data){
	var ge=data.split("|");
	if(ge[0]=="bad" || ge[0]==''){ 
	alert("执行失败，错误信息："+ge[1]);

	}else if (ge[0]=="ok"){ 
iosOverlay({
		text: "清理完成",
		duration: 2e3,
		icon: "images/check.png"
	});
	
	}

   });
$("#cleantemp").removeAttr("disabled");
 $("#cleantemp").html("清理模板缓存");

}
function cleanfile(){
  $("#cleanfile").attr("disabled","true");
 $("#cleanfile").html("请稍后...");
$.post("../includes/adminAction.php", {action:'cleanfile'},
   function(data){
	var ge=data.split("|");
	if(ge[0]=="bad" || ge[0]==''){ 
	alert("执行失败，错误信息："+ge[1]);

	}else if (ge[0]=="ok"){ 
alert("共清理了"+ge[1]+"条记录")
	
	}

   });
$("#cleanfile").removeAttr("disabled");
 $("#cleanfile").html("清理无效文件记录");

}
function cleansql(){
  $("#cleansql").attr("disabled","true");
 $("#cleansql").html("请稍后...");
$.post("../includes/adminAction.php", {action:'cleansql'},
   function(data){
	var ge=data.split("|");
	if(ge[0]=="bad" || ge[0]==''){ 
	alert("执行失败，错误信息："+ge[1]);

	}else if (ge[0]=="ok"){ 
iosOverlay({
		text: "清理完成",
		duration: 2e3,
		icon: "images/check.png"
	});
	
	
	}

   });
$("#cleansql").removeAttr("disabled");
 $("#cleansql").html("清理数据表");

}
</script>