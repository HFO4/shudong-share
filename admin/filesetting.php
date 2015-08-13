<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/usercheck.php");
$title="上传/下载设置";
require_once("common/head.php");

$result = mysql_query("SELECT * FROM sd_setting");//获取数据
while($row = mysql_fetch_array($result))
  { 
$hz= $row['upload_minetype'];
$dx= $row['upload_size'];
$fp= $row['upload_fpsize'];
$ml= $row['morelimt'];
$lx= $row['leixing'];
$dx_1= $row['daxiao'];
$fx= $row['share'];
$mm= $row['autoname'];
}
if($mm=="true"){ 
$mm1="checked";
$mm2="";
}else if($mm=="false"){ 
$mm2="checked";
$mm1="";
}
if($fx=="true"){ 
$fx1="checked";
$fx2="";
}else if($fx=="false"){ 
$fx2="checked";
$fx1="";
}
if($ml=="true"){ 
$xz1="checked";
$xz2="";
$ms="";
}else if($ml=="false"){ 
$xz2="checked";
$xz1="";
$ms="display:none;";
}
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">上传/下载设置</h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form id="setting">
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">允许的文件扩展名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="hz" value="<?php echo $hz ?>"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件的扩展名，多个请用英文逗号“,”隔开</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">最大文件尺寸:</label>
                    </div>
                 <div class="col-lg-5" align="right">
            <div class="input-group">

                 <input type="text" name="dx" value="<?php echo $dx ?>"class="form-control">
     
                <div class="input-group-addon">M</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件最大大小，单位为mb，只需输入数字即可</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">分片上传大小:</label>
                    </div>
                                
                 <div class="col-lg-5" align="right"><div class="input-group">
                 <input type="text" name="fp" value="<?php echo $fp ?>"class="form-control">                <div class="input-group-addon">M</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">分片上传可以提高大文件上传效率，文件将分为几块上传，这里填写的是“块”的大小，一般无需更改。单位mb，只需填写数字即可</div>
                    </div>
              
            </div>
            <!-- /.row -->
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">是否自动重命名</label>
                    </div>
                 <div class="col-lg-5" align="left">
                <input type="radio" name="mm" id="mm"value="true" <?php echo $mm1 ?>/><label for="mm">开启</label> &nbsp;&nbsp;&nbsp; <input type="radio" name="mm" value="false" id="mq"<?php echo $mm2 ?>/><label for="mq">关闭</label>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">推荐开启，开启后系统会自动重命名文件。关闭也可，但重名文件会被覆盖</div>
                    </div>
              
            </div>
            <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">是否开启文件分享系统</label>
                    </div>
                 <div class="col-lg-5" align="left">
                <input type="radio" name="ss" id="ss"value="true" <?php echo $fx1 ?>/><label for="ss">开启</label> &nbsp;&nbsp;&nbsp; <input type="radio" name="ss" value="false" id="sq"<?php echo $fx2 ?>/><label for="sq">关闭</label>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">开启后用户可以创建分享链接。关闭后已有的分享将无法访问</div>
                    </div>
              
            </div>
                        <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">是否开启严格限制</label>
                    </div>
                 <div class="col-lg-5" align="left">
                <input type="radio" name="xz" id="xz"value="true"onclick="show_l();" <?php echo $xz1 ?>/><label for="xz">开启</label> &nbsp;&nbsp;&nbsp; <input type="radio" name="xz" value="false"onclick="hide_l();" id="xq"<?php echo $xz2 ?>/><label for="xq">关闭</label>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">推荐开启。上边设置的限制只能在前端进行限制，容易被非法篡改。开启严格限制后会从后端也进行限制，大幅提高安全性</div>
                    </div>
              
            </div>
            <div style="<?php echo $ms ?>" id="morelimit">
            <!-- /.row -->
                <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">严格限制文件最大尺寸:</label>
                    </div>
                 <div class="col-lg-5" align="right"><div class="input-group">
                 <input type="text"  name="dx_1" value="<?php echo $dx_1 ?>"class="form-control"><div class="input-group-addon">字节（Byte）</div>
                    </div></div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">严格限制文件的最大尺寸，超出尺寸会提示出错。单位为字节（Byte），只填写数字部分即可</div>
                    </div>
              
            </div>
                            <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">严格限制mimeType:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="lx" value="<?php echo $lx ?>"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">严格限制文件的MimeType.多个请用英文分号“;”隔开。你可以<a href="http://tool.oschina.net/commons" target="new">点击这里</a>查询各种文件扩展名对应的MimeType</div>
                    </div>
              
            </div>
            
            
            </div>
            <!-- /.mo -->        </form>
             <!-- /.row -->
                <div style="height:20px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
   
                    </div>
                 <div class="col-lg-5" align="left">
           <button class="btn btn-lg btn-primary" onClick="save();">保存更改</button>
                    </div>
                    <div class="col-lg-3" align="right">
        
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
function show_l(){ 
$("#morelimit").fadeIn("slow");
}
function hide_l(){ 
$("#morelimit").fadeOut("slow");
}
function save(){
$.post("../includes/save_setting-file.php", $("#setting").serialize(),
   function(data){
	var ge=data.split("|");
	if(ge[0]=="bad"){ 
	alert("保存失败，错误信息："+ge[1]);
	}else if (ge[0]=="ok"){ 
iosOverlay({
		text: "保存成功",
		duration: 2e3,
		icon: "./../content/themes/default/images/check.png"
	});
	
	}
   });
}

</script>