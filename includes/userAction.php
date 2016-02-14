<?php
require_once("../config.php");
require_once('function.php');
require_once('connect.php');
require_once('userShell.php');
session_start();
$action = $_POST['action'];
if(!empty($_GET['action'])){
	switch ($_GET['action']) {
		case 'logout':
			unset($_SESSION['uid']);
   			unset($_SESSION['user_check']);
   			echo '<script>window.history.go(-1);</script>';
			break;
		
		default:
			# code...
			break;
	}
	exit();
}
function userReg($userName,$passWord,$SQlcon){
	$userName = str_replace(" ", "", $userName);
	$passWord = str_replace(" ", "", $passWord);
	$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
	if ( ! preg_match( $pattern, $userName ) || (mb_strlen($userName,'UTF8')>22) || (mb_strlen($userName,'UTF8')<4) || (mb_strlen($passWord,'UTF8')>16) || (mb_strlen($passWord,'UTF8')<4)){
		$result['code']="bad";
		$result['message']=urlencode("电子邮箱或密码不符合规范");
		return urldecode(json_encode($result));
		exit();		
	}
	$stmt = mysqli_stmt_init($SQlcon);
	mysqli_stmt_prepare($stmt, 'SELECT uid FROM sd_users WHERE username=?');
	mysqli_stmt_bind_param($stmt, "s", $userName);
 	mysqli_stmt_execute($stmt);
 	mysqli_stmt_bind_result($stmt,$uid);
 	$results = mysqli_stmt_fetch($stmt) ;
 	if(! empty($results)){
 		$result['code']="bad";
		$result['message']=urlencode("此电子邮箱已被注册！");
		return urldecode(json_encode($result));
		exit();			
 	}
 	$passWord=md5($passWord."sdshare");
 	$timeNow = date('Y-m-d H:i:s');
 	$sql="INSERT INTO  `sd_users` (`username` ,`pwd` ,`group` ,`regtime` ,`grade` ,`policy`)VALUES (?, '$passWord', '2', '$timeNow' ,'0' ,'-');";
 	$stmt = $SQlcon->prepare($sql);
    $stmt->bind_param('s', $userName);
    $stmt->execute();
    $result['code']="ok";
	$result['message']=urlencode("ok");
	return urldecode(json_encode($result));
}
function userLogin($userName,$passWord,$SQlcon){
	$userName = str_replace(" ", "", $userName);
	$passWord = str_replace(" ", "", $passWord);
	if(empty($userName) || empty($passWord)){
		$result['code']="bad";
		$result['message']=urlencode("表单不完整");
		return urldecode(json_encode($result));
		exit();
	}
	$stmt = mysqli_stmt_init($SQlcon);
	mysqli_stmt_prepare($stmt, 'SELECT uid,username,pwd FROM sd_users WHERE username=?');
	mysqli_stmt_bind_param($stmt, "s", $userName);
 	mysqli_stmt_execute($stmt);
 	$results = mysqli_stmt_bind_result($stmt,$uid,$um,$pwd);
 	$result['code']="bad";
	$result['message']=urlencode("用户名或密码错误");
	while (mysqli_stmt_fetch($stmt)) {
        if(md5($passWord."sdshare") == $pwd){
 			$ps = true ;
 		}else{
 			$ps = false ;
 		}
 		if($ps){
 			$result['code']="ok";
			$result['message']=urlencode("登录成功");
			$_SESSION[uid]=$uid;
    		$_SESSION[user_check]=md5($um.$pwd."sdshare");
 		}else{
 		}
    }
 	return urldecode(json_encode($result));      
}
function delShare($shareKey,$con,$userId){
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, 'SELECT cuser FROM sd_ss WHERE sskey=?');
	mysqli_stmt_bind_param($stmt, "s", $shareKey);
 	mysqli_stmt_execute($stmt);
 	$results = mysqli_stmt_bind_result($stmt,$upuser);
 	while (mysqli_stmt_fetch($stmt)) {
 		if($userId != $upuser || empty($upuser)){
 			return('bad.无权');
 			exit();
 		}
 	$deleteAction = "delete from sd_ss where sskey = '$shareKey'";
 	mysqli_query($con,$deleteAction);
 	return("ok.删除成功");
 	}
}
function delShareS($shareKey,$con,$userId){
	$stmt = mysqli_stmt_init($con);
	mysqli_stmt_prepare($stmt, 'SELECT cuser FROM sd_sskey WHERE sskey=?');
	mysqli_stmt_bind_param($stmt, "s", $shareKey);
 	mysqli_stmt_execute($stmt);
 	$results = mysqli_stmt_bind_result($stmt,$upuser);
 	while (mysqli_stmt_fetch($stmt)) {
 		if($userId != $upuser || empty($upuser)){
 			return('bad.无权');
 			exit();
 		}
 	$deleteAction = "delete from sd_sskey where sskey = '$shareKey'";
 	mysqli_query($con,$deleteAction);
 	return("ok.删除成功");
 	}
}
function changePwd($pwdNew,$con,$pwdNow,$pwdInput,$userId){
	$pwdNew = str_replace(" ", "", $pwdNew);
	if((mb_strlen($pwdNew,'UTF8')<4) || (mb_strlen($pwdNew,'UTF8')>16)){
		return('bad.密码长度应在4-16字符之间');
		exit();
	}
	if(md5($pwdInput."sdshare") != $pwdNow){
		return('bad.原密码错误');
		exit();
	}
	$pwdNew = md5($pwdNew."sdshare");
	$sql="UPDATE `sd_users` SET `pwd` = '$pwdNew' WHERE `uid` = $userId";
 	mysqli_query($con,$sql);
 	return ('ok.密码修改成功');
}
switch ($action) {
	case 'login':
		print_r( userLogin($_POST['username'],$_POST['password'],$con));
		break;
	case 'register':
		print_r( userReg($_POST['username-reg'],$_POST['password-reg'],$con));
		break;
	case 'delshare':
		print_r( delShare($_POST['key'],$con,$userInfo['uid']));
		break;
	case 'delshares':
		print_r( delShareS($_POST['key'],$con,$userInfo['uid']));
		break;
	case 'changepwd':
		print_r( changePwd($_POST['pwd'],$con,$userInfo['pwd'],$_POST['pwdnow'],$userInfo['uid']));
		break;
	default:
		# code...
		break;
}
?>