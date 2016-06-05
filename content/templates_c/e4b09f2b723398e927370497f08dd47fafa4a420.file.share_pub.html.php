<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 06:42:14
         compiled from "content\themes\material\share_pub.html" */ ?>
<?php /*%%SmartyHeaderCode:170725753bf01081189-86271146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4b09f2b723398e927370497f08dd47fafa4a420' => 
    array (
      0 => 'content\\themes\\material\\share_pub.html',
      1 => 1465108932,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170725753bf01081189-86271146',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5753bf0111d5a5_12148946',
  'variables' => 
  array (
    'tit' => 0,
    'head' => 0,
    'zzurl' => 0,
    'isVisitor' => 0,
    'userinfo' => 0,
    'fname' => 0,
    'filetype' => 0,
    'ming' => 0,
    'fileurl' => 0,
    'sstime' => 0,
    'num' => 0,
    'sskey' => 0,
    'stype' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5753bf0111d5a5_12148946')) {function content_5753bf0111d5a5_12148946($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

<title><?php echo $_smarty_tpl->tpl_vars['fname']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['tit']->value;?>
</title><?php echo $_smarty_tpl->getSubTemplate ("head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

<style type="text/css">
    .footer{
            position: absolute;
    bottom: 0;
    width: 100%;
    height: 60px;

    }
</style>
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<br><br><br>
<div class="modal" id="pre">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">预览</h4>
      </div>
      <div class="modal-body">
       <iframe src="includes/prewview.php?ming=<?php echo $_smarty_tpl->tpl_vars['ming']->value;?>
&surl=<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
"  scrolling="no"frameborder="0"height="395"width="100%"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      <button type="button" onclick="openin()"class="btn btn-primary">新窗口打开</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="qr">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">二维码</h4>
      </div>
      <div class="modal-body" align="center">
        <img style="width:70%;" id="qcode">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      
      </div>
    </div>
  </div>
</div>
     <div class="well infobox share">
          <div class="fileheader">
                        <div class="filepic">
                            <img src="includes/filepic.php?t=<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>
" height="80">
                        </div>
                        
                        <div class="file">
                        <div style="height:8px;"></div><h4 style="font-family: '微软雅黑';" ><?php echo $_smarty_tpl->tpl_vars['fname']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>
</h4>
                        <div id="info"style="color:#A6A6A6;margin-top:4px; ">Loading...</div>
                        </div></div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4"><a href="<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
" download="<?php echo $_smarty_tpl->tpl_vars['fname']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>
"class="btn-block btn btn-raised btn-primary" id="d"><i class="fa fa-download" aria-hidden="true"></i> 下载</a></div>
                            <div class="col-sm-4"><a data-toggle="modal" data-target="#pre" href="javascript:void(0)" class="btn btn-block  btn-raised btn-warning"> <i class="fa fa-eye" aria-hidden="true"></i> 预览</a></div>
                            <div class="col-sm-4"><a href="javascript:void(0)" class="btn  btn-block  btn-raised btn-success"data-toggle="modal" data-target="#qr"><i class="fa fa-qrcode" aria-hidden="true"></i> 二维码</a></div>

                        </div>
        </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('titm'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
content/themes/material/js/ZeroClipboard.js"></script>
    <script type="text/javascript">
       
$.get("includes/getinfo.php?ming=<?php echo $_smarty_tpl->tpl_vars['ming']->value;?>
",function(data,status){
    var xqq=data.split(".");
var dx=(xqq[0]/1048576).toFixed(2)+"M";
var xinxi="大小："+dx+"  &nbsp;&nbsp;分享日期：<?php echo $_smarty_tpl->tpl_vars['sstime']->value;?>
  &nbsp;&nbsp;下载次数：<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
";
$("#info").html(xinxi);
  });
$("#d").click(function(){
   $.get("includes/download.php?sskey=<?php echo $_smarty_tpl->tpl_vars['sskey']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['stype']->value;?>
",function(data,status){

  }); 
});



function openin(){
    window.open("includes/prewview.php?ming=<?php echo $_smarty_tpl->tpl_vars['ming']->value;?>
&surl=<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
")
}
$("#qcode").attr("src","https://api.lwl12.com/img/qrcode/get?ct="+window.location.href)
    </script>}
<?php }} ?>
