<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 00:16:05
         compiled from "content\themes\material\head.html" */ ?>
<?php /*%%SmartyHeaderCode:495057400c69cf5609-15023749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8563578ea4a2bbfe25d5e99eaf3173de1c199470' => 
    array (
      0 => 'content\\themes\\material\\head.html',
      1 => 1465085761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '495057400c69cf5609-15023749',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57400c69cf9630_53927221',
  'variables' => 
  array (
    'zzurl' => 0,
    'isvisitor' => 0,
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57400c69cf9630_53927221')) {function content_57400c69cf9630_53927221($_smarty_tpl) {?> 
  <div class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
">树洞外链</a>
              </div>
              <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                  <li ><a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
index.php"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
views/userIndex.php"><i class="fa fa-users" aria-hidden="true"></i> 用户中心</a></li>
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
views/userFiles.php"> <i class="fa fa-file" aria-hidden="true"></i> 我的文件</a></li>
                  <li><a href="#"><i class="fa fa-cloud" aria-hidden="true"></i> 文件广场</a></li>
   
                </ul>
       
                <ul class="nav navbar-nav navbar-right">
                          <?php if ($_smarty_tpl->tpl_vars['isvisitor']->value=="true") {?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
views/login.php"><i class="fa fa-user" aria-hidden="true"></i> 登录/注册</a></li>
                       <?php } else { ?>


         <li class="dropdown">
                    <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user " aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['userinfo']->value['username'];?>

                      <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
/views/userIndex.php"><i class="fa fa-book " aria-hidden="true"></i> 用户中心</a></li>
                      <li><a href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
/includes/userAction.php?action=logout"><i class="fa fa-share " aria-hidden="true"></i> 登出</a></li>

                    </ul>
                  </li>
                       <?php }?>
                </ul>
              </div>
            </div>
            </div><?php }} ?>
