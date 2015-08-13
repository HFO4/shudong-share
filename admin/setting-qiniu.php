<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/usercheck.php");
$title="七牛相关设置";
require_once("common/head.php");

$result = mysql_query("SELECT * FROM sd_setting");//获取数据
while($row = mysql_fetch_array($result))
  { 
$kjm= $row['kjming'];
$ak= $row['ak'];
$sk= $row['sk'];
$kjurl= substr($row['kjurl'],7);
$kjurl= substr($kjurl,0,strlen($kjurl)-1);
$zzurl= $row['zzurl'];
}
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">七牛设置</h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form id="setting">
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">空间名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="kjm" value="<?php echo $kjm ?>"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">创建空间时填写的空间名，一般为英文字符，列如“sdcc”</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">空间地址:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <div class="input-group">
                  <div class="input-group-addon">http://</div>
                 <input type="text" name="kjurl" value="<?php echo $kjurl ?>"class="form-control">
                                   <div class="input-group-addon">/</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间的URL，一般格式为“空间名.qiniudn.com”，您也可使用自己的域名，但要先到七牛后台绑定。<strong>只需填写主体部分，开头无需加“http://”，结尾无需加“/”</strong>，例如sdcc.qiniudn.com</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">AccessKey(公钥):</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="ak" value="<?php echo $ak ?>"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间的AK,即公钥，可以到七牛后台-账号-密钥中查看</div>
                    </div>
              
            </div>
            <!-- /.row -->
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">SecretKey(私钥):</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="sk" value="<?php echo $sk ?>"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间的SK,即公钥，可以到七牛后台-账号-密钥中查看</div>
                    </div>
              
            </div>
            <!-- /.row -->
                <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">主站URL:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="zzurl" value="<?php echo $zzurl ?>"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">树洞外链主程序所在的URL，即网站主站URL，一般安装后无需更改</div>
                    </div>
              
            </div>
            <!-- /.row -->        </form>
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
function save(){
$.post("../includes/save_setting_qiniu.php", $("#setting").serialize(),
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