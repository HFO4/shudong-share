<?php
$isVisitor = "true";
session_start();
$userInfo2=user_check($_SESSION[uid],$_SESSION[user_check],$con);
if($userInfo2 == "bad"){
	$isVisitor = "true";
	$userInfo["uid"]="";
	$userInfo["group"]="1";
}else{
	$isVisitor = "false";
	$userInfo = $userInfo2;
}
?>