<?php
require_once("smarty/SmartyBC.class.php"); //包含smarty类文件
$smarty = new SmartyBC(); //建立smarty实例对象$smarty
$smarty->config_dir="smarty/Config_File.class.php";  // 目录变量
$smarty->caching=false; //是否使用缓存，项目在调试期间，不建议启用缓存
$smarty->compile_dir = "./content/templates_c"; //设置编译目录
$smarty->cache_dir = "./content/smarty_cache"; //缓存文件夹
$smarty->left_delimiter = "~";
$smarty->right_delimiter = "~~";
?>