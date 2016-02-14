<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/connect.php");
require_once("../includes/usercheck.php");
$title="上传方案";
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
}
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">上传方案</h1>
                    <div id="gg"></div>
                    <div class="alert alert-info" role="alert">你可以在这里管理上传方案。每种上传方案分别对应着一种文件存储方式，你可以添加多个上传方案，然后分别绑定不同用户组，实现不同用户组上传至不同地点。修改、删除上传方案会导致使用该方案上传的文件无法管理。<br><strong>如无特殊原因，我们不推荐您删除、修改已添加的上传方案!</strong><br>如需修改，请新建一个，再绑定到用户组。</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="table-responsive">
             <br>
             <table class="table table-striped table-bordered table-hover">
              <thead>
               <tr>
                  <th>ID</th>
                   <th>上传方案名</th>
                    <th>储存位置</th>
                     <th>下属文件</th>
                     <th>绑定的用户组</th>
                  <th>操作</th>
                   </tr>
                 </thead>
               <tbody>
        
<?php
$line="SELECT * FROM `sd_policy`  ORDER BY `id` DESC";
 $query=mysqli_query($con,$line);
  while($row=mysqli_fetch_assoc($query)){
    $pid = $row['id'];
    $userg="SELECT * FROM `sd_usergroup` WHERE policyid='$pid' ORDER BY `id` DESC";
    $query1=mysqli_query($con,$userg);
    while($row1=mysqli_fetch_assoc($query1)){
        $bandgroup = $row1['gname']."，";
    }
    $wenjian="SELECT * FROM `sd_file` WHERE `policyid` = '$pid'";
$wenjian_res=mysqli_query($con,$wenjian);
$wj=mysqli_num_rows($wenjian_res);
switch ($row['p_type']) {
    case 'qiniu':
        $p_type = "七牛";
        break;
    case 'local':
        $p_type = "本地";
        break;
    case 'server':
        $p_type = "远程";
        break;
    default:
        # code...
        break;
}
    echo '<tr>
<td>'.$row['id'].'</td>
<td>'.$row['p_name'].'</td>
<td>'.$p_type.'</td>
<td>'.$wj.'个</td>
<td>'.$bandgroup.'</td>
<td><button class="btn btn-primary" onclick=\'showinfo("'.$row['id'].'");\'>详情</button></td>
    </tr>
<tr id="p'.$row['id'].'" style="display:none;"> <td colspan="6">
<strong>上传服务器URL</strong>：'.$row['p_server'].'&nbsp;&nbsp;&nbsp;

<strong>空间名（仅七牛）</strong>：'.$row['p_bucketname'].'&nbsp;&nbsp;&nbsp;
<strong>外链URL</strong>：'.$row['p_url'].'&nbsp;&nbsp;&nbsp;<br>
<strong>AK:</strong>：'.$row['p_ak'].'&nbsp;&nbsp;&nbsp;
<strong>SK(仅七牛)</strong>：'.$row['p_sk'].'&nbsp;&nbsp;&nbsp;<br>
<strong>允许扩展名</strong>：'.$row['p_filetype'].'&nbsp;&nbsp;&nbsp;<br>
<strong>允许MimeType</strong>：'.$row['p_mimetype'].'&nbsp;&nbsp;&nbsp;<br>
<strong>最大尺寸（字节）</strong>：'.$row['p_size'].'&nbsp;&nbsp;&nbsp;
<strong>自动命名</strong>：'.$row['p_autoname'].'&nbsp;&nbsp;&nbsp;
<strong>命名规则（仅本地/远程）</strong>：'.$row['p_namerule'].'&nbsp;&nbsp;&nbsp;
</td></tr>
    ';

  }
?>

                      </tbody></table>

            
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

$.post("../includes/adminAction.php", $("#setting").serialize()+"&action=savesetting",
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
$(function () {
  $('[data-toggle="popover"]').popover()
})
function showinfo(id){
    if($('#p'+id).is(':hidden')){
        $('#p'+id).show();
    }else{
        $('#p'+id).hide();
    }

}
</script>