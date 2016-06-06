
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>树洞外链安装向导</title>
</head>
	<link rel="stylesheet" href="../admin/css/bootstrap.min.css">
<link rel="stylesheet" href="css/ystep.css">
    <script type="text/javascript" src="../includes/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../admin/bootstrap/js/bootstrap.min.js"></script>
<script src="js/ystep.js"></script>
<style>
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
	height:550px;

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
<div align="center"><h1>使用协议</h1></div>
<div style="font-size:20px;">
 <p>&nbsp;&nbsp;&nbsp; 1.树洞外链是一款免费的程序，你可以在<strong>非商用</strong>下自由使用
        。<br />&nbsp;&nbsp;&nbsp; 2.使用时请务必保留作者链接。<br />&nbsp;&nbsp;&nbsp; 3.由于本程序造成的数据、经济损失，法律纠纷，树洞分享不承担一切责任。<br />&nbsp;&nbsp;&nbsp; 4.你可以自由修改本程序，但<strong>禁止以任何形式销售二次修改版本</strong>。<br />&nbsp;&nbsp;&nbsp; 4.树洞分享不对用户所上传的文件承担法律责任。<br />&nbsp;&nbsp;&nbsp; 5.不得为任何非法目的而使用本程序；
不得利用本程序制作、复制和传播任何非法信息；
不得利用本程序进行任何可能对互联网或移动网正常运转造成不利影响的行为；
不得侵犯本网站及其他任何第三方的版权、商标权、专利权、名誉权及其他任何合法权益；<br />&nbsp;&nbsp;&nbsp; 6.如果您未能遵守本协议的条款，您的授权将被终止，所许可的权利将被收回，同时您应承担相应法律责任。</p>
<div align="center"><a class="btn btn-success btn-lg" href="start.php">同意协议并开始安装</a></div>
</div>
</div>
    </div>
</div>
</body>
</html>
<script>

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
$(".ystep2").setStep(1);
</script>