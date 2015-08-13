<?php
require_once("config.php");//基础配置文件
require_once('includes/function.php');//函数库
require_once('includes/smarty.inc.php');//smarty模板配置
error_reporting(0);//设置错误级别0


$con1=con_sql($sqlip,$sqlid,$sqlpass);//连接数据库
mysql_select_db($sqlname);//选取数据库
$result = mysql_query("SELECT * FROM sd_setting");//获取数据
while($row = mysql_fetch_array($result))
  { 
$tit= $row['main_tit'];
$tit1= $row['tit_2'];
$theme= $row['theme'];
$notice= $row['notice'];
$des= $row['desword'];
$kw= $row['keyword'];
$minetype= $row['upload_minetype'];
$max_size= $row['upload_size'];
$fpsize= $row['upload_fpsize'];
$autoname= $row['autoname'];
$tjcode= $row['tjcode'];
}
$smarty->template_dir = "content/themes/".$theme;

//定义模板头
$head='    <script type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="includes/js/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="includes/js/plupload/i18n/zh_CN.js"></script>
<script type="text/javascript" src="includes/js/ui.js"></script>
<script type="text/javascript" src="includes/js/main.js"></script>
<script type="text/javascript" src="includes/js/qiniu.js"></script>
<meta name="description" content="'.$des.'" />
<meta name="keywords" content="'.$kw.'" />';

$jscode=$tjcode.'
<script type="text/javascript">
var autoname='.$autoname.';var min="'.$minetype.'"; var max="'.$max_size.'"; var fp="'.$fpsize.'"; </script>';


$smarty->assign("des", $des);
$smarty->assign("kw", $kw);
$smarty->assign("notice", $notice);
$smarty->assign("tit", $tit."-".$tit1); //应用标题
$smarty->assign("head", $head); //应用模板头
$smarty->assign("jscode", $jscode); //应用模板头
$smarty->display("index.html");  // 输出页面

?>
