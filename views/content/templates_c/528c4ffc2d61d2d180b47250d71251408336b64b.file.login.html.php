<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 07:20:22
         compiled from ".\..\content\themes\material\login.html" */ ?>
<?php /*%%SmartyHeaderCode:307915753cd03140ee1-15088826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '528c4ffc2d61d2d180b47250d71251408336b64b' => 
    array (
      0 => '.\\..\\content\\themes\\material\\login.html',
      1 => 1465111221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307915753cd03140ee1-15088826',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5753cd0318f107_45989912',
  'variables' => 
  array (
    'tit' => 0,
    'head' => 0,
    'zzurl' => 0,
    'isVisitor' => 0,
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5753cd0318f107_45989912')) {function content_5753cd0318f107_45989912($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>


<title>登录 - <?php echo $_smarty_tpl->tpl_vars['tit']->value;?>
</title><?php echo $_smarty_tpl->getSubTemplate ("head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

<style type="text/css">
 
</style>
<div class="container">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<br><br><br>
<div class="well bs-component" id="loginform">
 <legend>登录</legend>
 <form id="login"class="dd">
 <div style="display: none;">
                          <input type="text" name="action"value="login">
                        </div>
                        <div class="form-group label-floating">
  <label class="control-label" for="focusedInput1">邮箱</label>
  <input class="form-control" name="username" type="text">
</div>
<div style="height: 8px;"></div>
                      <div class="form-group label-floating">
  <label class="control-label" for="focusedInput1">密码</label>
  <input class="form-control" name="password" type="password">
</div>

<a class="btn btn-raised btn-block btn-primary"id="login-button"onclick="login();">登陆</a>
<a class="btn btn-primary btn-block" onclick="showreg();">没有账号？立即注册</a>

 </form>
</div>
<div class="well bs-component" id="regform"style="display: none;">
 <legend>注册</legend>
 <form id="reg"class="dd">
 <div style="display: none;">
                          <input type="text" name="action"value="register">
                        </div>
                        <div class="form-group label-floating">
  <label class="control-label" for="focusedInput1">邮箱</label>
  <input class="form-control" name="username-reg" type="text">
</div>
<div style="height: 8px;"></div>
                      <div class="form-group label-floating">
  <label class="control-label" for="focusedInput1"></label>
  <input class="form-control" name="password-reg" placeholder="密码，长度4-16字符"type="password">
</div><div style="height: 8px;"></div>
                 <div class="form-group label-floating">
  <label class="control-label" for="focusedInput1">再输一次密码</label>
  <input class="form-control" name="password-check" type="password">
</div>
<a class="btn btn-raised btn-block btn-primary"id="login-button"onclick="reg();">注册</a>
<a class="btn btn-primary btn-block"onclick="showlogin();">返回登陆</a>

 </form>
</div>
        </div>
        <div class="col-md-4"></div>
    </div>
    </div>
    <br><br><br>
    <?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('titm'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
content/themes/material/js/ZeroClipboard.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
content/themes/material/js/login.js"></script> 
<?php }} ?>
