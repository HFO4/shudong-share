<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/usercheck.php");
$title="基础设置";
require_once("common/head.php");

$result = mysql_query("SELECT * FROM sd_setting");//获取数据
while($row = mysql_fetch_array($result))
  { 
$tit= $row['main_tit'];
$tit1= $row['tit_2'];
$theme= $row['theme'];
$des= $row['desword'];
$kw= $row['keyword'];
$notice= $row['notice'];
$tjcode= $row['tjcode'];
}
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">基本设置</h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form id="setting">
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">站点主标题:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="tit" value="<?php echo $tit ?>"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">站点的主标题</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">站点副标题:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="tit_2" value="<?php echo $tit1 ?>"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">站点的副标题，紧随主标题后的介绍文字</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">关键字:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="kw" value="<?php echo $kw ?>"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">站点的关键字，利于搜索引擎抓取，多个请用“,”隔开</div>
                    </div>
              
            </div>
            <!-- /.row -->
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">站点描述:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <textarea  name="des" class="form-control"><?php echo $kw ?></textarea>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">用于描述站点的介绍性文字</div>
                    </div>
              
            </div>
            <!-- /.row -->
                <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">统计代码:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <textarea  name="tjcode" rows="3"class="form-control"><?php echo $tjcode ?></textarea>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">插入在页面底部的代码，可用于统计站点访问数据</div>
                    </div>
              
            </div>
            <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">首页公告:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <textarea  name="notice" rows="3"class="form-control"><?php echo $notice ?></textarea>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">显示在网站首页的公告文字，留空不显示</div>
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
$.post("../includes/save_setting.php", $("#setting").serialize(),
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