<?php /* Smarty version Smarty-3.1.18, created on 2016-05-21 00:33:57
         compiled from "content\themes\default\share_pub.html" */ ?>
<?php /*%%SmartyHeaderCode:15533573facf5b6ec15-89086149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72c79cf9eb9808495238d62f5387ed04e1793402' => 
    array (
      0 => 'content\\themes\\default\\share_pub.html',
      1 => 1454643300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15533573facf5b6ec15-89086149',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fname' => 0,
    'kw' => 0,
    'filetype' => 0,
    'tit' => 0,
    'head' => 0,
    'zzurl' => 0,
    'isVisitor' => 0,
    'userinfo' => 0,
    'ming' => 0,
    'fileurl' => 0,
    'uu' => 0,
    'sskey' => 0,
    'jscode' => 0,
    'sstime' => 0,
    'num' => 0,
    'stype' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_573facf5cca323_69077937',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573facf5cca323_69077937')) {function content_573facf5cca323_69077937($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['fname']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['kw']->value;?>
">

  <title> <?php echo $_smarty_tpl->tpl_vars['fname']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['tit']->value;?>
</title> 
  <link rel="stylesheet" href="content/themes/default/bootstrap/css/bootstrap.css" /> 
  <link rel="stylesheet" href="content/themes/default/bootstrap/css/style_v.css" /> 
    <link rel="stylesheet" href="content/themes/default/bootstrap/css/share.css" /> 
      <link rel="stylesheet" href="content/themes/default/bootstrap/css/iosOverlay.css" /> 
 </head> 
 <body>
   <?php echo $_smarty_tpl->tpl_vars['head']->value;?>
 
  <script type="text/javascript" src="content/themes/default/bootstrap/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="content/themes/default/js/ZeroClipboard.js"></script> 
    <script type="text/javascript" src="content/themes/default/js/iosOverlay.js"></script>
        <script type="text/javascript" src="content/themes/default/js/else.js"></script>
  <style type="text/css">
 body {
	background-image: url(content/themes/default/images/bg.png);
	background-repeat: repeat-x;
	background-color: #9cd9f2;
	margin-top:36px;
font-family: '微软雅黑';
}
.xiaoguo{box-shadow: 0px 0px 30px #888888;}
body, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, form, fieldset, textarea, p, blockquote, th, td { padding: 0; margin: 0; }
</style> 
<?php echo $_smarty_tpl->getSubTemplate ("head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

    <br /> 
   <br /> 
   <br /> 


   <div style="display:none;">
    <iframe id="xz" src=""></iframe>
   </div>
  <div align="center"> 
	  <div class='share_content' align="left">
																		
			<div class="c_left">
				<div class="c1">
					<div class="fileheader">
						<div class="filepic">
							<img src="includes/filepic.php?t=<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>
" height="80">
						</div>
						<div class="file">
						<br ><div style="height:8px;"></div><h4 style="font-family: '微软雅黑';" ><?php echo $_smarty_tpl->tpl_vars['fname']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>
</h4>
						<div id="info"style="color:#A6A6A6;margin-top:4px; ">Loading...</div>
						</div>
						<div class="filebutton">
					<button type="button"onclick="download();" style="width:126px; height:50px;"class="btn btn-success"><h4 style="font-family: '微软雅黑';" ><span class="glyphicon glyphicon-save" aria-hidden="true" ></span> 立即下载</h4></button>
						</div>
					</div>
				</div>
				<div class="c2">
<iframe src="includes/prewview.php?ming=<?php echo $_smarty_tpl->tpl_vars['ming']->value;?>
&surl=<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
" width="700" scrolling="no"frameborder="0"height="395"></iframe>
				</div>
			</div>
			<div class="c_right">
			<div style="height:5px;"></div>
				<div class="right_main">
					<div class="panel panel-default" >
					  <div class="panel-heading">穿越到手机</div>
					  <div style="margin-left:0px; " align="center">
					    <img src="http://qr.liantu.com/api.php?text=<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
<?php echo $_smarty_tpl->tpl_vars['uu']->value;?>
.php?k=<?php echo $_smarty_tpl->tpl_vars['sskey']->value;?>
&w=200">
					  </div>
				</div><div class="panel panel-default">
  <div class="panel-heading">使用须知</div>
  <div class="panel-body">
<div class="alert alert-warning" role="alert">您的IP已被记录，严禁下载 存储反动、暴力、色情、违法及侵权内容, 本站有权依法删除并追责。</div>
  </div>
</div>
						</div>
			</div>
		  	
	  </div>
  </div>
  <br>  <br>  <br>  <br>
  <?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('jscode'=>$_smarty_tpl->tpl_vars['jscode']->value,'tit'=>$_smarty_tpl->tpl_vars['tit']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value), 0);?>

<script language="JavaScript"> 

$.get("includes/getinfo.php?ming=<?php echo $_smarty_tpl->tpl_vars['ming']->value;?>
",function(data,status){
	var xqq=data.split(".");
var dx=(xqq[0]/1048576).toFixed(2)+"M";
var xinxi="大小："+dx+"  &nbsp;&nbsp;分享日期：<?php echo $_smarty_tpl->tpl_vars['sstime']->value;?>
  &nbsp;&nbsp;下载次数：<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
";
$("#info").html(xinxi);
  });
function download(){ 
window.open("<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
")

$.get("includes/download.php?sskey=<?php echo $_smarty_tpl->tpl_vars['sskey']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['stype']->value;?>
",function(data,status){

  });
}
</script>  
 </body>
</html><?php }} ?>
