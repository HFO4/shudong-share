<?php

error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/connect.php");
require_once("../includes/usercheck.php");
$title="文件管理";
require_once("common/head.php");


?>
<body>

      
        <div id="page-wrapper">
           

  
    <div class="rows">
    <!-- /#wrapper -->
<iframe src="file_main.php?page=1&s=10"frameborder="0"onload="reinitIframe()" id="ff"scrolling="no"width="100%"  ></iframe>
    <!-- jQuery -->

</div>  </div>
</body>

</html>
<script type="text/javascript">
	
function reinitIframe(){  
var iframe = document.getElementById("ff");  
try{  
    var bHeight = iframe.contentWindow.document.body.scrollHeight;  
    var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;  
    var height = Math.max(bHeight, dHeight);  
    iframe.height = height;  
}catch (ex){}  
}  
  
var timer1 = window.setInterval("reinitIframe()", 500); //定时开始  
  
function reinitIframeEND(){  
var iframe = document.getElementById("ff");  
try{  
    var bHeight = iframe.contentWindow.document.body.scrollHeight;  
    var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;  
    var height = Math.max(bHeight, dHeight);  
    iframe.height = height;  
}catch (ex){}  
// 停止定时  
window.clearInterval(timer1);  
  
}  
</script>