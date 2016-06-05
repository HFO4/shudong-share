<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 02:53:44
         compiled from ".\..\content\themes\material\pic_view.html" */ ?>
<?php /*%%SmartyHeaderCode:1270357536e727e3480-96320908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '386550dba2488b6b0c8f2d978c28a5573c667562' => 
    array (
      0 => '.\\..\\content\\themes\\material\\pic_view.html',
      1 => 1465095218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1270357536e727e3480-96320908',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57536e729239d2_92577217',
  'variables' => 
  array (
    'tit' => 0,
    'head' => 0,
    'zzurl' => 0,
    'isVisitor' => 0,
    'userinfo' => 0,
    'fileurl' => 0,
    'filename' => 0,
    'key' => 0,
    'filetype' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57536e729239d2_92577217')) {function content_57536e729239d2_92577217($_smarty_tpl) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

      <title>文件详情 - <?php echo $_smarty_tpl->tpl_vars['tit']->value;?>
</title> 
  <?php echo $_smarty_tpl->getSubTemplate ("head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

     <div class="container">

<div class="row">

   <div class="col-md-9">
        <div class="well bs-component "style="padding: 0px;" align="center">
          <img src="<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
" class="preview_pic"alt="<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
"  />
        </div>
        <div class="panel panel-default">
  <div class="panel-body"style="padding: 0px;">
        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
            <li class="active"><a href="#wl" data-toggle="tab"><i class="fa fa-link" aria-hidden="true"></i> 文件外链</a></li>
            <li><a href="#dy" data-toggle="tab"><i class="fa fa-code" aria-hidden="true"></i> 调用</a></li>
        <li><a href="#qrcode" data-toggle="tab"><i class="fa fa-qrcode" aria-hidden="true"></i> 二维码</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="bootstrap-elements.html" data-target="#"><i class="fa fa-share" aria-hidden="true"></i>
                创建分享 <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#gkfx" data-toggle="tab"><i class="fa fa-eye" aria-hidden="true"></i> 公开分享</a></li>
                <li class="divider"></li>
                <li><a href="#smfx" data-toggle="tab"><i class="fa fa-eye-slash" aria-hidden="true"></i>私密分享</a></li>
              </ul>
            </li>
             <li><a href="#gl" data-toggle="tab"><i class="fa fa-cog" aria-hidden="true"></i> 管理</a></li>
             <li><a href="#xq" data-toggle="tab"><i class="fa fa-info" aria-hidden="true"></i> 详情</a></li>
          </ul>
          <div id="myTabContent" class="tab-content" style="padding: 19px;">
            <div class="tab-pane fade active in" id="wl">
              <div class="row">
                <div class="col-md-2">
                <lable>外链地址：</lable>
                </div>
                <div class="col-md-8">
                
                <input type="text" class="form-control" id="yuantu"value="<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
">
                
                </div>
                <div class="col-md-2">

               <a id="fuzhi" data-clipboard-target="yuantu"class="btn btn-raised btn-primary"data-content="复制成功" data-toggle="snackbar" data-timeout="2000">复制</a>
               </div>
              </div>
            </div>
              <div class="tab-pane fade" id="dy">
              <div class="row">
                <div class="col-md-2">
                <lable>HTML调用：</lable>
                </div>
                <div class="col-md-8">
                
                <textarea id="htmldy" rows="3" class="form-control">&lt;img src=&quot;<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
&quot; alt=&quot;<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
&quot; &gt;</textarea>
                
                </div>
                <div class="col-md-2">

               <a id="fuzhi1" data-clipboard-target="htmldy"class="btn btn-raised btn-primary"data-content="复制成功" data-toggle="snackbar" data-timeout="2000">复制</a>
               </div>
              </div>
                <div class="row">
                <div class="col-md-2">
                <lable>Markdown调用:</lable>
                </div>
                <div class="col-md-8">
                
                <textarea id="mddy" rows="3" class="form-control">![<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
](<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
)</textarea>
                
                </div>
                <div class="col-md-2">

               <a id="fuzhi2" data-clipboard-target="mddy"class="btn btn-raised btn-primary"data-content="复制成功" data-toggle="snackbar" data-timeout="2000">复制</a>
               </div>
              </div>
            </div>
            <div class="tab-pane fade" id="qrcode">
              <div class="row">
                <div class="col-md-3">
                <img style="width:100%;"src="https://api.lwl12.com/img/qrcode/get?ct=<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
">
                <div align="center">原图外链</div>
                </div>
                <div class="col-md-3">
                <img style="width:100%;"src="https://api.lwl12.com/img/qrcode/get?ct=<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
views/pic.php?key=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                <div align="center">当前页面</div>
                </div>
                <div class="col-md-6"><br>
                  <div class="alert alert-dismissible alert-warning">
 
  <h4>注意!</h4>

  <p>本页面为私有页面，请勿将本页URL分享给不受信任的人。如需分享文件，请直接发送文件外链URL或创建分享链接给对方。</p>
</div>
                </div>
             </div>
             </div>
            <div class="tab-pane fade" id="gkfx">
            <div id="gk">
            <form id="bd"  method="post"> 
               <div class="row">
                <div class="col-md-3">
                <lable>请给你的文件起个名字：</lable>
                </div>
                <div class="col-md-6">
                <div class="form-group"> 
              <div class="input-group"> 
                <input type="text" class="form-control" id="fname" name="fname">
                 <div class="input-group-addon">
                .<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>

               </div>
              </div>
             </div>
             <input style="display:none;" id="ftype" name="ftype" value="open" type="text" /> 
         <input style="display:none;" id="fkey" name="fkey" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" type="text" /> 
                </div>
                </form>
                <div class="col-md-2">

               <button id="copen"  class="btn btn-raised btn-primary">创建</button>
               </div>
              </div></div>
                  <div  id="result_open" style="display:none;">
         
               <div class="row">
                <div class="col-md-2">
                <lable>分享页URL：</lable>
                </div>
                <div class="col-md-8">
                
                <input type="text" class="form-control" id="fxurl" name="fxurl">
                 
              
           
                </div>
          
                <div class="col-md-2">

               <button id="fuzhi3" data-clipboard-target="fxurl"class="btn btn-raised btn-primary"data-content="复制成功" data-toggle="snackbar" data-timeout="2000" class="btn btn-raised btn-primary">复制</button>
               </div>
              </div>
            </div>
</div>
       <div class="tab-pane fade" id="smfx">
            <div id="sm">
            <form id="bds"  method="post"> 
               <div class="row">
                <div class="col-md-3">
                <lable>请给你的文件起个名字：</lable>
                </div>
                <div class="col-md-6">
                <div class="form-group"> 
              <div class="input-group"> 
                <input type="text" class="form-control" id="fname" name="fname">
                 <div class="input-group-addon">
                .<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>

               </div>
              </div>
             </div>
             <input style="display:none;" id="ftype" name="ftype" value="lock" type="text" /> 
         <input style="display:none;" id="fkey" name="fkey" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" type="text" /> 
                </div>
                </form>
                <div class="col-md-2">

               <button id="clock"  class="btn btn-raised btn-primary">创建</button>
               </div>
              </div></div>
                  <div  id="result_lock" style="display:none;">
         
               <div class="row">
                <div class="col-md-3">
                <lable>分享页URL及密码：</lable>
                </div>
                <div class="col-md-7">
                <div class="form-inline">
                <input type="text" class="form-control" id="fxurl-lock" name="fxurl-lock">
                 <input type="text" class="form-control" id="pwd-lock" name="pwd-lock"> <button id="fuzhi4" class="btn btn-raised btn-primary"data-content="复制成功" data-toggle="snackbar" data-timeout="2000" class="btn btn-raised btn-primary">复制</button>
              </div>
           
                </div>
          
                <div class="col-md-2">

               
               </div>
              </div>
            

          </div>
          </div>
         
      </div>

</div> 
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('titm'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
content/themes/material/js/ZeroClipboard.js"></script> 
<script type="text/javascript">
  var clip = new ZeroClipboard( document.getElementById("fuzhi"), {

} );
  var clip1 = new ZeroClipboard( document.getElementById("fuzhi1"), {

} );
    var clip2 = new ZeroClipboard( document.getElementById("fuzhi2"), {

} );
     var clip3 = new ZeroClipboard( document.getElementById("fuzhi3"), {

} );
        var clip4 = new ZeroClipboard( document.getElementById("fuzhi4"), {

} );
    $("#copen").click(function(){

$("#copen").attr("disabled",true);
$.post("../includes/create_share.php", $("#bd").serialize(),
  function(data){
    var ge=data.split(".");
    var ftype=ge[0];
    var result=ge[1];
        var code=ge[2];
    if (result=="ok"){ 
if(ftype=="open"){
$('#fxurl').val("<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
"+ge[3]+"."+ge[4]);
$("#gk").hide();
$("#result_open").show();

$.snackbar({content: "创建成功", timeout: 2000});
}else{ 

    }

  }else{ 

$("#copen").attr("disabled",false);
$.snackbar({content: code, timeout: 2000});
    }
 });

    });

     $("#clock").click(function(){

$("#clock").attr("disabled",true);
$.post("../includes/create_share.php", $("#bds").serialize(),
  function(data){
    var ge=data.split(".");
    var ftype=ge[0];
    var result=ge[1];
        var code=ge[2];
    if (result=="ok"){ 
if(ftype=="open"){

}else{ 
var pwd=ge[3];
$('#fxurl-lock').val("<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
"+ge[4]+"."+ge[5]);
$('#pwd-lock').val("密码："+pwd);
$("#sm").hide();
$("#fuzhi4").attr("data-clipboard-text","链接：<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
"+ge[4]+"."+ge[5]+"  密码："+pwd);
$("#result_lock").show();
$.snackbar({content: "创建成功", timeout: 2000});
}
    }else{ 

$("#clock").attr("disabled",false);
$.snackbar({content: code, timeout: 2000});
    }
 });

    });
</script><?php }} ?>
