 <?php
 
 
 error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/connect.php");
require_once("../includes/usercheck.php");

$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$kjurl= $row['kjurl'];

}

 
 
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>文件列表</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

 



    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">



    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <script type="text/javascript" src="../includes/js/jquery-1.9.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
          <script type="text/javascript" src="js/bootstrap.min.js"></script> 


    <!-- Morris Charts JavaScript -->


      <link rel="stylesheet" href="css/iosOverlay.css" /> 
    <script type="text/javascript" src="js/iosOverlay.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    <style>

	body {
	background-color: #FFFFFF;
}
    </style>
</head>
 <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">文件管理</h1>
     
                        <!-- /.panel-heading -->
      
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                <br>
                                            <div class="panel panel-default">
  <div class="panel-heading"> 搜索文件</div>
  <div class="panel-body">
  <label>请输入文件名：</label>
   <input type="text" class="form-control" id="sgroup"value="<?php echo$_GET['search'] ?>" >
   <br>
   <a class="btn btn-primary btn-block" id="s-go">搜索文件</a>
  </div>
</div>
                                     <div class="table-responsive">
                                   
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <th><input type="checkbox" onclick="selectAll(this);"  /></th>
                                            <th>ID</th>
                                            <th>文件名</th>
                                            <th>上传日期</th>
                                            <th>上传用户</th>
                                            <th>上传策略</th>
                                             <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
   <?php
  
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
$url=$url[path];
$pagesize=$_GET['s'];
$sfile=$_GET['search'];
$p=$_GET['p'];  
if(! (empty($p)) and $p != "all"){
  $others = $others."and `policyid` = '$p'";
}
if(! (empty($sfile))){

    $others = "and `ming` LIKE '%$sfile%'";

}
   
$numq=mysqli_query($con,"SELECT * FROM `sd_file` WHERE cishuo='0'".$others);
$num = mysqli_num_rows($numq);

if($_GET[page]){
$pageval=$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
if($num > $pagesize){
 if($pageval<=1)$pageval=1;
}


$line="SELECT * FROM `sd_file` WHERE cishuo='0'".$others." ORDER BY `id` DESC limit $page $pagesize";
$pagenum=ceil($num/$pagesize);

 $query=mysqli_query($con,$line);
      while($row=mysqli_fetch_assoc($query)){
        $pid=$row['policyid'];
        $uid=$row['upuser'];
$line3="SELECT * FROM `sd_policy`  WHERE id = '$pid'";
   $query3=mysqli_query($con,$line3);
    while($row3=mysqli_fetch_assoc($query3)){
  $policy = $row3['p_name'];
    }
    if(empty($uid)){
        $username = "游客";
    }else{
    $line4="SELECT * FROM `sd_users`  WHERE uid = '$uid'";
   $query4=mysqli_query($con,$line4);
    while($row3=mysqli_fetch_assoc($query4)){
  $username = $row3['username'];
    }}
   echo '
 <tr>
  <td><input type="checkbox"name="file"value="'.$row["key1"].'"  /></td>
 	<td>'.$row["id"].'</td>
	<td><a href="../views/fileJump.php?ming='.htmlspecialchars($row['ming'],ENT_QUOTES,utf-8).'&key='.$row['key1'].'" target="new" >'.htmlspecialchars($row['ming'],ENT_QUOTES,utf-8).'</a></td>
	<td>'.$row["uploadtime"].'</td>
	<td><a href="user.php?page=1&s=10&search='.$username.'"target="_blank">'.$username.'</a></td>
    <td>'.$policy.'</td>
	<td><button onclick="delfile(\''.$row["key1"].'\');"class="btn btn-danger">删除</button></td>
 
 </tr>  
   
   
   
   
   ';
   
	  }
   
   
   ?>
                                </tbody>
                                </table>
</div>
  <button onclick="delall();"id="s"class="btn btn-danger"><i class="fa fa-times"></i> 删除选中文件</button><br><br>

<div class="row">

<div class="col-lg-3">
  
按上传方案查看：<select id="up" class="form-control" style="width: 20%">
<option value ="all">全部</option>
<?php
$up="SELECT * FROM `sd_policy`";
$query4=mysqli_query($con,$up);
  while($row4=mysqli_fetch_assoc($query4)){
    echo '  <option value ="'.$row4['id'].'">'.$row4['p_name'].'</option>';
  }
?>
  </select> 
</div>
<div class="col-sm-9"></div>
  <div class="col-sm-3">
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
<br><br></div>
                                 <div style="float:left;position:relative; top:20px;"><h5>共有<?php echo $num ?>条记录&nbsp;&nbsp;当前第<?php echo $pageval ; ?>页，共<?php echo $pagenum ?>页</h5> </div>
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
</nav>

<br>
                            
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
              
                                </div>
                               
                            </div>
                     
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        </div>
<!-- /#page-wrapper -->
<script type="text/javascript">
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
 var pnow = $.getUrlParam('p');
  var p = $.getUrlParam('page');
   var s = $.getUrlParam('s');
   var f = $.getUrlParam('f');
   $("#s-go").click(function(){
    var sgroup = $("#sgroup").val();
    var uslnew = "file_main.php?s="+s+"&search="+sgroup;
window.location.href=uslnew; 
})
   if(pnow == null){
$("#up ").val("all");  
}else{
$("#up ").val(pnow);  
}
$("#up").change(function(){
var ugnew = $("#up").val();
var urlnew = changeURLArg('file_main.php?page=1'+"&s="+s+"&p=1",'p',ugnew);
window.location.href=urlnew; 
});
function pagesize(){
  var snew=$("#ps").val();
  if(pnow == null){
    pnow = "all";
  }
  var urlnew1 = changeURLArg("file_main.php?page=1&s=10"+"&p="+pnow,'s',snew);
window.location.href=urlnew1; 
}
function delfile(uid){

  $.post("../includes/delete_file.php",{key: uid},
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
            $('input[name="file"]:checked').each(function(){  
            chk_value.push($(this).val());   
            });
            $("#s").attr("disabled","true");
            for(key1 in chk_value){ 
               $.ajax({
             type: "POST",
             url: "../includes/delete_file.php",
             data: {key: chk_value[key1],action: "deluser"},
             dataType: "text",
             async: false,
             success: function(data){
    var pe=data.split(".");
    if(pe[0]=="ok"){ 

    }else{ 
alert("删除key:"+key1+"时遇到错误");


 };

                      }
         });

                
            }
            $("#ss").removeAttr("disabled");
          parent.location.reload();
  } 
</script>