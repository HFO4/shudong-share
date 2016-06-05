<?php /* Smarty version Smarty-3.1.18, created on 2016-05-21 00:33:57
         compiled from "content\themes\default\head.html" */ ?>
<?php /*%%SmartyHeaderCode:15330573facf5d0fb89-82744620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6669ff745b0de933b79e10c93cd15fbee660ea61' => 
    array (
      0 => 'content\\themes\\default\\head.html',
      1 => 1454667278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15330573facf5d0fb89-82744620',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'zzurl' => 0,
    'isvisitor' => 0,
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_573facf5d34a47_66482766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573facf5d34a47_66482766')) {function content_573facf5d34a47_66482766($_smarty_tpl) {?><nav class="navbar navbar-default navbar-fixed-top">
 <div class="container">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
/content/themes/default/images/logo_s.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <!-- 你可以在这里添加靠左边的导航   -->
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> 首页</a></li>
                <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="
glyphicon glyphicon-plus" aria-hidden="true"></span> 其他 <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <!-- 以下链接可以根据自己需要更改 -->
            <li><a href="#">帮助</a></li>
            <li><a href="#">使用须知</a></li>
            <li><a href="#">捐助我们</a></li>

            <li><a href="#">讨论区</a></li>
          </ul>
        </li>
         <?php if ($_smarty_tpl->tpl_vars['isvisitor']->value=="true") {?>
         <li><a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
views/login.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 登录/注册</a></li>
         <?php } else { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="
glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_smarty_tpl->tpl_vars['userinfo']->value['username'];?>
 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
/views/userIndex.php">用户中心</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
/includes/userAction.php?action=logout">登出</a></li>
          </ul>
        </li>
        <?php }?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 </div>
</nav>
<?php }} ?>
