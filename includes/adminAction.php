<?php
error_reporting(0);//设置错误级别0
$action = $_POST['action'];
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once('connect.php');
require_once("usercheck.php");
switch ($action) {
	case 'savesetting':
		$tit=$_POST['tit'];
		$tit_2=$_POST['tit_2'];
		$des=$_POST['des'];
		$kw=$_POST['kw'];
		$zzurl=$_POST['zzurl'];
		$notice=addslashes($_POST['notice']);
		$tjcode=addslashes($_POST['tjcode']);
		$ju="UPDATE `sd_setting` SET `main_tit` = '$tit',`zzurl` = '$zzurl',`notice` = '$notice',`tit_2`='$tit_2',`keyword` = '$kw',`desword` = '$des',`tjcode` = '$tjcode' WHERE `id` = 0";
		if (mysqli_query($con,$ju)){
		  echo "ok|ok";
		}else{
		  echo "bad|" . "无法修改数据表";
		}
		break;
	case 'editpolicy':
		$p_id=$_POST['p_id'];
		$p_server=$_POST['p_server'];
		$p_dir=$_POST['p_dir'];
		$p_bucketname=$_POST['p_bucketname'];
		$p_url=$_POST['p_url'];
		$p_ak=$_POST['p_ak'];
		$p_sk=$_POST['p_sk'];
		$p_filetype=$_POST['p_filetype'];
		$p_mimetype=$_POST['p_mimetype'];
		$p_size=$_POST['p_size'];
		$p_autoname=$_POST['p_autoname'];
		$p_namerule=$_POST['p_namerule'];
		$sql = "UPDATE `sd_policy` SET `p_server` = '$p_server',`p_dir` = '$p_dir',`p_bucketname` = '$p_bucketname',`p_url` = '$p_url',`p_ak` = '$p_ak',`p_sk` = '$p_sk',`p_filetype` = '$p_filetype',`p_mimetype` = '$p_mimetype',`p_size` = '$p_size',`p_autoname` = '$p_autoname',`p_namerule` = '$p_namerule' WHERE `id` = '$p_id'";
		if (mysqli_query($con,$sql)){
		  echo "ok|成功";
		  }else{
		  echo "bad|" ."无法修改数据表";
		  }
		break;
	case 'savepolicy':
		$policyname=$_POST['policyname'];
		$policytype=$_POST['policytype'];
		$kjm=$_POST['kjm'];
		$p_server = $_POST['p_server_method'] == "http://" ? "http://".$_POST['p_server']."/" : "https://".$_POST['p_server']."/";
		$p_dir=$_POST['p_dir'];
		$namerule=$_POST['namerule'];
		$zzurl=$_POST['zzurl'];
		$ak=$_POST['ak'];
		$sk=$_POST['sk'];
		$kjurl = $_POST['kjurl_method'] == "http://" ? "http://".$_POST['kjurl']."/" : "https://".$_POST['kjurl']."/";
		$hz= $_POST['hz'];
		$dx= $_POST['dx']*1048576;
		$fp= $_POST['fp'];
		$lx= $_POST['lx'];
		$mm= $_POST['mm'];
		$op_name = $_POST['op_name'];
		$op_pwd = $_POST['op_pwd'];
		$ju = "INSERT INTO `sd_policy` ( `p_name`, `p_type`, `p_server`, `p_bucketname`, `p_url`, `p_ak`, `p_sk`, `p_filetype`, `p_mimetype`, `p_size`, `p_autoname`, `p_dir`, `p_namerule`,`p_op_name`, `p_op_pwd`) VALUES ( '$policyname', '$policytype', '$p_server', '$kjm', '$kjurl', '$ak', '$sk', '$hz', '$lx', '$dx', '$mm', '$p_dir', '$namerule', '$op_name', '$op_pwd');";
		
		if (mysqli_query($con,$ju)){
		  echo "ok|ok";
		  }else{
		  echo "bad|" ."无法修改数据表";
		  }
		break;
	case 'deluser':
		$uid = $_POST['uid'];
		$deleteAction = "delete from sd_users where uid = '$uid'";
		mysqli_query($con,$deleteAction);
 		echo "ok.删除成功";
		break;
	case 'delpolicy':
		$uid = $_POST['id'];
		$deleteAction = "delete from sd_policy where id = '$uid'";
		mysqli_query($con,$deleteAction);
 		echo "ok.删除成功";
		break;
	case 'adduser':
		$userName = $_POST['username'];
		$passWord = $_POST['pwd'];
		$group = $_POST['ug'];
		$userName = str_replace(" ", "", $userName);
	    $passWord = str_replace(" ", "", $passWord);
		$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		if ( ! preg_match( $pattern, $userName ) || (mb_strlen($userName,'UTF8')>22) || (mb_strlen($userName,'UTF8')<4) || (mb_strlen($passWord,'UTF8')>16) || (mb_strlen($passWord,'UTF8')<4)){
			echo("bad.电子邮箱或密码不符合规范");
			exit();		
		}
		$stmt = mysqli_stmt_init($con);
		mysqli_stmt_prepare($stmt, 'SELECT uid FROM sd_users WHERE username=?');
		mysqli_stmt_bind_param($stmt, "s", $userName);
	 	mysqli_stmt_execute($stmt);
	 	mysqli_stmt_bind_result($stmt,$uid);
	 	$results = mysqli_stmt_fetch($stmt) ;
	 	if(! empty($results)){
	 		$result['code']="bad";
			$result['message']=urlencode("此电子邮箱已被注册！");
			echo "bad.此电子邮箱已被注册！";			
	 	}else{
		 	$passWord=md5($passWord."sdshare");
		 	$timeNow = date('Y-m-d H:i:s');
		 	$sql="INSERT INTO  `sd_users` (`username` ,`pwd` ,`group` ,`regtime` ,`grade` ,`policy`)VALUES ('$userName', '$passWord', '$group', '$timeNow' ,'0' ,'-');";
		 	mysqli_query($con,$sql);
		 	echo "ok.添加成功";
	    }
 		break;
 	case 'edituser':
 		$passWord = $_POST['epwd'];
 		$userName = $_POST['eusername'];
 		$userGroup = $_POST['egroup'];
 		$userId = $_POST['euid'];
 		$userName = str_replace(" ", "", $userName);
	    $passWord = str_replace(" ", "", $passWord);
	    $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
	    if ( ! preg_match( $pattern, $userName ) || (mb_strlen($userName,'UTF8')>22) || (mb_strlen($userName,'UTF8')<4)){
		echo("bad|电子邮箱不符合规范");
		exit();		
			}
		if(empty($passWord)){
			$sql = "UPDATE `sd_users` SET `username` = '$userName',`group` = '$userGroup' WHERE `uid` = '$userId'";
		}else{
			$passWord=md5($passWord."sdshare");
			$sql = "UPDATE `sd_users` SET `username` = '$userName',`pwd` = '$passWord',`group` = '$userGroup' WHERE `uid` = '$userId'";
			
		}

		if (mysqli_query($con,$sql)){
		  echo "ok|ok";
		  }else{
		  echo "bad|" ."无法修改数据表";
		  }
 		break;
 	case 'addgroup':
 		$timeNow = date('Y-m-d H:i:s');
 		$groupName = $_POST['gname'];
 		$groupPolicy = $_POST['gpolicy'];
 		$sql="INSERT INTO  `sd_usergroup` (`gname` ,`addtime` ,`policyid`)VALUES ('$groupName', '$timeNow', '$groupPolicy');";
 		if (mysqli_query($con,$sql)){
		  echo "ok|ok";
		  }else{
		  echo "bad|" ."无法修改数据表";
		  }
		break;
	case 'delgroup':
		$groupId = $_POST['gid'];
		if($groupId == "1"||$groupId == "2"){
			echo "bad.系统默认用户组无法删除";
			exit();
		}
		$check = "SELECT * FROM sd_users where `group` = '$groupId'";
		$cha_result3=mysqli_query($con,$check);
		$zuori3=mysqli_num_rows($cha_result3);
		if ($zuori3 >0){
			echo "bad.用户组下还有用户，请先删除这些用户";
			exit();
		}
		$delAction = "delete from sd_usergroup where id = '$groupId'";
		if (mysqli_query($con,$delAction)){
		  echo 
		  "ok.删除成功";
		  }else{
		  echo "bad." ."无法修改数据表";
		  }
		break;
	case 'editgroup':
		$groupId = $_POST['egid'];
		$groupName = $_POST['egname'];
		$groupPolicy = $_POST['epolicy'];
		$sql = "UPDATE `sd_usergroup` SET `gname` = '$groupName',`policyid` = '$groupPolicy' WHERE `id` = '$groupId'";
		if (mysqli_query($con,$sql)){
		  echo "ok|成功";
		  }else{
		  echo "bad|" ."无法修改数据表";
		  }
		break;
	case 'cleantemp':
		delFileUnderDir("../views/content/templates_c");
		delFileUnderDir("../content/templates_c");
		echo "ok|ok";
		break;
	case 'cleanfile':
		$cha="SELECT * FROM `sd_file` WHERE `cishuo` = '1' ";
		$cha_result=mysqli_query($con,$cha);
		$jinri1=mysqli_num_rows($cha_result);
		$shanchu="delete from sd_file where cishuo = '1'";
		if(mysqli_query($con,$shanchu)){
			echo "ok|".$jinri1;
		}else{
			echo "bad|无法删除数据";
		}
		break;
	case 'cleansql':
		$ju = "OPTIMIZE TABLE `sd_file`, `sd_policy`, `sd_setting`, `sd_ss`, `sd_sskey`, `sd_user`, `sd_usergroup`, `sd_users`";
		if(mysqli_query($con,$ju)){
			echo "ok|ok";
		}else{
			echo "bad|无法执行";
		}
		break;
	default:
		# code...
		break;
}
?>
