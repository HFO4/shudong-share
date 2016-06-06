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

                     <div class="alert alert-danger" role="alert">删除上传方案前请先确保用户组解除绑定、该方案下所有文件已被删除，否则<strong>残留的文件将无法外链、分享、删除！</strong></div>
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
    case 'oss':
      	$p_type = '阿里云OSS';
      	break;
    case 'upyun':
    	$p_type = '又拍云';
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
<td><button class="btn btn-primary" onclick=\'showinfo("'.$row['id'].'");\'>详情</button> <button class="btn btn-info"onclick="editpolicy(\''.$row['id'].'\',\''.$row["p_server"].'\',\''.$row["p_bucketname"].'\',\''.$row["p_url"].'\',\''.$row['p_ak'].'\',\''.$row["p_sk"].'\',\''.$row["p_filetype"].'\',\''.$row["p_mimetype"].'\',\''.$row['p_size'].'\',\''.$row["p_autoname"].'\',\''.$row["p_namerule"].'\',\''.$row["p_dir"].'\');">编辑</button> <button onclick="delpolicy(\''.$row['id'].'\');"class="btn btn-danger">删除</button></td>
    </tr>
<tr id="p'.$row['id'].'" style="display:none;"> <td colspan="6">
<strong>上传服务器URL</strong>：'.$row['p_server'].'&nbsp;&nbsp;&nbsp;

<strong>空间名</strong>：'.$row['p_bucketname'].'&nbsp;&nbsp;&nbsp;
<strong>外链URL</strong>：'.$row['p_url'].'&nbsp;&nbsp;&nbsp;<br>
<strong>AK:</strong>：'.$row['p_ak'].'&nbsp;&nbsp;&nbsp;
<strong>SK</strong>：'.$row['p_sk'].'&nbsp;&nbsp;&nbsp;<br>
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

<div class="modal fade bs-example-modal-lg"id="edit"  tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">编辑上传方案</h4>
      </div>
      <div class="modal-body">
      <form id="epolicy" class="form-horizontal">
      <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">ID(请不要更改)</label>
    <div class="col-sm-9">
    <div id="eeuid"></div>
      <div style=""><input type="text" class="form-control" id="p_id"name="p_id" /></div>
    </div>
    </div>
          <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">上传服务器URL</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="p_server" name="p_server">
    </div>
    </div>
    <div class="form-group">
             <label for="inputEmail3" class="col-sm-3 control-label">空间名</label>
    <div class="col-sm-9">
  <input type="text" class="form-control" id="p_bucketname" name="p_bucketname">
    </div>
    </div>
              <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">外链URL</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="p_url"name="p_url" />
    </div>
    </div>
          <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">AK</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="p_ak"name="p_ak" />
    </div>
    </div>
      <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">SK</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="p_sk"name="p_sk" />
    </div>
    </div>
          <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">存放目录</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="p_dir"name="p_dir" />
    </div>
    </div>
      <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">最大尺寸</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="p_size"name="p_size" />
    </div>
    </div>
        <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">允许扩展名</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="p_filetype"name="p_filetype" />
    </div>
    </div>
         <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">允许mimetype</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="p_mimetype"name="p_mimetype" />
    </div>
    </div>
      <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">自动命名</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="p_autoname"name="p_autoname" />
    </div>
    </div>
      <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-3 control-label">命名规则</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="p_namerule"name="p_namerule" />
    </div>
    </div>
   
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" onclick="saveedit();">保存更改</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
		icon: "images/check.png"
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
function editpolicy(id,p_server,p_bucketname,p_url,p_ak,p_sk,p_filetype,p_mimetype,p_size,p_autoname,p_namerule,p_dir){
$('#edit').modal('toggle');
$("#p_id").val(id);

$("#p_server").val(p_server);
$("#p_bucketname").val(p_bucketname);
$("#p_url").val(p_url);  
$("#p_ak").val(p_ak);
$("#p_sk").val(p_sk);  
$("#p_filetype").val(p_filetype);
$("#p_mimetype").val(p_mimetype); 
$("#p_size").val(p_size);
$("#p_autoname").val(p_autoname);   
$("#p_namerule").val(p_namerule);   
$("#p_dir").val(p_dir);  
}
function saveedit(){
      $.post("../includes/adminAction.php",$("#epolicy").serialize()+"&action=editpolicy",
  function(data){
    var pe=data.split("|");
    if(pe[0]=="ok"){ 

      $('#edit').modal('toggle');
  iosOverlay({
    text: "修改成功",
    duration: 2e3,
    icon: "images/check.png"
  });
  window.location.reload();
    }else{ 
alert(pe[1]);


 };

});
}
function delpolicy(uid){
 var returnVal = window.confirm("删除操作不可恢复，请确定您已删除该方案所有下属文件？", "确认删除");
if(!returnVal) {
    
}else{ 

  $.post("../includes/adminAction.php",{id: uid,action: "delpolicy"},
  function(data){
    var pe=data.split(".");
    if(pe[0]=="ok"){ 
alert(pe[1]);
window.location.reload();
    }else{ 
alert(pe[1]);


 };

});
}}
</script>