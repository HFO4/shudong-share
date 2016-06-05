<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 00:14:13
         compiled from "content\themes\material\index.html" */ ?>
<?php /*%%SmartyHeaderCode:6188574008d4046fc0-09764761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e6a907f6fa9353925e817da98ba8b0e3b2eeae0' => 
    array (
      0 => 'content\\themes\\material\\index.html',
      1 => 1465085628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6188574008d4046fc0-09764761',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_574008d410b8b8_49865797',
  'variables' => 
  array (
    'titmain' => 0,
    'head' => 0,
    'zzurl' => 0,
    'isVisitor' => 0,
    'userinfo' => 0,
    'tit' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574008d410b8b8_49865797')) {function content_574008d410b8b8_49865797($_smarty_tpl) {?><!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile support -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $_smarty_tpl->tpl_vars['titmain']->value;?>
</title> 
  <!-- Bootstrap Material Design -->
  <link href="https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link href="content/themes/material/css/bootstrap.min.css" rel="stylesheet">
  <link href="content/themes/material/css/bootstrap-material-design.min.css" rel="stylesheet">
  <link href="content/themes/material/css/ripples.min.css" rel="stylesheet">  
<script type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="includes/js/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="includes/js/plupload/i18n/zh_CN.js"></script>
<script type="text/javascript" src="content/themes/material/js/qiniu.js"></script>
<script type="text/javascript" src="content/themes/material/js/main.js"></script>
<script type="text/javascript" src="content/themes/material/js/ui.js"></script>
  </head>
  <body id="laru">
  <?php echo $_smarty_tpl->getSubTemplate ("head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('titmain'=>$_smarty_tpl->tpl_vars['titmain']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

 <div class="container">
 <div class="page-header" id="banner">
    <div class="row">
    
      <div class="col-sm-12">
        <div class="well infobox" align="center" >
         <br><br><br><br><br> <div id="shuo">
         <h1 style="color:#404040;">选择一个文件开始上传</h1>
         </div>
          <div id="uu">
         <button  id="pickfiles" class="btn btn-raised btn-primary" style="height:50px;font-size:20px;"><i class="fa fa-plus" aria-hidden="true"></i> 选择文件<div class="ripple-container"></div></button>
         </div>
          <div id="container">
         <div id="ss">
   
         </div>
         <table style="display:none;width:100%"> 
          <tbody id="fsUploadProgress"> 
          </tbody> 
         </table> 
         <div class="ss">       <div id="t-left">
            
          </div>
          <div id="t-right" align="right">
          
          </div></div> 
         <div id="cuowu1" style="display:none;">
          <br />
          <div id="errinfo" class="alert alert-danger" style="width:40%" align="center" role="alert"></div>
         </div> 
         <div id="gc"> 
          <div id="su" style="display:none;">
           <br />
           <div id"susu"="" class="alert alert-success" style="width:40%" align="center" role="alert">
            处理中，请稍后...
           </div>
          </div>
         </div>
         <div id="cuowu" style="display:none;">
          <br />
          <div class="alert alert-danger" style="width:40%" align="center" role="alert">
           上传失败，请稍后再试或联系站长
          </div>
         </div> 
        </div>
    <br><br><br><br><br>
        </div>
      </div>
    </div>
  </div>
  </div>
    <?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('titm'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

<?php }} ?>
