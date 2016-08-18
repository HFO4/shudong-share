<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/connect.php");
require_once("../includes/usercheck.php");
$title="添加上传方案";
require_once("common/head.php");

$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$tit= $row['main_tit'];
$tit1= $row['tit_2'];
$theme= $row['theme'];
$des= $row['desword'];
$kw= $row['keyword'];
$notice= $row['notice'];
$tjcode= $row['tjcode'];
$zzurl= $row['zzurl'];
}
?>
<body>

      <link href="css/form.css" rel="stylesheet">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">添加上传方案</h1>
                    <div id="gg"></div>
                    <div class="alert alert-success" role="alert">树洞外链提供了四种储存途径。<br><strong>七牛:</strong>
                    使用七牛云存储(<a href="http://www.qiniu.com/"target="__blank">http://www.qiniu.com/</a>)提供的服务，将文件存储在云端，速度较快，推荐使用这种方式。
                    <br><strong>本地:</strong>
                    将文件储存在本地服务器上，我们不推荐使用这种方式。
                    <br><strong>远程:</strong>
                    如果你有其他空闲服务器，你可以在其上面搭建树洞外链文件存储服务，将文件存储在远程服务器，不消耗本地服务器流量、存储空间。
                    远程服务器搭建教程请<a href="http://aoaoao.me/839.html">点击这里</a>
                    <br><strong>阿里云OSS:</strong>
                    对象存储（Object Storage Service，简称OSS），是阿里云对外提供的海量、安全和高可靠的云存储服务。RESTFul API的平台无关性，容量和处理能力的弹性扩展，按实际容量付费真正使您专注于核心业务。
                    购买服务请<a href="https://www.aliyun.com/product/oss/?spm=5176.7960203.223925.21.3G235O">点击这里</a>推荐配合<a href="https://www.aliyun.com/product/oss/?spm=5176.7960203.223925.21.3G235O">阿里云CDN</a>一起使用以节省费用。
                    <br><strong>又拍云:</strong>
                    流量用多少，存储免多少。又拍云实现存储减免优惠，以 CDN 流量使用量 1:1 的减免存储空间使用费用。助力用户大幅节省存储成本，让创业更高效。注册账户请<a href="https://www.upyun.com/">点击这里</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    <div class="row" id="choose">
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请选择文件存储位置：</h4>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="images/qiniu.png"  class="img-responsive">
      <div class="caption">
        <h3 align="center">七牛云存储</h3>
        <p>七牛云存储有新用户免费10G存储空间，全网CDN加速，按需付费<br><br></p>
        <p><a id="qiniu" class="btn btn-primary btn-block" role="button">使用这种方式</a></p>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="images/oss.png"  class="img-responsive">
      <div class="caption">
        <h3 align="center">阿里云OSS</h3>
        <p>阿里云对外提供的海量、安全和高可靠的云存储服务。<br><br></p>
        <p><a id="oss" class="btn btn-primary btn-block" role="button">使用这种方式</a></p>
      </div>
    </div>
  </div>
      <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="images/upyun.png"  class="img-responsive">
      <div class="caption">
        <h3 align="center">又拍云存储</h3>
        <p>又拍云存储在一定条件下是免费的。<br><br><br></p>
        <p><a id="upyun" class="btn btn-primary btn-block" role="button">使用这种方式</a></p>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="images/server.png"  class="img-responsive">
      <div class="caption">
        <h3 align="center">远程服务器</h3>
        <p>使用树洞外链提供的服务端脚本，你可以将文件存放在远程服务器上。搭建教程：<a href="http://aoaoao.me/839.html">http://aoaoao.me/839.html</a></p>
        <p><a id="server" class="btn btn-primary btn-block" role="button">使用这种方式</a></p>
      </div>
    </div>
  </div>
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="images/local.png"  class="img-responsive">
      <div class="caption">
        <h3 align="center">本地服务器</h3>
        <p>将文件存放在本地服务器，这种方式消耗资源较大。<br><br></p>
        <p><a  id="local"class="btn btn-primary btn-block" role="button">使用这种方式</a></p>
      </div>
    </div>
  </div>
</div>
<!--upyun-->
<div class="row">
     <form id="upyun-f" style="display:none;">
                 <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">上传方案名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="policyname" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">给上传方案起个名字方便辨认</div>
                    </div>
              
            </div>
              <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">服务名称:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="kjm" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">创建服务时填写的服务名，一般为英文字符，列如“sdcc”</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">空间地址:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <div class="input-group">
                  <div class="input-group-addon">
                    <select name="kjurl_method" onchange="">
                        <option value="http://">http://</option>
                        <option value="https://">https://</option>
                    </select>
                    </div>
                 <input type="text" name="kjurl" class="form-control">
                                   <div class="input-group-addon">/</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间的URL，一般格式为“XXX.xxx.upaiyun.com.com”，您也可使用自己的域名，但要先到又拍云后台绑定。<strong>只需填写主体部分，开头无需加“http://”，结尾无需加“/”</strong>，例如shudongwl.b0.upaiyun.com</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">操作员用户名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="op_name" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">操作员的用户名,可以到又拍云服务管理面板-基础配置-操作员授权中添加</div>
                    </div>
              
            </div>
            <!-- /.row -->
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">操作员密码:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="op_pwd"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">创建操作员时填写的密码</div>
                    </div>
                <div style="height:10px;"></div>             
            </div>
                          <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">表单API密钥:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="ak"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">请到服务管理面板-高级功能中开启表单API并获取密钥</div>
                    </div>
                <div style="height:10px;"></div>             
            </div>
              <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">允许的文件扩展名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" value="jpg,png,gif,mp3,flv,rar,zip,flv"name="hz" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件的扩展名，多个请用英文逗号“,”隔开</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">最大文件尺寸:</label>
                    </div>
                 <div class="col-lg-5" align="right">
            <div class="input-group">

                 <input type="text" name="dx" class="form-control">
     
                <div class="input-group-addon">M</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件最大大小，单位为mb，只需输入数字即可</div>
                    </div>
              
            </div>

            <!-- /.row -->
 <div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2" align="right">
        <label class="lab">是否自动重命名</label>
    </div>
    <div class="col-lg-5" align="left">
        <input type="radio" name="mm" id="mm" onclick="
  $('#mmgz').show();"value="true" checked/>
        <label for="mm" />开启</label>&nbsp;&nbsp;&nbsp;
        <input type="radio" name="mm" onclick="
  $('#mmgz').hide();"value="false" id="mq" />
        <label for="mq">关闭</label>
    </div>
    <div class="col-lg-3" align="right">
        <div class="sm" align="left">推荐开启，开启后系统会自动重命名文件。关闭也可，但重名文件无法上传</div>
    </div>

</div>
<div id="mmgz">
 <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">自动命名规则:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  value="{date}{rand8}"name="namerule" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">自动命名规则，一般保持默认即可.你可以使用下面的变量：{date}=>当前日期，{rand4}=>4位随机数，{rand8}=>8位随机数,{time}=>时间戳，系统会自动替换变量为文件命名</div>
                    </div>
</div></div>
            <!-- /.row -->

            <!-- /.row -->        
                           <div style="height:20px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
   
                    </div>
                 <div class="col-lg-5" align="left">
           <a class="btn btn-lg btn-primary" onClick="save('upyun');">保存更改</a>
                    </div>
                    <div class="col-lg-3" align="right">
        
                    </div>
              
            </div></form>




            
            <!-- /.row -->
<!--oss-->
<div class="row">
     <form id="oss-f" style="display:none;">
     <div class="col-lg-12">
       <div class="alert alert-warning" role="alert"><strong>注意：由于阿里云安全限制，创建空间请注意执行以下步骤，否则无法上传！</strong><br>
       1.阿里云管理面板-对象存储OSS-选择你的空间-Bucket属性-读写权限设为“公共读”；
       <br>
       2.Bucket属性-Cors设置-添加规则-来源和Allowed Header都填“*”，Method 勾选“POST”，缓存时间600秒。
                    </div>
                    </div>
                 <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">上传方案名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="policyname" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">给上传方案起个名字方便辨认</div>
                    </div>
              
            </div>
              <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">空间名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="kjm" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">创建空间时填写的空间名，一般为英文字符，列如“sdcc”</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">OSS外网域名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <div class="input-group">
                  <div class="input-group-addon">
                    <select name="p_server_method" onchange="">
                        <option value="http://">http://</option>
                        <option value="https://">https://</option>
                    </select>
                  </div>
                 <input type="text" name="p_server" class="form-control">
                                   <div class="input-group-addon">/</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间的URL，一般格式为“空间名.xxx.aliyuncs.com”，<strong>只需填写主体部分，开头无需加“http://”，结尾无需加“/” 请填写阿里云默认赠送的三级域名，否则无法上传！</strong>，例如sdcc.oss-cn-shanghai.aliyuncs.com</div>
                    </div>
              
            </div>
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">CDN加速域名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <div class="input-group">
                  <div class="input-group-addon">
                    <select name="kjurl_method" onchange="">
                        <option value="http://">http://</option>
                        <option value="https://">https://</option>
                    </select>
                    </div>
                 <input type="text" name="kjurl" class="form-control">
                                   <div class="input-group-addon">/</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间外链的URL，一般为阿里云CDN绑定的域名。请在开通阿里云CDN服务后到CDN控制台-CDN域名列表-添加域名添加你自己的域名，业务类型为图片小文件加速，源站类型为OSS域名，然后填写你的OSS外网域名，点下一步添加即可。此处应填写添加域名时所填的你自己的域名。当然也可以与OSS外网域名保持一致，但这样会产生较高的流量费用</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">AccessKeyID:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="ak" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间的AKid,可以到阿里云控制面板右上角“AccessKey”中创建</div>
                    </div>
              
            </div>
            <!-- /.row -->
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">AccessKeySecret:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="sk"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间的SK,同上一项创建时一同获取</div>
                    </div>
                    
            </div> 
               <div style="height:10px;"></div>     
              <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">允许的文件扩展名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" value="jpg,png,gif,mp3,flv,rar,zip,flv"name="hz" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件的扩展名，多个请用英文逗号“,”隔开</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">最大文件尺寸:</label>
                    </div>
                 <div class="col-lg-5" align="right">
            <div class="input-group">

                 <input type="text" name="dx" class="form-control">
     
                <div class="input-group-addon">M</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件最大大小，单位为mb，只需输入数字即可</div>
                    </div>
              
            </div>

            <!-- /.row -->
               <div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2" align="right">
        <label class="lab">是否自动重命名</label>
    </div>
    <div class="col-lg-5" align="left">
        <input type="radio" name="mm" id="mm" value="true" checked/>
        <label for="mm" />开启</label>&nbsp;&nbsp;&nbsp;
        <input type="radio" name="mm" value="false" id="mq" />
        <label for="mq">关闭</label>
    </div>
    <div class="col-lg-3" align="right">
        <div class="sm" align="left">推荐开启，开启后系统会自动重命名文件。关闭也可，但重名文件无法上传</div>
    </div>

</div>
    
            <!-- /.row -->

            <!-- /.row -->        
                           <div style="height:20px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
   
                    </div>
                 <div class="col-lg-5" align="left">
           <a class="btn btn-lg btn-primary" onClick="save('oss');">保存更改</a>
                    </div>
                    <div class="col-lg-3" align="right">
        
                    </div>
              
            </div></form>




<!--row2-->
<div class="row">
     <form id="qiniu-f" style="display:none;">
                 <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">上传方案名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="policyname" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">给上传方案起个名字方便辨认</div>
                    </div>
              
            </div>
              <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">空间名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="kjm" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">创建空间时填写的空间名，一般为英文字符，列如“sdcc”</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">空间地址:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <div class="input-group">
                  <div class="input-group-addon">
                    <select name="kjurl_method" onchange="">
                        <option value="http://">http://</option>
                        <option value="https://">https://</option>
                    </select>
                    </div>
                 <input type="text" name="kjurl" class="form-control">
                                   <div class="input-group-addon">/</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间的URL，一般格式为“空间名.qiniudn.com”，您也可使用自己的域名，但要先到七牛后台绑定。<strong>只需填写主体部分，开头无需加“http://”，结尾无需加“/”</strong>，例如sdcc.qiniudn.com</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">AccessKey:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="ak" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间的AK,可以到七牛后台-账号-密钥中查看</div>
                    </div>
              
            </div>
            <!-- /.row -->
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">SecretKey:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="sk"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">空间的SK,可以到七牛后台-账号-密钥中查看</div>
                    </div>
                <div style="height:10px;"></div>             
            </div>
              <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">允许的文件扩展名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" value="jpg,png,gif,mp3,flv,rar,zip,flv"name="hz" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件的扩展名，多个请用英文逗号“,”隔开</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">最大文件尺寸:</label>
                    </div>
                 <div class="col-lg-5" align="right">
            <div class="input-group">

                 <input type="text" name="dx" class="form-control">
     
                <div class="input-group-addon">M</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件最大大小，单位为mb，只需输入数字即可</div>
                    </div>
              
            </div>
            <div style="display: none">
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">分片上传大小:</label>
                    </div>
                                
                 <div class="col-lg-5" align="right"><div class="input-group">
                 <input type="text" value="4"name="fp" class="form-control">                <div class="input-group-addon">M</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">分片上传可以提高大文件上传效率，文件将分为几块上传，这里填写的是“块”的大小，一般无需更改。单位mb，只需填写数字即可</div>
                    </div>
              
            </div></div>
            <!-- /.row -->
               <div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2" align="right">
        <label class="lab">是否自动重命名</label>
    </div>
    <div class="col-lg-5" align="left">
        <input type="radio" name="mm" id="mm" value="true" checked/>
        <label for="mm" />开启</label>&nbsp;&nbsp;&nbsp;
        <input type="radio" name="mm" value="false" id="mq" />
        <label for="mq">关闭</label>
    </div>
    <div class="col-lg-3" align="right">
        <div class="sm" align="left">推荐开启，开启后系统会自动重命名文件。关闭也可，但重名文件无法上传</div>
    </div>

</div>
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">允许的mimeType:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="lx" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">严格限制文件的MimeType.多个请用英文分号“;”隔开。你可以<a href="http://tool.oschina.net/commons" target="new">点击这里</a>查询各种文件扩展名对应的MimeType.不需要限制留空即可！</div>
                    </div>
              
            </div>
            <!-- /.row -->

            <!-- /.row -->        
                           <div style="height:20px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
   
                    </div>
                 <div class="col-lg-5" align="left">
           <a class="btn btn-lg btn-primary" onClick="save('qiniu');">保存更改</a>
                    </div>
                    <div class="col-lg-3" align="right">
        
                    </div>
              
            </div></form>









            <!--远程-->
<form id="server-f" style="display: none">
                 <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">上传方案名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="policyname" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">给上传方案起个名字方便辨认</div>
                    </div>
              
            </div>
              <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">远程接口URL:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="p_server" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">远程服务器接口URL，比如PHP接口：http://aoaoao.me/fileServer.php
                  ,Python方式接口别忘了带上端口</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">外链根URL:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <div class="input-group">
                  <div class="input-group-addon">
                    <select name="p_server_method" onchange="">
                        <option value="http://">http://</option>
                        <option value="https://">https://</option>
                    </select>
                  </div>
                 <input type="text" name="kjurl" class="form-control">
                                   <div class="input-group-addon">/</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
              <div class="sm" align="left">外链的根URL，即一个上传文件后生成的外链除去文件名剩余部分。比如，你设置的储存目录为/data目录，远程服务器域名为www.aoaoao.me，则你的外链URL为http://www.aoaoao.me/data/,<strong>只需填写主体部分，开头无需加“http://”，结尾无需加“/”</strong></div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">Token:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="ak" id="ak"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">远程接口的Token，自动生成，一般无需更改，只需按照教程将此处生成Token填写至接口脚本中即可.</div>
                    </div>
              
            </div>
            <!-- /.row -->
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">文件存放目录:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  value="uploads"name="p_dir"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">文件存放目录，相对于脚本的位置。<strong>开始与结尾都无需加"/"</strong>.比如，将文件存放在与接口同级目录的子目录中，只需填写data/dir2</div>
                    </div>
                <div style="height:10px;"></div>             
            </div>
              <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">允许的文件扩展名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="hz"value="jpg,png,gif,mp3,flv,rar,zip,flv" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件的扩展名，多个请用英文逗号“,”隔开</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">最大文件尺寸:</label>
                    </div>
                 <div class="col-lg-5" align="right">
            <div class="input-group">

                 <input type="text" name="dx" class="form-control">
     
                <div class="input-group-addon">M</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件最大大小，单位为mb，只需输入数字即可</div>
                    </div>
              
            </div>
            <!-- /.row -->
               <div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2" align="right">
        <label class="lab">是否自动重命名</label>
    </div>
    <div class="col-lg-5" align="left">
        <input type="radio" name="mm" id="mm" onclick="
  $('#mmgz').show();"value="true" checked/>
        <label for="mm" />开启</label>&nbsp;&nbsp;&nbsp;
        <input type="radio" name="mm" onclick="
  $('#mmgz').hide();"value="false" id="mq" />
        <label for="mq">关闭</label>
    </div>
    <div class="col-lg-3" align="right">
        <div class="sm" align="left">推荐开启，开启后系统会自动重命名文件。关闭也可，但重名文件无法上传</div>
    </div>

</div>
<div id="mmgz">
 <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">自动命名规则:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  value="{date}{rand8}"name="namerule" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">自动命名规则，一般保持默认即可.你可以使用下面的变量：{date}=>当前日期，{rand4}=>4位随机数，{rand8}=>8位随机数,{time}=>时间戳，系统会自动替换变量为文件命名</div>
                    </div>
</div></div>
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">允许的mimeType:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="lx"value="*" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">严格限制文件的MimeType.多个请用英文分号“;”隔开。你可以<a href="http://tool.oschina.net/commons" target="new">点击这里</a>查询各种文件扩展名对应的MimeType.<strong>不需要限制请填写*</strong></div>
                    </div>
              
            </div>
            <!-- /.row -->

            <!-- /.row -->        
                           <div style="height:20px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
   
                    </div>
                 <div class="col-lg-5" align="left">
           <a class="btn btn-lg btn-primary" onClick="save('server');">保存更改</a>
                    </div>
                    <div class="col-lg-3" align="right">
        
                    </div>
              
            </div></form>
            <!--/z远程-->
















            <!--本地-->

            <!--远程-->
<form id="local-f" style="display: none">
                 <div class="row">
                  <div class="alert alert-warning" role="alert"style="width: 85%;position: relative;left: 5%" ><strong>注意：由于PHP自身安全限制，使用本地上传默认无法传大文件，一般超过10MB时上传会卡死，如需大文件上传，请参考下面链接进行配置：<a href="http://yun.aoaoao.me/help.php#bigfile" target="new">http://yun.aoaoao.me/help.php#bigfile</a></strong>
                    </div>
                <div class="col-lg-2" align="right">
                 <label class="lab">上传方案名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="policyname" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">给上传方案起个名字方便辨认</div>
                    </div>
              
            </div>
              <div style="height:10px;"></div>

   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">外链根URL:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <div class="input-group">
                  <div class="input-group-addon">
                    <select name="kjurl_method" onchange="">
                        <option value="http://">http://</option>
                        <option value="https://">https://</option>
                    </select>
                    </div>
                 <input type="text" name="kjurl" class="form-control">
                                   <div class="input-group-addon">/</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
              <div class="sm" align="left">外链的根URL，即一个上传文件后生成的外链除去文件名剩余部分。比如，你设置的储存目录为/data目录，你树洞外链站点域名为www.aoaoao.me，则你的外链URL为http://www.aoaoao.me/data/,<strong>只需填写主体部分，开头无需加“http://”，结尾无需加“/”</strong></div>
                    </div>
              
            </div>
   
            <!-- /.row -->
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">文件存放目录:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  value="uploads"name="p_dir"class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">文件存放目录，相对于树洞外链主目录的位置。<strong>开始与结尾都无需加"/"</strong>.比如，将文件存放在与首页同级目录的子目录中，只需填写data/dir2</div>
                    </div>
                <div style="height:10px;"></div>             
            </div>
              <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">允许的文件扩展名:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text" name="hz"value="jpg,png,gif,mp3,flv,rar,zip,flv" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件的扩展名，多个请用英文逗号“,”隔开</div>
                    </div>
              
            </div>
   <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">最大文件尺寸:</label>
                    </div>
                 <div class="col-lg-5" align="right">
            <div class="input-group">

                 <input type="text" name="dx" class="form-control">
     
                <div class="input-group-addon">M</div>
                    </div>
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">允许上传的文件最大大小，单位为mb，只需输入数字即可</div>
                    </div>
              
            </div>
            <!-- /.row -->
               <div style="height:10px;"></div>
<div class="row">
    <div class="col-lg-2" align="right">
        <label class="lab">是否自动重命名</label>
    </div>
    <div class="col-lg-5" align="left">
        <input type="radio" name="mm" id="mm" onclick="
  $('#mmgz').show();"value="true" checked/>
        <label for="mm" />开启</label>&nbsp;&nbsp;&nbsp;
        <input type="radio" name="mm" onclick="
  $('#mmgz').hide();"value="false" id="mq" />
        <label for="mq">关闭</label>
    </div>
    <div class="col-lg-3" align="right">
        <div class="sm" align="left">推荐开启，开启后系统会自动重命名文件。关闭也可，但重名文件无法上传</div>
    </div>

</div>
<div id="mmgz">
 <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">自动命名规则:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  value="{date}{rand8}"name="namerule" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">自动命名规则，一般保持默认即可.你可以使用下面的变量：{date}=>当前日期，{rand4}=>4位随机数，{rand8}=>8位随机数,{time}=>时间戳，系统会自动替换变量为文件命名</div>
                    </div>
</div></div>
               <div style="height:10px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
                 <label class="lab">允许的mimeType:</label>
                    </div>
                 <div class="col-lg-5" align="right">
                 <input type="text"  name="lx"value="*" class="form-control">
                    </div>
                    <div class="col-lg-3" align="right">
                <div class="sm" align="left">严格限制文件的MimeType.多个请用英文分号“;”隔开。你可以<a href="http://tool.oschina.net/commons" target="new">点击这里</a>查询各种文件扩展名对应的MimeType.<strong>不需要限制请填写*</strong></div>
                    </div>
              
            </div>
            <!-- /.row -->

            <!-- /.row -->        
                           <div style="height:20px;"></div>
            <div class="row">
                <div class="col-lg-2" align="right">
   
                    </div>
                 <div class="col-lg-5" align="left">
           <a class="btn btn-lg btn-primary" onClick="save('local');">保存更改</a>
                    </div>
                    <div class="col-lg-3" align="right">
        
                    </div>
              
            </div></form>
</div>
<!--/row2-->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


</body>

</html>
<script>


function _getRandomString(len) {  
    len = len || 32;  
    var $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678'; // 默认去掉了容易混淆的字符oOLl,9gq,Vv,Uu,I1  
    var maxPos = $chars.length;  
    var pwd = '';  
    for (i = 0; i < len; i++) {  
        pwd += $chars.charAt(Math.floor(Math.random() * maxPos));  
    }  
    return pwd;  
}  

$("#ak").val(_getRandomString(32));

$("#qiniu").click(function(){

  $("#qiniu-f").show();
  $("#choose").hide();
});
$("#upyun").click(function(){

  $("#upyun-f").show();
  $("#choose").hide();
});
$("#server").click(function(){

  $("#server-f").show();
  $("#choose").hide();
});
$("#local").click(function(){

  $("#local-f").show();
  $("#choose").hide();
});
$("#oss").click(function(){


  $("#choose").hide();

    $("#oss-f").show();
});
function save(t){

$.post("../includes/adminAction.php", $("#"+t+"-f").serialize()+"&action=savepolicy&policytype="+t,
   function(data){
	var ge=data.split("|");
	if(ge[0]=="bad"){ 
	alert(ge[1]);
	}else if (ge[0]=="ok"){ 
alert("添加成功");
	window.location.reload(); 
	}
   });
}
$(function () {
  $('[data-toggle="popover"]').popover()
})

</script>