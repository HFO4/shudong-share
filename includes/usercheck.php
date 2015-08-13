<?php

session_start();
$con = mysql_connect($sqlip,$sqlid,$sqlpass);//连接数据库
mysql_select_db($sqlname);//选取数据库
mysql_query("set names utf8");//设置编码
$arr=user_shell($_SESSION[id],$_SESSION[user_shell]);
 if($arr=="bad"){
	echo '<script>window.location.href="login.php";</script>';
	exit();
	 }else{
		
		 
		 }
?>
