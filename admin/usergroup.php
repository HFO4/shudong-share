<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/connect.php");
require_once("../includes/usercheck.php");
$title="用户组管理";
require_once("common/head.php");

$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$tit= $row['main_tit'];
$tit1= $row['tit_2'];
}
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">用户组管理</h1>
                    <div id="gg"></div>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="col-md-6">
            <div class="panel panel-default">
  <div class="panel-heading"><i class="fa fa-plus"></i> 添加用户组</div>
  <div class="panel-body">
    <form id="addgroup"class="form-inline">
   

    <label for="exampleInputName2">用户组名:</label>
    <input type="text" class="form-control" name="gname" >

   
    <label for="exampleInputName2">上传方案:</label><br>
    <select name="gpolicy" class="form-control">

<?php
$up="SELECT * FROM `sd_policy`";
$query5=mysqli_query($con,$up);
  while($row5=mysqli_fetch_assoc($query5)){
    echo '  <option value ="'.$row5['id'].'">'.$row5['p_name'].'</option>';
  }
?>
  </select> 
  <br><br>
  <a class="btn btn-primary btn-block" onclick="addgroup();">添加用户组</a>
  <br>
</form>
</div></div></div>
            <div class="col-md-6">
            <div class="panel panel-default">
  <div class="panel-heading"> 说明</div>
  <div class="panel-body">
    删除用户组必须要先删除其下所有用户。你可以为不同用户组绑定不同上传方案。
  </div>
</div>


</div>


            <!-- /.row -->
            <div class="table-responsive">
          
             <table class="table table-striped table-bordered table-hover">
              <thead>
               <tr>
               <th> <input type="checkbox" onclick="selectAll(this);"  /></th>
                  <th>ID</th>
                   <th>用户组名</th>
                    <th>绑定上传方案</th>
                     <th>用户数</th>
                     <th>添加时间</th>
                  <th>操作</th>
                   </tr>
                 </thead>
               <tbody>
 <?php
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
$url=$url[path];
$pagesize=$_GET['s'];

$numq=mysqli_query($con,"SELECT * FROM `sd_usergroup` ");
$num = mysqli_num_rows($numq);
$suser=$_GET['search'];
$g=$_GET['g'];  
if(! (empty($g)) and $g != "all"){
  $others = $others."WHERE `group` = '$g'";
}
if(! (empty($suser))){
  if(strstr($suser,"@")){
    $others = "WHERE `username` = '$suser'";
  }else{
    $others = "WHERE `uid` = '$suser'";
  }
}
if($_GET[page]){
$pageval=$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
if($num > $pagesize){
 if($pageval<=1)$pageval=1;
}
$line="SELECT * FROM `sd_usergroup`   ORDER BY `id` DESC limit $page $pagesize";
$pagenum=ceil($num/$pagesize);

 $query=mysqli_query($con,$line);
      while($row=mysqli_fetch_assoc($query)){
        $pid=$row['policyid']; 
$gid=$row['id'];
    $line3="SELECT * FROM `sd_policy`  WHERE id = '$pid'";
   $query3=mysqli_query($con,$line3);
    while($row3=mysqli_fetch_assoc($query3)){
  $policy = $row3['p_name'];
    }

$line4="SELECT * FROM `sd_users`  WHERE `group` = '$gid'";
$wenjian_res=mysqli_query($con,$line4);
$wj=mysqli_num_rows($wenjian_res);
        echo'<tr>
        <td><input type="checkbox"name="group"value="'.$gid.'"  /></td>
  <td>'.$gid.'</td>

<td>'.$row["gname"].'</td>
<td>'.$policy.'</td>
<td>'.$wj.'</td>
<td>'.$row['addtime'].'</td>
<td><button class="btn btn-info"onclick="edituser(\''.$gid.'\',\''.$row["gname"].'\',\''.$row["policyid"].'\',\''.$row["addtime"].'\');">编辑</button> <button onclick="delgroup(\''.$gid.'\');"class="btn btn-danger">删除</button></td>
  </tr>';
      }
 ?>

                      </tbody></table></div>

  <button onclick="delall();"id="s"class="btn btn-danger"><i class="fa fa-times"></i> 删除选中用户组</button><br><br>

<div class="row">

<div class="col-lg-3">

</div>
<div class="col-lg-6"></div>
  <div class="col-lg-3">
    <div class="input-group">
       <span class="input-group-addon" id="basic-addon1">每页展示个数</span>
      <input type="text" class="form-control" id="ps"aria-label="..." value="<?php
echo $pagesize
      ?>">
      <span class="input-group-btn">
      <button class="btn btn-primary " onclick="pagesize();">确定</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
<br><br>
             <div style="float:left;position:relative; top:20px;left: 20px;"><h5>共有<?php echo $num ?>条记录&nbsp;&nbsp;当前第<?php echo $pageval ; ?>页，共<?php echo $pagenum ?>页</h5> </div>
                            <nav>
  <ul style="float:right;"class="pagination">
    <li>
      <a href="<?php
      if($pageval=="1"){
      echo "#";
      
      }else{
        echo $url."?page=".($pageval-1);
        }
    ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    
    <?php
    $p = new PageTool($num,$pageval,$pagesize);
  echo $p->show();
    
    ?>
    
 
    <li>
      <a href="<?php
       if ($pageval==$pagenum){echo "#";}else{
        echo $url."?page=".($pageval+1);
     }
    
    
    
    ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav><br><br><br>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    
    <!-- /#wrapper -->

    <!-- jQuery -->

<div class="modal fade bs-example-modal-lg"id="edit"  tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">编辑用户组</h4>
      </div>
      <div class="modal-body">
      <form id="egroup" class="form-horizontal">
      <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-2 control-label">GID</label>
    <div class="col-sm-10">
    <div id="eegid"></div>
      <div style="display: none"><input type="text" class="form-control" id="egid"name="egid" /></div>
    </div>
    </div>
          <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-2 control-label">用户组名</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="egname"name="egname">
    </div>
    </div>
    <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">上传方案</label>
    <div class="col-sm-10">
        <select name="epolicy" id="epolicy" class="form-control">

<?php
$up="SELECT * FROM `sd_policy`";
$query5=mysqli_query($con,$up);
  while($row5=mysqli_fetch_assoc($query5)){
    echo '  <option value ="'.$row5['id'].'">'.$row5['p_name'].'</option>';
  }
?>
  </select> 
    </div>
    </div>
   
          <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-2 control-label">添加时间</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="eaddtime"name="eaddtime" disabled/>
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
function saveedit(){
      $.post("../includes/adminAction.php",$("#egroup").serialize()+"&action=editgroup",
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
function edituser(gid,gname,policy,regtime){
$('#edit').modal('toggle');
$("#egid").val(gid);
$("#egname").val(gname);
$("#eegid").html(gid+"(不可更改)");
$("#epolicy").val(policy);
$("#eaddtime").val(regtime);
}
 function selectAll(checkbox) {
                $('input[type=checkbox]').prop('checked', $(checkbox).prop('checked'));
            }

function changeURLArg(url,arg,arg_val){ 
    var pattern=arg+'=([^&]*)'; 
    var replaceText=arg+'='+arg_val; 
    if(url.match(pattern)){ 
        var tmp='/('+ arg+'=)([^&]*)/gi'; 
        tmp=url.replace(eval(tmp),replaceText); 
        return tmp; 
    }else{ 
        if(url.match('[\?]')){ 
            return url+'&'+replaceText; 
        }else{ 
            return url+'?'+replaceText; 
        } 
    } 
    return url+'\n'+arg+'\n'+arg_val; 
} 
(function ($) {
                $.getUrlParam = function (name) {
                    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
                    var r = window.location.search.substr(1).match(reg);
                    if (r != null) return unescape(r[2]); return null;
                }
 })(jQuery);
 var ugnow = $.getUrlParam('g');
  var p = $.getUrlParam('page');
   var s = $.getUrlParam('s');
   var f = $.getUrlParam('f');
if(ugnow == null){
$("#ug ").val("all");  
}else{
$("#ug ").val(ugnow);  
}
$("#ug").change(function(){
var ugnew = $("#ug").val();
var urlnew = changeURLArg('user.php?page=1'+"&s="+s+"&g=1",'g',ugnew);
window.location.href=urlnew; 
});
function pagesize(){
  var snew=$("#ps").val();
  if(ugnow == null){
    ugnow = "all";
  }
  var urlnew1 = changeURLArg("user.php?page=1&s=10"+"&g="+ugnow,'s',snew);
window.location.href=urlnew1; 
}
function delgroup(uid){

  $.post("../includes/adminAction.php",{gid: uid,action: "delgroup"},
  function(data){
    var pe=data.split(".");
    if(pe[0]=="ok"){ 
alert(pe[1]);
window.location.reload();
    }else{ 
alert(pe[1]);


 };

});
}

  function delall(){
     var chk_value =[];//定义一个数组    
            $('input[name="group"]:checked').each(function(){  
            chk_value.push($(this).val());   
            });
            $("#s").attr("disabled","true");
            for(key1 in chk_value){ 
                                           $.ajax({
             type: "POST",
             url: "../includes/adminAction.php",
             data: {gid: chk_value[key1],action: "delgroup"},
             dataType: "text",
             async: false,
             success: function(data){
    var pe=data.split(".");
    if(pe[0]=="ok"){ 

    }else{ 
alert("删除GID:"+key1+"时遇到错误");


 };

                      }
         });

                
            }
            $("#ss").removeAttr("disabled");
          window.location.reload();
  } 
function addgroup(){
    $.post("../includes/adminAction.php",$("#addgroup").serialize()+"&action=addgroup",
  function(data){
    var pe=data.split("|");
    if(pe[0]=="ok"){ 
      $('#addgroup')[0].reset();  
  iosOverlay({
    text: "添加成功",
    duration: 2e3,
    icon: "images/check.png"
  });
    }else{ 
alert(pe[1]);


 };

});
}
$("#s-go").click(function(){
    var suser = $("#suser").val();
    var uslnew = "user.php?s="+s+"&search="+suser;
window.location.href=uslnew; 
})

</script>