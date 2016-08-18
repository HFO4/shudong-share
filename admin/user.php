<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/connect.php");
require_once("../includes/usercheck.php");
$title="用户管理";
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
                    <h1 class="page-header">用户管理</h1>
                    <div id="gg"></div>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="col-md-6">
            <div class="panel panel-default">
  <div class="panel-heading"><i class="fa fa-plus"></i> 添加用户</div>
  <div class="panel-body">
    <form id="adduser"class="form-inline">
   

    <label for="exampleInputName2">用户邮箱:</label>
    <input type="text" class="form-control" name="username" >
   <label for="exampleInputName2">密码:</label>
    <input type="text" class="form-control" name="pwd" >
   
    <label for="exampleInputName2">用户组:</label><br>
    <select name="ug" class="form-control">

<?php
$up="SELECT * FROM `sd_usergroup`";
$query5=mysqli_query($con,$up);
  while($row5=mysqli_fetch_assoc($query5)){
    echo '  <option value ="'.$row5['id'].'">'.$row5['gname'].'</option>';
  }
?>
  </select> 
  <br><br>
  <a class="btn btn-primary btn-block" onclick="adduser();">添加用户</a>
  <br>
</form>
</div></div></div>
            <div class="col-md-6">
            <div class="panel panel-default">
  <div class="panel-heading"> 说明</div>
  <div class="panel-body">
    删除用户不会删除其上传的文件、分享！<br>
    添加用户时用户组不要选择游客，不然会发生奇怪的事情。
  </div>
</div>
            <div class="panel panel-default">
  <div class="panel-heading"> 搜索用户</div>
  <div class="panel-body">
  <label>请输入用户UID或电子邮箱：</label>
   <input type="text" class="form-control" id="suser"value="<?php echo$_GET['search'] ?>" >
   <br>
   <a class="btn btn-primary btn-block" id="s-go">搜索用户</a>
  </div>
</div>

</div>


            <!-- /.row -->
            <div class="table-responsive">
            
             <table class="table table-striped table-bordered table-hover">
              <thead>
               <tr>
               <th> <input type="checkbox" onclick="selectAll(this);"  /></th>
                  <th>UID</th>
                   <th>邮箱</th>
                    <th>用户组</th>
                     <th>上传方案</th>
                     <th>上传文件</th>
                  <th>操作</th>
                   </tr>
                 </thead>
               <tbody>
 <?php
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
$url=$url[path];
$pagesize=$_GET['s'];
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
$numq=mysqli_query($con,"SELECT * FROM `sd_users` ".$others);
$num = mysqli_num_rows($numq);

if($_GET[page]){
$pageval=$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
if($num > $pagesize){
 if($pageval<=1)$pageval=1;
}
$line="SELECT * FROM `sd_users`  ".$others." ORDER BY `uid` DESC limit $page $pagesize";
$pagenum=ceil($num/$pagesize);

 $query=mysqli_query($con,$line);
      while($row=mysqli_fetch_assoc($query)){
        $gid=$row['group'];
        $uid=$row['uid']; 
$line2="SELECT * FROM `sd_usergroup`  WHERE id = '$gid'";
 $query2=mysqli_query($con,$line2);
  while($row1=mysqli_fetch_assoc($query2)){
$group = $row1['gname'];
  
 $pid=$row1['policyid'];
    $line3="SELECT * FROM `sd_policy`  WHERE id = '$pid'";
   $query3=mysqli_query($con,$line3);
    while($row3=mysqli_fetch_assoc($query3)){
  $policy = $row3['p_name'];
    }
}
$line4="SELECT * FROM `sd_file`  WHERE upuser = '$uid'";
$wenjian_res=mysqli_query($con,$line4);
$wj=mysqli_num_rows($wenjian_res);
        echo'<tr>
        <td><input type="checkbox"name="user"value="'.$uid.'"  /></td>
  <td>'.$row["uid"].'</td>

<td>'.$row["username"].'</td>
<td>'.$group.'</td>
<td>'.$policy.'</td>
<td>'.$wj.'个</td>
<td><button class="btn btn-info"onclick="edituser(\''.$uid.'\',\''.$row["username"].'\',\''.$row["group"].'\',\''.$row["regtime"].'\');">编辑</button> <button onclick="deluser(\''.$uid.'\');"class="btn btn-danger">删除</button></td>
  </tr>';
      }
 ?>

                      </tbody></table> </div>

  <button onclick="delall();"id="s"class="btn btn-danger"><i class="fa fa-times"></i> 删除选中用户</button><br><br>

<div class="row">

<div class="col-lg-3">
  
按用户组查看：<select id="ug" class="form-control">
<option value ="all">全部</option>
<?php
$up="SELECT * FROM `sd_usergroup`";
$query4=mysqli_query($con,$up);
  while($row4=mysqli_fetch_assoc($query4)){
    echo '  <option value ="'.$row4['id'].'">'.$row4['gname'].'</option>';
  }
?>
  </select> 
</div>
<div class="col-lg-6"></div>
  <div class="col-lg-3">
  <br>
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
             <div style="float:left;position:relative; top:20px;left:20px;font-family: '微软雅黑'"><h5>共有<?php echo $num ?>条记录&nbsp;&nbsp;当前第<?php echo $pageval ; ?>页，共<?php echo $pagenum ?>页</h5> </div>
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
        <h4 class="modal-title">编辑用户</h4>
      </div>
      <div class="modal-body">
      <form id="euser" class="form-horizontal">
      <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-2 control-label">UID</label>
    <div class="col-sm-10">
    <div id="eeuid"></div>
      <div style="display: none"><input type="text" class="form-control" id="euid"name="euid" /></div>
    </div>
    </div>
          <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-2 control-label">注册邮箱</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="eusername"name="eusername">
    </div>
    </div>
    <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">用户组</label>
    <div class="col-sm-10">
        <select name="egroup" id="egroup" class="form-control">

<?php
$up="SELECT * FROM `sd_usergroup`";
$query5=mysqli_query($con,$up);
  while($row5=mysqli_fetch_assoc($query5)){
    echo '  <option value ="'.$row5['id'].'">'.$row5['gname'].'</option>';
  }
?>
  </select> 
    </div>
    </div>
              <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-2 control-label">设置密码</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="epwd"name="epwd" placeholder="留空表示不更改" />
    </div>
    </div>
          <div class="form-group">
        
         <label for="inputEmail3" class="col-sm-2 control-label">注册时间</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="eregtime"name="eregtime" disabled/>
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
      $.post("../includes/adminAction.php",$("#euser").serialize()+"&action=edituser",
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
function edituser(uid,username,usergroup,regtime){
$('#edit').modal('toggle');
$("#euid").val(uid);
$("#eeuid").html(uid+"(不可更改)");
$("#eusername").val(username);
$("#eregtime").val(regtime);
$("#egroup").val(usergroup);  
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
function deluser(uid){

  $.post("../includes/adminAction.php",{uid: uid,action: "deluser"},
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
            $('input[name="user"]:checked').each(function(){  
            chk_value.push($(this).val());   
            });
            $("#s").attr("disabled","true");
            for(key1 in chk_value){ 
                             $.ajax({
             type: "POST",
             url: "../includes/adminAction.php",
             data: {uid: chk_value[key1],action: "deluser"},
             dataType: "text",
             async: false,
             success: function(data){
    var pe=data.split(".");
    if(pe[0]=="ok"){ 

    }else{ 
alert("删除UID:"+key1+"时遇到错误");


 };

                      }
         });
         
            }
            $("#ss").removeAttr("disabled");
          window.location.reload();
  } 
function adduser(){
    $.post("../includes/adminAction.php",$("#adduser").serialize()+"&action=adduser",
  function(data){
    var pe=data.split(".");
    if(pe[0]=="ok"){ 
      $('#adduser')[0].reset();  
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