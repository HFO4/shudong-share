<?php /* Smarty version Smarty-3.1.18, created on 2016-06-05 05:53:42
         compiled from ".\..\content\themes\material\video_view.html" */ ?>
<?php /*%%SmartyHeaderCode:165495753b2623abc64-27240937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49dffd89a2f04b65b0022abb7ea053e89eba801e' => 
    array (
      0 => '.\\..\\content\\themes\\material\\video_view.html',
      1 => 1465106011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165495753b2623abc64-27240937',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5753b262609471_37048779',
  'variables' => 
  array (
    'tit' => 0,
    'head' => 0,
    'zzurl' => 0,
    'isVisitor' => 0,
    'userinfo' => 0,
    'fileurl' => 0,
    'key' => 0,
    'filetype' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5753b262609471_37048779')) {function content_5753b262609471_37048779($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
includes/ckplayer/ckplayer.js"></script>
<title>文件详情 - <?php echo $_smarty_tpl->tpl_vars['tit']->value;?>
</title><?php echo $_smarty_tpl->getSubTemplate ("head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tit'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="well bs-component " style="padding: 0px;height: 500px;" align="center">
                <div id="m_player"></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body" style="padding: 0px;">
                    <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                        <li class="active"><a href="#wl" data-toggle="tab"><i class="fa fa-link" aria-hidden="true"></i> 文件外链</a>
                        </li>
                        <li><a href="#dy" data-toggle="tab"><i class="fa fa-code" aria-hidden="true"></i> 调用</a>
                        </li>
                        <li><a href="#qrcode" data-toggle="tab"><i class="fa fa-qrcode" aria-hidden="true"></i> 二维码</a>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="bootstrap-elements.html" data-target="#"><i class="fa fa-share" aria-hidden="true"></i> 创建分享<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#gkfx" data-toggle="tab"><i class="fa fa-eye" aria-hidden="true"></i> 公开分享</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#smfx" data-toggle="tab"><i class="fa fa-eye-slash" aria-hidden="true"></i>私密分享</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#gl" data-toggle="tab"><i class="fa fa-cog" aria-hidden="true"></i> 管理</a>
                        </li>
                        <li><a href="#xq" onclick="xiangqing()" data-toggle="tab"><i class="fa fa-info" aria-hidden="true"></i> 详情</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content" style="padding: 19px;">
                        <div class="tab-pane fade" id="xq">
                            <div class="row" align="center">
                                <table class="table table-bordered xq" style="width:80%;">
                                    <tr>
                                        <th width="97">上传者：</td>
                                            <td width="233" style="word-break: normal;" id="file_hash"></td>
                                            <th width="110">上传时间：</td>
                                                <td width="122" id="put_time"></td>
                                    </tr>
                                    <tr>
                                        <th>mimetype：</td>
                                            <td id="m_type"></td>
                                            <th>大小(字节)：</td>
                                                <td id="file_size"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="gl">
                            <div class="row" align="center">
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <button id="s1" onclick="delete_share();" class="btn btn-raised btn-primary"><i class="fa fa-minus-circle" aria-hidden="true"></i> 取消所有分享</button>
                                </div>
                                <div class="col-md-2">
                                    <button id="s2" onclick="delete_confirm();" class="btn btn-raised btn-danger"><i class="fa fa-close" aria-hidden="true"></i> 删除文件</button>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade active in" id="wl">
                            <div class="row">
                                <div class="col-md-2">
                                    <lable>外链地址：</lable>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="yuantu" value="<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
">
                                </div>
                                <div class="col-md-2"><a id="fuzhi" data-clipboard-target="yuantu" class="btn btn-raised btn-primary" data-content="复制成功" data-toggle="snackbar" data-timeout="2000">复制</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dy">
                            <div class="row">
                                <div class="col-md-2">
                                    <lable>CKplayer：</lable>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="htmldy" rows="3" class="form-control">&lt;iframe src=&quot;<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
views/v_player.php?key=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
&amp;w=800&amp;h=500&quot; width=&quot;800&quot; height=&quot;500 scrolling=&quot;no&quot;frameborder=&quot;0&quot;&quot;&gt;&lt;/iframe&gt;&lt;!-- 要修改播放器大小，请修改URL参数中的h（高）和w（宽）的值，再修改iframe的宽高，两者应保持一致--&gt;</textarea>
                                </div>
                                <div class="col-md-2"><a id="fuzhi1" data-clipboard-target="htmldy" class="btn btn-raised btn-primary" data-content="复制成功" data-toggle="snackbar" data-timeout="2000">复制</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <lable>HTML5播放器：</lable>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="mddy" rows="3" class="form-control">&lt;video src="<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
" controls="controls"&gt; &lt;/video&gt;</textarea>
                                </div>
                                <div class="col-md-2"><a id="fuzhi2" data-clipboard-target="mddy" class="btn btn-raised btn-primary" data-content="复制成功" data-toggle="snackbar" data-timeout="2000">复制</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="qrcode">
                            <div class="row">
                                <div class="col-md-3">
                                    <img style="width:100%;" src="https://api.lwl12.com/img/qrcode/get?ct=<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
">
                                    <div align="center">原图外链</div>
                                </div>
                                <div class="col-md-3">
                                    <img style="width:100%;" src="https://api.lwl12.com/img/qrcode/get?ct=<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
views/pic.php?key=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
                                    <div align="center">当前页面</div>
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <div class="alert alert-dismissible alert-warning">
                                        <h4>注意!</h4>
                                        <p>本页面为私有页面，请勿将本页URL分享给不受信任的人。如需分享文件，请直接发送文件外链URL或创建分享链接给对方。</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="gkfx">
                            <div id="gk">
                                <form id="bd" method="post">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <lable>请给你的文件起个名字：</lable>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="fname" name="fname">
                                                    <div class="input-group-addon">.<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>
</div>
                                                </div>
                                            </div>
                                            <input style="display:none;" id="ftype" name="ftype" value="open" type="text" />
                                            <input style="display:none;" id="fkey" name="fkey" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" type="text" />
                                        </div>
                                </form>
                                <div class="col-md-2">
                                    <button id="copen" class="btn btn-raised btn-primary">创建</button>
                                </div>
                                </div>
                            </div>
                            <div id="result_open" style="display:none;">
                                <div class="row">
                                    <div class="col-md-2">
                                        <lable>分享页URL：</lable>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="fxurl" name="fxurl">
                                    </div>
                                    <div class="col-md-2">
                                        <button id="fuzhi3" data-clipboard-target="fxurl" class="btn btn-raised btn-primary" data-content="复制成功" data-toggle="snackbar" data-timeout="2000" class="btn btn-raised btn-primary">复制</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="smfx">
                            <div id="sm">
                                <form id="bds" method="post">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <lable>请给你的文件起个名字：</lable>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="fname" name="fname">
                                                    <div class="input-group-addon">.<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>
</div>
                                                </div>
                                            </div>
                                            <input style="display:none;" id="ftype" name="ftype" value="lock" type="text" />
                                            <input style="display:none;" id="fkey" name="fkey" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" type="text" />
                                        </div>
                                </form>
                                <div class="col-md-2">
                                    <button id="clock" class="btn btn-raised btn-primary">创建</button>
                                </div>
                                </div>
                            </div>
                            <div id="result_lock" style="display:none;">
                                <div class="row">
                                    <div class="col-md-3">
                                        <lable>分享页URL及密码：</lable>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-inline">
                                            <input type="text" class="form-control" id="fxurl-lock" name="fxurl-lock">
                                            <input type="text" class="form-control" id="pwd-lock" name="pwd-lock">
                                            <button id="fuzhi4" class="btn btn-raised btn-primary" data-content="复制成功" data-toggle="snackbar" data-timeout="2000" class="btn btn-raised btn-primary">复制</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
        <div class="col-md-3">
        <?php echo $_smarty_tpl->getSubTemplate ("side.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('titm'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

        </div>
    </div><?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('titm'=>$_smarty_tpl->tpl_vars['tit']->value,'head'=>$_smarty_tpl->tpl_vars['head']->value,'zzurl'=>$_smarty_tpl->tpl_vars['zzurl']->value,'isvisitor'=>$_smarty_tpl->tpl_vars['isVisitor']->value,'userinfo'=>$_smarty_tpl->tpl_vars['userinfo']->value), 0);?>

    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
content/themes/material/js/ZeroClipboard.js"></script>
    <script type="text/javascript">
        var flashvars = {
            f: '<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
',
            c: 0,
            loaded: 'loadedHandler'
        };
        var video = ['<?php echo $_smarty_tpl->tpl_vars['fileurl']->value;?>
->video/<?php echo $_smarty_tpl->tpl_vars['filetype']->value;?>
'];
        CKobject.embed('../includes/ckplayer/ckplayer.swf', 'm_player', 'ckplayer_a1', '100%', '500', false, flashvars, video);
        load = "0";

        function xiangqing() {
            $("#guanli").hide();
            $("#fileurl").hide();
            $("#filecode").hide();
            $("#xiangqing").show();
            if (load == "0") {
                $.get("../includes/getinfo.php?key=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
", function(data, status) {
                    var xqq = data.split(".");
                    $("#file_hash").html(xqq[1]);
                    $("#file_size").html(xqq[0]);
                    $("#m_type").html(xqq[2]);
                    $("#put_time").html(xqq[3]);
                });
            }
            load = "1";
        }
        var clip = new ZeroClipboard(document.getElementById("fuzhi"), {});
        var clip1 = new ZeroClipboard(document.getElementById("fuzhi1"), {});
        var clip2 = new ZeroClipboard(document.getElementById("fuzhi2"), {});
        var clip3 = new ZeroClipboard(document.getElementById("fuzhi3"), {});
        var clip4 = new ZeroClipboard(document.getElementById("fuzhi4"), {});
        $("#copen").click(function() {
            $("#copen").attr("disabled", true);
            $.post("../includes/create_share.php", $("#bd").serialize(), function(data) {
                var ge = data.split(".");
                var ftype = ge[0];
                var result = ge[1];
                var code = ge[2];
                if (result == "ok") {
                    if (ftype == "open") {
                        $('#fxurl').val("<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
" + ge[3] + "." + ge[4]);
                        $("#gk").hide();
                        $("#result_open").show();
                        $.snackbar({
                            content: "创建成功",
                            timeout: 2000
                        });
                    } else {}
                } else {
                    $("#copen").attr("disabled", false);
                    $.snackbar({
                        content: code,
                        timeout: 2000
                    });
                }
            });
        });
        $("#clock").click(function() {
            $("#clock").attr("disabled", true);
            $.post("../includes/create_share.php", $("#bds").serialize(), function(data) {
                var ge = data.split(".");
                var ftype = ge[0];
                var result = ge[1];
                var code = ge[2];
                if (result == "ok") {
                    if (ftype == "open") {} else {
                        var pwd = ge[3];
                        $('#fxurl-lock').val("<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
" + ge[4] + "." + ge[5]);
                        $('#pwd-lock').val("密码：" + pwd);
                        $("#sm").hide();
                        $("#fuzhi4").attr("data-clipboard-text", "链接：<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
" + ge[4] + "." + ge[5] + " 密码：" + pwd);
                        $("#result_lock").show();
                        $.snackbar({
                            content: "创建成功",
                            timeout: 2000
                        });
                    }
                } else {
                    $("#clock").attr("disabled", false);
                    $.snackbar({
                        content: code,
                        timeout: 2000
                    });
                }
            });
        });

        function delete_confirm() {
            var returnVal = window.confirm("删除文件不可恢复，并且所有分享都将取消，确定删除吗？", "确认删除");
            if (!returnVal) {} else {
                $("#s2").attr("disabled", true);
                $.post("../includes/delete_file.php", {
                    key: "<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"
                }, function(data) {
                    var pe = data.split(".");
                    if (pe[0] == "ok") {
                        $.snackbar({
                            content: pe[1],
                            timeout: 2000
                        });
                        setTimeout(function() {
                            window.location = "<?php echo $_smarty_tpl->tpl_vars['zzurl']->value;?>
"
                        }, 2000);
                    } else {
                        $.snackbar({
                            content: pe[1],
                            timeout: 2000
                        });
                        $("#s2").attr("disabled", false);
                    }
                });
            }
        }

        function delete_share() {
            var returnVal1 = window.confirm("确定要取消该文件的所有分享？", "确认取消");
            if (!returnVal1) {} else {
                $("#s1").attr("disabled", true);
                $.post("../includes/delete_share.php", {
                    key: "<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"
                }, function(data) {
                    var pe1 = data.split(".");
                    if (pe1[0] == "ok") {
                        $.snackbar({
                            content: pe1[1],
                            timeout: 2000
                        });
                        $("#s1").attr("disabled", false);
                    } else {
                        $.snackbar({
                            content: pe1[1],
                            timeout: 2000
                        });
                        $("#s1").attr("disabled", false);
                    }
                });
            }
        }
    </script><?php }} ?>
