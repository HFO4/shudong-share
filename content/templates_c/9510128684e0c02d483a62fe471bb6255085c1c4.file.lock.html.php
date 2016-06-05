<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 06:53:50
         compiled from "content\themes\material\lock.html" */ ?>
<?php /*%%SmartyHeaderCode:169065753caca8b8fa3-08508591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9510128684e0c02d483a62fe471bb6255085c1c4' => 
    array (
      0 => 'content\\themes\\material\\lock.html',
      1 => 1465109628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169065753caca8b8fa3-08508591',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5753caca949840_13606219',
  'variables' => 
  array (
    'tit' => 0,
    'head' => 0,
    'zzurl' => 0,
    'isVisitor' => 0,
    'userinfo' => 0,
    'sskey' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5753caca949840_13606219')) {function content_5753caca949840_13606219($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

<title>加密分享 - <?php echo $_smarty_tpl->tpl_vars['tit']->value;?>
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
<div class="col-md-4"></div>
<div class="col-md-4">
<br><br><br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">请输入分享密码：</h3>
  </div>
  <div class="panel-body">
    
      <input type="text" class="form-control" id="mm"name="mm"placeholder="请输入密码">
      <div align="right">
    <button  onclick="check();"id="login-button" class="btn btn-raised btn-primary"><i class="fa fa-check" aria-hidden="true"></i> 确定</button>
  </div></div>
</div>

   
        </div>
        <div class="col-md-4"></div>
    </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('titm'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
content/themes/material/js/ZeroClipboard.js"></script>
    <script type="text/javascript">
    $(document).keypress(function(e) {  
    // 回车键事件  
       if(e.which == 13) {  
check();
       }  
   }); 
function check(){ 
    $("#login-button").attr("disabled","true");
var mmm=$("#mm").val();
 $.post("includes/share_check.php",
  {
    mima:mmm,
    sskey:"<?php echo $_smarty_tpl->tpl_vars['sskey']->value;?>
"
  },
  function(data,status){
  var ge=data.split(".");
  if(ge[0]=="bad"){
　　$('#login-button').removeAttr("disabled");
$.snackbar({
                            content: ge[1],
                            timeout: 2000
                        });
  }else if(ge[0]=="ok"){ 
window.location.href=window.location.href;
    $("#login-button").html("即将跳转，请稍后");
  }
  });
}
    </script>
<?php }} ?>
