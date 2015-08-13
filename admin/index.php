<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/usercheck.php");
$title="管理面板首页";
require_once("common/head.php");
$jinri=date('Y-m-d',time());
$cha="SELECT * FROM `sd_file` WHERE `uploadtime` LIKE '%$jinri%' ";
$cha_result=mysql_query($cha);
$jinri1=mysql_num_rows($cha_result);
$zuori=date('Y-m-d',time()-86400);
$cha1="SELECT * FROM `sd_file` WHERE `uploadtime` LIKE '%$zuori%' ";
$cha_result1=mysql_query($cha1);
$zuori1=mysql_num_rows($cha_result1);
$cha2="SELECT * FROM `sd_file` where cishuo = '0'";
$cha_result2=mysql_query($cha2);
$zuori2=mysql_num_rows($cha_result2);
$cha3="SELECT * FROM `sd_file`";
$cha_result3=mysql_query($cha3);
$zuori3=mysql_num_rows($cha_result3);

$result = mysql_query("SELECT * FROM sd_setting");//获取数据
while($row = mysql_fetch_array($result))
  { 
$v= $row['version'];
$ak= $row['ak'];
	$array1 = explode("|",$v);//分割文件名
	$ver=$array1[1];
}
?>
<body onLoad='	$.getJSON("http://www.00hdl.com/api/ygg.php?v=<?php echo $ver ?>&callback=?",  function(data){
	
$("#ygg").html(data[0]);
	
});'>

      <script src="js/raphael-min.js"></script>
    <script src="js/morris.min.js"></script>
    <?php if($ak==""){ 
	echo'
	<div class="alert alert-danger alert-dismissible navbar-fixed-top" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<div align="center">您还未填写七牛相关设置，这会导致文件无法正常上传，请<a href="setting-qiniu.php">点击这里</a>填写</div>
</div>';
	
	}?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">面板首页</h1>
                    <div id="gg"></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cloud fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jinri1 ?></div>
                                    <div>今日上传文件</div>
                                </div>
                            </div>
                        </div>
                        <a href="file.php">
                            <div class="panel-footer">
                                <span class="pull-left" herf="file.php">查看详情</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cloud-upload 
 fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $zuori1 ?></div>
                                    <div>昨日上传文件</div>
                                </div>
                            </div>
                        </div>
                        <a href="file.php">
                            <div class="panel-footer">
                                <span class="pull-left">查看详情</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-inbox fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $zuori2?></div>
                                    <div>现存文件</div>
                                </div>
                            </div>
                        </div>
                        <a href="file.php">
                            <div class="panel-footer">
                                <span class="pull-left">查看详情</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $zuori3 ?></div>
                                    <div>已上传总文件</div>
                                </div>
                            </div>
                        </div>
                        <a href="file.php">
                            <div class="panel-footer">
                                <span class="pull-left">查看详情</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> 10日统计
                          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
              
            </div>
            
            
            
                            <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bullhorn fa-fw"></i> 云公告
                          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="ygg">
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
              
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

$(function() {
	

	
    Morris.Area({
        element: 'morris-area-chart',
        data: [<?php

$x=1; 
while($x<=10) {
$x_x=10-$x;
$riqi=date('Y-m-d',time()-86400*$x_x);
$wenjian="SELECT * FROM `sd_file` WHERE `uploadtime` LIKE '%$riqi%'";
$wenjian_res=mysql_query($wenjian);
$wj=mysql_num_rows($wenjian_res);
$wenjian1="SELECT * FROM `sd_file` WHERE `uploadtime` LIKE '%$riqi%' and cishuo = '1'";
$wenjian_res1=mysql_query($wenjian1);
$wj_del=mysql_num_rows($wenjian_res1);
$fx1="SELECT * FROM `sd_ss` WHERE `sstime` LIKE '%$riqi%'";
$wenjian_res2=mysql_query($fx1);
$ss=mysql_num_rows($wenjian_res2);
$fx2="SELECT * FROM `sd_sskey` WHERE `sstime` LIKE '%$riqi%'";
$wenjian_res3=mysql_query($fx2);
$sskey=mysql_num_rows($wenjian_res3);
$share=$ss+$sskey;
echo "{
            period: '$riqi',
            上传文件: $wj,
            删除文件: $wj_del,
            分享文件: $share
        },";
  $x++;
} 



        ?>],
        xkey: 'period',
        ykeys: ['上传文件', '删除文件', '分享文件'],
        labels: ['上传文件', '删除文件', '分享文件'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

  
})




</script>