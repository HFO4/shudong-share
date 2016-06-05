<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 10:39:59
         compiled from ".\..\content\themes\material\userSharesS.html" */ ?>
<?php /*%%SmartyHeaderCode:1620357540117111f72-23162709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a195655f21be2efe7b02b9108188cfa3bdd0cf81' => 
    array (
      0 => '.\\..\\content\\themes\\material\\userSharesS.html',
      1 => 1465123196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1620357540117111f72-23162709',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_57540117261ec4_57286300',
  'variables' => 
  array (
    'tit' => 0,
    'head' => 0,
    'zzurl' => 0,
    'isVisitor' => 0,
    'userinfo' => 0,
    'filedata' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57540117261ec4_57286300')) {function content_57540117261ec4_57286300($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

<title>私密分享 - <?php echo $_smarty_tpl->tpl_vars['tit']->value;?>
</title><?php echo $_smarty_tpl->getSubTemplate ("head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

<style type="text/css">
</style>
<div class="container">
    <div class="well bs-component">
        <h1>私密分享</h1>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" onclick="selectAll(this);" />
                    </th>
                    <th>分享文件名</th>
                    <th>源文件名</th>
                    <th >密码</th>
                    <th>下载次数</th>
                    <th>分享日期</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['two'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['two']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['filedata']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['name'] = 'two';
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['two']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['two']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['two']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['two']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['two']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['two']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['two']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['two']['total']);
?>
                <tr>
                    <td>
                        <input type="checkbox" name="file" value="<?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['sskey'];?>
" />
                        </th>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['fname'];?>
.<?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['ftype'];?>
</td>
                    <td><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
/views/fileJump.php?key=<?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['filekey'];?>
&ming=<?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['ming'];?>
"><?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['ming'];?>
</a>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['passwd'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['downloadnum'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['sstime'];?>
</td>
                    <td><a href="#" onclick="delshare('<?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['sskey'];?>
');">删除</a>  <a href="../s.php?k=<?php echo $_smarty_tpl->tpl_vars['filedata']->value[$_smarty_tpl->getVariable('smarty')->value['section']['two']['index']]['sskey'];?>
" target="_blank">查看</a>
                    </td>
                    </td><?php endfor; else: ?> <?php endif; ?></tbody>
        </table> <a href="javascript:void(0)" onclick="delall();" id="s" class="btn btn-raised btn-danger"><i class="fa fa-remove" aria-hidden="true"></i> 删除选中文件</a>
    </div><?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('titm'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
content/themes/material/js/ZeroClipboard.js"></script>
    <script language="JavaScript">
        function delall() {
            var chk_value = []; //定义一个数组    
            $('input[name="file"]:checked').each(function() {
                chk_value.push($(this).val());
            });
            $("#s").attr("disabled", "true");
            for (key1 in chk_value) {
                $.ajax({
                    type: "POST",
                    url: "../includes/userAction.php",
                    data: {
                        key: chk_value[key1],
                        action: "delshares"
                    },
                    dataType: "text",
                    async: false,
                    success: function(data) {
                        var pe = data.split(".");
                        if (pe[0] == "ok") {} else {
                            $.snackbar({
                                content: "删除时遇到错误",
                                timeout: 2000
                            });
                        };
                    }
                });
            }
            $("#ss").removeAttr("disabled");
            window.location.reload();
        }

        function delshare(key1) {
            $.post("../includes/userAction.php", {
                key: key1,
                action: "delshares"
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
        }

        function selectAll(checkbox) {
            $('input[type=checkbox]').prop('checked', $(checkbox).prop('checked'));
        }
    </script>
    </script><?php }} ?>
