
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>树洞外链安装向导-填写信息</title>
</head>
	<link rel="stylesheet" href="../admin/css/bootstrap.min.css">
<link rel="stylesheet" href="css/ystep.css">
    <script type="text/javascript" src="../includes/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../admin/js/bootstrap.min.js"></script>
<script src="js/ystep.js"></script>
<style>
.b{ 


}
.bb{

	}
.z{
	height:99px;
	margin-left:2PX;
		width:300px;
float:left;
	
	}
.contain{
	margin: 20px;	
	}
.ystep2{
	margin-top:20px;
	float:right;
	}
.bb{ 
float:right;
	margin-top:60px;
	margin-right:45px;
}
.te{ 
	font-size:20px;
	color:#CCC;
	margin-left:45px;
}
.head{
	font-size:30px;
	margin-left:140px;
		margin-top:10px;
	position:absolute; 
}
.logo{ 
background-image:url(../admin/images/logo.png);
margin-top:10px;
margin-left:50px;
width: 85px;
height: 71px;
float:left;
} 
.top{
	height: 100px;
	border-bottom: 1px solid #e7e7e7;
	

}
.zhu{
	margin-top: 30px;
	width: 900px;
margin-bottom:20px;

border: 1px solid #e7e7e7;
box-shadow: 0px 0px 2px #BABABA;
}
.xiaoguo{
	border: 3px solid #999;
}
body{
	font-family: "微软雅黑"; 
}
</style>
<body>
<div align="center">
    <div class="zhu">
   		<div class="top">
        	<div class="logo"></div>
            <div class="head">
                <div>树洞外链</div>
                <div class="te" align="rgiht">安装向导</div>
               
            </div> 
                    <div class="ystep2" align="left"></div>
        
        </div>
<div class="contain" align="left">
<div id="gc">
<div style="display:none;"class="alert alert-danger" id="cw"role="alert"></div>
 <tr>
      <td colspan="2"style="font-family: '微软雅黑';"><h3 align="center" >请填写网站信息：</h3>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>1.数据库信息</strong></p>
        <form name="form1" id="form1"action="install_re.php" method="post">
        
        
          <div align="center" style="font-family: '微软雅黑';">
            <table width="635" border="0">
              <tr>
                <td width="112">数据库服务器：</td>
                <td width="245"><input type="text" value="localhost" class="form-control" name="sqlip"></td>
                <td width="264">*数据库的服务器地址，一般为localhost</td>
              </tr>
                            <tr>
                <td>数据库端口：</td>
                <td><input type="text"value="3306" class="form-control" name="sqlport"></td>
                <td>*</td>
              </tr>
              <tr>
                <td>数据库用户名：</td>
                <td><input type="text"value="root" class="form-control" name="sqlid"></td>
                <td>*</td>
              </tr>
              <tr>
                <td>数据库密码：</td>
                <td><input type="text"value="root" class="form-control" name="sqlpass"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>数据库名：</td>
                <td><input type="text"class="form-control" name="sqlname"></td>
                <td>*</td>
              </tr>
              <tr>
              
                <td colspan="3"><strong>3.其他信息</strong></td>
           
              </tr>
              <tr>
                <td>站长邮箱</td>
                <td><input type="email"class="form-control" id="e"name="am"></td>
                <td>*用于接受升级提醒、漏洞修复等</td>
              </tr>
               <tr>
                <td>主站地址</td>
                <td><input type="text"class="form-control" id="zzurl"name="zzurl" value="<?php  $url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
$mulu= dirname($url);
echo substr($mulu,0,-7);

?>"></td>
                <td>*主站URL，已经为您填写好，请检查是否正确.<strong>开头要加http://，结尾要加/</strong></td>
              </tr>
               <tr>
                <td>管理员用户名
               </td>
                <td><input type="text"class="form-control" name="yhm"></td>
                <td>*</td>
              </tr>
               <tr>
                <td>管理员密码</td>
                <td><input type="password"class="form-control" name="mm" ></td>
                <td>*</td>
              </tr>
               <tr></form>
               
            </table>
          </div>
      </td>
    </tr>
    <div style="position:relative; left:-70px;top:10px;"align="center"><a id="pp"class="btn btn-success btn-lg" onclick="save();">开始安装</a></div>
</div>

<div id="chenggong" style="display:none;">
    <div   align="center"style="font-size:30px;">
    	<img src="css/ok.png" width="90" />安装成功,请确认install目录是否已被删除
    </div><br /><br /><br />
 
    <div class="z">
            <div class="panel panel-default" style="height:246px;">
          <div class="panel-heading">使用中遇到问题？加群解决！</div>
          <div class="panel-body" align="center">
          <br />
     <a class="btn btn-lg btn-warning"style="width: 250px;" title="点击进行交流" target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=01f6d572bb750014df04c243b69fe722c4acd666e8e9a6a934691f55c03f05b6">
		使用交流群:493870295 
		</a><br /><br /><br />
          </div>
        </div>
    </div>
    
        <div class="z">
            <div class="panel panel-default"style="height:246px;">
          <div class="panel-heading">其他事项</div>
          <div class="panel-body" >
   安装成功后您需要到后台进行简单的设置后才能使用。您的后台URL为：<a href="<?php  $url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
$mulu= dirname($url);
echo substr($mulu,0,-7);

?>admin"><?php  $url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
$mulu= dirname($url);
echo substr($mulu,0,-7);

?>admin</a><br />
<!--以下是QQ邮件列表订阅嵌入代码--><script >var nId = "bda3e3d0f95ff89f40bfb9058a809769457f90e3783a0180",nWidth="auto",sColor="light",sText="填写您的邮箱，及时获取升级、Bug修复信息" ;</script><script src="http://list.qq.com/zh_CN/htmledition/js/qf/page/qfcode.js" charset="gb18030"></script>



          </div>
        </div>
    </div>
        <div class="z" style="width:250px;height:246px;">
            <div class="panel panel-default">
          <div class="panel-heading">关于</div>
          <div class="panel-body" >
  程序版本：2.4.2<br />作者博客：<a href="https://aoaoao.me" target="new">树洞分享</a>
  <br />E-mail:abslant@126.com<br />QQ:912394456<br />感谢您的使用！
          </div>
        </div>
    </div>

     
    <br /> 
    <br /> 
   
    <br /> 
   
    <br /> 
   
    <br /> 
   
    <br /> 
   
    <br /> 
     <br />  
    <br />   
    <br /> 
   <br />   
    <br /> 

</div>


</div>
    </div></div>
</div>
<br />
</body>
</html>
<script>
function save(){
	$(".ystep2").setStep(3);
	$("#pp").attr("disabled","true");
	$("#pp").html("正在安装...");
$.post("ins.php", $("#form1").serialize(),
   function(data){
	   
	var ge=data.split("|");
	if(ge[0]=="bad"){ 
	$("#cw").show();
		$("#pp").removeAttr("disabled");
		$(".ystep2").setStep(2);
			$("#pp").html("开始安装");
$("#cw").html("安装时遇到错误："+ge[1]);
	}else if (ge[0]=="ok"){ 
		$(".ystep2").setStep(4);
$("#gc").hide();
$("#chenggong").show();
var e=$("#e").val();
var zzurl=$("#zzurl").val();
$.getJSON("http://aoaoao.me/api/register.php?e="+e+"&zzurl="+zzurl+"&callback=?",  function(data){

	
});



	
	}else{
      $("#cw").show();
    $("#pp").removeAttr("disabled");
    $(".ystep2").setStep(2);
      $("#pp").html("开始安装");
$("#cw").html("未知错误"+data);
  }
   });
  }

$(".ystep2").loadStep({
  size: "large",
  color: "green",
  steps: [{
	title: "协议",

  },{
	title: "配置",

  },{
	title: "安装",

  },{
	title: "完成",
	
  }]
});
$(".ystep2").setStep(2);
</script>
