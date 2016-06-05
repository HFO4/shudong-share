<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 10:51:28
         compiled from ".\..\content\themes\material\userPassWord.html" */ ?>
<?php /*%%SmartyHeaderCode:317185754021c56ef07-06680297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53398c9229760e477da18d3a54a89d421c57b9dc' => 
    array (
      0 => '.\\..\\content\\themes\\material\\userPassWord.html',
      1 => 1465123887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '317185754021c56ef07-06680297',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5754021c674ac8_48584385',
  'variables' => 
  array (
    'tit' => 0,
    'head' => 0,
    'zzurl' => 0,
    'isVisitor' => 0,
    'userinfo' => 0,
    'mailhash' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5754021c674ac8_48584385')) {function content_5754021c674ac8_48584385($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>


<title>修改密码 - <?php echo $_smarty_tpl->tpl_vars['tit']->value;?>
</title><?php echo $_smarty_tpl->getSubTemplate ("head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

<style type="text/css">

</style>
<div class="container">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<br><br><br>
<div class="well bs-component"style="padding: 0px;">
<div class="uhead" align="center">
<div class="gravatar">
  <img src="https://secure.gravatar.com/avatar/<?php echo $_smarty_tpl->tpl_vars['mailhash']->value;?>
?s=80&r=g"  class="img-circle"><div class="info"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['username'];?>
</div>
  </div>
</div>
<div  style="margin-left:29px;margin-right:29px;">
<div class="row">
<h3 >修改密码</h3>
 <form id="cp">
 <div style="height: 20px;"></div>
 <div class="form-group label-floating">
  <label class="control-label" for="focusedInput1">请输入您当前的密码：</label>
  <input class="form-control" name="pwdnow" type="password">
</div>
 <div style="height: 20px;"></div>
 <div class="form-group label-floating">
  <label class="control-label" for="focusedInput1">请输入要设置的新密码：</label>
  <input class="form-control" name="pwdnew" type="password">
</div>
 <div style="height: 20px;"></div>
 <div class="form-group label-floating">
  <label class="control-label" for="focusedInput1">请再输一遍新密码：</label>
  <input class="form-control" name="pwdcheck" type="password">
</div>
 </form>
 <div align="right">
       <a id="s1" onclick="changepwd()"  class="btn btn-raised btn-primary">提交更改</a>
       </div>
</div>
<br>
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
<script type="text/javascript">
function changepwd(){
	 var pwdnow = $('input[name="pwdnow"]').val();
  var pwdnew = $('input[name="pwdnew"]').val();
  var pwdcheck = $('input[name="pwdcheck"]').val();
  if(pwdnew == pwdcheck){
        $.post("../includes/userAction.php", {
            pwd: pwdnew,
            pwdnow:pwdnow,
            action: "changepwd"
        }, function(data) {
            var pe = data.split(".");
            if (pe[0] == "ok") {
                $.snackbar({
                        content: pe[1],
                        timeout: 2000
                    });
                setTimeout(function() {
                        window.location.reload();
                    }, 2000);
            } else {
                $.snackbar({
                        content: pe[1],
                        timeout: 2000
                    });
            };
        });
  }else{
$.snackbar({
                        content: "两次输入密码不一致",
                        timeout: 2000
                    });
  }
}
    
</script><?php }} ?>
